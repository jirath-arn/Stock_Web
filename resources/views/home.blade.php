@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="container-wrap">
                <div class="row no-gutters d-flex mt-5">
             
                     {{-- @foreach ($data[0] as $item)  --}}
                        {{-- @if ($item->status_approve == true) --}}
                            <div class="card col-4" style="width: 18rem;">
                                <a href="/detail"><img class="card-img-top" src="/img/test-shirt/1.png" alt="Card image cap"></a>
                                <div class="card-body">
                                    <p style="font-size: 18px;font-family: Sans-serif;font-style: normal;font-weight: bold;">รหัส 001</p>
                                    <p style="font-size: 14px;font-style: normal;">จำนวนคงเหลือ {{50}} ตัว</p>
                                </div>
                              </div>
                        {{-- @endif --}}
                    {{-- @endforeach --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
