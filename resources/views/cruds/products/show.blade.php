@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-3 col-lg-4 col-sm-12">
            <div class="card">
                {{-- Image --}}
                <img class="card-img-top" src="{{ $product->images[0]->mime.$product->images[0]->base64 }}" alt="Product">

                <div class="card-body">
                    {{-- Add Product --}}
                    @can('product_edit')
                        <a href="#" class="btn btn-primary col text-center" data-toggle="modal" data-target="#addModal">{{ __('เพิ่มจำนวนสินค้า') }}</a>
                        <form action="{{ route('products.update', $product->code_name) }}" method="POST" id="add_form" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            {{-- Add Modal --}}
                            <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">{{ __('เพิ่มจำนวนสินค้า') }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <div class="form-group">
                                                {{-- List --}}
                                                <label for="select_list_add">{{ __('รายการ') }}</label>
                                                <select id="select_list_add" name="select_list_add" class="form-select add_number" aria-label="Default select example"> {{-- onchange="detail_balance_add(this)" --}}
                                                    <option value="" disabled selected>{{ __('เลือกรายการที่ต้องการ') }}</option>
                                                    @foreach ($product->product_details as $key => $detail)
                                                        <option class="select_option" value="{{ $detail->id }}" title="{{ $detail->product_color }}">
                                                            {{ $detail->product_color }} , {{ $detail->product_size }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                                <br>

                                                {{-- Quantity --}}
                                                <label for="number_add">{{ __('จำนวน') }}</label>

                                                <input id="number_add" type="number" class="form-control" value="1" name="number_add" min="1">
                                                <br>
                                                <p id="balance_show_add"></p>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('ยกเลิก') }}</button>
                                                <button type="submit" class="btn btn-primary">{{ __('ยืนยัน') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @endcan

                    {{-- Reduce Product --}}
                    @can('product_edit')
                        <a href="#" class="btn btn-danger col text-center mt-3" data-toggle="modal" data-target="#removeModal">{{ __('ลดจำนวนสินค้า') }}</a>
                        <form action="{{ route('products.update', $product->code_name) }}" method="POST" id="delete_form" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            {{-- Reduce Modal --}}
                            <div class="modal fade" id="removeModal" tabindex="-1" role="dialog" aria-labelledby="removeModal" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">{{ __('ลดจำนวนสินค้า') }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <div class="form-group">
                                                {{-- List --}}
                                                <label for="select_list_reduce">{{ __('รายการ') }}</label>
                                                <select id="select_list_reduce" name="select_list_reduce" class="form-select remove_number" aria-label="Default select example"> {{-- onchange="detail_balance_reduce(this)" --}}
                                                <option value="" disabled selected>{{ __('เลือกรายการที่ต้องการ') }}</option>
                                                @foreach ($product->product_details as $key => $detail)
                                                    <option class="select_option" value="{{ $detail->id }}" title="{{ $detail->product_color }}">
                                                        {{ $detail->product_color }} , {{ $detail->product_size }}
                                                    </option>
                                                @endforeach
                                                </select>

                                                <br>

                                                {{-- Quantity --}}
                                                <label for="number_reduce">{{ __('จำนวน') }}</label>

                                                <input id="number_reduce" type="number" class="form-control" value="1" min="1" name="number_reduce">

                                                <br>
                                                <p id="balance_show_reduce"></p>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('ยกเลิก') }}</button>
                                                <button type="submit" class="btn btn-primary">{{ __('ยืนยัน') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @endcan
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-lg-6 col-sm-12">
            <h3>{{ __('รหัส') }} {{ $product->code_name }} ({{ $product->product_name }})</h3>
            <label>{{ __('จำนวนคงเหลือทั้งหมด') }} {{ $product_balance }} {{ __('ตัว') }}</label>
            <a href="#" class="btn btn-outline-danger float-right">
                ลบรายการนี้ทั้งหมด
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash "  viewBox="0 0 16 16">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                </svg>
            </a>

           
            <table class="table table-success mt-3">
                <thead>
                    <tr>
                        <th scope="col">{{ __('สีของสินค้า') }}</th>
                        <th scope="col">{{ __('ขนาด') }}</th>
                        <th scope="col">{{ __('จำนวนคงเหลือ') }}</th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach ($product->product_details as $key => $detail)
                        <tr>
                            <td>{{ $detail->product_color }}</td>
                            <td>{{ $detail->product_size }}</td>
                            <td>{{ $detail->balance_amount }}</td>
                            <td> 
                                
                                <a href="#"class="btn btn-sm btn-danger" >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash "  viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
            <label style="display: block; text-align: right;">{{ __('จำนวนเดิมทั้งหมด') }} {{ $total_amount }} {{ __('ตัว') }}</label>
        </div>
    </div>
</div>

{{-- <script>
    function detail_balance_add(select) {
        var e = document.getElementById("select_list_add");
        document.getElementById('balance_show_add').innerHTML = "จำนวนคงเหลือ " + e.value + " ตัว";
    }

    function detail_balance_reduce(select) {
        var e = document.getElementById("select_list_reduce");
        document.getElementById('balance_show_reduce').innerHTML = "จำนวนคงเหลือ " + e.value + " ตัว";
    }
</script> --}}
@endsection