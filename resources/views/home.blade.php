@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="container-wrap">
                <div class="row no-gutters d-flex mt-5">
             
                     {{-- @foreach ($data[0] as $item)  --}}
                        {{-- @if ($item->status_approve == true) --}}
                        @for ($i = 0; $i < 10; $i++)
                            <div class="card col-3 ">
                                <a href="/detail"><img class="card-img-top" src="/img/test-shirt/1.png"  alt="Card image cap"></a>
                                <div class="card-body">
                                    <p style="font-size: 16px;font-family: Sans-serif;font-style: normal;">
                                        <b>รหัส 001</b>
                                        <br>
                                        จำนวนคงเหลือ {{50}} ตัว
                                    </p>
                                </div>
                            </div>
                        @endfor
                        {{-- @endif --}}
                    {{-- @endforeach --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
