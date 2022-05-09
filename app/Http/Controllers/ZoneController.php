<?php

namespace App\Http\Controllers;

use App\Zone;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\City;
use App\Status;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Notifications\DriverCreated;

class ZoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->hasRole('admin')){
            return view('zone.index', ['zones' =>Zone::select('zone.*','city.city_name')->join('city','zone.city','city.id')->where(['zone.active'=>1])->paginate(10)]);
        }else 
        return redirect()->route('zone.index')->withStatus(__('No Access'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->hasRole('admin')){
            return view('zone.create',['cities' =>City:: where(['active'=>1])->get()]);
        }else return redirect()->route('zone.index')->withStatus(__('No Access'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   //Validate
        $request->validate([
            'city_name' => ['required'],
            'zone_name' => ['required', 'string', 'max:255'],
            'zone_area' => ['required','max:500'],

           
        ]);
        // "<pre>";print_r($request->);die;
        //Create the driver
       // $generatedPassword = Str::random(10);

        $zone = new Zone;
        $zone->city=$request->city_name;
        $zone->zone_name = strip_tags($request->zone_name);
        $zone->zone_area = $request->zone_area;
        $zone->save();
        return redirect()->route('zone.index')->withStatus(__('Zone successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function show(Zone $driver)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function edit(Zone $zone)
    {
        if(str_contains($zone->zone_area,',')){
            $zone->zone_area=explode(',',$zone->zone_area);
            //print_r($zone_area);die;
        }
    //     echo "<pre>";
    //    print_r($zone);die;
        if(auth()->user()->hasRole('admin')){
            return view('zone.edit',['cities' =>City:: where(['active'=>1])->get()], compact('zone'));
        }else return redirect()->route('zone.index')->withStatus(__('No Access'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Zone $zone)
    {
        $request->validate([
            'city_name' => ['required'],
            'zone_name' => ['required', 'string', 'max:255'],
            'zone_area' => ['required','max:500'],

           
        ]);
        

        $zone->city=$request->city_name;
        $zone->zone_name = strip_tags($request->zone_name);
        $zone->zone_area = implode(',',$request->zone_area);
        $zone->update();
        return redirect()->route('zone.index')->withStatus(__('Zone successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function destroy(Zone $zone)
    {//dd($zone);die;
        //$driver->delete();
        $zone->active=0;
        $zone->save();

        return redirect()->route('zone.index')->withStatus(__('Zone successfully deleted.'));
    }

    public function getZone(Request $request)
    {
        
        return response()->json([
            'data' =>Zone::where(['active'=>1,'city'=>$request->city])->get(),
            'status' => true,
            'errMsg' => ''
        ]);
    }

}
