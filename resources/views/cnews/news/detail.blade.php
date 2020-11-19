@extends('templates.cnews.master')
@section('title')
Chi tiết tin Cnews
@stop

@section('content')

<div class="rightpanel">
					<div class="rightbody">
						@php
						$name=$item->name;
						$detail=$item->detail_text;
						$counter=$item->counter;
						@endphp
						<h1 class="title">{{$name}}</h1>
						<p style="font-size: 17px;">    Lượt xem: {{$counter}}</p>
						<div class="items-new">
							<div class="new-detail">
								{!!$detail!!}
							</div>
						</div>
						
						<h2 class="title" style="margin-top:30px;color:#BBB">Truyện liên quan</h2>
						<div class="items-new">
							<ul>
								
								@foreach($relatedItems as $r)
								@php
								$id=$r->story_id;
								$name=$r->name;
								$slug = Str::slug($name);
								$preview=$r->preview_text;
								$id=$r->story_id;
								$cid=$r->cid;
								$picture='/storage/app/files/'.$r->picture;
								$urlDetail=route('cnews.news.detail',[$slug,$id]);
								@endphp

								<li>
									<h2>
										<a class="count" data-id="{{$id}}" href="{{$urlDetail}}" title="{{$name}}">{{$name}}</a>
									</h2>
									<div class="item">
										<a class="count" data-id="{{$id}}" href="{{$urlDetail}}" title="{{$name}}"><img src="{{$picture}}" alt="{{$name}}"></a>
										<p>{!!$preview!!}</p>
										<div class="clr"></div>
									</div>
								</li>
								@endforeach
								
							</ul>
						</div>
					</div>
				</div>
				<div class="clr"></div>
				@stop