<?php

namespace App\Http\Controllers;

use App\Venue;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Notifications\DriverCreated;

class VenueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('venue.index', ['venue' =>Venue::orderBy('id','desc')->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('venue.create');
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
            'type' => ['required', 'unique:venue'],
        ]);
        $venue = new Venue;
        $venue->type = $request->type;
        $venue->save();
        return redirect()->route('venue.index')->withStatus(__('Venue successfully created.'));
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
    public function edit(Venue $venue)
    {
        return view('venue.edit', compact('venue'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Venue $venue)
    {
        $request->validate([
            'type' => ['required', 'unique:venue'],
        ]);

        $venue->type = $request->type;
        $venue->update();
       
        return redirect()->route('venue.index')->withStatus(__('Venue Successfully Updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venue $venue)
    {  
        // $venue = Venue::where(['id'=>$venue])->first();
        if($venue->active == 1){
            $venue->active=0;
            $venue->update();
            return redirect()->route('venue.index')->withStatus(__('Venue Successfully Inactive.'));
        }else{
            $venue->active=1;
            $venue->update();
            return redirect()->route('venue.index')->withStatus(__('Venue Successfully Active.'));
        }
        
    }
    public function getVenue(){
        return response()->json([
            'data' =>Venue::where(['active'=>1])->get(),
            'status' => true,
            'errMsg' => ''
        ]);
    }

}
