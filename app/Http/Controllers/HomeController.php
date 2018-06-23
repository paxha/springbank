<?php

namespace App\Http\Controllers;

use App\FileInfo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = FileInfo::with('sub_category.category')->get();
//        return $files;
        return view('home')->with('files', $files);
    }

    public function allFiles(){
        $files = FileInfo::with('sub_category.category')->get();
        return $files;
    }

    public function filterBySubCategory($sub_category_id)
    {
        $files = FileInfo::with('sub_category.category')->where('sub_category_id', $sub_category_id)->get();
        return $files;
    }

    public function filterByCategory($category_id)
    {
        $files = FileInfo::with(['sub_category.category' => function($q) use ($category_id) {
            $q->where('id', $category_id);
        }])->get();
        return $files;
    }
}
