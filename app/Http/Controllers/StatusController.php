<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Status;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Notifications\DriverCreated;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->hasRole('admin')){
            return view('status.index', ['status' =>Status::where(['active'=>1])->paginate(10)]);
        }else 
        return redirect()->route('status.index')->withStatus(__('No Access'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->hasRole('admin')){
            return view('status.create');
        }else return redirect()->route('status.index')->withStatus(__('No Access'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate
        $request->validate([
            'status_name' => ['required', 'string', 'max:255'],
            'status_alias' => ['required', 'string', 'max:255'],

           
        ]);

        //Create the driver
       // $generatedPassword = Str::random(10);
        //echo "<pre>";print_r($request->all());die;
        $status = new Status;
        $status->name = strip_tags($request->status_name);
        $status->alias = strip_tags($request->status_alias);
        $status->save();
        return redirect()->route('status.index')->withStatus(__('Status successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function show(Status $driver)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function edit(Status $status)
    {
        if(auth()->user()->hasRole('admin')){
            return view('status.edit', compact('status'));
        }else return redirect()->route('status.index')->withStatus(__('No Access'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Status $status)
    {
        $request->validate([
            'status_name' => ['required', 'string', 'max:255'],
            'status_alias' => ['required', 'string', 'max:255'],

           
        ]);
        
        $status->name = strip_tags($request->status_name);
        $status->alias = strip_tags($request->status_alias);
        $status->update();
        return redirect()->route('status.index')->withStatus(__('Status successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function destroy(Status $status)
    {
        //$driver->delete();
        $status->active=0;
        $status->save();

        return redirect()->route('status.index')->withStatus(__('Status successfully deleted.'));
    }

    public function getStatus(){
 
        return response()->json([
            'data' =>Status::where(['active'=>1])->get(),
            'status' => true,
            'errMsg' => ''
        ]);
    }

}
