@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-3 col-lg-4 col-sm-12 " >            
          <div class="card" style="">
             
            @foreach ($data[3] as $item)
                <img class="card-img-top" src="{{$item->mime}}{{$item->base64}}"    alt="Card image cap">
            @endforeach
            
            
              <div class="card-body ">
                @can('product_add')
                <a href="#"  class="btn btn-primary col text-center" data-toggle="modal" data-target="#addModal">เพิ่มจำนวนสินค้า</a>
                <form method="POST" id="add_form" action="{{ route('products.update',$data[4]) }}"   enctype="multipart/form-data">
                  <div class="modal fade " id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">เพิ่มจำนวนสินค้า</h5>
                                    <button type="button"  class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="userEditForm"  action="#" >
                                        @csrf
                                        @method('PUT')
                                        {{-- @method('PUT') --}}
                                        <div class="form-group">

                                            <label for="select_list_add">รายการ</label>
                                            <select onchange="max_number_add(this)" id="select_list_add" name="select_list_add" class="form-select add_number" aria-label="Default select example" >
                                              <option value="" disabled selected>เสือกรายการที่ต้องการ</option>
                                              @foreach ($data[0] as $item)
                                                  <option class="select_option" id="{{$item->id}}" value="{{$item->balance_amount}}" title="{{$item->product_color}}" > {{$item->product_color}} , {{$item->product_size}} </option>
                                              @endforeach
                                            </select>
                                            

                                            <label for="number_add">จำนวน</label>
                                            
                                            <input id="number_add" type="number" class="form-control " name="number_add" />
                                            <input id="color_add" type="text" class="form-control " value=" " name="color_add" hidden />
                                            <input id="size_add" type="text" class="form-control " value=" " name="size_add" hidden />
                                            <input id="balance_add" type="text" class="form-control " value=" " name="balance_add" hidden />
                                            <input id="id_add" type="number" class="form-control " value=" " name="id_add" hidden />
                                            <br>
                                            <p id="balance_show_add" ></p>
                                            
                                            <script>

                                              function max_number_add(select){
                                                  var e = document.getElementById("select_list_add");
                                                 
                                                  document.getElementById('balance_show_add').innerHTML = "จำนวนคงเหลือ " + e.value + " ตัว ";
                                                //   console.log(e.value);
                                                  var t = select.options[select.selectedIndex].title;

                                                //   console.log(e.options[e.options.selectedIndex].id);

                                                  var numSize = e.textContent
                                                //   console.log(t);
                                                //   console.log(e.textContent[numSize.length-2]);
                                                  document.getElementById('color_add').value = select.options[select.selectedIndex].title;
                                                  document.getElementById('size_add').value = e.textContent[numSize.length-2];
                                                  document.getElementById('id_add').value = e.options[e.options.selectedIndex].id;
 
                                              }
                                              

                                            </script>

                                        </div>
                                        
                                       
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                                            <button   type="submit" class="btn btn-primary" >ยืนยัน</button> 
                                        </div>
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                  </div>
                </form>
              
                @endcan

                <a href="#"  class="btn btn-danger col text-center" data-toggle="modal" data-target="#removeModal">ลดจำนวนสินค้า</a>
                <form method="POST" id="delete_form" action="{{ route('products.update',$data[4]) }}"   enctype="multipart/form-data">
                  <div class="modal fade " id="removeModal" tabindex="-1" role="dialog" aria-labelledby="removeModal" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">ลดจำนวนสินค้า</h5>
                                    <button type="button"  class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="userEditForm"  action="#" >
                                        @csrf
                                        @method('PUT')
                                        {{-- @method('PUT') --}}
                                        <div class="form-group">

                                            <label for="select_list_delete">รายการ</label>
                                            <select onchange="max_number_delete(this)" id="select_list_delete" name="select_list_delete" class="form-select remove_number" aria-label="Default select example" >
                                              <option value="" disabled selected>เสือกรายการที่ต้องการ</option>
                                              @foreach ($data[0] as $item)
                                                  <option class="select_option" id="{{$item->id}}" value="{{$item->balance_amount}}" title="{{$item->product_color}}" > {{$item->product_color}} , {{$item->product_size}} </option>
                                              @endforeach
                                            </select>
                                            

                                            <label for="number_delete">จำนวน</label>
                                            
                                            <input id="number_delete" type="number" class="form-control " name="number_delete" max="0" />
                                            <input id="color_delete" type="text" class="form-control " value=" " name="color_delete" hidden />
                                            <input id="size_delete" type="text" class="form-control " value=" " name="size_delete" hidden />
                                            <input id="balance_delete" type="text" class="form-control " value=" " name="balance_delete" hidden />
                                            <input id="id_delete" type="number" class="form-control " value=" " name="id_delete" hidden />
                                            <br>
                                            <p id="balance_show_delete" ></p>
                                            
                                            <script>

                                              
                                              function max_number_delete(select){
                                                  var e = document.getElementById("select_list_delete");
                                                  
                                                  document.getElementById('number_delete').max  = e.value ;
                                                  document.getElementById('balance_show_delete').innerHTML = "จำนวนคงเหลือ " + e.value + " ตัว ";
                                                //   console.log(e.value);
                                                  var t = select.options[select.selectedIndex].title;

                                                //   console.log(e.options[e.options.selectedIndex].id);

                                                  var numSize = e.textContent
                                                //   console.log(t);
                                                //   console.log(e.textContent[numSize.length-2]);
                                                  document.getElementById('color_delete').value = select.options[select.selectedIndex].title;
                                                  document.getElementById('size_delete').value = e.textContent[numSize.length-2];
                                                  document.getElementById('id_delete').value = e.options[e.options.selectedIndex].id;
                                                 
                                                 
                                                  
                                              }
                                              

                                            </script>

                                        </div>
                                        
                                       
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                                            <button   type="submit" class="btn btn-primary" >ยืนยัน</button> 
                                        </div>
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                  </div>
                </form>
                

              </div>
          </div>
        </div>
          
        
        <div class="col-xl-6 col-lg-6 col-sm-12 ">     
          
            <label>จำนวนคงเหลือทั้งหมด {{$data[2]}} ตัว</label>
            
            <table class="table table-success ">
              <thead>
                <tr>
                  
                  <th scope="col">สีของสินค้า</th>
                  <th scope="col">ไซด์</th>
                  <th scope="col">จำนวนคงเหลือ</th>
                  
                </tr>
              </thead>
             
              <tbody>
                @foreach ($data[0] as $key=>$item)
                <tr>
                  
                  <td>{{$item->product_color}}</td>
                  <td>{{$item->product_size}}</td>
                  <td>{{$item->balance_amount}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <label  style="display: block;text-align: right">จำนวนเดิมทั้งหมด {{$data[1]}} ตัว</label>
          
          
        </div>
                      
                      
                   
           
      
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
        $("#btnRemove").click(function () {
            var name_color = document.getElementById("product_color2").value
            var product_value = document.getElementById("product_color_value2").value
            $("#list2").append(" <tr id='"+count_color+"' scope='row' > "+ 
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
