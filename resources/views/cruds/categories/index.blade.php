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
            <h2>{{ __('หมวดหมู่') }}</h2>

            @can('category_create')
                <form class="mt-3" action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- Name Category --}}
                    <div class="form-group row">
                        <label for="category_name" class="col-md-4 col-form-label text-md-right">{{ __('ชื่อหมวดหมู่ :') }}</label>
                        <div class="col-md-6">
                            <input id="category_name" type="text" class="form-control " name="category_name" value="{{ old('category_name') }}" required>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-success">{{ __('สร้างหมวดหมู่ใหม่') }}</button>
                        </div>
                    </div>
                </form>
            @endcan
        </div>

        <div class="col-xl-6 col-lg-6 col-sm-12 mt-5">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">{{ __('#') }}</th>
                        <th scope="col">{{ __('ชื่อหมวดหมู่') }}</th>
                        <th scope="col">{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $key => $category)
                        <tr>
                            <th scope="col">{{ $key+1 }}</th>
                            <td>{{ $category->title }}</td>
                            <td>
                                @can('category_edit')
                                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-outline-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                            <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z" />
                                        </svg>
                                        {{ __('แก้ไข') }}
                                    </a>
                                @endcan

                                @can('category_delete')
                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" onsubmit='return confirm("ต้องการที่จะลบ \"{{ $category->title }}\" ใช่ไหม ?");' style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                            </svg>
                                        </button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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