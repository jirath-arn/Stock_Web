@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-6">
            @foreach ($data as $item)
                <h3>แก้ไขชื่อหมวดหมู่</h3>
                
                <form class="mt-3" method="POST"  action="{{route('categories.update', $item->id)}}"  >
                    @csrf
                    @method('PUT')
                    <div class="form-group row" >
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('ชื่อหมวดหมู่เดิม') }}</label>
                        <div class="col-md-6">
                            <input id="old_category_name" type="text" class="form-control " name="old_category_name" value="{{ $item->title }}" disabled >
                        </div>
                    </div>    

                    <div class="form-group row" >
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('ชื่อหมวดหมู่ใหม่') }}</label>
                        <div class="col-md-6">
                            <input id="new_category_name" type="text" class="form-control " name="new_category_name" value="{{ old('new_category_name') }}" >
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-success">
                                {{ __('บันทึก') }}
                            </button>
                        </div>
                    </div>
            </form>
            @endforeach
        </div>
        
</div>


@endsection
