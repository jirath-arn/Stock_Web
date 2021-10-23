<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Stock Web">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Stock Web</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap">

    <!-- Vendor CSS Files -->
    <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap/css/bootstrap.min.css') }}">

    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    @yield('styles')

    <style>
        body {
            font-family: 'Prompt', sans-serif;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col col-md-12" style="margin-top: 5%;">
                {{-- Logo --}}
                <div class="row text-center">
                    <div class="col col-md-12">
                        <img src="{{ asset('img/logo.png') }}" height="185" alt="Logo">
                    </div>
                </div>

                {{-- Login Form --}}
                <div class="row justify-content-md-center mt-3">
                    <div class="col col-md-7">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            {{-- Topic Header --}}
                            <div class="form-group" style="font-size: 40px;">เข้าสู่ระบบ</div>

                            {{-- E-mail --}}
                            <div class="form-group">
                                <input id="email" name="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                                    autocomplete="email" placeholder="อีเมล" autofocus required
                                    style="font-size: 18px; border: 2px solid rgb(0, 0, 0); border-radius: 4px;">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            {{-- Password --}}
                            <div class="form-group">
                                <input id="password" name="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    autocomplete="current-password" placeholder="รหัสผ่าน" required
                                    style="font-size: 18px; border: 2px solid rgb(0, 0, 0); border-radius: 4px;">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            {{-- Submit --}}
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-dark btn-lg mt-3" style="font-size: 18px;">
                                    {{ __('เข้าสู่ระบบ') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div> {{-- End Login Form --}}
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