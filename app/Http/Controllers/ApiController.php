<?php

namespace App\Http\Controllers;

use JWTAuth;
use App\Pages;
use App\User;
use App\Faq;
use App\Girls;
use App\Country;
use App\State;
use App\City;
use App\Package;
use App\Hour;
use App\Party;
use App\Venue;
use App\Bank;
use App\Order;
use App\OrderStatus;
use App\Event;
use App\Support;
use App\SupportTopic;

use App\Restorant;
use App\NomineeRelationship;
use App\SettlementReports;
use App\Insurance;
use App\Settings;
use App\Darshan;
use App\Dummydata;
use App\Dummyproduct;
use App\Wedding;
use App\Categories;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Helpers\Helper;
class ApiController extends Controller
{
    protected $user;
 
    public function __construct()
    {   
        date_default_timezone_set('Asia/Kolkata');
       
    }

    /**Registration api */
    public function register(Request $request)
    { 
        //Validate data
        $data = $request->only('name', 'email', 'password','login_type','id');
        $validator = Validator::make($data, [
            'name' => 'required|string|min:3|max:20',
            'email' => 'required|email|unique:users',
            'login_type' => 'required|string'
        ]);
        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }
        // login_type: app,google,apple
        if ($data['login_type']=="app") {
            $validator = Validator::make($data, [
                'password' => 'required|string|min:5|max:12',
            ]);
            //Send failed response if request is not valid
            if ($validator->fails()) {
                return response()->json(['error' => $validator->messages()], 200);
            }
            $insertData['password'] = bcrypt($request->password);
            $token_pass=$request->password;
        }elseif ($data['login_type']=="google") {
            $validator = Validator::make($data, [
                'id' => 'required',
            ]);
            $insertData['google_id'] = $request->id;
            $insertData['password'] = bcrypt('ali786');
            $token_pass='ali786';

        }elseif ($data['login_type']=="apple") {
            $validator = Validator::make($data, [
                'id' => 'required',
            ]);
            $insertData['apple_id'] = $request->id;
            $insertData['password'] = bcrypt('ali110');
            $token_pass='ali110';

        }
        
        $insertData['name']=$request->name;
        $insertData['email']=$request->email;
        $insertData['role']=3;
        $insertData['login_type']=$request->login_type;
        //Request is valid, create new user
        $user = User::create($insertData);
        
