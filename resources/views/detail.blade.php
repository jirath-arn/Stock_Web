@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-4 col-lg-4 col-sm-12 " >            
          <div class="card" style="">
             
            @foreach ($data[3] as $item)
                <img class="card-img-top" src="/img/test-shirt/{{$item->filename}}"    alt="Card image cap">
            @endforeach
            
            
              <div class="card-body ">
                @can('product_add')
                <a href="#" class="btn btn-primary col text-center my-1 " data-toggle="modal" data-target="#addModal" >เพิ่มจำนวนสินค้า</a>
                <div class="modal fade " id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content " >
                      <div class="modal-header">
                        
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="form-group row">
                          <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('เพิ่มสีของสินค้า') }}</label>
                          <div class="col-md-12">
                            
                              สี: 
                              <select class="form-control btn btn-secondary" id="product_color" name="product_color">
                                <option class="text-secondary" value="" disabled selected>เลือกสีที่ต้องการ </option>
                                <option>สีแดง</option > 
                                <option>สีเหลือง</option >
                                <option>สีดำ</option >
                                <option>สีชมพูอ่อน</option>
                                <option>สีเนื้อ</option >
                                <option>สีม่วง</option >
                              </select>
                              จำนวน: <input id="product_color_value" type="number" class="form-control " name="product_color_value"  >
  
                              <input type="button" class="btn btn-success" id = "btnAdd" value = "เพิ่มสี" />
  
                          </div>
                          <label for="list" class="col-md-4 col-form-label text-md-right">{{ __('สีทั้งหมด:') }}</label>
                            
                          <div class="col-md-12">
                              <table id="list" class="table" style="width:100%">
                                      <thead>
                                          <tr>
                                              <th scope="col" >สี</th>
                                              <th scope="col" >จำนวน(ตัว)</th>
                                              
                                          </tr>
                                      </thead>
                                      <tbody>
                                      </tbody>
                              </table>
                          </div>
                        
                        </div>
                      </div>
                      
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                        <button type="button" class="btn btn-primary">บันทึก</button>
                      </div>
                    </div>
                  </div>
                </div>
                @endcan

                <a href="#" class="btn btn-danger col text-center" data-toggle="modal" data-target="#removeModal">ลดจำนวนสินค้า</a>
                <div class="modal fade" id="removeModal" tabindex="-1" role="dialog" aria-labelledby="removeModal" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="form-group row">
                          <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('ลดสีของสินค้า') }}</label>
                          <div class="col-md-12">
                            
                              สี: 
                              <select class="form-control btn btn-secondary" id="product_color2" name="product_color2">
                                <option class="text-secondary" value="" disabled selected>เลือกสีที่ต้องการ </option>
                                <option>สีแดง</option > 
                                <option>สีเหลือง</option >
                                <option>สีดำ</option >
                                <option>สีชมพูอ่อน</option>
                                <option>สีเนื้อ</option >
                                <option>สีม่วง</option >
                              </select>
                              จำนวน: <input id="product_color_value2" type="number" class="form-control " name="product_color_value2"  >
  
                              <input type="button" class="btn btn-success" id = "btnRemove" value = "เพิ่มสี" />
  
                          </div>
                          <label for="list2" class="col-md-4 col-form-label text-md-right">{{ __('สีทั้งหมด:') }}</label>
                            
                          <div class="col-md-12">
                              <table id="list2" class="table" style="width:100%">
                                      <thead>
                                          <tr>
                                              <th scope="col" >สี</th>
                                              <th scope="col" >จำนวน(ตัว)</th>
                                              
                                          </tr>
                                      </thead>
                                      <tbody>
                                      </tbody>
                              </table>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                        <button type="button" class="btn btn-primary">บันทึก</button>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
          </div>
        </div>
          
        
        <div class="col-xl-8 col-lg-8 col-sm-12 ">     
          
            <label>จำนวนคงเหลือทั้งหมด {{$data[2]}} ตัว</label>
            
            <table class="table table-success ">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">สีของสินค้า</th>
                  <th scope="col">ไซด์</th>
                  <th scope="col">จำนวนคงเหลือ</th>
                  
                </tr>
              </thead>
              <tbody>
                @foreach ($data[0] as $key=>$item)
                <tr>
                  <th scope="row">{{$key+1}}</th>
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
