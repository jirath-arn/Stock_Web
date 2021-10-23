<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Stock Web">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Stock Web') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito">
    
    <!-- Vendor CSS Files -->
    <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap/css/bootstrap.min.css') }}">

    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    @yield('styles')

    <style>
        /* #email{
                    position: absolute;
                    width: 633px;
                    height: 52px;
                   
                } */

        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;

        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 " style="margin-top:5% ">

                <img id="logo" class="center mt-5" src="/img/logo.png"
                    style="display: flex; justify-content: center; align-items: center; " height="200px" alt="logo"
                    title="logo">

                <div class="mt-5 ">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row"
                            style="font-family: Sans-serif;font-size: 40px;display: flex;justify-content: center; align-items: center;">
                            <label class="col-md-8  ">เข้าสู่ระบบ</label>
                        </div>

                        <div class="form-group row"
                            style="display: flex; justify-content: center; align-items: center;">
                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                    placeholder="อีเมล"
                                    style="font-size: 22px;font-family: Sans-serif;border: 2px solid rgb(0, 0, 0); border-radius: 4px;">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        {{-- email --}}

                        <div class="form-group row"
                            style="display: flex; justify-content: center; align-items: center;">
                            <div class="col-md-8">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror " name="password"
                                    required autocomplete="current-password" placeholder="รหัสผ่าน"
                                    style="font-size: 22px;font-family: Sans-serif; border: 2px solid rgb(0, 0, 0); border-radius: 4px;">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        {{-- password --}}

                        <div class="form-group row  ">
                            <div class="col-12" style="display: flex; justify-content: center; align-items: center;">
                                <button type="submit" class="btn btn-primary mt-3"
                                    style="font-size: 25px;font-family: Sans-serif;">
                                    {{ __('ลงชื่อเข้าใช้งาน') }}
                                </button>

                                {{-- @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif --}}
                            </div>
                        </div>

                        {{-- submit --}}
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('js/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    
    <!-- Main JS File -->
    <script src="{{ asset('js/app.js') }}"></script>
    
    @yield('scripts')
</body>
</html>
