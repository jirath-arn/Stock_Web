@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="container-xl">
            <div class="row">
                <div class="col-md-12">

                    <h3>
                        <b class="" style="color:black; margin: auto; ">{{"ประวัติของระบบ"}}</b>
                        <i class="bi bi-clock-history"></i>

                    </h3>
                    <div class="row">
                        <div class="col-xl-8 col-lg-8 col-sm-6 "></div>
                        <div class="col-xl-4 col-lg-4 col-sm-6 ">
                       
                            <input type="text" id="search" class="form-control " onkeyup="Search()"
                                placeholder="ค้นหา ประวัติการทำงาน" title="ค้นหา">
                                

                        </div>
                    </div>

                    <div id="table1" class="mt-3"
                        style=" width: 100%; margin: auto; height: 400px; overflow-y: scroll; border-style: solid; border-width: medium;">
                        <div class="col" style=" margin: auto;">
                            @foreach ($historyTransaction as $key => $history)
                                <p class="chip">

                  

                                    <i>{{$history->detail}}</i>

                                    <br>
                                    <i>{{ __('วันที่') }} {{ $history->created_at }} {{ __('น.') }}</i>
                                </p>
                            @endforeach
                        </div>
                    </div>
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
      ul = document.getElementById("table1");
      li = ul.getElementsByTagName("p");
      
      // Loop through all list items, and hide those who don't match the search query
      for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("i")[0];
        
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