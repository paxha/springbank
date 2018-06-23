<?php

namespace App\Http\Controllers;

use App\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subCategories = SubCategory::all();
        return view('sub_category')->with('subCategories', $subCategories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category_id = $request->category;
        $name = $request->name;

        $subCategory = new SubCategory();

        $subCategory->name = $name;
        $subCategory->main_category_id = $category_id;

        $subCategory->save();

        return redirect()->route('sub-categories')->with('status', 'Successfully Added Sub Category!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show($category_id)
    {
        return SubCategory::orderBy('name', 'ASC')->where('main_category_id', '=', $category_id)->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
//        return $request->all();
        $subCategory = SubCategory::find($request->sub_category_id);

        $subCategory->name = $request->name;
        $subCategory->save();

        return redirect()->route('sub-categories')->with('status', 'Successfully Edited Sub Category!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCategory $subCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($sub_category_id)
    {
        $sub_category_id = SubCategory::find($sub_category_id);
        $sub_category_id->delete();

        return redirect()->route('sub-categories')->with('status', 'Successfully Added Sub Category!');
    }

    public function new_sub_category(){
        return view('new_sub_category');
    }

    public function edit_sub_category($sub_category_id){
        $subCategory = SubCategory::find($sub_category_id);
        return view('edit_sub_category')->with('subCategory', $subCategory);
    }
}
