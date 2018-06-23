<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Spring Bank') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            {{--<li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>--}}
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>


    <script src="http://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous">
    </script>
    <script>
        jQuery(document).ready(function () {
            $.get('/get-categories', function (data) {
                const category = $('#category');
                category.empty();
                category.append('<option value="">'+'Select A Category'+'</option>');
                $.each(data, function (index, categoryObj) {
                    category.append('<option value="'+categoryObj.id+'">'+categoryObj.name+'</option>');
                })
            });
            $('#category').on('change', function (e) {
                const category_id = e.target.value;
                $.get('/get-sub-categories/' + category_id, function (data) {
                    const subCategory = $('#sub_category');
                    subCategory.empty();
                    subCategory.append('<option value="">'+'Select Sub Category'+'</option>');
                    $.each(data, function (index, subCategoryObj) {
                        subCategory.append('<option value="'+subCategoryObj.id+'">'+subCategoryObj.name+'</option>');
                    });
                });
            });



            //home
            allFiles();
            $.get('/get-categories', function (data) {
                const category = $('#f-category');
                category.empty();
                category.append('<option value="">'+'All Category'+'</option>');
                $.each(data, function (index, categoryObj) {
                    category.append('<option value="'+categoryObj.id+'">'+categoryObj.name+'</option>');
                })
            });


            $('#f-category').on('change', function (e) {
                const category_id = e.target.value;
                if (category_id === '')
                    allFiles();
                $.get('/get-sub-categories/' + category_id, function (data) {
                    const subCategory = $('#f-sub_category');
                    subCategory.empty();
                    subCategory.append('<option value="">' + 'Select Sub Category' + '</option>');
                    $.each(data, function (index, subCategoryObj) {
                        subCategory.append('<option value="' + subCategoryObj.id + '">' + subCategoryObj.name + '</option>');
                    });
                });
                $.get('/get-filtered-files-by-category/' + category_id, function (data) {
                    const tbody = $('#tbody');
                    tbody.empty();
                    $.each(data, function (index, dataObj) {
                        if (dataObj.sub_category.category === null)
                            return;
                        tbody.append('<tr>\n' +
                            '                                    <th scope="row">' + index + '</th>\n' +
                            '                                    <td>' + dataObj.description + '</td>\n' +
                            '                                    <td>' + dataObj.sub_category.category.name + '</td>\n' +
                            '                                    <td>' + dataObj.sub_category.name + '</td>\n' +
                            '                                    <td><a href="' + dataObj.id + '" class="btn btn-sm btn-outline-info">Edit</a>  <a\n' +
                            '                                                href="' + dataObj.id + '" class="btn btn-sm btn-outline-danger">Delete</a></td>\n' +
                            '                                </tr>');
                    });
                });
            });

            $('#f-sub_category').on('change', function (e) {
                const sub_category_id = e.target.value;
                $.get('/get-filtered-files/' + sub_category_id, function (data) {
                    const tbody = $('#tbody');
                    tbody.empty();
                    $.each(data, function (index, dataObj) {
                        tbody.append('<tr>\n' +
                            '                                    <th scope="row">' + index + '</th>\n' +
                            '                                    <td>' + dataObj.description + '</td>\n' +
                            '                                    <td>' + dataObj.sub_category.category.name + '</td>\n' +
                            '                                    <td>' + dataObj.sub_category.name + '</td>\n' +
                            '                                    <td><a href="' + dataObj.id + '" class="btn btn-sm btn-outline-info">Edit</a>  <a\n' +
                            '                                                href="' + dataObj.id + '" class="btn btn-sm btn-outline-danger">Delete</a></td>\n' +
                            '                                </tr>');
                    });
                });
            });
        });

        function allFiles() {
            $.get('/get-all-files/', function (data) {
                const tbody = $('#tbody');
                tbody.empty();
                $.each(data, function (index, dataObj) {
                    tbody.append('<tr>\n' +
                        '                                    <th scope="row">' + index + '</th>\n' +
                        '                                    <td>' + dataObj.description + '</td>\n' +
                        '                                    <td>' + dataObj.sub_category.category.name + '</td>\n' +
                        '                                    <td>' + dataObj.sub_category.name + '</td>\n' +
                        '                                    <td><a href="' + dataObj.id + '" class="btn btn-sm btn-outline-info">Edit</a>  <a\n' +
                        '                                                href="' + dataObj.id + '" class="btn btn-sm btn-outline-danger">Delete</a></td>\n' +
                        '                                </tr>');
                });
            });
        }
    </script>
</body>
</html>