        $login['password'] = $token_pass;
	    $login['email'] = $request->email;
	    $token = JWTAuth::attempt($login);
        // print_r($token);die;
        //User created, return success response
        try {
            if ($token = JWTAuth::attempt($login)) {
                $user->token=$token;
                return response()->json([
                    'success' => true,
                    'message' => 'User created successfully',
                    'data' => $user,
                    // 'token' => $token,
                ], Response::HTTP_OK);
            }
        } catch (JWTException $e) {
            return response()->json([
                    'success' => false,
                    'message' => 'Could not create token.',
                ], 500);
        }

        
    }

    /**Login Api */
    public function login(Request $request)
    {
        $data = $request->only('email', 'password','login_type');
 
        //valid credential
        $validator = Validator::make($data, [
            'email' => 'required|email',
            'login_type' => 'required',
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }
        // login_type: app,google,apple
        if ($data['login_type']=="app") {
            $validator = Validator::make($data, [
                'password' => 'required|string|min:5|max:50',
            ]);
            //Send failed response if request is not valid
            if ($validator->fails()) {
                return response()->json(['error' => $validator->messages()], 200);
            }
            $login['password'] = $request->password;
        }elseif ($data['login_type']=="google"){
            $login['password'] = 'ali786';
        }elseif ($data['login_type']=="apple"){
            $login['password'] = 'ali110';
        }

        //Crean token
        try {
            $login['email'] = $request->email;
            if (! $token = JWTAuth::attempt($login)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Login credentials are invalid.',
                ], 400);
            }
        } catch (JWTException $e) {
        return $credentials;
            return response()->json([
                    'success' => false,
                    'message' => 'Could not create token.',
                ], 500);
        }
    
        //Token created, return with success response and jwt token
        return response()->json([
            'success' => true,
            'token' => $token,
        ]);
    }

    /**forgot password Api */
    public function forgotpassword(Request $request)
    {
        $data = $request->only('email');
 
        //valid credential
        $validator = Validator::make($data, [
            'email' => 'required|email',
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }
        //Crean token
        $user = User::where(['email'=>$request->email])->first();
        if ($user) {
            $password['password']= rand(100000,999999);
            $user->password= bcrypt($password['password']);
            $user->save();
            // die;
            $html= view('mail.index',$password);
            $email=$user->email;
            // \Mail::send([], [], function ($message) use ($html,$email)
            // {
            //     $message->to($email)
            //         ->subject('Your New Is Password');
            //     $message->from('welcome@shyamnaamtrust.com')->setBody($html, 'text/html');
            // });
            return response()->json([
                'success' => true,
                'message' => "Password Send To Register Email Id",
            ]);
        }else {
                return response()->json([
                        'success' => false,
                        'message' => 'Could not create token.',
                    ], 500);
        }
    
        
    }

    /**Logout Api */
    public function logout(Request $request)
    {
        //valid credential
        $validator = Validator::make($request->only('token'), [
            'token' => 'required'
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

        //Request is validated, do logout        
        try {
            // if ($user = JWTAuth::authenticate($request->token)) {
            //     print_r($user);die;
                JWTAuth::invalidate($request->token);
 
                return response()->json([
                    'success' => true,
                    'message' => 'User has been logged out',
                    'status'=>200
                ]);
            // }
        } catch (JWTException $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, user cannot be logged out'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**User Details */
    public function userdetails(Request $request)
    {
        $this->validate($request, [
            'token' => 'required'
        ]);
 
        $user = JWTAuth::authenticate($request->token);
 
        return response()->json([
            'data' => $user,
            'success' => true,
            'message' => 'Data Found successfully',
            'status'=>200
        ]);
    }

    // upload user image
    public function imageUpload(Request $request)
    {   
        $data = $request->only('token','image');
        $validator = Validator::make($data, [
            'image'=>'required|mimes:jpeg,png,jpg',
            'token'=>'required'
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }
            
        try {
            if($user = JWTAuth::authenticate($request->token)){
                $file = $request->image;                                        
                $name = time().str_replace(' ', '', $file->getClientOriginalName());
                $file->move(public_path('uploads/profile_pic'),$name);
                $user->image="uploads/profile_pic/".$name;
                $user->update();
                      
                return response()->json([
                    'data' =>$user,
                    'success' => true,
                    'message' => 'Profile pic upload successfully',
                    'status'=>200
                ]);
            }
            
        } catch (JWTException $exception) {
            return response()->json([
                'success' => false,
                'message' => 'user not found'
            ]);
        }
    }

    /**save profile */
    public function profileupdate(Request $request)
    {
        $data['token']=$request->token;
        $validator = Validator::make($data, [
            'token' => 'required'
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }
        try{
            if($user= JWTAuth::authenticate($request->token)){
                

                if (!empty($request->name)) {
                    $user->name=$request->name;
                    
                }
                if (!empty($request->old_password) && !empty($request->new_password) ) {
                    // $data['old_password']=$request->old_password;
                    $validator = Validator::make($request->all(), [
                        'old_password' => 'required|string|min:5|max:12',
                        'new_password' => 'required|string|min:5|max:12'
                    ]);
            
                    //Send failed response if request is not valid
                    if ($validator->fails()) {
                        return response()->json(['error' => $validator->messages()], 200);
                    }
                    if (Hash::check($request->old_password, $user->password)) {
                        $user->password = bcrypt($request->new_password);
                        
                    }else{
                        //Send failed response if request is not valid
                        return response()->json(['success' => false,'message' => 'Old Password Mis-Match'], 200);
                    }
                }
                $user->update();
                $user->path=url('/');
                return response()->json([
                    'data' =>$user,
                    'success' => true,
                    'message' => 'profile detail save successfully',
                    'status'=>200
                ]);
            
            }

        }catch (JWTException $exception) {
            return response()->json([
                'success' => true,
                'message' => 'Token is expired'
            ]);
        }
        
        
    }
    
    /**About us Page */
    public function about_us(Request $request)
    {   
        $about_us = Pages::where(['title'=>'About Us'])->first()->toarray();
        if (!empty($about_us)) {
            return response()->json([
                'data' =>$about_us,
                'success' => true,
                'message' => 'Get about us page successfully.',
                'status'=>200
            ]);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'About Us Page Not Found'
            ]);
        }
                
    }

    /**Term Condition Page */
    public function term_condition(Request $request)
    {   
        $term_condition = Pages::where(['title'=>'Terms and conditions'])->first()->toarray();
        if (!empty($term_condition)) {
            return response()->json([
                'data' =>$term_condition,
                'success' => true,
                'message' => 'Get term & condition page successfully.',
                'status'=>200
            ]);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Term & condition page Not Found.',
             ]);
        }
                
    }
    
    /**Privacy Policy Page */
    public function policy(Request $request)
    {   
        $policy = Pages::where(['title'=>'Privacy Policy'])->first()->toarray();
        if (!empty($policy)) {
            return response()->json([
                'data' =>$policy,
                'success' => true,
                'message' => 'Get Privacy policy page successfully.',
                'status'=>200
            ]);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Get Privacy policy page Not Found.',
            ]);
        }
                
    }

    /**faq Page */
    public function faq(Request $request)
    {   
        $faq = Faq::where(['active'=>1])->get()->toarray();
        if (!empty($faq)) {
            return response()->json([
                'data' =>$faq,
                'success' => true,
                'message' => 'Get data Faq successfully.',
                'status'=>200
            ]);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Get data Faq Not Found.',
            ]);
        }
                
    }

    /**girls List */
    public function girls(Request $request)
    {   
        // type: all,top,city
        $data = $request->only('token','type','city_id');
        $validator = Validator::make($data, [
            'type'=>'required',
            'token'=>'required'
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }
            
        try {
            if($user = JWTAuth::authenticate($request->token)){
                $response = Girls::select('girls.*','country.country_name as country_id','state.state_name as state_id','city.city_name as city_id')->join('country','country.id','=','girls.country_id')->join('state','state.id','=','girls.state_id')->join('city','city.id','=','girls.city_id');
                if ($data['type']=="top") {
                    $response =$response->where(['rated'=>1])->where(['trash'=>0])->orderby('full_name','ASC')->get();
                }elseif ($data['type']=="city") {
                    $validator = Validator::make($data, [
                        'city_id'=>'required',
                    ]);
                    //Send failed response if request is not valid
                    if ($validator->fails()) {
                        return response()->json(['error' => $validator->messages()], 200);
                    }
                    $response =$response->where(['city_id'=>$data['city_id']])->where(['trash'=>0])->orderby('full_name','ASC')->get();
                }elseif ($data['type']=="all") {
                    $response =$response->where(['trash'=>0])->orderby('full_name','ASC')->get();
                }else{
                    return response()->json([
                        'success' => false,
                        'message' => 'Invalid Type',
                    ]);
                }
                // $response =$response->where(['trash'=>0])->orderby('full_name','ASC')->get();
                if (count($response) > 0) {
                    $datas['list'] =$response;
                    $datas['path']=url('uploads/girls');
                    return response()->json([
                        'data' =>$datas,
                        'success' => true,
                        'message' => 'Get Girls successfully',
                        'status'=>200
                    ]);
                } else {
                    return response()->json([
                        'success' => false,
                        'message' => 'Girls Not Found',
                    ]);
                }
                
                
            }
            
        } catch (JWTException $exception) {
            return response()->json([
                'success' => false,
                'message' => 'user not found'
            ]);
        }
                
    }

    /**Event girls List */
    public function eventGirls(Request $request)
    {   
        // dateformate Y-m-d
        $data = $request->only('token','city_id','date','time');
        $validator = Validator::make($data, [
            'token'=>'required',
            'date'=>'required',
            'time'=>'required',
            'city_id'=>'required'
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }
            
        try {
            if($user = JWTAuth::authenticate($request->token)){
                $day = date('D',strtotime($data['date']));
                $response = Girls::select('girls.*','country.country_name as country_id','state.state_name as state_id','city.city_name as city_id')->join('country','country.id','=','girls.country_id')->join('state','state.id','=','girls.state_id')->join('city','city.id','=','girls.city_id');
                $response =$response->where(['city_id'=>$data['city_id'],$day=>1]);
                $response =$response->where(['trash'=>0])->orderby('full_name','ASC')->get();
                if (count($response) > 0) {
                    $events = Event::select('girl_id')->where(['party_date'=>$data['date'],'party_time'=>$data['time']])->get();
                    $girls_id=[];
                    foreach ($response as $key => $value) {
                        if (count($events)>0) {
                            foreach ($events as $k => $v) {
                                $ids_girl = explode(',',$v->girl_id);
                                foreach ($ids_girl as $ke => $val) {
                                    $girls_id[] = $val;
                                }
                            }
                            $girls_id= (array_unique($girls_id));
                            if (in_array($value->id,$girls_id)) {
                                $value->available='false';
                            } else {
                                $value->available = 'true';
                            }
                        } else {
                            $value->available = 'true';
                        }
                        
                    }
                    $datas['list'] =$response;
                    $datas['path']=url('uploads/girls');
                    return response()->json([
                        'data' =>$datas,
                        'success' => true,
                        'message' => 'Get Girls successfully',
                        'status'=>200
                    ]);
                } else {
                    return response()->json([
                        'success' => false,
                        'message' => 'Girls Not Found',
                    ]);
                }
                
                
            }
            
        } catch (JWTException $exception) {
            return response()->json([
                'success' => false,
                'message' => 'user not found'
            ]);
        }
                
    }

    /**Country List */
    public function getCountry(Request $request){
        $data = $request->only('token');
        $validator = Validator::make($data, [
            'token'=>'required',
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }
            
        try {
            if($user = JWTAuth::authenticate($request->token)){
                $data=Country::where(['active'=>1])->orderBy('country_name','ASC')->get();
                return response()->json([
                    'data' =>$data,
                    'success' => true,
                    'message' => 'Get Country successfully',
                    'status'=>200
                ]);
            }

        } catch (JWTException $exception) {
            return response()->json([
                'success' => false,
                'message' => 'user not found'
            ]);
        }
    }

    /**State List */
    public function getState(Request $request){
        $data = $request->only('token','country_id');
        $validator = Validator::make($data, [
            'token'=>'required',
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }
            
        try {
            if($user = JWTAuth::authenticate($request->token)){
                $response = State::where(['active'=>1]);
                if (isset($data['country_id']) && !empty($data['country_id'])) {
                    $response = $response->where(['country_id' => $data['country_id']]);
                }
                $response= $response->orderBy('state_name','ASC')->get();
                if (count($response)>0) {
                    return response()->json([
                        'data' =>$response,
                        'success' => true,
                        'message' => 'Get State successfully',
                        'status'=>200
                    ]);
                } else {
                    return response()->json([
                        'success' => false,
                        'message' => 'No State Found',
                    ]);
                }
                
                
            }

        } catch (JWTException $exception) {
            return response()->json([
                'success' => false,
                'message' => 'user not found'
            ]);
        }
    }

    /**City List */
    public function getCity(Request $request){
        $data = $request->only('token','state_id');
        $validator = Validator::make($data, [
            'token'=>'required',
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }
            
        try {
            if($user = JWTAuth::authenticate($request->token)){
                $response = City::where(['active'=>1]);
                if (isset($data['state_id']) && !empty($data['state_id'])) {
                    $response = $response->where(['state_id' => $data['state_id']]);
                }
                $response= $response->orderBy('city_name','ASC')->get();
                if (count($response)>0) {
                    return response()->json([
                        'data' =>$response,
                        'success' => true,
                        'message' => 'Get City successfully',
                        'status'=>200
                    ]);
                } else {
                    return response()->json([
                        'success' => false,
                        'message' => 'No City Found',
                    ]);
                }
                
                
            }

        } catch (JWTException $exception) {
            return response()->json([
                'success' => false,
                'message' => 'user not found'
            ]);
        }
    }

    /**Package List */
    public function getpackage(Request $request)
    {   
        $packages = Package::where('active','=',1)->get();
        if (count($packages)>0) {
            foreach ($packages as $value) {
                $color = explode ('#',$value->package_color);
                $value->package_color=$color[1];
            }
            return response()->json([
                'data' =>$packages,
                'success' => true,
                'message' => 'Get Package List Successfully.',
                'status'=>200
            ]);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Package List Not Found.',
            ]);
        }
                
    }

    /**hours time List */
    public function gethoursTime(Request $request)
    {   
        $hourstime = Hour::where('active','=',1)->orderBy('time','ASC')->get();
        if (count($hourstime)>0) {
            foreach ($hourstime as $value) {
                $value->time = date('h a',strtotime($value->time));
            }
            return response()->json([
                'data' =>$hourstime,
                'success' => true,
                'message' => 'Get Hours List Successfully.',
                'status'=>200
            ]);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Hours List Not Found.',
            ]);
        }
                
    }

    /**party type List */
    public function getpartyType(Request $request)
    {   
        $party = Party::where('active','=',1)->orderBy('type','ASC')->get();
        if (count($party)>0) {
            return response()->json([
                'data' =>$party,
                'success' => true,
                'message' => 'Get Party List Successfully.',
                'status'=>200
            ]);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Party List Not Found.',
            ]);
        }
                
    }

    /**venue type List */
    public function getVenue(Request $request)
    {   
        $venue = Venue::where('active','=',1)->orderBy('type','ASC')->get();
        if (count($venue)>0) {
            return response()->json([
                'data' =>$venue,
                'success' => true,
                'message' => 'Get Venue List Successfully.',
                'status'=>200
            ]);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Venue List Not Found.',
            ]);
        }
                
    }

    /**Add Card Details */
    public function addcardDetails(Request $request)
    {
        $data=$request->only('token','card_number','name','month_expire','cvv','type');
        $validator = Validator::make($data, [
            'token' => 'required',
            'card_number' => 'required|min:16|max:16|unique:bank_details',
            // 'card_number' => 'required|unique:bank_details|min:16|max:16',
            'name' => 'required',
            'month_expire' => 'required',
            'type' => 'required',
            'cvv' => 'required|min:3|max:3',
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }
            
        try{
            if($user= JWTAuth::authenticate($request->token)){
                Bank::insert([
                    'user_id' => $user->id,
                    'card_number' => $data['card_number'],
                    'name' => $data['name'],
                    'month_expire' => $data['month_expire'],
                    'cvv' => $data['cvv'],
                    'type' => $data['type'],
                ]);
                return response()->json([
                    'success' => true,
                    'message' => 'Card detail save successfully',
                    'status'=>200
                ]);
            
            }

        }catch (JWTException $exception) {
            return response()->json([
                'success' => true,
                'message' => 'Token is expired'
            ]);
        }
        
        
    }

    /**Card list */
    public function getcardList(Request $request)
    {
        $data=$request->only('token');
        $validator = Validator::make($data, [
            'token' => 'required',
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }
            
        try{
            if($user= JWTAuth::authenticate($request->token)){
                $response = Bank::where(['user_id' => $user->id,'active'=>1])->get();
                if (count($response)>0) {
                    return response()->json([
                        'data' => $response,
                        'success' => true,
                        'message' => 'Get Card List successfully',
                        'status'=>200
                    ]);
                } else {
                    return response()->json([
                        'success' => false,
                        'message' => 'Card List Not Found',
                    ]);
                }
            }
        }catch (JWTException $exception) {
            return response()->json([
                'success' => true,
                'message' => 'Token is expired'
            ]);
        }
        
        
    }

    /**Remove Card */
    public function deleteCard(Request $request)
    {
        $data=$request->only('token','id');
        $validator = Validator::make($data, [
            'token' => 'required',
            'id' => 'required',
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }
            
        try{
            if($user= JWTAuth::authenticate($request->token)){
                $response = Bank::where(['user_id' => $user->id,'id'=>$data['id']])->update(['active'=>0]);
                if ($response) {
                    return response()->json([
                        'success' => true,
                        'message' => 'Card Removed successfully',
                        'status'=>200
                    ]);
                } else {
                    return response()->json([
                        'success' => false,
                        'message' => 'Card Not Removed',
                    ]);
                }
            }
        }catch (JWTException $exception) {
            return response()->json([
                'success' => true,
                'message' => 'Token is expired'
            ]);
        }
        
        
    }

    /**add Event */
    public function addEvent(Request $request)
    {
        $data = $request->only('token','package_id','extra_hours','country_id','state_id','city_id','girl_id','party_date','party_time','party_type','name','phone','email','venue_type','venue_address','venue_city','venue_zipcode','card_id','transaction_id','transaction_status','amount');
        $validator = Validator::make($data, [
            'token' => 'required',
            'package_id' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
            'girl_id' => 'required',
            'party_date' => 'required',
            'party_time' => 'required',
            'party_type' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'venue_type' => 'required',
            'venue_address' => 'required',
            'venue_city' => 'required',
            'venue_zipcode' => 'required',
            'card_id' => 'required',
            'transaction_id' => 'required',
            'transaction_status' => 'required',
            'amount' => 'required',
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }
        try{
            if($user= JWTAuth::authenticate($request->token)){
                $event = new Event;
                $event->user_id = $user->id;
                $event->show_type = $request->package_id;
                $event->extra_hours = isset($request->extra_hours)&&!empty($request->extra_hours)?$request->extra_hours:'';
                $event->country_id = $request->country_id;
                $event->state_id = $request->state_id;
                $event->city_id = $request->city_id;
                $event->girl_id = $request->girl_id;
                $event->party_date = $request->party_date;
                $event->party_time = $request->party_time;
                $event->party_type = $request->party_type;
                $event->name = $request->name;
                $event->phone = $request->phone;
                $event->email = $request->email;
                $event->venue_type = $request->venue_type;
                $event->venue_address = $request->venue_address;
                $event->venue_city = $request->venue_city;
                $event->venue_zipcode = $request->venue_zipcode;
                
                $event->save();
                if ($event->id!="") {
                    $order = new Order;
                    $order->user_id= $user->id;
                    $order->event_id= $event->id;
                    $order->card_id= $request->card_id;
                    $order->transaction_id= $request->transaction_id;
                    $order->transaction_status= $request->transaction_status;
                    $order->amount= $request->amount;
                    $order->save();
                    if ($order->id!="") {
                        $oderstatus = new OrderStatus;
                        $oderstatus->user_id= $user->id;
                        $oderstatus->order_id = $order->id;
                        $oderstatus->save();
                        return response()->json([
                            'success' => true,
                            'message' => 'Event Created successfully',
                            'status'=>200
                        ]);
                    }else{
                        Event::where(['id'=>$event->id])->update(['status'=>0]);
                        return response()->json([
                            'success' => false,
                            'message' => 'Event Not Created successfully',
                        ]);
                    }
                    
                } else {
                    return response()->json([
                        'success' => false,
                        'message' => 'Event Not Created Try After Some Time',
                    ]);
                }
            }
        }catch (JWTException $exception) {
            return response()->json([
                'success' => true,
                'message' => 'Token is expired'
            ]);
        }
        
        
    }

    /**Event list */
    public function getEvent(Request $request)
    {
        $data=$request->only('token');
        $validator = Validator::make($data, [
            'token' => 'required',
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }
            
        try{
            if($user= JWTAuth::authenticate($request->token)){
                $response = Event::select('id','user_id','show_type','city_id','girl_id','extra_hours','name')->where(['user_id' => $user->id,'active'=>1])->orderBy('id','DESC')->get();
                if (count($response)>0) {
                    foreach ($response as $key => $value) {
                        $value->user_id = Helper::userName($value->user_id);
                        $package = Package::where(['id'=>$value->show_type])->first();
                        $value->package_name=$package->package_title;
                        $value->hours=$package->package_hours+$value->extra_hours;
                        $order = Order::where(['event_id'=>$value->id])->first();
                        $value->amount=$order->amount;
                        $value->city = Helper::cityName($value->city_id);
                        $girls = explode(',',$value->girl_id);
                        $img = Girls::where(['id'=>$girls[0]])->first();
                        $girlimg = explode(',',$img->image);
                        $value->image = url('uploads/girls').'/'.$girlimg[0];
                        unset($value->extra_hours);
                        unset($value->show_type);
                        unset($value->city_id);
                        unset($value->girl_id);
                    }
                    return response()->json([
                        'data' => $response,
                        'success' => true,
                        'message' => 'Event List successfully',
                        'status'=>200
                    ]);
                } else {
                    return response()->json([
                        'success' => false,
                        'message' => 'Card List Not Found',
                    ]);
                }
            }
        }catch (JWTException $exception) {
            return response()->json([
                'success' => true,
                'message' => 'Token is expired'
            ]);
        }
        
        
    }

    /**Event Details */
    public function getEventdetails(Request $request)
    {
        $data=$request->only('token','id');
        $validator = Validator::make($data, [
            'token' => 'required',
            'id' => 'required',
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }
            
        try{
            if($user= JWTAuth::authenticate($request->token)){
                $select=['events.*','package.package_title','package.package_price','package.package_hours','package.extra_hour_price','orders.amount as total_amount','bank_details.card_number','bank_details.month_expire'];
                $response = Event::select($select)
                            ->join('package','package.id','=','events.show_type')
                            ->join('orders','orders.event_id','=','events.id')
                            ->join('bank_details','bank_details.id','=','orders.card_id')
                            ->where(['events.user_id' => $user->id,'events.active'=>1,'events.id'=>$data['id']])->first();
                
                if ($response!="") {

                    $response->user_id = Helper::userName($response->user_id);
                    $response->extra_hours = $response->extra_hours*$response->extra_hour_price;
                    $response->city = Helper::cityName($response->city_id);
                    $response->venue_city = Helper::cityName($response->venue_city);
                    $response->venue_type = Helper::venueName($response->venue_type);
                    $response->party_type = Helper::PartyName($response->party_type);
                    $response->party_time = Helper::getTime($response->party_time);
                    $response->city_id = Helper::cityName($response->city_id);
                    $response->state_id = Helper::stateName($response->state_id);
                    $response->country_id = Helper::countryName($response->country_id);
                    $response->show_type = Helper::packageName($response->show_type);
                    $girls = explode(',',$response->girl_id);
                    $model_img=[];
                    foreach ($girls as $key => $girl) {
                        $img = Girls::where(['id'=>$girl])->first('image');
                        $girlimg = explode(',',$img->image);
                        for ($i=0; $i < count($girlimg); $i++) { 
                            $model_img[]=$girlimg[$i];
                        }
                    }
                    $response->image=$model_img;
                    //     
                    //     
                    //     $value->image = url('uploads/girls').'/'.$girlimg[0];
                    //     unset($value->extra_hours);
                    //     unset($value->show_type);
                    //     unset($value->city_id);
                    //     unset($value->girl_id);
                    // print_r($response->toarray());die;
                    return response()->json([
                        'data' => $response,
                        'success' => true,
                        'message' => 'Event Details Found successfully',
                        'status'=>200
                    ]);
                } else {
                    return response()->json([
                        'success' => false,
                        'message' => 'Event Details Not Found',
                    ]);
                }
            }
        }catch (JWTException $exception) {
            return response()->json([
                'success' => true,
                'message' => 'Token is expired'
            ]);
        }
        
        
    }

    /**Create Support */
    public function addSupport(Request $request)
    {
        $data = $request->only('token','topic','description','image');
        $validator = Validator::make($data, [
            'token'=>'required',
            'topic'=>'required',
            'description'=>'required'
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }
        if($request->image!=""){
            $validator = Validator::make($data, [
                'image'=>'required|mimes:jpeg,png,jpg',
            ]);
            //Send failed response if request is not valid
            if ($validator->fails()) {
                return response()->json(['error' => $validator->messages()], 200);
            }
        }
            
        try {
            if($user = JWTAuth::authenticate($request->token)){

                $support = new Support;
                $support->user_id=$user->id;
                $support->topic=$request->topic;
                $support->description=$request->description;
                if($file = $request->image){
                    // $file = $request->image;                                        
                    $name = time().str_replace(' ', '', $file->getClientOriginalName());
                    $file->move(public_path('uploads/support'),$name);
                    $support->image="uploads/support/".$name;
                }
                
                $support->save();
                      
                return response()->json([
                    'success' => true,
                    'message' => 'Support created successfully',
                    'status'=>200
                ]);
            }
            
        } catch (JWTException $exception) {
            return response()->json([
                'success' => false,
                'message' => 'user not found'
            ]);
        }
    }

    /**Support List*/
    public function getSupport(Request $request)
    {
        $data = $request->only('token');
        $validator = Validator::make($data, [
            'token'=>'required',
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }
            
        try {
            if($user = JWTAuth::authenticate($request->token)){

                $support =Support::where(['user_id'=>$user->id])->orderBy('id','DESC')->get();
                if (count($support)>0) {
                    $response['list']=$support;
                    $response['path']=url('/');
                    return response()->json([
                        'data' => $response,
                        'success' => true,
                        'message' => 'Support created successfully',
                        'status'=>200
                    ]);
                } else {
                    return response()->json([
                        'success' => false,
                        'message' => 'Support Not Found',
                    ]);
                }
            }
        } catch (JWTException $exception) {
            return response()->json([
                'success' => false,
                'message' => 'user not found'
            ]);
        }
    }

    /**Support topic List*/
    public function getSupporttopic(Request $request)
    {
        $data = $request->only('token');
        $validator = Validator::make($data, [
            'token'=>'required',
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }
            
        try {
            if($user = JWTAuth::authenticate($request->token)){

                $support =SupportTopic::where(['active'=>1])->orderBy('topic','DESC')->get();
                if (count($support)>0) {
                    return response()->json([
                        'data' => $support,
                        'success' => true,
                        'message' => 'Data Found successfully',
                        'status'=>200
                    ]);
                } else {
                    return response()->json([
                        'success' => false,
                        'message' => 'Data Not Found',
                    ]);
                }
            }
        } catch (JWTException $exception) {
            return response()->json([
                'success' => false,
                'message' => 'user not found'
            ]);
        }
    }

    

    //  /**add locality and shift */
    // public function token_expired(Request $request)
    // {
    //     $data['token']=$request->token;
    //     $validator = Validator::make($data, [
    //         'token' => 'required'
    //     ]);

    //     //Send failed response if request is not valid
    //     if ($validator->fails()) {
    //         return response()->json(['error' => $validator->messages()], 200);
    //     }
          
    //     try{
    //           if($user= JWTAuth::authenticate($request->token)){
    //             return response()->json([
    //                 'success' => true,
    //                 'message' => 'Wokring'
    //             ]);
               
    //           }
    //         // dd($driver);die;
    //         //$this->user = JWTAuth::parseToken()->refresh();
            
    //     }catch (JWTException $exception) {
    //         return response()->json([
    //             'success' => true,
    //             'message' => 'Token is expired'
    //         ]);
    //     }
        
       
    // }

    // /**order detail  api*/
    // public function order_detail(Request $request){
     
    //         $data = $request->only('token','order_id');
            
    //         $validator = Validator::make($data, [
    //             'order_id' =>'required',
    //             'token'=>'required'
    //         ]);
    
    //         //Send failed response if request is not valid
    //         if ($validator->fails()) {
    //             return response()->json(['error' => $validator->messages()], 200);
    //         }
              
    //         try {
    //             if($user = JWTAuth::authenticate($request->token)){
                    
    //                 $order= Order::where('order_id','=',$request->order_id)->first();
    //                // "<pre>";print_r($order);die;
    //                 if($order!=NULL){
    //                     $order->item_json =json_decode($order->item_json);
    //                     $order->order_json =json_decode($order->order_json);
    //                     if($order->driver_id!=''){
    //                         $order->driver=DriverDetails::where('user_id','=',$order->driver_id)->first();
    //                     }
    //                     $order->client=User::where('id','=',$order->client_id)->first();
    //                     $order->address=Address::where('user_id','=',$order->client_id)->first();
    //                     $order->resturant=Restorant::where('id','=',$order->restorant_id)->first();
    //                     if($order){
    //                         return response()->json([
    //                             'data' =>$order,
    //                             'success' => true,
    //                             'message' => "Get order detail successfully.",
    //                             'status'=>200
    //                         ]);
    //                     }
    //                 }
                    
                    
    //             }
                
               
                
    //         } catch (JWTException $exception) {
    //             return response()->json([
    //                 'success' => false,
    //                 'message' => 'driver not found'
    //             ], Response::HTTP_INTERNAL_SERVER_ERROR);
    //         }
    
    // }

    // /**order list  api*/
    // public function order_list(Request $request){
     
    //     $data = $request->only('token');
        
    //     $validator = Validator::make($data, [
    //         'token'=>'required'
    //     ]);

    //     //Send failed response if request is not valid
    //     if ($validator->fails()) {
    //         return response()->json(['error' => $validator->messages()], 200);
    //     }
          
    //     try {
    //         if($user = JWTAuth::authenticate($request->token)){
                
    //             $order= Order::select('orders.order_id','restorants.name as restorant_name','restorants.address as retorant_address','users.name as customer_name','address.address as customer_address','payment_method','order_status','orders.created_at','orders.item_json','orders.delivery_price','orders.order_price')
    //             ->join('users','orders.client_id','=','users.id')
    //             ->join('restorants','orders.restorant_id','=','restorants.id')
    //             ->join('address','orders.address_id','=','address.id')
    //             ->where('driver_id','=',$user->id)
    //             ->where('order_status','=','completed')
    //             ->get();
              
    //             if(count($order)>0){
    //                 foreach($order as $value){
    //                     $items = json_decode($value->item_json);
    //                     $value->item_json = count($items);
    //                     $value->total_price = $value->order_price+$value->delivery_price;
    //                 }
    //                 return response()->json([
    //                     'data' =>$order,
    //                     'success' => true,
    //                     'message' => "Get order list successfully.",
    //                     'status'=>200
    //                 ]);
    //             }else{
    //                 return response()->json([
    //                     'data' =>$order,
    //                     'success' => false,
    //                     'message' => "No data found.",
    //                     'status'=>200
    //                 ]);
    //             }
                
                
    //         }
            
           
            
    //     } catch (JWTException $exception) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'driver not found'
    //         ], Response::HTTP_INTERNAL_SERVER_ERROR);
    //     }

    // }

    // /**completed order list  api*/
    // public function order_completed(Request $request){
        
    //     $data = $request->only('token');
        
    //     $validator = Validator::make($data, [
    //         'token'=>'required'
    //     ]);

    //     //Send failed response if request is not valid
    //     if ($validator->fails()) {
    //         return response()->json(['error' => $validator->messages()], 200);
    //     }
        
    //     try {
    //         if($user = JWTAuth::authenticate($request->token)){
    //             $nextday =date('Y-m-d', strtotime(' +1 day'));
    //             $nextday = strtotime($nextday);
    //             $previousday = date('Y-m-d', strtotime(' -2 day'));
    //             $previousday = strtotime($previousday);

    //             $order= Order::select('orders.order_id','restorants.name as restorant_name','restorants.address as retorant_address','users.name as customer_name','address.address as customer_address','payment_method','orders.order_status','orders.created_at','orders.item_json','orders.delivery_price','orders.order_price')
    //             ->join('users','orders.client_id','=','users.id')
    //             ->join('restorants','orders.restorant_id','=','restorants.id')
    //             ->join('address','orders.address_id','=','address.id')
    //             ->where('driver_id','=',$user->id)
    //             ->where('orders.created_at','<',$nextday)
    //             ->where('orders.created_at','>',$previousday)
    //             ->where('orders.order_status','=','completed')
    //             ->get();
            
    //             $custom_notification = DB::table("notifications_custom")->where('status','=',1)->first();
    //             if($custom_notification)
    //             {
    //                 $custom_notification_msg = $custom_notification->message;
    //             }
    //             else
    //             {
    //                 $custom_notification_msg = '';
    //             }

    //             if(count($order)>0){
    //                 foreach($order as $value){
    //                     $items = json_decode($value->item_json);
    //                     $value->item_json = count($items);
    //                     $value->total_price = $value->order_price+$value->delivery_price;
    //                 }
    //                 return response()->json([
    //                     'data' =>$order,
    //                     'success' => true,
    //                     'custom_notification_msg' => $custom_notification_msg,
    //                     'message' => "Get completd order list successfully.",
    //                     'status'=>200
    //                 ]);
    //             }else{
    //                 return response()->json([
    //                     'data' =>$order,
    //                     'success' => false,
    //                     'custom_notification_msg' => $custom_notification_msg,
    //                     'message' => "No data found.",
    //                     'status'=>200
    //                 ]);
    //             }
                
                
    //         }
            
        
            
    //     } catch (JWTException $exception) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'driver not found'
    //         ], Response::HTTP_INTERNAL_SERVER_ERROR);
    //     }

    // }

    //  /**completed order list  api*/
    //  public function order_today(Request $request){
        
    //     $data = $request->only('token');
        
    //     $validator = Validator::make($data, [
    //         'token'=>'required'
    //     ]);

    //     //Send failed response if request is not valid
    //     if ($validator->fails()) {
    //         return response()->json(['error' => $validator->messages()], 200);
    //     }
        
    //     try {
    //         if($user = JWTAuth::authenticate($request->token)){
    //             $nextday =date('Y-m-d', strtotime(' +1 day'));
    //             $nextday = strtotime($nextday);
    //             $previousday = date('Y-m-d', strtotime(' -1 day'));
    //             $previousday = strtotime($previousday);
                
    //             $order= Order::select('orders.order_id','restorants.name as restorant_name','restorants.address as retorant_address','users.name as customer_name','address.address as customer_address','payment_method','orders.order_status','orders.created_at','orders.item_json','orders.delivery_price','orders.order_price')
    //             ->join('users','orders.client_id','=','users.id')
    //             ->join('restorants','orders.restorant_id','=','restorants.id')
    //             ->join('address','orders.address_id','=','address.id')
    //             ->where('driver_id','=',$user->id)
    //             ->where('orders.created_at','<',$nextday)
    //             ->where('orders.created_at','>',$previousday)
    //             ->orWhere('orders.order_status','=','accepted')
    //             ->orWhere('orders.order_status','=','reached restaurant')
    //             ->orWhere('orders.order_status','=','picked')
    //             ->orWhere('orders.order_status','=','reached delivery location')
    //             ->get();
            
    //             if(count($order)>0){
    //                 foreach($order as $value){
    //                     $items = json_decode($value->item_json);
    //                     $value->item_json = count($items);
    //                     $value->total_price = $value->order_price+$value->delivery_price;
    //                 }
    //                 return response()->json([
    //                     'data' =>$order,
    //                     'success' => true,
    //                     'message' => "Get completd order list successfully.",
    //                     'status'=>200
    //                 ]);
    //             }else{
    //                 return response()->json([
    //                     'data' =>$order,
    //                     'success' => false,
    //                     'message' => "No data found.",
    //                     'status'=>200
    //                 ]);
    //             }
                
                
    //         }
            
        
            
    //     } catch (JWTException $exception) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'driver not found'
    //         ], Response::HTTP_INTERNAL_SERVER_ERROR);
    //     }

    // }

    // /**order current status  api*/
    // public function order_current_status(Request $request){
        
    //     $data = $request->only('token');
        
    //     $validator = Validator::make($data, [
    //         'token'=>'required'
    //     ]);

    //     //Send failed response if request is not valid
    //     if ($validator->fails()) {
    //         return response()->json(['error' => $validator->messages()], 200);
    //     }
        
    //     try {
    //         if($user = JWTAuth::authenticate($request->token)){
                
    //             $order= Order::select('orders.order_id','order_status')
    //                 ->where('driver_id','=',$user->id)
    //                 ->where('order_status','!=','completed')
    //                 ->get();
            
    //             if(count($order)>0){

    //                 return response()->json([
    //                     'data' =>$order,
    //                     'success' => true,
    //                     'message' => "Get order status successfully.",
    //                     'status'=>200
    //                 ]);
    //             }else{
    //                 return response()->json([
    //                     'data' =>$order,
    //                     'success' => false,
    //                     'message' => "No data found.",
    //                     'status'=>200
    //                 ]);
    //             }
                
                
    //         }
            
        
            
    //     } catch (JWTException $exception) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'driver not found'
    //         ], Response::HTTP_INTERNAL_SERVER_ERROR);
    //     }
    // }


}
