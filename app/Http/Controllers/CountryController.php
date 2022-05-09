<?php

namespace App\Http\Controllers;

use App\City;
use App\Country;
use App\State;
use App\Zone;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Order;
use App\Status;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Notifications\DriverCreated;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            return view('country.index', ['country' =>Country::paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            return view('country.create');
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
            'country_name' => ['required', 'string', 'max:255','unique:country'],
        ]);

        $country = new Country;
        $country->country_name = strip_tags($request->country_name);
        $country->save();
        return redirect()->route('country.index')->withStatus(__('Country successfully created.'));
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
    public function edit(Country $country)
    {
            return view('country.edit', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {//dd($request);die;
        $request->validate([
           // 'city_name' => ['required', 'string', 'max:255','unique:city'],
            'country_name'=>'required|string|unique:city,country_name,'.$country->id,
        ]);
        $country->country_name = strip_tags($request->country_name);
        $country->active = $request->status;
        $country->update();
        return redirect()->route('country.index')->withStatus(__('Country successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        //$driver->delete();

        if($country->active==1){
            $country->active=0;
            $country->update();
            return redirect()->route('country.index')->withStatus(__('Country successfully deactivate.'));
        }else{
            $country->active=1;
            $country->update();
            return redirect()->route('country.index')->withStatus(__('Country successfully activate.'));
        }
        
        
        //Zone::where(['city'=>$city->id])->update(['active'=>0]);
        
       
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
                        'errMsg' => 'User is not a city. Please create City'
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


    public function getCountry(){
        return response()->json([
            'data' => Country::where(['active'=>1])->get(),
            'status' => true,
        ]);
    }

    // public function orderTracking(Order $order,$lat,$lng){
    //     $order->lat=$lat;
    //     $order->lng=$lng;
    //     $order->update();
    //     return response()->json([
    //         'status' => true,
    //         'message' => 'Order location updated'
    //     ]);

    // }


    // public function updateOrderStatus(Order $order, Status $status){
    //     $order->status()->attach($status->id,['user_id'=>auth()->user()->id,'comment'=>isset($_GET['comment'])?$_GET['comment']:""]);
    //     if($status->id==6){
    //         $order->lat=$order->restorant->lat;
    //         $order->lng=$order->restorant->lng;
    //         $order->update();
    //     }

    //     if($status->alias.""=="delivered"){
    //         $order->payment_status='paid';
    //         $order->update();
    //     }


    //     return response()->json([
    //         'status' => true,
    //         'message' => 'Order updated',
    //         'data'=> Order::where(['id'=>$order->id])->with(['items','status','restorant','client','address'])->get(),
    //     ]);
    // }

    // public function updateOrderLocation(Order $order, $lat,$lng){
    //     //Only assigned driver
    //     if(auth()->user()->id==$order->driver_id){
    //         if($order->status->pluck('alias')->last()=="picked_up"){
    //             $order->lat=$lat;
    //             $order->lng=$lng;
    //             $order->update();
    //             return response()->json([
    //                 'status' => true,
    //                 'message' => 'Order lat/lng updated',
    //             ]);
    //         }else{
    //             return response()->json([
    //                 'status' => false,
    //                 'message' => 'Order is not is status where should change lat / lng',
    //             ]);
    //         }

    //     }else{
    //         return response()->json([
    //             'status' => false,
    //             'message' => 'Order not on this driver',
    //             'data'=> Order::where(['id'=>$order->id])->with(['items','status','restorant','client','address'])->get(),
    //         ]);
    //     }

    // }
}
