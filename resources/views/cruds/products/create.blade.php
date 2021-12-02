@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class=" col-12 ">
            <h2>{{ __('สร้างรายการสินค้าใหม่') }}</h2>

            <form class="mt-3" action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <section>
                    <div class="panel panel-header">
                        <div class="row">
                            {{-- Product Name --}}
                            <div class="col-xl-3 col-lg-3 col-sm-3">
                                <div class="form-group">
                                    <label for="product_name" class="text-md-right">{{ __('ชื่อรายการสินค้า') }}</label>
                                    <input id="product_name" type="text" class="form-control" name="product_name" value="{{ old('product_name') }}" required>
                                </div>
                            </div>

                            {{-- Code Name --}}
                            <div class="col-xl-3 col-lg-3 col-sm-3">
                                <div class="form-group">
                                    <label for="code_name" class="text-md-right">{{ __('รหัสสินค้า') }}</label>
                                    <input id="code_name" type="text" class="form-control" name="code_name" value="{{ old('code_name') }}" required>
                                </div>
                            </div>

                            {{-- Category --}}
                            <div class="col-xl-3 col-lg-3 col-sm-3">
                                <div class="form-group">
                                    <label for="category" class="text-md-right">{{ __('หมวดหมู่สินค้า') }}</label>
                                    <select id="category" name="category" class="form-select" aria-label="Default select example" required>
                                        @foreach ($categories as $key => $category)
                                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{-- Price --}}
                            <div class="col-xl-3 col-lg-3 col-sm-3">
                                <div class="form-group">
                                    <label for="price" class="text-md-right">{{ __('ราคาส่งของสินค้า') }}</label>
                                    <input id="price" type="number" min="0" class="form-control" name="price" value="{{ old('price') }}" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-footer">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>{{ __('สีของสินค้า') }}</th>
                                    <th>{{ __('ขนาด') }}</th>
                                    <th>{{ __('จำนวน (ตัว)') }}</th>
                                    <th>
                                        <a href="#" onclick="addRow()">
                                            <i class="bi bi-plus-square-fill"></i>
                                        </a>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <input type="text" name="color[]" class="form-control" required>
                                    </td>
                                    <td>
                                        <select name="size[]" class="form-select" aria-label="Default select example" required>
                                            <option value="-" selected>{{ __('ฟรีไซต์') }}</option>
                                            <option value="S">{{ __('S') }}</option>
                                            <option value="M">{{ __('M') }}</option>
                                            <option value="L">{{ __('L') }}</option>
                                            <option value="XL">{{ __('XL') }}</option>
                                            <option value="XXL">{{ __('XXL') }}</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number" name="quantity[]" min="1" class="form-control quantity" required>
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-danger remove">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td>
                                        <input type="file" class="form-control" id="image" name="image" accept="image/*" onchange="loadFile(this.files)" required>
                                        <img id="output" width="200px">
                                        <input type="text" id='base64' name='base64' hidden>
                                    </td>
                                    <td></td>
                                    <td>
                                        <button type="submit" value="submit" class="btn btn-success">
                                            {{ __('สร้างรายการสินค้าใหม่') }}
                                        </button>
                                    </td>
                                    <td></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </section>
            </form>
        </div>
    </div>
</div>

<script type="application/javascript">
    var loadFile = function(files) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src); // Free Memory.
        }
        
        let reader = new FileReader();
        let file = event.target.files[0];
        reader.readAsDataURL(file);
        reader.onload = function() {
            document.getElementById('base64').value = reader.result;
        }
    };
</script>

<script type="application/javascript">
    function addRow() {
        var tr = '<tr>' +
                    '<td><input type="text" name="color[]" class="form-control" required></td>' +
                    '<td><select name="size[]" class="form-select" aria-label="Default select example" required>' +
                        '<option value="-" selected>ฟรีไซต์</option>' +
                        '<option value="S">S</option>' +
                        '<option value="M">M</option>' +
                        '<option value="L">L</option>' +
                        '<option value="XL">XL</option>' +
                        '<option value="XXL">XXL</option>' +
                    '</select></td>' +
                    '<td><input type="number" name="quantity[]" min="1" class="form-control quantity" required></td>' +
                    '<td><a href="#" class="btn btn-danger remove"><i class="bi bi-trash"></i></a></td>' +
                '</tr>';
        $('tbody').append(tr);
    };

    $('.remove').live('click', function() {
        var last = $('tbody tr').length;
        if(last == 1) {
            alert('ไม่สามารถนำแถวสุดท้ายออกได้');
        } else{
            $(this).parent().parent().remove();
        }
    });
</script>
@endsection