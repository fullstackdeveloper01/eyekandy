<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $imagePath="/uploads/category/";
    public function index()
    {
        return view('categories.index', ['category' =>Categories::where(['parent_id'=>0])->where(['status'=>1])->paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('categories.create',['title'=>'Add Category']);
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
            'name' => ['required', 'string', 'max:255','unique:categories'],
        ]);
        $category = new Categories;
        $category->name = strip_tags($request->name);
        $category->parent_id = 0;

        if ($request->hasFile('cat_icon')) {
            $filenameWithExt = $request->file('cat_icon')->getClientOriginalName ();
            // Get Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $filename = str_replace(' ', '_', $filename);
            // Get just Extension
            $extension = $request->file('cat_icon')->getClientOriginalExtension();
            // Filename To store
            $fileNameToStore = $filename. '_'. time().'.'.$extension;

            $request->cat_icon->move(public_path('uploads/category'), $fileNameToStore);
        }
        else {
            $fileNameToStore = 'No-image.jpeg';
        }
        $category->cat_icon = $fileNameToStore;
        /*
        if($request->hasFile('cat_icon')){
            $category->cat_icon=$this->saveImageVersions(
                $this->imagePath,
                $request->cat_icon,
                [
                    ['name'=>'cat_icon','type'=>"png"],
                ]
            );
        }
        */
        $category->save();
        return redirect()->route('categories.index')->withStatus(__('Category successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('categories.edit', ['categories' =>Categories::where(['id'=>$id])->first()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {       
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);
        
        if ($request->hasFile('cat_icon')) {
            $filenameWithExt = $request->file('cat_icon')->getClientOriginalName ();
            // Get Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $filename = str_replace(' ', '_', $filename);
            // Get just Extension
            $extension = $request->file('cat_icon')->getClientOriginalExtension();
            // Filename To store
            $fileNameToStore = $filename. '_'. time().'.'.$extension;

            $request->cat_icon->move(public_path('uploads/category'), $fileNameToStore);
            $categories['cat_icon'] = $fileNameToStore;
        }

        $categories['name'] = $request->name;
        // print_r($categories->toarray());die;
        Categories::where(['id'=>$request->id])->update($categories);

        return redirect()->route('categories.index')->withStatus(__('Category successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categories $category)
    {
        $affectedRows = Categories::where('id', '=', $category->id)->update(['status'=>0]);
        // if($affectedRows)
        // {
        //     $path = public_path()."/uploads/category/".$category->cat_icon;
        //     unlink($path);
        // }
        return redirect()->route('categories.index')->withStatus(__('Category successfully deleted.'));
    }

    // public function getCategoryList(){
    //     $data['category_list'] = Categories::where(['parent_id'=>0])->where(['status'=>1])->get();
    //     $data['path'] =  asset("uploads/category/") ;
    //     return response()->json([
    //         'data' =>$data,
    //         'status' => true,
    //         'errMsg' => ''
    //     ]);
    // }
}
