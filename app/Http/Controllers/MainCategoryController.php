<?php

namespace App\Http\Controllers;

use App\MainCategory;
use Illuminate\Http\Request;

class MainCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = MainCategory::all();
        return view('category')->with('categories', $categories);
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
        $name = $request->name;

        $mainCategory = new MainCategory();

        $mainCategory->name = $name;
        $mainCategory->save();

        return redirect()->route('categories')->with('status', 'Successfully Added Category!');
    }

    /**
     * Display the specified resource
     * 
     * @return MainCategory[]|\Illuminate\Database\Eloquent\Collection
     */
    public function show()
    {
        return MainCategory::orderBy('name', 'ASC')->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MainCategory  $mainCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $mainCategory = MainCategory::find($request->category_id);

        $mainCategory->name = $request->name;

        $mainCategory->save();

        return redirect()->route('categories')->with('status', 'Successfully Edited Category!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MainCategory  $mainCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MainCategory $mainCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MainCategory  $mainCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($category_id)
    {
        $mainCategory = MainCategory::find($category_id);
        $mainCategory->delete();

        return redirect()->route('categories')->with('status', 'Successfully Deleted Category!');
    }

    public function new_category(){
        return view('new_category');
    }

    public function edit_category($category_id){
        $mainCategory = MainCategory::find($category_id);

        return view('edit_category')->with('category', $mainCategory);
    }
}
