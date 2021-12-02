@extends('layouts.app')

@section('content')
<div class="container  mt-5">
    <div class="row justify-content-center">
        <h2> เปลี่ยนรหัสผ่าน</h2>
        <div class="col-8 ">
           


            <div class="card p-3 mt-3 d-flex justify-content-center" style="width: 100%; height:200px;">
                <div class="d-flex align-items-center">
                    <div class="image"> 
                                <img src="https://www.americanaircraftsales.com/wp-content/uploads/2016/09/no-profile-img.jpg" style="width: 155px" alt="Image" > 
                    </div>

                    <div class="ml-3 w-100">
                        <h4 class=" mb-0 mt-0 text-success "><b>ชื่อผู้ใช้: {{ Auth::user()->name }}</b></h4><br>
                        <span  >อีเมล : {{ Auth::user()->email }}</span><br>
                        <span  >รหัสผ่าน : *********</span>
                    </div>
                                   
                    <!-- Write Review Form  -->
                    <br>
                                

                                
                    <!-- Modal -->
                    <a href="#" class="btn btn-outline-primary col text-center mt-3" data-toggle="modal" data-target="#editPasswordModal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                            <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                        </svg>    
                    </a>
                    <form action="" method="POST" id="delete_form" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
        
                        {{-- Reduce Modal --}}
                        <div class="modal fade" id="editPasswordModal" tabindex="-1" role="dialog" aria-labelledby="editPasswordModal" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">{{ __('เปลี่ยนรหัสผ่าน') }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
        
                                    <div class="modal-body">
                                        <div class="form-group">
                                            {{-- New Password --}}
                                            <label for="select_list_reduce">{{ __('รหัสผ่าน') }}</label>
                                            <br>
                                            <input id="password" type="password" class="form-control " name="password"  required />
                                        </div>
        
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('ยกเลิก') }}</button>
                                            <button type="submit" class="btn btn-primary">{{ __('ยืนยัน') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>            
                    </form>
                </div>
            </div>
        </div>  
        
    </div>
</div>
@endsection
