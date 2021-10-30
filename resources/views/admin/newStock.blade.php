@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
           
               
                <h2>สร้างรายการสินค้าใหม่</h2>

                <form class="mt-3"   enctype="multipart/form-data" >
                    @csrf

                    <div class="form-group row" >
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('รหัสรายการสินค้า') }}</label>
                        <div class="col-md-6">
                            <input id="product_name" type="text" class="form-control " name="product_name" value="{{ old('product_name') }}" >
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('เพิ่มสีของสินค้า') }}</label>
                        <div class="col-md-6">
                          
                            สี: <input id="product_color" type="text" class="form-control " name="product_color" >
                            จำนวน: <input id="product_color_value" type="number" class="form-control " name="product_color_value"  >

                            <input type="button" id = "btnAdd" value = "เพิ่มสี" />

                        </div>
                        <label for="list" class="col-md-4 col-form-label text-md-right">{{ __('สีทั้งหมด:') }}</label>
                          
                        <div class="col-md-6">
                            <table id="list" class="table" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th scope="col" >สีของสินค้า</th>
                                            <th scope="col" >จำนวน(ตัว)</th>
                                            <th scope="col" >ลบ</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                            </table>
                        </div>
                    </div>

                    

                    <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('รูปภาพ') }}</label>
                            <div class="col-md-6">
                                <input type="file" class="custom-file-input" id="image">
                                <label class="custom-file-label" for="image">อัพโหลดรูปภาพ</label>
                            </div>
                        
                    </div>
                    

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-success">
                                {{ __('สร้างรายการสินค้าใหม่') }}
                            </button>
                        </div>
                    </div>
                </form>
                
        
    </div>
</div>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script  type="text/javascript">
    let = count_color = 0;
    $(function () {
       
        $("#btnAdd").click(function () {
            var name_color = document.getElementById("product_color").value
            var product_value = document.getElementById("product_color_value").value
            $("#list").append(" <tr id='"+count_color+"' scope='row' > "+ 
                                "<td>" + name_color + "</td>"+
                                "<td>" + product_value + "</td>"+
                                "<td>"+ 
                                    "<button  onclick='productDelete(this);'  class='btn text-danger'> x" +
                                    "</button>" + 
                                "</td>"+
                                "</tr>");
            count_color ++;
        });
    });
    

    // remove selected option
    function productDelete(ctl) {
         $(ctl).parents("tr").remove();
    }   
    
</script>
@endsection
