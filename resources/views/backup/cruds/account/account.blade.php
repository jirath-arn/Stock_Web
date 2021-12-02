@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card" >
                <div class="card-header">{{ __('Account ในระบบทั้งหมด') }}</div>
                <div id="table_account"  class="card-body" style="width:100%;  height:400px; overflow-y: scroll; ">
                    <div class="table">

                        <table class="table table-bordered table-striped mb-0">
                          <thead>
                            <tr>
                              
                              <th scope="col">ชื่อผู้ใช้</th>
                              <th scope="col">อีเมล</th>
                              <th scope="col">บทบาท</th>
                              <th scope="col">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            
                            @for ($i = 0; $i < 20; $i++)
                                
                                @php
                                    $firstname = array(
                                        'Johnathon',
                                        'Anthony',
                                        'Erasmo',
                                        'Raleigh',
                                        'Nancie',
                                        'Tama',
                                        'Camellia',
                                        'Augustine',
                                        'Christeen',
                                        'Luz',
                                        'Diego',
                                        'Lyndia',
                                        'Thomas',
                                        'Georgianna',
                                        'Leigha',
                                        'Alejandro',
                                        'Marquis',
                                        'Joan',
                                        'Stephania',
                                        'Elroy',
                                        'Zonia',
                                        'Buffy',
                                        'Sharie',
                                        'Blythe',
                                        'Gaylene',
                                        'Elida',
                                        'Randy',
                                        'Margarete',
                                        'Margarett',
                                        'Dion',
                                        'Tomi',
                                        'Arden',
                                        'Clora',
                                        'Laine',
                                        'Becki',
                                        'Margherita',
                                        'Bong',
                                        'Jeanice',
                                        'Qiana',
                                        'Lawanda',
                                        'Rebecka',
                                        'Maribel',
                                        'Tami',
                                        'Yuri',
                                        'Michele',
                                        'Rubi',
                                        'Larisa',
                                        'Lloyd',
                                        'Tyisha',
                                        'Samatha',
                                    );

                                    $lastname = array(
                                        'Mischke',
                                        'Serna',
                                        'Pingree',
                                        'Mcnaught',
                                        'Pepper',
                                        'Schildgen',
                                        'Mongold',
                                        'Wrona',
                                        'Geddes',
                                        'Lanz',
                                        'Fetzer',
                                        'Schroeder',
                                        'Block',
                                        'Mayoral',
                                        'Fleishman',
                                        'Roberie',
                                        'Latson',
                                        'Lupo',
                                        'Motsinger',
                                        'Drews',
                                        'Coby',
                                        'Redner',
                                        'Culton',
                                        'Howe',
                                        'Stoval',
                                        'Michaud',
                                        'Mote',
                                        'Menjivar',
                                        'Wiers',
                                        'Paris',
                                        'Grisby',
                                        'Noren',
                                        'Damron',
                                        'Kazmierczak',
                                        'Haslett',
                                        'Guillemette',
                                        'Buresh',
                                        'Center',
                                        'Kucera',
                                        'Catt',
                                        'Badon',
                                        'Grumbles',
                                        'Antes',
                                        'Byron',
                                        'Volkman',
                                        'Klemp',
                                        'Pekar',
                                        'Pecora',
                                        'Schewe',
                                        'Ramage',
                                    );

                                    $role_array = array('Admin', 'User');

                                    $name = $firstname[rand ( 0 , count($firstname) -1)];
                                    $name .= ' ';
                                    $name .= $lastname[rand ( 0 , count($lastname) -1)];    
                                    $role = $role_array[rand ( 0 , count($role_array) -1)]; 
                                @endphp
                                <tr>
                                    
                                    <td>{{$name}}</td>
                                    <td>{{strtolower($role)}}_{{ substr($name,0,strpos($name,' '))}}@admin.com</td>
                                    <td>{{$role}}</td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-outline-primary"  >
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                                <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"></path>
                                            </svg>
                                        </a>
                                        <a href="#"class="btn btn-sm btn-danger" >
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash "  viewBox="0 0 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                                
                            @endfor
                            
                            
                          </tbody>
                        </table>
                      
                      </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">{{ __('เพิ่ม Account') }}</div>

                <div class="card-body" style="width:100%;  height:400px;">
                    <form method="POST" >
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('ชื่อผู้ใช้') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('อีเมล') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('รหัสผ่าน') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('ยืนยันรหัสผ่าน') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="role_id" class="col-md-4 col-form-label text-md-right">{{ __('บทบาท') }}</label>
                            <div class="col-md-6">
                                <select  id="role_id" name="role_id" class="form-select">
                                    <option value="1">ผู้ดูแล ( Admin )</option>
                                    <option value="2">พนักงาน ( User )</option>
                                    {{-- <option value="1">Admin</option> --}}
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection
