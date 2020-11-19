@extends ('templates.admin.master')
@section('title')
Sửa
@stop
@section('content')
@php
    
    

@endphp

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Thêm user</h4>
                            </div>
                            <div class="content">
                                <form action="{{route('admin.users.add')}}" method="post" enctype="mu" >
                                    @csrf 
                                    <!-- lấy dữ liệu của form -->
                                   
                                    <div class="row">
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Họ tên</label>
                                                <input type="text" name="fullname" class="form-control border-input" placeholder="Họ tên" value="">
                                            </div>
                                            @error('fullname')
                                            <div class="alert">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        
                                    </div>
                                    <div class="row">
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" name="username" class="form-control border-input" placeholder="Username" value="">
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
                                            @error('password')
                                            <div class="alert">{{ $message }}</div>
                                            @enderror
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