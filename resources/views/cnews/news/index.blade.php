@extends('templates.cnews.master')
@section('title')
Trang chủ tin tức
@stop

@section('content')
@php

@endphp
<div class="rightpanel">
					<div class="rightbody">
						<h1 class="title">Truyện hay
						</h1>
						<div class="items-new">
							<ul>
								@foreach($items as $item)
								@php
								$id=$item->story_id;
								$name=$item->name;
								$slug = Str::slug($name);
								$counter=$item->counter;
								$preview=$item->preview_text;
								$picture='/storage/app/files/'.$item->picture;
								$id=$item->story_id;
								$cid=$item->cid;
								$urlDetail=route('cnews.news.detail',[$slug,$id]);
								@endphp
								<li>
									<h2>
										<a class="count" data-id="{{$id}}"  href="{{$urlDetail}}"  title="">{{$name}} </a><p>    Lượt xem: {{$counter}}</p>
									</h2>
									<div  class="item">
										<a class="count" data-id="{{$id}}" href="{{$urlDetail}}"  title=""><img src="{{$picture}}" alt="" /></a>
										<p>{!!$preview!!}</</p>
										<div class="clr"></div>
									</div>
								</li>
								@endforeach
								
								
							</ul>
							
							<div class="text-center">
								<ul>
								{{$items->links()}}
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="clr"></div>
				
				@stop