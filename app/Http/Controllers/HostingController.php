<?php

namespace App\Http\Controllers;

use App\Models\hosting;
use Illuminate\Http\Request;
use DB;
use Session;
use Redirect;
use Datatables;
use Auth;


class HostingController extends Controller
{

    public function renew(Request $request)
    {
        return view('PaytmKit.TxnTest');

    }

    public static function dashboard($type){

        date_default_timezone_set('Asia/Kolkata');
        $currentDate = date( 'Y-m-d');

        if($type=='total_hosting'){
            $total_hostings = DB::select("SELECT COUNT(*) AS total_hosting FROM hostings");
            return $total_hostings[0]->total_hosting;
        }
        if($type=='expire'){
            $total_hostings = DB::select("SELECT COUNT(*) AS total_hosting FROM hostings WHERE expire_date <= '$currentDate'");
            return $total_hostings[0]->total_hosting;
        }
        if($type=='active'){
            $total_hostings = DB::select("SELECT COUNT(*) AS total_hosting FROM hostings WHERE expire_date > '$currentDate'");
            return $total_hostings[0]->total_hosting;
        }
        if($type=='upcommimg_expire'){
            $total_hostings = DB::select("SELECT COUNT(*) AS total_hosting FROM hostings WHERE expire_date >= DATE_ADD(CURDATE(), INTERVAL 10 DAY)");
            return $total_hostings[0]->total_hosting;
        }        

    }


    
    public function hostingsValidation(Request $request)
    {
        $response = [];

        date_default_timezone_set('Asia/Kolkata');
        $currentDate = date( 'Y-m-d');
        $hostings = DB::table('hostings')->where('id', $request->hostid)->first();
        $expire_date = date('d-m-Y', strtotime($hostings->expire_date));
        if($currentDate >= $hostings->expire_date){
            $response['error'] = false;
            $response['success'] = true;
            $response['expire'] = 2;
            $response['message'] = 'Your panel is expired '.$expire_date;
            $response['data'] = ['customer_name'=>$hostings->customer_name,'customer_email'=>$hostings->customer_email,'customer_mobile'=>$hostings->customer_mobile,'doamin_name'=>$hostings->doamin_name,'expire_date'=>$expire_date];
            return json_encode($response);
        }else{
            $res = DB::select("SELECT * FROM hostings WHERE hostings.expire_date <= DATE_ADD(CURDATE(), INTERVAL 10 DAY) AND id = $request->hostid");
            if($res){
                $response['error'] = false;
                $response['success'] = true;
                $response['expire'] = 1;
                $response['message'] = 'Your panel is expired '.$expire_date;
                $response['data'] = ['customer_name'=>$hostings->customer_name,'customer_email'=>$hostings->customer_email,'customer_mobile'=>$hostings->customer_mobile,'doamin_name'=>$hostings->doamin_name,'expire_date'=>$expire_date];
                return json_encode($response);
            }else{
                $response['error'] = false;
                $response['success'] = true;
                $response['expire'] = 0;
                $response['message'] = 'enjoy!!!';
                $response['expire_date'] = '';
                return json_encode($response);
            }
        }
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getHostings(Request $request)
    {
        $data = DB::table('hostings')
        ->OrderBy('id', 'DESC')
        ->get();
        return $hostings = datatables()->of($data)

        ->editColumn('customer_name', function($hostings) {
            $customer_info = "<b>Name</b>: ".$hostings->customer_name."<br><b>Email</b>: ".$hostings->customer_email."<br><b>Mobile</b>: ".$hostings->customer_mobile;
            return $customer_info;
        })


        ->addColumn('hostid', function($hostings) {
            return $hostings->id;
        })

        // ->editColumn('status', function($hostings) {
        //     if($hostings->status == 1){ 
        //         return '<span class="label label-success">Active</span>'; 
        //     }else{ 
        //         return '<span class="label label-important">Expire</span>'; 
        //     }
        // })        

        ->addColumn('action', function($hostings) {
            $edit = url('/hostings/edit/'.$hostings->id);
            return ' 
                <a class="btn btn-success btn-sm" href="'.$edit.'"><i class="fa fa-pencil-square" aria-hidden="true"></i> Edit</a>
                <a class="btn btn-danger btn-sm" onclick="destroy('.$hostings->id.')"><i class="fa fa-minus-circle" aria-hidden="true"></i> Delete</a>
        
            ';
        })
        ->rawColumns(['customer_name','status','action'])
        ->addIndexColumn()
        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hostings_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required',
            'customer_email' => 'nullable',
            'customer_mobile' => 'required',            
            'doamin_name' => 'required',
            'hosting' => 'required',
            'date' => 'required',
            'expire_date' => 'required',
            'renewal_amount' => 'required',
            'gst' => 'required'
        ]);
        
        $myArray = array(
            'customer_name' => $request->input('customer_name'),
            'customer_email' => $request->input('customer_email'),
            'customer_mobile' => $request->input('customer_mobile'),      
            'doamin_name' => $request->input('doamin_name'),
            'hosting' => $request->input('hosting'),
            'date' => date('Y-m-d', strtotime($request->input('date'))),
            'expire_date' => date('Y-m-d', strtotime($request->input('expire_date'))),
            'renewal_amount' => $request->input('renewal_amount'),
            'gst' => $request->input('gst'),
            'created_by' => auth()->user()->id
        );

        $hostid = $request->input('hostid');
        $check_available = DB::table('hostings')->where('id', $hostid)->count();
        if($check_available==0){
            DB::table('hostings')->insert($myArray);
            Session::flash('success', "New Record Added");
            return Redirect::back();
        }else{
            DB::table('hostings')->where('id', $hostid)->update($myArray);
            Session::flash('success', "Record Updated");
            return Redirect('/hostings');           
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\hosting  $hosting
     * @return \Illuminate\Http\Response
     */
    public function show(hosting $hosting)
    {
        return view('hostings');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\hosting  $hosting
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hosting = DB::table('hostings')->where('id', $id)->first();
        return view('hostings_create', ['hosting'=>$hosting]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\hosting  $hosting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, hosting $hosting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\hosting  $hosting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if(DB::table('hostings')->where('id', $request->id)->delete()){
            return 1;
        }else{
            return 0;
        }
    }


    public function test(hosting $hosting)
    {
            date_default_timezone_set("Asia/Kolkata");   //India time (GMT+5:30)
            $date = date('Y-m-d');
            $oneYearOn = date('Y-m-d',strtotime($date . " + 365 day"));
    }

    


}
