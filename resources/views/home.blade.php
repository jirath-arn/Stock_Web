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
                            @foreach ($data[2] as $item)
                                <button class="btn btn-secondary" onclick="filterSelection('{{$item->title}}')"> {{$item->title}}</button>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-3 ">
                        <input type="text" id="search" class="form-control" onkeyup="Search()" placeholder="ค้นหา รหัสสินค้า" title="ค้นหา">
                    </div>
                    
                </div>
                
                <div id="listProduct"  class="row d-flex mt-5" >

                     @foreach ($data[0] as $key=>$item)
                            <div class="filterDiv card col-xl-3 col-lg-4 col-sm-6  {{$item->category->title}}">
                                <div class="card-body">                        
                                    <a  href="{{ route('products.show', $item->code_name) }}">
                                        {{-- <img class="card-img-top" src="/img/test-shirt/{{$data[3][$key]}}"  height="220px"   > --}}
                                        <img class="card-img-top" src="/img/test-shirt/1.png"  height="220px"   >
                                    </a>
                                    <p class="mt-2" style="font-size: 16px;font-family: Sans-serif;font-style: normal;"> 
                                        <b>รหัส {{$item->code_name}}</b>
                                        <br>
                                        จำนวนคงเหลือ {{$data[1][$key]}} ตัว
                                       
                                    </p>
                                </div>

                                
                            </div>
                       
                    @endforeach
                    

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
