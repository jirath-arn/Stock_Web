<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Stock Web</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/vendor/bootstrap/css/bootstrap.css') }}" rel="stylesheet">

    <!-- Main JS File -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Vendor JS Files -->
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script> --}}
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

    <style>
        .chip {
            display: inline-block;
            padding: 0 20px;
            height: auto;
            width: 100%;
            font-size: 13px;
            line-height: 30px;
            border-radius: 5px;
            border: 1px solid rgb(196, 231, 255);
            background-color: #4dc0b5;
            box-shadow: 8px 8px 8px 0px rgba(0, 0, 0, 0.2);
        }

        .filterDiv {
            display: none;
        }

        .show {
            display: block;
        }

        .my-custom-scrollbar {
            position: relative;
            height: 200px;
            overflow: auto;

        }

        .table-wrapper-scroll-y {
            display: block;
            border-radius: 25px;
        }

        #table_account::-webkit-scrollbar {
            width: 12px;
            border-radius: 25px;
            background-color: #00000018;
        }

        #table_account::-webkit-scrollbar-thumb {
            border-radius: 25px;
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
            background-color: rgb(78, 78, 78);
        }
    </style>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white">
            <div class="container mt-3">
                <a href="{{ route('products.index') }}">
                    <img src="/img/logo.png" height="40px" alt="Stock Web" title="Stock Web">
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                {{-- Menu --}}
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    {{-- Left Side Of Navbar --}}
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    {{-- Right Side Of Navbar --}}
                    <ul class="navbar-nav ml-auto">

                        @can('product_access')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('products.index') }}">{{ __('รายการสินค้า') }}</a>
                            </li>
                        @endcan

                        @can('dashboard_access')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('dashboards.index') }}">{{ __('Dashboard') }}</a>
                            </li>
                        @endcan

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ __('ชื่อผู้ใช้ : ') }}{{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                @can('product_create')
                                    <a class="dropdown-item" href="{{ route('products.create') }}">{{ __('เพิ่มสินค้า')}}</a>
                                @endcan

                                @can('category_access')
                                    <a class="dropdown-item" href="{{ route('categories.index') }}">{{ __('หมวดหมู่') }}</a>
                                @endcan

                                @can('history_access')
                                    <a class="dropdown-item" href="{{ route('history.index') }}">{{ __('ประวัติ') }}</a>
                                @endcan

                                @can('user_access')
                                    <a class="dropdown-item" href="{{ route('users.index') }}">{{ __('บัญชีผู้ใช้') }}</a>
                                @endcan

                                @can('change_password')
                                    <a class="dropdown-item" href="{{ route('profiles.index') }}">{{ __('เปลี่ยนรหัสผ่าน') }}</a>
                                @endcan

                                <hr>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('ออกจากระบบ') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li> {{-- End Sub Menu --}}
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    @include ('layouts/footer')
</body>
</html>