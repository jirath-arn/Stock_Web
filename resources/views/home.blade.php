@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            
            <div class="container-wrap">
                <div class="row">
                    <div class="col-9">
                        <div id="myBtnContainer">
                            <button class="btn active btn-primary" onclick="filterSelection('all')"> ทั้งหมด</button>
                            <button class="btn btn-info" onclick="filterSelection('เสื้อยืด')"> เสื้อยืด</button>
                            <button class="btn btn-info" onclick="filterSelection('กางเกง')"> กางเกง</button>
                        </div>
                    </div>

                    <div class="col-3 ">
                        <input type="text" id="search" class="form-control" onkeyup="Search()" placeholder="ค้นหา รหัสสินค้า" title="ค้นหา">
                    </div>
                    
                </div>
                
                <div id="listProduct" class="row no-gutters d-flex mt-5">
                    
                       
                       
                        <div class="filterDiv card col-3 เสื้อยืด" id="card">
                            <div class="card-body">
                                <a href="/detail"><img class="card-img-top" src="/img/test-shirt/5.jpg" height="220px"   alt="Card image cap"></a>
                                <p class="mt-2" style="font-size: 16px;font-family: Sans-serif;font-style: normal;"> 
                                    <b>รหัส {{1}} <b >เสื้อยืด</b></b>
                                    <br>
                                    จำนวนคงเหลือ {{50}} ตัว
                                </p>
                            </div>
                        </div>
                        
                        
                      
                     {{-- @foreach ($data[0] as $item)  --}}
                        {{-- @if ($item->status_approve == true) --}}
                        @for ($i = 0; $i < 4; $i++)
                            <div class="filterDiv card col-3 กางเกง" id="card">
                                <div class="card-body">
                                    <a href="/detail"><img class="card-img-top" src="/img/test-shirt/{{$i+1}}.png"  height="220px"   alt="Card image cap"></a>
                                    <p class="mt-2" style="font-size: 16px;font-family: Sans-serif;font-style: normal;"> 
                                        <b>รหัส {{$i+1}} <b >เสื้อยืด</b></b>
                                        <br>
                                        จำนวนคงเหลือ {{($i+1)*50}} ตัว
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

<script>
    filterSelection("all")
    function filterSelection(c) {
    var x, i;
    x = document.getElementsByClassName("filterDiv");
    if (c == "all") c = "";
    for (i = 0; i < x.length; i++) {
        w3RemoveClass(x[i], "show");
        if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
    }
    }

    function w3AddClass(element, name) {
    var i, arr1, arr2;
    arr1 = element.className.split(" ");
    arr2 = name.split(" ");
    for (i = 0; i < arr2.length; i++) {
        if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
    }
    }

    function w3RemoveClass(element, name) {
    var i, arr1, arr2;
    arr1 = element.className.split(" ");
    arr2 = name.split(" ");
    for (i = 0; i < arr2.length; i++) {
        while (arr1.indexOf(arr2[i]) > -1) {
        arr1.splice(arr1.indexOf(arr2[i]), 1);     
        }
    }
    element.className = arr1.join(" ");
    }


    function Search() {
      // Declare variables
    
      var input, filter, ul, li, a, i, txtValue;
      input = document.getElementById('search');
      filter = input.value.toUpperCase();
      ul = document.getElementById("listProduct");
      li = ul.getElementsByTagName('div');
    
      // Loop through all list items, and hide those who don't match the search query
      for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("b")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          li[i].style.display = "";
         
        } else {
          
          li[i].style.display = "none";
        }
      }
    }
</script>
@endsection
