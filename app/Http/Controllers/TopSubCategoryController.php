<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;

class TopSubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $imagePath="/uploads/category/";
    public function index()
    {
        return view('topsubcategory.index', ['categories' =>Categories::where('parent_id','!=',0)->where('status','=',1)->where('top','=',1)->paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('topsubcategory.create',['title'=>'Add Top Sub Category','categoryList' =>Categories:: where(['parent_id'=>0,'status'=>1])->get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        for($index=0;$index<count($request->topsubcategoryid);$index++){
            Categories::where('id','=',$request->topsubcategoryid[$index])->update(['top'=>1]);
        }
        
        //$category->save();
        return redirect()->route('topsubcategory.index')->withStatus(__('Top Sub Category successfully created.'));
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
        $subcategory = Categories::where(['id'=>$id])->first();
        $categories_list = Categories:: where(['parent_id'=>0])->get();
        $topsubcategories_list = Categories:: where(['parent_id'=>$subcategory->parent_id])->get();
        return view('topsubcategory.edit', ['categories' =>$subcategory,'categoryList' =>$categories_list,'topsubcategories_list'=>$topsubcategories_list]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categories $categories)
    {//echo "<pre>";print_r($request->all());die;
        // Categories::where('parent_id','=',$request->parent_id)->update(['top'=>0]);
        for($index=0;$index<count($request->topsubcategoryid);$index++){
            Categories::where('id','=',$request->topsubcategoryid[$index])->update(['top'=>1]);
        }
        
        return redirect()->route('topsubcategory.index')->withStatus(__('Top SubCategory successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categories $category)
    {
        $affectedRows = Categories::where('id', '=', $category->id)->update(['top'=>0]);
        if($affectedRows)
        {
            $path = public_path()."/uploads/category/".$category->cat_icon;
            unlink($path);
        }
        return redirect()->back()->withStatus(__('Sub Category successfully deleted.'));
    }

    public function getSubCategoryList($id){
 
        return response()->json([
            'data' =>Categories::where(['parent_id'=>$id])->where(['status'=>1])->orderBy('name','ASC')->get(),
            'status' => true,
            'errMsg' => ''
        ]);
    }
}
