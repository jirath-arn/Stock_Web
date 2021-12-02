@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="container-wrap">
                <div class="row">
                    <div class="col-9">
                        {{-- Categories Filter --}}
                        <div id="myBtnContainer">
                            <button class="btn active btn-primary" onclick="filterSelection('all')">
                                {{ __('ทั้งหมด')}}
                            </button>

                            @foreach ($categories as $key => $category)
                                <button class="btn btn-secondary" onclick="filterSelection('{{ $category->title }}')">
                                    {{ $category->title }}
                                </button>
                            @endforeach
                        </div>
                    </div>

                    {{-- Search --}}
                    <div class="col-3">
                        <input type="text" id="search" class="form-control" onkeyup="Search()" placeholder="ค้นหาสินค้า" title="ค้นหา">
                    </div>
                </div>

                @if(session()->has('message'))
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="alert alert-{{ session('alert') ?? 'info' }} alert-dismissible fade show" role="alert">
                                <strong>{{ session('header') }}</strong> {{ session('message') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                @endif

                {{-- List Product --}}
                <div id="listProduct" class="row d-flex mt-4">
                    @foreach ($products as $key => $product)
                        <div class="filterDiv card col-xl-3 col-lg-4 col-sm-6 mr-1 mt-2 {{ $product->category->title }}">
                            <div class="card-body">
                                <a href="{{ route('products.show', $product->code_name) }}">
                                    <img class="card-img-top" src="{{ $product->images[0]->mime.$product->images[0]->base64 }}" height="220px">
                                </a>
                                <p class="mt-2" style="font-size: 16px; font-family: Sans-serif; font-style: normal;">
                                    <b>{{ __('รหัส') }} {{ $product->code_name }} ({{ $product->product_name }})</b>
                                    <br>
                                    {{ __('จำนวนคงเหลือ') }} {{ number_format($products_balance[$product->code_name]) }} {{ __('ตัว') }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div> {{-- End List Product --}}
            </div>
        </div>
    </div>
</div>

<script type="application/javascript">
    $(document).ready(function() {
        // Show the alert.
        setTimeout(function() {
            $(".alert").alert('close');
        }, 5000);
    });
</script>

<script type="application/javascript">
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
            if (arr1.indexOf(arr2[i]) == -1) {
                element.className += " " + arr2[i];
            }
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