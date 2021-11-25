@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
           
                <h2>สร้างรายการสินค้าใหม่</h2>

    
            <form  class="mt-3" method="POST" action="{{route('products.store')}}"  enctype="multipart/form-data" >
                @csrf
                <section>
                <div class="panel panel-header">

                    <div class="row">
                        <div class="col-xl-3 col-lg-3 col-sm-3">
                            <div class="form-group">
                                <label for="name" class="text-md-right">{{ __('ชื่อรายการสินค้า') }}</label>
                                <input id="product_name" type="text" class="form-control " name="product_name" value="{{ old('product_name') }}" >
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-3 col-sm-3">
                            <div class="form-group">
                                <label for="name" class="  text-md-right">{{ __('ชื่รหัสสินค้า') }}</label>
                                <input id="code_name" type="text" class="form-control " name="code_name" value="{{ old('code_name') }}" >
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-3 col-sm-3">
                            <div class="form-group">
                                <label for="name" class="text-md-right">{{ __('หมวดหมู่สินค้า') }}</label>
                                <select id="category" name="category" class="form-select " aria-label="Default select example" >
                                    @foreach ($data as $item)
                                        <option value="{{$item->id}}">{{$item->title}}</option>
                                    @endforeach
                                        
                                        
                                </select>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-3 col-sm-3">
                            <div class="form-group">
                                <label for="name" class="text-md-right">{{ __('ราคาส่งของสินค้า') }}</label>
                                <input id="price" type="number" class="form-control " name="price" value="{{ old('price') }}" >
                            </div>
                        </div>

                       
                    </div>
                </div>
               
                    
                    <div class="panel panel-footer" >
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>สีของสินค้า</th>
                                    <th>ไซด์</th>
                                    <th>จำนวน ( ตัว ) </th>
                                   
                                    <th><a href="#" onclick="addRow()" >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                        </svg>
                                        </a>
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="text" name="color[]" class="form-control" required=""></td>
                                    <td>
                                        <select id="size" name="size[]"  class="form-select " aria-label="Default select example" >
                                            <option value="-" selected>ฟรีไซด์</option>
                                            <option value="S">S</option>
                                            <option value="M">M</option>
                                            <option value="L">L</option>
                                            <option value="XL">XL</option>
                                        </select>
                                    </td>   
                                    
                                    <td><input type="number" name="quantity[]" class="form-control quantity" required=""></td>
                                   
                                    <td>
                                        <a href="#" class="btn btn-danger remove ">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                            </svg>
                                        </a>
                                    </td>
                                
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>

                                    <td>
                                        <input  type="file" id="myFile" name="filename">
                                    </td>
                                
                                
                                </tr>
                                
                            </tfoot>
                            
                        </table>
                    </div>
                    <div>
                        
                        <button name="" value="Submit"  type="submit" class="btn btn-success">
                            {{ __('สร้างรายการสินค้าใหม่') }}
                        </button>
                    </div>
                </section>
            </form>
       </div>
    </div>  
</div>
{{-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> --}}
{{-- <script  type="text/javascript">
    let = count_color = 0;
    $(function () {
       
        $("#btnAdd").click(function () {
            var name_color = document.getElementById("product_color").value
            var product_value = document.getElementById("product_color_value").value
            var size = document.getElementById("size").value
            if(size == 'Freesize'){
                size = "ฟรี"
            }
            $("#list").append(" <tr id='"+count_color+"' scope='row' > "+ 
                                "<td id = '"+ name_color +"' name = '"+ name_color +"' value = '" +  name_color + "' >" + name_color + "</td>"+
                                "<td id = '"+ size +"' name = '"+ size +"' value = '" +  size + "' >" + size + "</td>"+
                                "<td id = '"+ product_value +"' name = '"+ product_value +"' value = '" +  product_value + "' >" + product_value + "</td>"+
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
    
    
</script> --}}

<script type="text/javascript">
    $('tbody').delegate('.quantity','keyup',function(){
       
    });
    
    
    function addRow()
    {
        var tr='<tr>'+
        '<td><input type="text" name="color[]" class="form-control" required=""></td>'+
        '<td><select id="size" name="size[]"  class="form-select " aria-label="Default select example" >'+
                     '<option value="Freesize" selected>ฟรีไซด์</option>'+
                     '<option value="S">S</option>'+
                     '<option value="M">M</option>'+
                     '<option value="L">L</option>'+
                     '<option value="XL">XL</option>'+
        '</select></td> ' +
        '<td><input type="text" name="quantity[]" class="form-control quantity" required=""></td>'+
        '<td><a href="#" class="btn btn-danger remove ">'+
            '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16"><path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/><path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>'+
                '</svg></a></td>'+
        '</tr>';
        $('tbody').append(tr);
        
    };
    $('.remove').live('click',function(){
        var last=$('tbody tr').length;
        if(last==1){
            alert("you can not remove last row");
        }
        else{
             $(this).parent().parent().remove();
        }
    
    });
</script>
@endsection
