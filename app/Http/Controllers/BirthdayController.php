<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use DB;

class BirthdayController extends Controller
{
    /**
     * Display a birthday of the birthday
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        // $day= date('d');
        // $month = date('m');
        // $upcoming_birthday = User::where('active','=','1')
        //                         ->whereMonth('dob','>=',$month)
        //                         ->whereDay('dob', '>=', $day)
        //                         ->orderBy('id','desc')
        //                         //->paginate(15);
        //                         ->get();

    
        $thisDayNo = Carbon::now()->day;
        $thisMonthNo = Carbon::today()->month;
        $nextMonthNo = $thisMonthNo+1;
        if($nextMonthNo > 12)
            $nextMonthNo = 1;


        $upcoming_birthday = User:: whereBetween(DB::raw('MONTH(dob)'), [Carbon::today()->month,Carbon::today()->month+1])
        
            ->where(function ($query) use ($thisMonthNo,$nextMonthNo,$thisDayNo) {
                $query->where(function ($q1) use ($thisMonthNo,$thisDayNo) {
                    $q1->where(DB::raw('MONTH(dob)'), $thisMonthNo)
                    ->where(DB::raw('DAY(dob)'), '>=', $thisDayNo);
                })
            ->orWhere(function ($q2) use ($nextMonthNo,$thisDayNo) {
                    $q2->where(DB::raw('MONTH(dob)'), $nextMonthNo)
                    ->where(DB::raw('DAY(dob)'), '<=', $thisDayNo);
                });
            })
            ->orderByRaw('DATE_FORMAT(dob, "%m-%d")','asc')
            ->get();

        return view('birthday.index', ['birthday' => $upcoming_birthday]);
    }

    /**
     * Show the form for creating a new user
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('birthday.create');
    }

    /**
     * Store a newly created user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request, User $model)
    {
        $model->create($request->merge(['password' => Hash::make($request->get('password'))])->all());

        return redirect()->route('user.index')->withStatus(__('User successfully created.'));
    }

    /**
     * Show the form for editing the specified user
     *
     * @param  \App\User  $user
     * @return \Illuminate\View\View
     */
    public function edit(User $user)
    {
        return view('birthday.edit', compact('user'));
    }

    /**
     * Update the specified user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, User  $user)
    {
        $user->update(
            $request->merge(['password' => Hash::make($request->get('password'))])
                ->except([$request->get('password') ? '' : 'password']
        ));

        return redirect()->route('user.index')->withStatus(__('User successfully updated.'));
    }

    /**
     * Remove the specified user from storage
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User  $user)
    {
        $user->delete();

        return redirect()->route('user.index')->withStatus(__('User successfully deleted.'));
    }

    public function checkPushNotificationId(UserRequest $request)
    {
        return response()->json([
            'userId' => $request->userId,
            'status' => true,
            'errMsg' => ''
        ]);
    }

    public function show(User $driver)
    {
        $user_detail = [];
        $driver = [];
        $user_detail = [];
        return view('birthday.show',['$user_detail'=>$user_detail,'driver'=>$driver,'user_detail'=>$user_detail]);
    }

    /**
     * Show the form for creating a new user
     *
     * @return \Illuminate\View\View
     */
    public function details()
    {
        return view('birthday.details');
    }

    public function upcomingBirthday(){
        // $day= date('d');
        // $month = date('m');
        // $upcoming_birthday = User::where('active','=','1')->whereMonth('dob','>=',$month)->whereDay('dob', '>=', $day)->orderBy('id','desc')->get();
        $thisDayNo = Carbon::now()->day;
        $thisMonthNo = Carbon::today()->month;
        $nextMonthNo = $thisMonthNo+1;
        if($nextMonthNo > 12)
            $nextMonthNo = 1;


        $upcoming_birthday = User::where('id','!=',1)->whereBetween(DB::raw('MONTH(dob)'), [Carbon::today()->month,Carbon::today()->month+1])
            ->where(function ($query) use ($thisMonthNo,$nextMonthNo,$thisDayNo) {
                $query->where(function ($q1) use ($thisMonthNo,$thisDayNo) {
                    $q1->where(DB::raw('MONTH(dob)'), $thisMonthNo)
                    ->where(DB::raw('DAY(dob)'), '>=', $thisDayNo);
                })
            ->orWhere(function ($q2) use ($nextMonthNo,$thisDayNo) {
                    $q2->where(DB::raw('MONTH(dob)'), $nextMonthNo)
                    ->where(DB::raw('DAY(dob)'), '<=', $thisDayNo);
                });
            })
            ->orderByRaw('DATE_FORMAT(dob, "%m-%d")','asc')
            ->get();
        return response()->json([
            'data' =>$upcoming_birthday,
            'status' => true,
            'errMsg' => ''
        ]);
    }
}
