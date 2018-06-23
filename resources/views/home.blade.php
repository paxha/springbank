@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="list-group">
                    <a href="{{ route('categories') }}" class="list-group-item list-group-item-action">Categories</a>
                    <a href="{{ route('sub-categories') }}" class="list-group-item list-group-item-action">Sub
                        Categories</a>
                    <a href="{{ route('home') }}" class="list-group-item list-group-item-action active">Files</a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        Files
                        <div class="float-right"><a href="{{ route('new-file') }}" class="btn btn-sm btn-outline-primary">New File</a></div>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <label for="table">Filters</label>
                        <table class="table" id="table">
                            <tr>
                                <td>
                                    <label for="f-category">Select Category:</label>
                                    <select name="f-category" id="f-category" class="form-control form-control-sm">
                                        <option value="">Select Category</option>
                                    </select>
                                </td>
                                <td>
                                    <label for="f-sub_category">Select Sub Category</label>
                                    <select name="f-sub_category" id="f-sub_category" class="form-control form-control-sm">
                                        <option value="">Select Sub Category</option>
                                    </select>
                                </td>
                            </tr>
                        </table>

                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Description</th>
                                <th scope="col">Catgory</th>
                                <th scope="col">Sub Category</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody id="tbody">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection