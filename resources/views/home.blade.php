@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            
            <div class="container-wrap">
                <div class="row">
                    <div class="col-9"></div>
                    <div class="col-3 ">
                        <input type="text" id="search" class="form-control" onkeyup="Search()" placeholder="ค้นหา รหัสสินค้า" title="ค้นหา">
                    </div>
                    
                </div>
                
                <div id="listProduct" class="row no-gutters d-flex mt-5">
                     {{-- @foreach ($data[0] as $item)  --}}
                        {{-- @if ($item->status_approve == true) --}}
                        @for ($i = 0; $i < 4; $i++)
                            <div class="card col-3 " id="card">
                                
                                <div class="card-body">
                                    <a href="/detail"><img class="card-img-top" src="/img/test-shirt/{{$i+1}}.png"  alt="Card image cap"></a>
                                    
                                    <p class="mt-2" style="font-size: 16px;font-family: Sans-serif;font-style: normal;">
                                        
                                        <b>รหัส {{$i+1}}</b>
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
