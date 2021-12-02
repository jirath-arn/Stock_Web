@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-6">
            <h2>หมวดหมู่ใหม่</h2>

            <form class="mt-3" method="POST" action="{{route('categories.store')}}" enctype="multipart/form-data" >
                    @csrf

                <div class="form-group row" >
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('ชื่อหมวดหมู่') }}</label>
                    <div class="col-md-6">
                        <input id="category_name" type="text" class="form-control " name="category_name" value="{{ old('category_name') }}" >
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-success">
                            {{ __('สร้างหมวดหมู่ใหม่') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
        
        <div class="col-6 mt-5">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                        <th scope="col">ชื่อหมวดหมู่</th>
                        <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key => $item )
                            <tr>
                                <th scope="col">{{$key+1}}</th>
                                <td>{{$item->title}} </td>
                                <td>
                                    <a href="{{route('categories.edit', $item->id)}}" class="btn btn-sm btn-outline-primary"  >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                            <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"></path>
                                        </svg>
                                        แก้ไข
                                    </a>
                                    <a href="#"class="btn btn-sm btn-danger" >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash "  viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                     @endforeach 
                  
                </tbody>
              </table>
        </div>
</div>


@endsection
