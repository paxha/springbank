<?php

namespace App\Http\Controllers;

use App\FileInfo;
use Faker\Provider\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('new_file');
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
        $sub_category_id = $request->sub_category;
        $attachment = $request->attachment;
        $description = $request->description;

        $path = $attachment->store('file');
        $file_link = 'http://localhost/springbank/storage/app/'. $path;

        $fileInfo = new FileInfo();

        $fileInfo->sub_category_id = $sub_category_id;
        $fileInfo->description = $description;
        $fileInfo->file_link = $file_link;

        $fileInfo->save();

        return redirect()->route('home')->with('status', 'Successfully Added File!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FileInfo  $fileInfo
     * @return \Illuminate\Http\Response
     */
    public function show(FileInfo $fileInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FileInfo  $fileInfo
     * @return array
     */
    public function edit(Request $request)
    {
        $file_id = $request->file_id;
        $description = $request->description;

        $fileInfo = FileInfo::find($file_id);

        $fileInfo->description = $description;

        if ($request->hasFile('attachment')){
            $attachment = $request->attachment;
            $path = $attachment->store('file');
            $file_link = 'http://localhost/springbank/storage/app/'. $path;
            $fileInfo->file_link = $file_link;
        }

        $fileInfo->save();

        return redirect()->route('home')->with('status', 'Successfully Edited File!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FileInfo  $fileInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FileInfo $fileInfo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FileInfo  $fileInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy($file_id)
    {
        $fileInfo = FileInfo::find($file_id);
        $fileInfo->delete();

        return redirect()->route('home')->with('status', 'Successfully Deleted!');
    }

    public function edit_file($file_id)
    {
        $fileInfo = FileInfo::find($file_id);
        return view('edit_file')->with('fileInfo', $fileInfo);
    }
}
