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

        <div class="col-xl-6 col-lg-6 col-sm-12 mt-4">
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
                                        <i class="bi bi-pencil-square"></i>
                                        {{ __(' แก้ไข') }}
                                    </a>
                                @endcan

                                @can('category_delete')
                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" onsubmit='return confirm("ต้องการที่จะลบ \"{{ $category->title }}\" ใช่ไหม ?");' style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="bi bi-file-earmark-x"></i>
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