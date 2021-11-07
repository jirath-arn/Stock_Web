@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="container-xl ">
            <div class="row">
                <div class="col-md-12" >
                    <h5 >
                        <b class="" style="color:black; margin: auto; font-size:22px;">{{"ประวัติของระบบ"}}</b>
                        
                            <svg class="svg-icon" viewBox="0 0 20 20" style="width:25px;display: inline-flex;align-self: center;position: relative;">
                                <path d="M17.211,3.39H2.788c-0.22,0-0.4,0.18-0.4,0.4v9.614c0,0.221,0.181,0.402,0.4,0.402h3.206v2.402c0,0.363,0.429,0.533,0.683,0.285l2.72-2.688h7.814c0.221,0,0.401-0.182,0.401-0.402V3.79C17.612,3.569,17.432,3.39,17.211,3.39M16.811,13.004H9.232c-0.106,0-0.206,0.043-0.282,0.117L6.795,15.25v-1.846c0-0.219-0.18-0.4-0.401-0.4H3.189V4.19h13.622V13.004z"></path>
                            </svg>
                    
                    </h5>
                    <div id="table1" class="mt-3" style=" width:87%; margin: auto; height:400px; overflow-y: scroll;  border-style: solid; border-width: medium; ">
                        <div class="col" style=" margin: auto;" > 
                            @for ($i = 0; $i < 20; $i++)

                                <p class="chip" >
                                    <b>{{"USER"}}</b> 
                                    <br>
                                    {{"รหัส 001 >>  สีแดง:10 , สีเหลือง:10 , สีดำ:15"}}
                                    <br>
                                    {{"วันที่ 07 / 11 / 2021 เวลา 14:00 น."}}
                                </p>
                                
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
