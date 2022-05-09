<?php

namespace App\Http\Controllers;

use App\Vehicle;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Order;
use App\Status;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Notifications\DriverCreated;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->hasRole('admin')){
            return view('vehicle.index', ['vehicles' =>Vehicle::paginate(10)]);
        }else 
        return redirect()->route('orders.index')->withStatus(__('No Access'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->hasRole('admin')){
            return view('vehicle.create');
        }else return redirect()->route('orders.index')->withStatus(__('No Access'));
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
            'name' => ['required', 'string', 'max:255','unique:vehicle'],
        ]);
        //Create the driver
       // $generatedPassword = Str::random(10);
       //echo "fd";die;
        $vehicle = new Vehicle;
        $vehicle->name = strip_tags($request->name);
        $vehicle->save();
        return redirect()->route('vehicle.index')->withStatus(__('Vehicle successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicle $vehicle)
    {
        if(auth()->user()->hasRole('admin')){
            return view('vehicle.edit', compact('vehicle'));
        }else return redirect()->route('orders.index')->withStatus(__('No Access'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        //Validate
        $request->validate([
           // 'name' => ['required', 'string', 'max:255','unique:vehicle'],
            'name'=>'required|string|unique:vehicle,name,'.$vehicle->id,
        ]);
        
        $vehicle->name = strip_tags($request->name);
        $vehicle->active = $request->actives;
        $vehicle->update();
        return redirect()->route('vehicle.index')->withStatus(__('Vehicle successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vehicle)
    {
        //$driver->delete();
      
        if($vehicle->active==1){
            $vehicle->active=0;
            $vehicle->update();
           
            return redirect()->route('vehicle.index')->withStatus(__('Vehicle successfully deactivate.'));
        }else{
            $vehicle->active=1;
            $vehicle->update();
         
            return redirect()->route('vehicle.index')->withStatus(__('Vehicle successfully activate.'));
        }
       
       
    }

    public function getToken(Request $request){
        $user = User::where(['active'=>1,'email'=>$request->email])->first();
        if($user != null){
            if(Hash::check($request->password, $user->password)){
                if($user->hasRole(['driver'])){
                    return response()->json([
                        'status' => true,
                        'token' => $user->api_token,
                        'id'=>$user->id
                    ]);
                }else{
                    return response()->json([
                        'status' => false,
                        'errMsg' => 'User is not a driver. Please create driver'
                    ]);
                }
            }else{
                return response()->json([
                    'status' => false,
                    'errMsg' => 'Incorrect password'
                ]);
            }
        }else{
            return response()->json([
                'status' => false,
                'errMsg' => 'User not found. Incorrect email.'
            ]);
        }
    }


    public function getVehicle(){

        return response()->json([
            'data' => Vehicle::where(['active'=>1])->get(),
            'status' => true,
            'errMsg' => ''
        ]);
    }

    public function orderTracking(Order $order,$lat,$lng){
        $order->lat=$lat;
        $order->lng=$lng;
        $order->update();
        return response()->json([
            'status' => true,
            'message' => 'Order location updated'
        ]);

    }


    public function updateOrderStatus(Order $order, Status $status){
        $order->status()->attach($status->id,['user_id'=>auth()->user()->id,'comment'=>isset($_GET['comment'])?$_GET['comment']:""]);
        if($status->id==6){
            $order->lat=$order->restorant->lat;
            $order->lng=$order->restorant->lng;
            $order->update();
        }

        if($status->alias.""=="delivered"){
            $order->payment_status='paid';
            $order->update();
        }


        return response()->json([
            'status' => true,
            'message' => 'Order updated',
            'data'=> Order::where(['id'=>$order->id])->with(['items','status','restorant','client','address'])->get(),
        ]);
    }

    public function updateOrderLocation(Order $order, $lat,$lng){
        //Only assigned driver
        if(auth()->user()->id==$order->driver_id){
            if($order->status->pluck('alias')->last()=="picked_up"){
                $order->lat=$lat;
                $order->lng=$lng;
                $order->update();
                return response()->json([
                    'status' => true,
                    'message' => 'Order lat/lng updated',
                ]);
            }else{
                return response()->json([
                    'status' => false,
                    'message' => 'Order is not is status where should change lat / lng',
                ]);
            }

        }else{
            return response()->json([
                'status' => false,
                'message' => 'Order not on this driver',
                'data'=> Order::where(['id'=>$order->id])->with(['items','status','restorant','client','address'])->get(),
            ]);
        }

    }
}
