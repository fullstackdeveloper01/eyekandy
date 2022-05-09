<?php

namespace App\Http\Controllers;

use App\Advertisement;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Order;
use App\Status;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Notifications\DriverCreated;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('advertisement.index', ['advertisements' =>Advertisement::where(['approve'=>1])->orderBy('id','desc')->paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('advertisement.create');
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
            'title' => ['required', 'string', 'max:255','unique:advertisements'],
        ]);

        $advertisement = new Advertisement;
        $advertisement->title = $request->title;
        $advertisement->link = $request->link;

        if ($request->hasFile('thumbnail')) {
            $filenameWithExt = $request->file('thumbnail')->getClientOriginalName ();
            // Get Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $filename = str_replace(' ', '_', $filename);
            // Get just Extension
            $extension = $request->file('thumbnail')->getClientOriginalExtension();
            // Filename To store
            $fileNameToStore = $filename. '_'. time().'.'.$extension;

            $request->thumbnail->move(public_path('uploads/advertisement'), $fileNameToStore);
        }
        else {
            $fileNameToStore = 'No-image.jpeg';
        }
        $advertisement->thumbnail = 'uploads/advertisement/'.$fileNameToStore;
        $advertisement->save();
        return redirect()->route('advertisement.index')->withStatus(__('Advertisement successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function show(Advertisement $driver)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function edit(Advertisement $advertisement)
    {
        if(auth()->user()->hasRole('admin')){
            return view('advertisement.edit', compact('advertisement'));
        }else return redirect()->route('orders.index')->withStatus(__('No Access'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Advertisement $advertisement)
    {//dd($request);die;
        $request->validate([
            'title'=>'required|string|unique:advertisements,title,'.$advertisement->id,
        ]);
        
        $advertisement->title = $request->title;
       
        $advertisement->link = $request->link;

        if ($request->hasFile('thumbnail')) {
            $filenameWithExt = $request->file('thumbnail')->getClientOriginalName ();
            // Get Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $filename = str_replace(' ', '_', $filename);
            // Get just Extension
            $extension = $request->file('thumbnail')->getClientOriginalExtension();
            // Filename To store
            $fileNameToStore = $filename. '_'. time().'.'.$extension;

            $request->thumbnail->move(public_path('uploads/advertisement'), $fileNameToStore);
            $advertisement->thumbnail = 'uploads/advertisement/'.$fileNameToStore;
        }

        $advertisement->update();
        return redirect()->route('advertisement.index')->withStatus(__('Advertisement successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advertisement $advertisement)
    {
        if($advertisement->status==1){
            $advertisement->status=0;
            $advertisement->update();
            return redirect()->route('advertisement.index')->withStatus(__('Advertisement successfully deactivate.'));
        }else{
            $advertisement->status=1;
            $advertisement->update();
            return redirect()->route('advertisement.index')->withStatus(__('Advertisement successfully activate.'));
        }       
    }

     /*get advertisement */
    //  public function getAdvertisementList(){
    
    //     $data['advertisement'] = Advertisement::where(['status'=>1])->orderBy('id','desc')->get();
    //     $data['path'] =  asset("uploads/advertisement/") ;
    //     return response()->json([
    //         'data' =>$data,
    //         'status' => true,
    //         'errMsg' => ''
    //     ]);
    // }

    /*requested list of ads by user*/
    public function requested()
    {
        $data = Advertisement::select('users.name','users.email', 'advertisements.*')->join('users', function ($join) {
            $join->on('users.id', '=', 'advertisements.user_id')
            ->where('advertisements.user_id', '>', 1);
        })
        ->where(['created_by'=>'user'])->orderBy('advertisements.id','desc')->paginate(15);
        return view('advertisement.request', ['advertisements' =>$data]);
    }
    /*approve requested ads by admin*/
    public function approve_request($id){
        Advertisement::where(['id'=>$id])->update(['approve'=>1]);
        return redirect()->route('advertisement.requested')->withStatus(__('Advertisement Approved successfully.'));
    }
}
