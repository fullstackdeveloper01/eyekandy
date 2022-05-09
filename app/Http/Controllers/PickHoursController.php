<?php

namespace App\Http\Controllers;

use App\PickHours;
use App\Package;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\City;
use App\Status;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Notifications\DriverCreated;

class PickHoursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->hasRole('admin')){
            return view('pickhours.index', ['pickhours' =>PickHours::select('pickhours.*','packages.package_name')->join('packages', 'pickhours.package', '=', 'packages.id')->where(['pickhours.active'=>1])->paginate(15)]);
        }else 
        return redirect()->route('pickhours.index')->withStatus(__('No Access'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $peakhours = PickHours::where(['active'=>1,'title'=>'peak hours'])->paginate(10);
        $packages = Package::where(['active'=>1])->paginate(15);
        //echo "<pre>";print_r($peakhours);die;
        if(auth()->user()->hasRole('admin')){
            return view('pickhours.create',compact('peakhours','packages'));
        }else return redirect()->route('pickhours.index')->withStatus(__('No Access'));
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
            //'from_time' => ['required', 'string', 'max:255'],
            //'to_time' => ['required', 'string', 'max:255'],
            'delivery_price' =>['required','max:255'],
        ]);

        $pickhours = new PickHours;
        $pickhours->package=$request->package_name;
        if($request->from_time==null && $request->to_time==null){
            $pickhours->title = 'normal hours';//($request->title);
        }else{
            $pickhours->title = strip_tags($request->title);
        }
       
        $pickhours->from_time = strip_tags($request->from_time);
        $pickhours->to_time = strip_tags($request->to_time);
        $pickhours->delivery_price =$request->delivery_price;
        if(isset($request->minimum_compulsary_time)){
            $pickhours->minimum_compulsary_time= $request->minimum_compulsary_time;
        }
        $pickhours->save();
        return redirect()->route('pickhours.index')->withStatus(__('Pick Hours successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function show(PickHours $pickhour)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function edit(PickHours $pickhour)
    {//dd($pickhour);die;
        $peakhours = PickHours::where(['active'=>1,'title'=>'peak hours'])->paginate(15);
        $packages = Package::where(['active'=>1])->paginate(15);
        if(auth()->user()->hasRole('admin')){
            return view('pickhours.edit', compact('pickhour','peakhours','packages'));
        }else return redirect()->route('pickhours.index')->withStatus(__('No Access'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pickhours $pickhour)
    {//dd($request);die;
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
           // 'from_time' => ['required', 'string', 'max:255'],
            //'to_time' => ['required', 'string', 'max:255'],
            'delivery_price' =>['required','max:255'],
        ]);

        // $pickhour->title = strip_tags($request->title);
        // $pickhour->from_time = strip_tags($request->from_time);
        // $pickhour->to_time = strip_tags($request->to_time);
        // $pickhour->delivery_price =$request->delivery_price;
        $pickhour->package=$request->package_name;
        // if($request->from_time==null && $request->to_time==null){
        //     $pickhour->title = 'normal hours';//($request->title);
        // }else{
        //     $pickhour->title = strip_tags($request->title);
        // }
        if($request->package_name==2){
            if($request->peak_hour!='' && $request->including_peak_hours=="on")
            {
                $array_h=explode('-',$request->peak_hour);
                $pickhour->from_time = $array_h[0];
                $pickhour->to_time = $array_h[1];
                $pickhour->title = 'peak hours';
                $pickhour->including_peak_hours=1;
            }  
            else{
                $pickhour->from_time = '';//$array_h[0];
                $pickhour->to_time = '';//$array_h[1];
                $pickhour->title = 'normal hours';
                $pickhour->including_peak_hours=0;
            }  
        }else{
            $pickhour->from_time = $request->from_time;
            $pickhour->to_time = $request->to_time;
        }   

        $pickhour->delivery_price =$request->delivery_price;
        if(isset($request->minimum_compulsary_time)){
            $pickhour->minimum_compulsary_time= $request->minimum_compulsary_time;
        }
        
        $pickhour->update();
       
        return redirect()->route('pickhours.index')->withStatus(__('Pick Hours successfully Updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function destroy(PickHours $pickhour)
    {//dd($pickhours);die;
        //$driver->delete();
        $pickhour->active=0;
        $pickhour->update();

        return redirect()->route('pickhours.index')->withStatus(__('Pick Hours successfully deleted.'));
    }

    public function getPickHours(){
 
        return response()->json([
            'data' =>PickHours::where(['active'=>1])->get(),
            'status' => true,
            'errMsg' => ''
        ]);
    }

}
