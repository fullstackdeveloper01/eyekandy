<?php

namespace App\Http\Controllers;

use App\User;
use App\Event;
use App\Rating;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        return view('users.index', ['users' => $model->where(['role'=>3])->orderBy('id','ASC')->get()]);
    }

    /**
     * Show the form for creating a new user
     *
     * @return \Illuminate\View\View
     */
    // public function create()
    // {
    //     return view('users.create');
    // }

    /**
     * Store a newly created user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    // public function store(UserRequest $request, User $model)
    // {
    //     $model->create($request->merge(['password' => Hash::make($request->get('password'))])->all());

    //     return redirect()->route('user.index')->withStatus(__('User successfully created.'));
    // }

    /**
     * Show the form for editing the specified user
     *
     * @param  \App\User  $user
     * @return \Illuminate\View\View
     */
    // public function edit(User $user)
    // {
    //     return view('users.edit', compact('user'));
    // }

    /**
     * Update the specified user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    // public function update(UserRequest $request, User  $user)
    // {
    //     $user->update(
    //         $request->merge(['password' => Hash::make($request->get('password'))])
    //             ->except([$request->get('password') ? '' : 'password']
    //     ));

    //     return redirect()->route('user.index')->withStatus(__('User successfully updated.'));
    // }

    /**
     * Remove the specified user from storage
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function inactive($user,$status)
    {
        User::where(['id'=>$user])->update(['active'=>$status]);
        return redirect()->route('user.index')->withStatus(__('User successfully Updated.'));
    }

    // public function checkPushNotificationId(UserRequest $request)
    // {
    //     return response()->json([
    //         'userId' => $request->userId,
    //         'status' => true,
    //         'errMsg' => ''
    //     ]);
    // }

    public function show(User $user)
    {
        $event  = Event::where('user_id','=',$user->id)->where('active','=',1)->orderBy('id','desc')->paginate(15);
        
        return view('users.show',['event'=>$event,'user'=>$user]);
    }

    /**
     * Show the form for creating a new user
     *
     * @return \Illuminate\View\View
     */
    // public function details()
    // {
    //     return view('users.create');
    // }

    //*** GET Request Status
    public function status($id1,$id2)
    {  
        $data = User::findOrFail($id1);
        $data->active = $id2;
        $data->update();
        echo true;
    }
    /*get review list*/
    // public function review($id)
    // {
    //     $ratings  = Rating::Select('users.name','users.email', 'ratings.*')->join('users', function ($join) {
    //         $join->on('users.id', '=', 'ratings.user_id')
    //         ->where('ratings.user_id', '>', 1);
    //     })->where('listing_id','=',$id)->orderBy('ratings.id','desc')->paginate(15);
    //     return view('users.review',['rating'=>$ratings]);
    // }

    //*** GET review Status
    // public function reviewStatus($id1,$id2)
    // {  
    //     $data = Rating::findOrFail($id1);
    //     $data->status = $id2;
    //     $data->update();
       
    //     echo true;
    // }
}
