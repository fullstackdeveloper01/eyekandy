<?php

namespace App\Http\Controllers;

use App\Hour;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Notifications\DriverCreated;

class HourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('hour.index', ['hours' =>Hour::orderBy('id','desc')->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hour.create');
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
            'time' => ['required', 'unique:hours'],
        ]);

        $package = new Hour;
        $package->time = $request->time;
        $package->save();
        return redirect()->route('hour.index')->withStatus(__('Hour successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    // public function show(Hour $driver)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    // public function edit(Hour $package)
    // {
    //     return view('hour.edit', compact('package'));
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Hour $package)
    // {
    //     $request->validate([
    //         'package_title' => ['required', 'string', 'max:255'],
    //         'package_entertainer' => ['required'],
    //         'package_price' => ['required'],
    //         'package_hours' => ['required'],
    //         'package_color' => ['required'],
    //         'package_description' => ['required'],
    //     ]);

    //     $package->package_title = $request->package_title;
    //     $package->package_entertainer = $request->package_entertainer;
    //     $package->package_price = $request->package_price;
    //     $package->package_hours = $request->package_hours;
    //     $package->package_color = $request->package_color;
    //     $package->package_description = $request->package_description;
    //     $package->update();
       
    //     return redirect()->route('hour.index')->withStatus(__('Package Successfully Updated.'));
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function destroy($hours)
    {  
        $hours = Hour::where(['id'=>$hours])->first();
        if($hours->active == 1){
            $hours->active=0;
            $hours->update();
            return redirect()->route('hour.index')->withStatus(__('Hour Successfully Inactive.'));
        }else{
            $hours->active=1;
            $hours->update();
            return redirect()->route('hour.index')->withStatus(__('Hour Successfully Active.'));
        }
        
    }
    public function getHours(){
        return response()->json([
            'data' =>Hour::where(['active'=>1])->get(),
            'status' => true,
            'errMsg' => ''
        ]);
    }

}
