@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-sm-10">
            <h3>{{ __('แก้ไขชื่อหมวดหมู่') }}</h3>

            <form class="mt-3" action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Old Name --}}
                <div class="form-group row">
                    <label for="old_category_name" class="col-md-4 col-form-label text-md-right">{{ __('ชื่อหมวดหมู่เดิม :') }}</label>
                    <div class="col-md-6">
                        <input id="old_category_name" type="text" class="form-control " name="old_category_name" value="{{ $category->title }}" readonly>
                    </div>
                </div>

                {{-- New Name --}}
                <div class="form-group row">
                    <label for="new_category_name" class="col-md-4 col-form-label text-md-right">{{ __('ชื่อหมวดหมู่ใหม่ :') }}</label>
                    <div class="col-md-6">
                        <input id="new_category_name" type="text" class="form-control " name="new_category_name" value="{{ old('new_category_name') }}" required>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-success">{{ __('บันทึก') }}</button>
                        <a href="{{ route('categories.index') }}" class="btn btn-secondary ml-2">{{ __('ยกเลิก') }}</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection