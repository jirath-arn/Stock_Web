@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if(session()->has('message'))
            <div class="col-sm-12">
                <div class="alert alert-{{ session('alert') ?? 'info' }} alert-dismissible fade show" role="alert">
                    <strong>{{ session('header') }}</strong> {{ session('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @endif

        <div class="col-xl-6 col-lg-5 col-sm-12 mt-4">
            <div class="card">
                <div class="card-header">{{ __('บัญชีผู้ใช้ทั้งหมด') }}</div>
                <div id="table_account" class="card-body" style="width:100%;  height:400px; overflow-y: scroll;">
                    <div class="table">
                        <table class="table table-bordered table-striped mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">{{ __('#') }}</th>
                                    <th scope="col">{{ __('ชื่อผู้ใช้') }}</th>
                                    <th scope="col">{{ __('อีเมล') }}</th>
                                    <th scope="col">{{ __('สถานะ') }}</th>
                                    <th scope="col">{{ __('เข้าสู่ระบบล่าสุด') }}</th>
                                    <th scope="col">{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $key => $user)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role->title }}</td>
                                        <td>{{ $user->last_login_at ?? '-' }}</td>
                                        <td>
                                            @can('user_edit') {{-- แก้ไข --}}
                                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-outline-primary">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                                        <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z" />
                                                    </svg>
                                                </a>
                                            @endcan


                                            @can('user_delete')
                                                @if ($user->email != Auth::user()->email)
                                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit='return confirm("ต้องการที่จะลบ \"{{ $user->name }}\" ใช่ไหม ?");' style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit" class="btn btn-sm btn-danger">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                            </svg>
                                                        </button>
                                                    </form>
                                                @endif
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        @can('user_create')
            <div class="col-xl-6 col-lg-6 col-sm-12 mt-4">
                <div class="card">
                    <div class="card-header">{{ __('เพิ่มบัญชีผู้ใช้') }}</div>
                    <div class="card-body" >
                        <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            {{-- Name --}}
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('ชื่อผู้ใช้ :') }}</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

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
                                        name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                    <select id="role" name="role" class="form-select" required>
                                        @foreach ($roles as $key => $role)
                                            <option value="{{ $role->id }}">{{ $role->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">{{ __('สมัครสมาชิก') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endcan
    </div>
</div>

<script type="application/javascript">
    $(document).ready(function() {
        // Show the alert.
        setTimeout(function() {
            $(".alert").alert('close');
        }, 5000);

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