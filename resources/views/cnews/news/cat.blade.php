@extends('templates.cnews.master')
@section('title')
Danh mục Cnews
@stop
@section('content')
<div class="rightpanel">
					<div class="rightbody">
						<h1 class="title"> {{$nameCat->name}}</h1>
						<div class="items-new">
							<ul>
								@foreach( $storiesCat as $story)
								@php
									$id = $story->story_id;
									$name=$story->name;
									$counter=$story->counter;
									$slug = Str::slug($name);
									$preview=$story->preview_text;
									$id=$story->story_id;
									$cid=$story->cid;
									$picture='/storage/app/files/'.$story->picture;
									$urlDetail=route('cnews.news.detail',[$slug,$id]);
								@endphp
								<li>
									<h2>
										<a class="count" data-id="{{ $id}}" href="{{$urlDetail}}" title="">{{$name}}</a><p>Lượt xem: {{$counter}}</p>
									</h2>
									<div class="item">
										<a class="count" data-id="{{ $id}}" href="{{$urlDetail}}" title=""><img src="{{$picture}}" alt="" /></a>
										<p>{{$preview}}</p>
										<div class="clr"></div>
									</div>
								</li>
								@endforeach
								
							<div class="text-center">
								{{ $storiesCat->links() }}
							</div>
						</div>
					</div>
				</div>
				<div class="clr"></div>
				@stop