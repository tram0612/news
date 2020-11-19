@extends ('templates.admin.master')
@section('title')
Sửa
@stop
@section('content')
@php
    $id = $item->id;
    $username = $item->username;
    $fullname = $item->fullname;
    

@endphp

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Sửa user</h4>
                            </div>
                            <div class="content">
                                <form action="" method="post" >
                                    @csrf 
                                    <!-- lấy dữ liệu của form -->
                                   
                                    <div class="row">
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Họ tên</label>
                                                <input type="text" name="fullname" class="form-control border-input" placeholder="Họ tên" value="{{ $fullname }}">
                                            </div>
                                        </div>
                                        
                                        
                                    </div>
                                    <div class="row">
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" name="username" class="form-control border-input" placeholder="Username" value="{{ $username }}">
                                            </div>
                                             @error('username')
                                            <div class="alert">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        
                                    </div>
                                    <div class="row">
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" name="password" class="form-control border-input"  value="">
                                            </div>
                                        </div>
                                        
                                        
                                    </div>

                                    
                                    
                                   
                                    
                                    
                                    <div class="text-center">
                                        <input type="submit" class="btn btn-info btn-fill btn-wd" value="Thực hiện" />
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>


       @stop