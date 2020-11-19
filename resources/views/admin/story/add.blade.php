@extends ('templates.admin.master')
@section('title')
Thêm truyện
@stop
@section ('ckfinder')
<script type="text/javascript">
    /* editor1 laf id cuar textarea ma chung ta muon chen ckfinder */
    CKEDITOR.replace( 'editor1',

    {

    filebrowserBrowseUrl: '/public/libraries/ckfinder/ckfinder.html',

    filebrowserImageBrowseUrl: '/public/libraries/ckfinder/ckfinder.html?type=Images',

    filebrowserUploadUrl: '/public/libraries/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',

    filebrowserImageUploadUrl: '/public/libraries/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'

    });

</script>
@stop
@section('content')


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Thêm truyện</h4>
                            </div>
                            <div class="content">
                                <form action="" method="post" enctype="multipart/form-data">
                                    @csrf 
                                    <!-- lấy dữ liệu của form -->
                                   
                                    <div class="row">
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tên truyện</label>
                                                <input type="text" name="name" class="form-control border-input" placeholder="Tên truyện" value="@if(isset($req->name)){{$req->name}}@endif">
                                            </div>
                                            @error('name')
                                            <div class="alert">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        
                                    </div>
                                    <div class="row">
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Hình ảnh</label>
                                                <input type="file" name="picture" >
                                            </div>
                                            @error('picture')
                                            <div class="alert">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                    <select name="cat" class="form-control border-input">
                                                        <option value="0">--Chọn danh mục--</option>
                                                        @foreach($leftbar as $cat)

                                                        
                                                        <option value="{{$cat->cat_id}}">{{$cat->name}}</option>
                                                        
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @error('cat')
                                            <div class="alert">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Preview</label>
                                                <input type="text" name="preview" class="form-control border-input" placeholder="Preview truyện" value="@if(isset($req->preview)){{$req->preview}}@endif">
                                            </div>
                                            @error('preview')
                                            <div class="alert">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        
                                    </div>
                                   
                                     <div class="row">
                                        
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Chi tiết</label>
                                                <textarea class="ckeditor" id="editor1" name="detail"></textarea> 
                                            </div>
                                            @error('detail')
                                            <div class="alert">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        
                                    </div>
                                    <div class="row">
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Counter</label>
                                                <input type="text" name="counter" class="form-control border-input"  value="@if(isset($req->counter)){{$req->counter}}@endif">
                                            </div>
                                            @error('counter')
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