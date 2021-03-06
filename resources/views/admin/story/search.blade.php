@extends ('templates.admin.master')
@section('title')
Story || Search
@stop
@section('content')
    
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Danh sách truyện</h4>
                                <p class="category success">
                                    
                                </p>
                                <form action="{{route('admin.story.search')}}" method="post">
                                    @csrf
                                	<div class="row">
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <input type="text" name="story_id" class="form-control border-input" value="{{$req->story_id}}"  placeholder="ID">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="text" name="name" class="form-control border-input" placeholder="Họ tên" value="{{$req->name}}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <select name="cat" class="form-control border-input">
                                                    <option  value="">--Chọn danh mục--</option>
                                                    @foreach ($leftbar as $cat)
                                                    @php
                                                    $select='';
                                                    if( $cat->cat_id==$req->cat)
                                                    {
                                                        $select='selected';
                                                    }
                                                    @endphp
                                                	<option {{$select}} value="{{$cat->cat_id}}">{{$cat->name}}</option>
                                                    
                                                    @endforeach
                                                	<option  value="">--Không chọn--</option>
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
                                
                                <a href="{{route('admin.story.add')}}" class="addtop"><img src="/public/templates/admin/assets/img/add.png" alt="" /> Thêm</a>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                        <th>ID</th>
                                    	<th>Tên truyện</th>
                                        <th>Hình ảnh</th>
                                    	<th>Preview</th>
                                        <th>Counter</th>
                                    	<th>Danh mục</th>
                                        <th>Ngày tạo</th>
                                        <th>Chức năng</th>
                                    </thead>
                                    <tbody>
                                        @foreach($items as $item)
                                        @php
                                            $id = $item->story_id;
                                            $name = $item->name;
                                            $preview= $item->preview_text;
                                            $picture='/storage/app/files/'.$item->picture;
                                            $counter=$item->counter;
                                            $cname=$item->cname;
                                            $created_at=$item->created_at;
                                            $curentPage = $items->currentPage();
                                            $urlEdit=route('admin.story.edit',[$curentPage,$id]);
                                            $urlDel=route('admin.story.del',[$curentPage,$id]);
                                        @endphp
                                        <tr>
                                        	<td>{{$id}}</td>
                                        	<td><a href="{{ $urlEdit }}">{{$name}}</a></td>
                                        	<td><img src="{{$picture}}" width="60px" height="60px"></td>
                                        	<td>{{$preview}}</td>
                                            <td>{{$counter}}</td>
                                            <td>{{$cname}}</td>
                                            <td>{{$created_at}}</td>
                                        	
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
                                    
								    {{ $items->links() }}
                                    
								</div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
@stop
        