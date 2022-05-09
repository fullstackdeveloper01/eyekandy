<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;

class SubCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $imagePath="/uploads/category/";
    public function index()
    {
        return view('subCategories.index', ['categories' =>Categories::where('parent_id','!=',0)->where('status','=',1)->paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('subCategories.create',['title'=>'Add Sub Category','categoryList' =>Categories:: where(['parent_id'=>0])->where('status','=',1)->get()]);
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
            'parent_id' => ['required'],
        ]);
        $category = new Categories;
        $category->name = strip_tags($request->name);
        $category->parent_id = $request->parent_id;

        if ($request->hasFile('cat_icon')) {
            $filenameWithExt = $request->file('cat_icon')->getClientOriginalName ();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('cat_icon')->getClientOriginalExtension();
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
        return redirect()->route('subCategories.index')->withStatus(__('Sub Category successfully created.'));
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
        return view('subCategories.edit', ['categories' =>Categories::where(['id'=>$id])->first(),'categoryList' =>Categories:: where(['parent_id'=>0,'status'=>1])->get()]);
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
            // Get just Extension
            $extension = $request->file('cat_icon')->getClientOriginalExtension();
            // Filename To store
            $fileNameToStore = $filename. '_'. time().'.'.$extension;
            $request->cat_icon->move(public_path('uploads/category'), $fileNameToStore);
            
            $categories['cat_icon'] = $fileNameToStore;
            
        }

        $categories['parent_id'] = $request->parent_id;
        $categories['name'] = $request->name;
        Categories::where(['id'=>$request->id])->update($categories);

        return redirect()->route('subCategories.index')->withStatus(__('Category successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $affectedRows = Categories::where('id', '=', $id)->update(['status'=>0]);
        // if($affectedRows)
        // {
        //     $path = public_path()."/uploads/category/".$category->cat_icon;
        //     unlink($path);
        // }
        return redirect()->route('subCategories.index')->withStatus(__('Sub Category successfully deleted.'));
    }

    public function getSubCategoryList(Request $request){
        $data['subcategory_list'] = Categories::where(['parent_id'=>$request->category_id])->where(['status'=>1])->orderBy('name','ASC')->get();
        $data['path'] =  asset("uploads/category/") ;
        return response()->json([
            'data' =>$data,
            'status' => true,
            'errMsg' => ''
        ]);
    }
}
