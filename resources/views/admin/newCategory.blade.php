@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
           
               
                <h2>หมวดหมู่ใหม่</h2>

                <form class="mt-3" method="POST" action="" enctype="multipart/form-data" >
                    @csrf

                    <div class="form-group row" >
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('ชื่อหมวดหมู่') }}</label>
                        <div class="col-md-6">
                            <input id="product_name" type="text" class="form-control " name="product_name" value="{{ old('product_name') }}" >
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-success">
                                {{ __('สร้างหมวดหมู่ใหม่') }}
                            </button>
                        </div>
                    </div>
                </form>
                
        
    </div>
</div>


@endsection
