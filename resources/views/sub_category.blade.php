<?php
/**
 * Created by PhpStorm.
 * User: paxha
 * Date: 5/20/18
 * Time: 11:56 AM
 */

?>

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="list-group">
                    <a href="{{ route('categories') }}" class="list-group-item list-group-item-action">Categories</a>
                    <a href="{{ route('sub-categories') }}" class="list-group-item list-group-item-action active">Sub
                        Categories</a>
                    <a href="{{ route('home') }}" class="list-group-item list-group-item-action">Files</a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        Sub Categories
                        <div class="float-right"><a href="{{ route('new-sub-category') }}" class="btn btn-sm btn-outline-primary">New Sub Category</a></div>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Sub Category Name</th>
                                {{--<th scope="col">Cat -> Sub Cat</th>--}}
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($subCategories as $subCategory)
                                <tr>
                                    <th scope="row">{{ $subCategory->id }}</th>
                                    <td>{{ $subCategory->category->name }}</td>
                                    <td>{{ $subCategory->name }}</td>
                                    <td><a href="{{ url("edit-sub-category/$subCategory->id") }}" class="btn btn-sm btn-outline-info">Edit</a>  <a
                                                href="{{ url("delete-sub-category/$subCategory->id") }}" class="btn btn-sm btn-outline-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

