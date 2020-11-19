@extends ('templates.admin.master')
@section('title')
Trang chủ danh mục
@stop
@section('content')

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Danh sách danh mục</h4>
                                <p class="category success">
                                    @if(Session::has('msg'))
                                    {{Session::get('msg')}}
                                    @else
                                        @if(Session::has('error'))
                                        {{Session::get('error')}}}
                                        @endif
                                    @endif
                                </p>
                                <form action="" method="post">
                                	<div class="row">
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <input type="text" name="id" class="form-control border-input" value=""  placeholder="ID">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="text" name="fullname" class="form-control border-input" placeholder="Họ tên" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <select name="friend_list" class="form-control border-input">
                                                	<option value="0">-- Chọn danh mục --</option>
                                                	<option value="1">Bạn quen thời phổ thông</option>
                                                	<option>Bạn quen thời đại học</option>
                                                	<option>Bạn tâm giao</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                        	<div class="form-group">
		                                        <input type="submit" name="search" value="Tìm kiếm" class="is" />
		                                        <input type="submit" name="reset" value="Hủy tìm kiếm" class="is" />
	                                        </div>
                                        </div>
                                    </div>
                                    
                                </form>
                                
                                <a href="{{route('admin.cat.add')}}" class="addtop"><img src="/public/templates/admin/assets/img/add.png" alt="" /> Thêm</a>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                        <th>ID</th>
                                    	<th>Tên danh mục</th>

                                    	<th>Chức năng</th>
                                    </thead>
                                    <tbody>
                                        @foreach($items as $item)
                                        @php
                                            $id = $item->cat_id;
                                            $name = $item->name;
                                            
                                            $urlEdit=route('admin.cat.edit',$id);
                                            $urlDel=route('admin.cat.del',$id);
                                        @endphp
                                        <tr>
                                        	<td>{{$id}}</td>
                                        	<td><a href="{{ $urlEdit }}">{{$name}}</a></td>
                                        	
                                        	
                                        	
                                        	<td>
                                        		<a href="{{ $urlEdit }}"><img src="/public/templates/admin/assets/img/edit.gif" alt="" /> Sửa</a> &nbsp;||&nbsp;
                                        		<a href="{{ $urlDel }}"><img src="/public/templates/admin/assets/img/del.gif" alt="" onclick="return confirm('Bạn có chắc chắn muốn xóa không?') "/> Xóa</a>
                                        	</td>
                                        </tr>
                                        @endforeach
                                        
                                    </tbody>
 
                                </table>

								<div class="text-center">
                                    <!--
                                        Hiển thị phân trang
                                    -->
								    

								</div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
@stop
        