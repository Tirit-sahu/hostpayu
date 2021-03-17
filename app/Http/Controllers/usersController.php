<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Redirect;
use Datatables;

class usersController extends Controller
{

    public function getUsers(Request $request)
    {
        $data = DB::table('users')
        ->where('role',0)
        ->OrderBy('id', 'DESC')
        ->get();
        return $users = datatables()->of($data)

        
        
        ->editColumn('status', function($users) {
            if($users->role == 0){
            if($users->status == 0){ 
                return '<span class="label label-success">Unblocked</span>'; 
            }else{ 
                return '<span class="label label-important">Blocked</span>'; 
            }
            }
        }) 
       

        ->addColumn('action', function($users) {
            
            $action = '';
            if($users->role == 0){
                if($users->status == 0){
                $action='<a class="btn btn-danger btn-sm" onclick="blocked_unblobked('.$users->id.',1)"><i class="fa fa-lock"></i> Block</a>';
                }else{
                $action='<a class="btn btn-success btn-sm" onclick="blocked_unblobked('.$users->id.',0)"><i class="fa fa-unlock-alt"></i> Unblock</a>';
                }
            }
            return ' 
                '.$action.'

            ';
        })
        ->rawColumns(['role','status','action'])
        ->addIndexColumn()

        ->make(true);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function blocked_unblobked(Request $request)
    {
        $res = DB::table('users')
        ->where('id', $request->id)
        ->update(['status'=>$request->status]);
        return $res;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        // $users = DB::table('users')->get();
        return view('users');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function loginView()
    {
        return Redirect('/login');
    }


}
