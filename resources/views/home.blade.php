@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="container-wrap">
                <div class="row no-gutters d-flex mt-5">
             
                     {{-- @foreach ($data[0] as $item)  --}}
                        {{-- @if ($item->status_approve == true) --}}
                            <div class = "card col-3 d-flex ftco-animate fadeInUp ftco-animated  " style="width:300px; ">
                                <img src="/img/test-shirt/1.png"  alt="Card image" height="300px">
                                <p style="font-size: 18px;font-family: Sans-serif;font-style: normal;font-weight: bold;">รหัส 001</p>
                                <p style="font-size: 14px;font-style: normal;">จำนวนคงเหลือ {{50}} ตัว</p>
                            </div>
                        {{-- @endif --}}
                    {{-- @endforeach --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
