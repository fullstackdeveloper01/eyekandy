<?php

namespace App\Http\Controllers;

use App\Girls;
use App\Galleries;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Notifications\DriverCreated;
use Validator;

class GirlsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('girls.index', ['girls' =>Girls::where(['trash'=>0])->orderBy('id','desc')->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('girls.create');
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
            'full_name' => ['required', 'unique:girls'],
            'image' => ['required'],
            'image.*' => ['mimes:jpg,png,jpeg'],
            'country_id' => ['required'],
            'state_id' => ['required'],
            'city_id' => ['required'],
        ]);
        $girl = new Girls;
        $girl->full_name = $request->full_name;
        $girl->country_id = $request->country_id;
        $girl->state_id = $request->state_id;
        $girl->city_id = $request->city_id;
        $girl->mon = isset($request->mon)?$request->mon:'0';
        $girl->tue = isset($request->tue)?$request->tue:'0';
        $girl->wed = isset($request->wed)?$request->wed:'0';
        $girl->thu = isset($request->thu)?$request->thu:'0';
        $girl->fri = isset($request->fri)?$request->fri:'0';
        $girl->sat = isset($request->sat)?$request->sat:'0';
        $girl->sun = isset($request->sun)?$request->sun:'0';
        $girl->save();
        if ($files = $request->file('image')){
            $image=[];
            foreach ($files as  $key => $file){
                $gallery = new Galleries;
                $mime_type=explode('/', $file->getMimeType());
                $name = time().str_replace(' ', '', $file->getClientOriginalName());
                $file->move(public_path('uploads/girls'),$name);
                $gallery['image_video'] = $name;
                $gallery['user_id'] = $girl->id;
                $gallery['created_at'] = now();
                $gallery['updated_at'] = now();
                $gallery->save();
                $image[] =$name;
            }
            $girl->image = implode(",",$image);
            $girl->update();
        }
        return redirect()->route('girls.index')->withStatus(__('Girls successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function show(Girls $girl)
    {
        return view('girls.show', compact('girl'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function edit(Girls $girl)
    {
        return view('girls.edit', compact('girl'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Girls $girl)
    {
        $request->validate([
            'full_name' => ['required'],
            'country_id' => ['required'],
            'state_id' => ['required'],
            'city_id' => ['required'],
        ]);
        if(empty($request->image)){
            $request->validate([
                'old_image' => ['required'],
            ]);
        }
        if ($files = $request->file('image')){
            $image=[];
            foreach ($files as  $key => $file){
                $gallery = new Galleries;
                $mime_type=explode('/', $file->getMimeType());
                $name = time().str_replace(' ', '', $file->getClientOriginalName());
                $file->move(public_path('uploads/girls'),$name);
                $gallery['image_video'] = $name;
                $gallery['user_id'] = $girl->id;
                $gallery['created_at'] = now();
                $gallery['updated_at'] = now();
                $gallery->save();
                $image[] =$name;
            }
            $girl->image = implode(",",$image);
        }else{
            $girl->image = implode(',',$request->old_image);
        }
        $girl->full_name = $request->full_name;
        $girl->country_id = $request->country_id;
        $girl->state_id = $request->state_id;
        $girl->city_id = $request->city_id;
        $girl->mon = isset($request->mon)?$request->mon:'0';
        $girl->tue = isset($request->tue)?$request->tue:'0';
        $girl->wed = isset($request->wed)?$request->wed:'0';
        $girl->thu = isset($request->thu)?$request->thu:'0';
        $girl->fri = isset($request->fri)?$request->fri:'0';
        $girl->sat = isset($request->sat)?$request->sat:'0';
        $girl->sun = isset($request->sun)?$request->sun:'0';

        $girl->update();
       
        return redirect()->route('girls.index')->withStatus(__('Girls Successfully Updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function destroy(Girls $girl)
    {  
        // $girl = Girls::where(['id'=>$girl])->first();
        if($girl->active == 1){
            $girl->active=0;
            $girl->update();
            return redirect()->route('girls.index')->withStatus(__('Girls Successfully Inactive.'));
        }else{
            $girl->active=1;
            $girl->update();
            return redirect()->route('girls.index')->withStatus(__('Girls Successfully Active.'));
        }
        
    }

    public function trash($faq)
    {  
        Girls::where(['id'=>$faq])->update(['trash'=>1]);
        
        return redirect()->route('girls.index')->withStatus(__('Girls Successfully Deleted.'));
        
    }

    public function rated($id,$data)
    {  
        $res = Girls::where(['id'=>$id])->update(['rated'=>$data]);
        if ($res) {
            return response()->json([
                'status' => true,
                'Msg' => 'Girl Updated successfully'
            ]);
        }else{
            return response()->json([
                'status' => false,
                'Msg' => 'Girl Updated successfully'
            ]);
        }
        
        
    }

    public function getGirls(){
        return response()->json([
            'data' =>Girls::where(['active'=>1])->get(),
            'status' => true,
            'errMsg' => ''
        ]);
    }

}
