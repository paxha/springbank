<?php
/**
 * Created by PhpStorm.
 * User: paxha
 * Date: 5/20/18
 * Time: 4:58 PM
 */

?>

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        Edit File
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="{{ route('edit-file') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="file_id" value="{{ $fileInfo->id }}">
                            <div class="row">
                                <div class="col-sm-12 p-2">
                                    <label for="attachment">Chose a File</label>
                                    <input type="file" name="attachment" id="attachment" class="form-control">
                                </div>
                                <div class="col-sm-12 p-2">
                                    <label for="description">Write Description</label>
                                    <textarea name="description" id="description" rows="3" maxlength="250"
                                              placeholder="abc..."
                                              class="form-control" required>{{ $fileInfo->description }}</textarea>
                                </div>
                                <div class="p-2">
                                    <a href="{{ route('home') }}" class="btn btn-secondary" id="back-btn">Back</a>
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


