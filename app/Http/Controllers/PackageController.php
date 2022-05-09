<?php

namespace App\Http\Controllers;

use App\Package;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Notifications\DriverCreated;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('package.index', ['packages' =>Package::orderBy('id','desc')->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->hasRole('admin')){
            return view('package.create');
        }else return redirect()->route('package.index')->withStatus(__('No Access'));
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
            'package_title' => ['required', 'string', 'max:255'],
            'package_entertainer' => ['required'],
            'package_price' => ['required'],
            'package_hours' => ['required'],
            'package_color' => ['required'],
            'package_description' => ['required'],
            'extra_hour_price' => ['required'],
        ]);

        $package = new Package;
        $package->package_title = $request->package_title;
        $package->package_entertainer = $request->package_entertainer;
        $package->package_price = $request->package_price;
        $package->package_hours = $request->package_hours;
        $package->package_color = $request->package_color;
        $package->package_description = $request->package_description;
        $package->extra_hour_price = $request->extra_hour_price;
        $package->save();
        return redirect()->route('package.index')->withStatus(__('Package successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function show(Package $driver)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function edit(Package $package)
    {
        return view('package.edit', compact('package'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Package $package)
    {
        $request->validate([
            'package_title' => ['required', 'string', 'max:255'],
            'package_entertainer' => ['required'],
            'package_price' => ['required'],
            'package_hours' => ['required'],
            'package_color' => ['required'],
            'package_description' => ['required'],
            'extra_hour_price' => ['required'],
        ]);

        $package->package_title = $request->package_title;
        $package->package_entertainer = $request->package_entertainer;
        $package->package_price = $request->package_price;
        $package->package_hours = $request->package_hours;
        $package->package_color = $request->package_color;
        $package->package_description = $request->package_description;
        $package->extra_hour_price = $request->extra_hour_price;
        $package->update();
       
        return redirect()->route('package.index')->withStatus(__('Package Successfully Updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function destroy(Package $package)
    {
        if($package->active==1){
            $package->active=0;
            $package->save();
            return redirect()->route('package.index')->withStatus(__('Package Successfully Inactive.'));
        }else{
            $package->active=1;
            $package->save();
            return redirect()->route('package.index')->withStatus(__('Package Successfully Active.'));
        }
        
    }

   
    public function getPackage(){
 
        return response()->json([
            'data' =>Package::where(['active'=>1])->get(),
            'status' => true,
            'errMsg' => ''
        ]);
    }

}
