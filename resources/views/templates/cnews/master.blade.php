@include('templates.cnews.header')
			<div class="content">
					@include('templates.cnews.leftpanel')
				<div class="rightpanel">
					@yield('content')
				</div>
			</div>
			@include('templates.cnews.footer')
