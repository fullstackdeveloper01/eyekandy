<?php

namespace App\Http\Controllers;

use App\Darshan;
use App\Gallery;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Order;
use App\Status;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Notifications\DriverCreated;

class DarshanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('darshan.index', ['darshan' =>Darshan::where(['trash'=>1])->orderBy('id','desc')->paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('darshan.create',['darshan' =>'']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required'],
            'url' => ['required'],
            'image' => ['required'],
            'description' => ['required'],
        ]);

        $darshan = new darshan;
        $darshan->title = $request->title;
        $darshan->url = $request->url;
        $darshan->description = $request->description;

        if ($request->hasFile('image')) {
            $filenameWithExt = $request->file('image')->getClientOriginalName ();
            // Get Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $filename = str_replace(' ', '_', $filename);
            // Get just Extension
            $extension = $request->file('image')->getClientOriginalExtension();
            // Filename To store
            $fileNameToStore = $filename. '_'. time().'.'.$extension;

            $request->image->move(public_path('uploads/darshan'), $fileNameToStore);
            $darshan->image = 'uploads/darshan/'.$fileNameToStore;
        }
            
        $darshan->save();
        return redirect()->route('darshan.index')->withStatus(__('darshan successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $driver)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(auth()->user()->hasRole('admin')){

            return view('darshan.create', ['darshan' =>Darshan::where(['id'=>$id])->first()]);
        }else return redirect()->route('orders.index')->withStatus(__('No Access'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // print_r($request->id);die;
        $request->validate([
            'title' => ['required'],
            'url' => ['required'],
            'description'=>['required']
        ]);
        
        $data=$request->post();
        unset($data['_token']);
        unset($data['id']);
        if ($request->hasFile('image')) {
            $filenameWithExt = $request->file('image')->getClientOriginalName ();
            // Get Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $filename = str_replace(' ', '_', $filename);
            // Get just Extension
            $extension = $request->file('image')->getClientOriginalExtension();
            // Filename To store
            $fileNameToStore = $filename. '_'. time().'.'.$extension;

            $request->image->move(public_path('uploads/darshan'), $fileNameToStore);
            $data['image'] = 'uploads/darshan/'.$fileNameToStore;
        }

        $darshan=Darshan::where(['id'=>$request->id])->update($data);
        return redirect()->route('darshan.index')->withStatus(__('darshan successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $where['id']=$id;
        Darshan::where($where)->update(['trash'=>0]);

        // if($affectedRows)
        // {
        //     if($gallery->image != ''){
        //         $path = public_path()."/uploads/darshan/".$gallery->photo_video;
        //         unlink($path);                
        //     }
        // }
           
        return redirect()->route('darshan.index')->withStatus(__('gallery successfully activate.'));
    }
    public function getPhoto(){
        
        $all_photo = Gallery::where(['status'=>1,'image_type'=>'Photo'])->orderBy('id','desc')->get();
        return response()->json([
            'data' =>$all_photo,
            'status' => true,
            'errMsg' => ''
        ]);
    }
    public function getVideo(){
        
        $all_video = Gallery::where(['status'=>1,'image_type'=>'Video'])->orderBy('id','desc')->get();
        return response()->json([
            'data' =>$all_video,
            'status' => true,
            'errMsg' => ''
        ]);
    }
}
