<?php

namespace App\Http\Controllers;

use App\Bank;
use App\Pages;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\City;
use App\Status;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Notifications\DriverCreated;

class CustomerSupportController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('customerSupport.edit',['pages'=>Pages::where(['title'=>'Contact Support'])->first()]);
    }

    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        return view('customerSupport.edit');
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        Pages::where(['id'=>$id])->update(['content'=>$request->shyamtrusteditor]);
        return back()->withStatus(__('Customer Support successfully updated.'));
    }

    public function store(Request $request)
    {
        //Validate
        $request->validate([
            'shyamtrusteditor' => ['required'],
        ]);

        $pages = new Pages;
        $pages->title ='Customer Support';
        $pages->content = $request->shyamtrusteditor;
        $pages->save();
        // return redirect()->route('customerSupport')->withStatus(__('Customer Support successfully created.'));
        return back()->withStatus(__('Customer Support successfully created.'));

    }
}
