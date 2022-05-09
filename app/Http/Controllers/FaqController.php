<?php

namespace App\Http\Controllers;

use App\Faq;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Notifications\DriverCreated;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('faq.index', ['faq' =>Faq::orderBy('id','desc')->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('faq.create');
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
            'question' => ['required', 'unique:faq'],
            'answer' => ['required'],
        ]);

        $faq = new Faq;
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->save();
        return redirect()->route('faq.index')->withStatus(__('FAQ successfully created.'));
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
    public function edit(Faq $faq)
    {
        return view('faq.edit', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faq $faq)
    {
        $request->validate([
            'question' => ['required'],
            'answer' => ['required'],
        ]);

        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->update();
       
        return redirect()->route('faq.index')->withStatus(__('FAQ Successfully Updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faq $faq)
    {  
        // $faq = Faq::where(['id'=>$faq])->first();
        if($faq->active == 1){
            $faq->active=0;
            $faq->update();
            return redirect()->route('faq.index')->withStatus(__('FAQ Successfully Inactive.'));
        }else{
            $faq->active=1;
            $faq->update();
            return redirect()->route('faq.index')->withStatus(__('FAQ Successfully Active.'));
        }
        
    }
    public function getVenue(){
        return response()->json([
            'data' =>Faq::where(['active'=>1])->get(),
            'status' => true,
            'errMsg' => ''
        ]);
    }

}
