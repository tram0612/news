@extends ('templates.admin.master')
@section('title')
Sửa truyện
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
@php
    $id      =  $item->story_id;
    $name    =  $item->name;
    $picture =  $item->picture;
    $preview =  $item->preview_text;
    $detail  =  $item->detail_text;
    $counter =  $item->counter;
    $cid     =  $item->cid;
    $cname   =  $item->cname;
    $created_at=$item->created_at;
    

@endphp

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Sửa truyện</h4>
                            </div>
                            <div class="content">
                                <form action="" method="post" enctype="multipart/form-data">
                                    @csrf 
                                    <!-- lấy dữ liệu của form -->
                                   
                                    <div class="row">
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tên truyện</label>
                                                <input type="text" name="name" class="form-control border-input" placeholder="" value="{{ $name }}">
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
                                        </div>
                                        
                                        
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                    <select name="cat" class="form-control border-input">
                                                        @foreach($leftbar as $cat)

                                                        @php
                                                            $select='';
                                                            if( $cat->cat_id== $cid ){
                                                            $select='selected';
                                                        }
                                                        @endphp
                                                        <option {{$select}} value="{{$cat->cat_id}}">{{$cat->name}}</option>
                                                        
                                                        @endforeach
                                                    </select>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Preview</label>
                                                <input type="text" name="preview" class="form-control border-input" placeholder="" value="{{ $preview }}">
                                            </div>
                                        </div>
                                        
                                        
                                    </div>
                                   
                                     <div class="row">
                                        
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Chi tiết</label>
                                                <textarea class="ckeditor" id="editor1" name="detail">{{ $detail }}</textarea> 
                                                
                                            </div>
                                        </div>
                                        
                                        
                                    </div>
                                    <div class="row">
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Counter</label>
                                                <input type="text" name="counter" class="form-control border-input"  value="{{$counter}}">
                                            </div>
                                        </div>
                                        
                                        
                                    </div>
                                    <div class="row">
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Ngày tạo</label>
                                                <input type="text" name="created_at" class="form-control border-input"  value="{{$created_at}}">
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