
<div class="leftpanel">
<h2>Danh mục truyện</h2>

<ul>
	@php
	$uri = Request::fullUrl();
	$active='';
	@endphp
	@foreach($leftbar as $cat)
	@php
	$slug = Str::slug($cat->name);

	$urlCat=route('cnews.news.cat',[$slug,$cat->cat_id]);
		 if ( strpos($uri,$slug) !== false ){
            // dd(strpos($uri,$slug)) ;     
            $active = ' style="color:red "';
        }
        else{
       
            $active ='';
        }
	@endphp
	<li {{$active}}><a   href="{{$urlCat}}">{{$cat->name}}</a></li>
	@endforeach

</ul>

</div>