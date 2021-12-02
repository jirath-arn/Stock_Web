@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-sm-10">
            <h3>{{ __('แก้ไขบัญชีผู้ใช้') }}</h3>

            <form class="mt-3" action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Name --}}
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('ชื่อผู้ใช้ :') }}</label>
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                            name="name" value="{{ $user->name }}" readonly required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                {{-- Email --}}
                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('อีเมล :') }}</label>
                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ $user->email }}" readonly required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                {{-- Password --}}
                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('รหัสผ่าน :') }}</label>
                    <div class="col-md-6">
                        <input id="password" type="text"
                            class="form-control @error('password') is-invalid @enderror" name="password" required>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6 offset-md-4">
                        <input type="checkbox" id="checkbox"> {{ __('แสดงรหัสผ่าน') }}</input><br>
                        <button type="button" class="btn btn-outline-primary mt-2" onclick="generate_password()">{{ __('สุ่มรหัสผ่าน') }}</button>
                    </div>
                </div>

                {{-- Role --}}
                <div class="form-group row">
                    <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('สถานะ :') }}</label>
                    <div class="col-md-6">
                        <select id="role" name="role" class="form-select" required disabled>
                            @foreach ($roles as $key => $role)
                                <option value="{{ $role->id }}" {{ ($role->id == $user->role_id) ? 'selected' : '' }}>{{ $role->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-success">{{ __('บันทึก') }}</button>
                        <a href="{{ route('users.index') }}" class="btn btn-secondary ml-2">{{ __('ยกเลิก') }}</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="application/javascript">
    $(document).ready(function() {
        $('#checkbox').on('change', function() {
            $('#password').attr('type', $('#checkbox').prop('checked') == true ? "text" : "password");
        });

        generate_password();
        $("#checkbox").prop("checked", true);
    });
</script>

<script type="application/javascript">
    function generate_password() {
        var randomString = Math.random().toString(36).slice(-8);
        document.getElementById('password').value = randomString;
    }
</script>
@endsection