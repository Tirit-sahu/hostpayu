<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Anand\LaravelPaytmWallet\Facades\PaytmWallet;
use App\Models\Paytm;
use DB;
use Session;

class PaytmController extends Controller
{    

    // display a form for payment
    public function initiate(Request $request)
    {   
        $hosting = DB::table('hostings')->where('id', $request->id)->first();
        return view('paytm', ['hosting'=>$hosting]);
    }

    public function pay(Request $request)
    {
        date_default_timezone_set('Asia/Kolkata');
        $date = date('Y-m-d');
        $digits = 12;
        $random = rand(pow(10, $digits-1), pow(10, $digits)-1);
        // $amount = 15; //Amount to be paid
        $client = DB::table('hostings')->where('id', $request->order_id)->first();
        $total_amount = $client->renewal_amount;
            if($client->gst == 'enabled'){
                $gst = $client->renewal_amount*18/100;
                $total_amount = $client->renewal_amount+$gst;
            }
        // dd($amount);

        $request->validate([
            'order_id' => 'required',
            'name' => 'required',
            'mobile' => 'required|digits:10',
            'email' => 'nullable|email',
            'renewal_amount' => 'required'
        ],
        [
            'order_id.required' => 'ORDER ID IS REQUIRED'
        ]
        );

        $userData = [
            'name' => $request->name, // Name of user
            'mobile' => $request->mobile, //Mobile number of user
            'email' => $request->email, //Email of user
            'fee' => $total_amount,
            'order_id' => $request->order_id."_".$random, //Order id
            'date' => $date
        ];
        $paytmuser = Paytm::create($userData); // creates a new database record

        $payment = PaytmWallet::with('receive');

        $payment->prepare([
            'order' => $userData['order_id'], 
            'user' => $paytmuser->id,
            'mobile_number' => $userData['mobile'],
            'email' => $userData['email'], // your user email address
            'amount' => $userData['fee'], // amount will be paid in INR.
            'callback_url' => route('status') // callback URL
        ]);
        return $payment->receive();  // initiate a new payment
    }

    public function paymentCallback()
    {
        $transaction = PaytmWallet::with('receive');

        $response = $transaction->response();
        
        $order_id = $transaction->getOrderId(); // return a order id
        
        $transaction->getTransactionId(); // return a transaction id
    
        // update the db data as per result from api call
        if ($transaction->isSuccessful()) {
            $array = explode("_",$order_id);
            $hostid = $array[0];
            Paytm::where('order_id', $order_id)->update(['host_id'=> $hostid, 'status' => 1, 'transaction_id' => $transaction->getTransactionId()]);

            date_default_timezone_set("Asia/Kolkata");   //India time (GMT+5:30)
            $date = date('Y-m-d');
            $oneYearOn = date('Y-m-d',strtotime($date . " + 365 day"));

            DB::table('hostings')->where('id', $hostid)->update(['date'=>$date, 'expire_date'=>$oneYearOn]);
            Session::flash('success', 'Payment successfull.');
            return view('status', ['response'=>$response]);
            // return redirect(route('initiate.payment'))->with('message', "Your payment is successfull.");

        } else if ($transaction->isFailed()) {
            Paytm::where('order_id', $order_id)->update(['status' => 0, 'transaction_id' => $transaction->getTransactionId()]);
            Session::flash('error', 'Payment failed.');
            return view('status');
            // return redirect(route('initiate.payment'))->with('message', "Your payment is failed.");
            
        } else if ($transaction->isOpen()) {
            Paytm::where('order_id', $order_id)->update(['status' => 2, 'transaction_id' => $transaction->getTransactionId()]);
            Session::flash('error', 'Payment Processing.');
            return view('status');
            // return redirect(route('initiate.payment'))->with('message', "Your payment is processing.");
        }
        $transaction->getResponseMessage(); //Get Response Message If Available
        
        // $transaction->getOrderId(); // Get order id
    }


    public function paymentDataTables(Request $request)
    {
        return view('paymentDataTables');
    }

    public function getPaymentDataTables(Request $request)
    {
        $data = DB::table('paytms')
        ->OrderBy('id', 'DESC')
        ->get();
        return $paytms = datatables()->of($data)

        
        
        ->editColumn('status', function($paytms) {
            if($paytms->status == 0){ 
                return '<span class="label label-important"><i class="fa fa-times-circle" aria-hidden="true"></i> Failed</span>'; 
            }
            else if($paytms->status == 1){ 
                return '<span class="label label-success"><i class="fa fa-check" aria-hidden="true"></i> Successfull</span>'; 
            }
            else{ 
                return '<span class="label label-info"><i class="fa fa-spinner" aria-hidden="true"></i> Proccessing</span>'; 
            }
        }) 
       

        ->addColumn('action', function($paytms) {

            $action = '';
                $action='<a class="btn btn-danger btn-sm" onclick="destroy('.$paytms->id.')"><i class="fa fa-minus-circle" aria-hidden="true"></i> Delete</a>';
            return ' 
                '.$action.'
            ';
        })
        ->rawColumns(['status','action'])
        ->addIndexColumn()

        ->make(true);
    }


    public function destroy(Request $request)
    {
        if(DB::table('paytms')->where('id', $request->id)->delete()){
            return 1;
        }else{
            return 0;
        }
    }




}
