<?php
/**
 * Created by PhpStorm.
 * User: paxha
 * Date: 5/20/18
 * Time: 5:32 PM
 */

?>

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        Add New Category
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="{{ route('edit-category') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="category_id" value="{{ $category->id }}">
                            <div class="row">
                                <div class="col-sm-12 p-2">
                                    <label for="name">Category Name</label>
                                    <input type="text" id="name" name="name" class="form-control" maxlength="250" required value="{{ $category->name }}">
                                </div>
                                <div class="p-2">
                                    <a href="{{ route('categories') }}" class="btn btn-secondary" id="back-btn">Back</a>
                                    <button class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



