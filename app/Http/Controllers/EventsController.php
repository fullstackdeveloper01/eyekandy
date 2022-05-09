<?php

namespace App\Http\Controllers;

use App\Event;
use App\Notification;
use App\NotificationStatus;
use App\User;
use App\Package;
use App\Order;
use App\Helpers\Helper;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Notifications\DriverCreated;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('event.index', ['events' =>Event::where(['active'=>1])->orderBy('id','desc')->paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('event.create');
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
        $validator = Validator::make($request->all(), [
            'event_title' => ['required'],
            'featured_image' => ['required',"dimensions:min_height=300,max_height=500"],
            'description' => ['required'],
        ]);
        //Send failed response if request is not valid
        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }
        $event = new Event;
        $event->event_title = $request->event_title;
        $event->description = $request->description;


        if ($request->hasFile('featured_image')) {
            $filenameWithExt = $request->file('featured_image')->getClientOriginalName ();
            // Get Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $filename = str_replace(' ', '_', $filename);
            // Get just Extension
            $extension = $request->file('featured_image')->getClientOriginalExtension();
            // Filename To store
            $fileNameToStore = $filename. '_'. time().'.'.$extension;

            $request->featured_image->move(public_path('uploads/event'), $fileNameToStore);
        }
        else {
            $fileNameToStore = 'No-image.jpeg';
        }
        $event->featured_image = $fileNameToStore;
        $event->created_at = date('Y-m-d H:i:s');
        $event->save();
        // $this->send_notification($event->id,$event->event_title);
        $this->send_notification($event);
        return redirect()->route('event.index')->withStatus(__('Event successfully created.'));
    }

    public function show(Event $event)
    {
        if(auth()->user()->hasRole('admin')){
            $package = Package::where('id',$event->show_type)->first();
            $transaction = Order::where('id',$event->id)->first();
            return view('event.show', compact('event','package','transaction'));
        }
    }
    
    public function edit(Event $event)
    {
        if(auth()->user()->hasRole('admin')){
            return view('event.edit', compact('event'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {//dd($request);die;
        $validator = Validator::make($request->all(), [
            'event_title'=>'required|string|unique:events,event_title,'.$event->id,
            'featured_image' => ["dimensions:min_height=300,max_height=500"],
            'description' => ['required'],
        ]);
        //Send failed response if request is not valid
        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }

        $event->event_title = $request->event_title;
        $event->description = $request->description;
       

        if ($request->hasFile('featured_image')) {
            $filenameWithExt = $request->file('featured_image')->getClientOriginalName ();
            // Get Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $filename = str_replace(' ', '_', $filename);
            // Get just Extension
            $extension = $request->file('featured_image')->getClientOriginalExtension();
            // Filename To store
            $fileNameToStore = $filename. '_'. time().'.'.$extension;

            $request->featured_image->move(public_path('uploads/event'), $fileNameToStore);
            $event->featured_image = $fileNameToStore;
        }

        $event->update();
        return redirect()->route('event.index')->withStatus(__('event successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        if($event->active==1){
            $event->active=0;
            $event->update();
            return redirect()->route('event.index')->withStatus(__('event successfully deactivate.'));
        }else{
            $event->active=1;
            $event->update();
            return redirect()->route('event.index')->withStatus(__('event successfully activate.'));
        }       
    }

    public function latestEvent(){
        
        $data['latest_event'] = Event::where(['active'=>1])->orderBy('id','desc')->take(2)->get();
        $data['path'] =  asset("uploads/event/") ;
        return response()->json([
            'data' =>$data,
            'status' => true,
            'errMsg' => ''
        ]);
    }

    public function allEvent(){
        
        $data['all_event'] = Event::where(['active'=>1])->orderBy('id','desc')->get();
        $data['path'] =  asset("uploads/event/") ;
        return response()->json([
            'data' =>$data,
            'status' => true,
            'errMsg' => ''
        ]);
    }

    /**latest updated event to oldest */
    public function latestUpdatedEvent(){
        
        $data['latest_updated_event'] = Event::where(['active'=>1])->orderBy('updated_at','desc')->get();
        $data['path'] =  asset("uploads/event/") ;
        return response()->json([
            'data' =>$data,
            'status' => true,
            'errMsg' => ''
        ]);
    }

    /**oldest updated event to latest */
    public function oldestUpdatedEvent(){
    
        $data['oldest_updated_event'] = Event::where(['active'=>1])->orderBy('updated_at','asc')->get();
        $data['path'] =  asset("uploads/event/") ;
        return response()->json([
            'data' =>$data,
            'status' => true,
            'errMsg' => ''
        ]);
    }
    // this function is for send notification
    public function send_notification($event){
        $notification = new Notification;
        $notification->type='Event';
        $notification->notifiable_type=$event->event_title;
        $notification->notifiable_id=$event->id;
        $notification->data=asset("uploads/event/").'/'.$event->featured_image;
        $notification->save();
        foreach (User::select('id','device_id')->get() as $key => $value) {
            $notificationStatus =new NotificationStatus;
            $notificationStatus->notification_id=$notification->id;
            $notificationStatus->user_id=$value->id;
            $notificationStatus->save();
            if($value->device_id!="" && $value->device_id != null){
                Helper::sendNotification($value->device_id,'Event','New Event Added','1');
            }
        }
        return true;
    }
}
