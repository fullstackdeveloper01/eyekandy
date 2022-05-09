<?php

namespace App\Http\Controllers;

use App\City;
use App\Country;
use App\State;
use App\Zone;
use App\SupportTopic;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Order;
use App\Status;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Notifications\DriverCreated;

class supporttopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            return view('supportTopic.index', ['supportTopic' =>SupportTopic::paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            return view('supportTopic.create');
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
            'topic' => ['required', 'string', 'max:255','unique:support_topic'],
        ]);

        $supportTopic = new SupportTopic;
        $supportTopic->topic = strip_tags($request->topic);
        $supportTopic->save();
        return redirect()->route('support_topic.index')->withStatus(__('Support Topic successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function show(Country $driver)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function edit(SupportTopic $supportTopic)
    {
            return view('supportTopic.edit', compact('supportTopic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SupportTopic $supportTopic)
    {//dd($request);die;
        $request->validate([
            'topic'=>'required|string|unique:support_topic,topic,'.$supportTopic->id,
        ]);
        $supportTopic->topic = $request->topic;
        $supportTopic->update();
        return redirect()->route('support_topic.index')->withStatus(__('Support Topic successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function destroy(SupportTopic $supportTopic)
    {
        if($supportTopic->active==1){
            $supportTopic->active=0;
            $supportTopic->update();
            return redirect()->route('support_topic.index')->withStatus(__('Support Topic successfully deactivate.'));
        }else{
            $supportTopic->active=1;
            $supportTopic->update();
            return redirect()->route('support_topic.index')->withStatus(__('Support Topic successfully activate.'));
        }
        
    }

    public function getCountry(){
        return response()->json([
            'data' => Country::where(['active'=>1])->get(),
            'status' => true,
        ]);
    }

}
