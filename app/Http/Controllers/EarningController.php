<?php

namespace App\Http\Controllers;

use App\Earning;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Notifications\DriverCreated;

class EarningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->hasRole('admin')){
            return view('earning.index', ['earnings' =>Earning:: where(['active'=>1])->paginate(10)]);
        }else 
        return redirect()->route('earning.index')->withStatus(__('No Access'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->hasRole('admin')){
            return view('earning.create');
        }else return redirect()->route('earning.index')->withStatus(__('No Access'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {//dd($request);die;
        //Validate
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
        ]);

        $earning = new Earning;
        $earning->title = strip_tags($request->title);
        $earning->distance_km = strip_tags($request->distance_km);
        $earning->from_hours = strip_tags($request->from_hours);
        $earning->to_hours = strip_tags($request->to_hours);
        $earning->price = strip_tags($request->price);
        $earning->save();
        return redirect()->route('earning.index')->withStatus(__('Earning type successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function show(Earning $driver)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function edit(Earning $package)
    {//dd($pickhour);die;
        if(auth()->user()->hasRole('admin')){
            return view('earning.edit', compact('earning'));
        }else return redirect()->route('earning.index')->withStatus(__('No Access'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Earning $package)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
        ]);

        $earning->title = strip_tags($request->title);
        $earning->distance_km = strip_tags($request->distance_km);
        $earning->from_hours = strip_tags($request->from_hours);
        $earning->to_hours = strip_tags($request->to_hours);
        $earning->price = strip_tags($request->price);
        $earning->update();
       
        return redirect()->route('earning.index')->withStatus(__('Earning type successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function destroy(Earning $package)
    {
        //$driver->delete();
        $earning->active=0;
        $earning->save();

        return redirect()->route('earning.index')->withStatus(__('Earning successfully deleted.'));
    }
    public function getPackage(){
 
        return response()->json([
            'data' =>Earning::where(['active'=>1])->get(),
            'status' => true,
            'errMsg' => ''
        ]);
    }

}
