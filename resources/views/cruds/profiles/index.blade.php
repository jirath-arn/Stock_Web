@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        @if(session()->has('message'))
            <div class="col-sm-10">
                <div class="alert alert-{{ session('alert') ?? 'info' }} alert-dismissible fade show" role="alert">
                    <strong>{{ session('header') }}</strong> {{ session('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @endif

        <div class="col-lg-8 col-sm-10 mt-3">
            <h3>{{ __('เปลี่ยนรหัสผ่าน') }}</h3>

            <form class="mt-3" action="{{ route('profiles.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Old Password --}}
                <div class="form-group row">
                    <label for="old_password" class="col-md-4 col-form-label text-md-right">{{ __('รหัสผ่านเดิม :') }}</label>
                    <div class="col-md-6">
                        <input id="old_password" type="password"
                            class="form-control @error('old_password') is-invalid @enderror" name="old_password" required>

                        @error('old_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                {{-- New Password --}}
                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('รหัสผ่านใหม่ :') }}</label>
                    <div class="col-md-6">
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                {{-- Confirm New Password --}}
                <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('ยืนยันรหัสผ่านใหม่ :') }}</label>
                    <div class="col-md-6">
                        <input id="password-confirm" type="password"
                            class="form-control" name="password_confirmation" required>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-success">{{ __('บันทึก') }}</button>
                        <a href="{{ route('products.index') }}" class="btn btn-secondary ml-2">{{ __('ยกเลิก') }}</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="application/javascript">
    $(document).ready(function() {
        // Show the alert.
        setTimeout(function() {
            $(".alert").alert('close');
        }, 5000);
    });
</script>
@endsection