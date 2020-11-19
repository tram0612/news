<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>@yield('title')</title>
<meta name="description" content="Thiet ke website, dao tap lap trinh">
<meta name="keywords" content="hiet ke website, dao tap lap trinh">
<link href="/public/templates/cnews/css/style.css" rel="stylesheet" type="text/css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<style type="text/css">
	.text-center{
		display: block;
		text-align: center;
	}
	.text-center ul li{

		display: inline-block;
		width: 10px;
		height: 10px;
		border: 1px;
		padding: 4px;

		float:left;
		font-size: 20px;
		text-decoration: none;
		color:#000042;
	}
</style>
</head>
<body>
	<div class="main">
		<div class="page">
			<div class="header">
				<div class="header-img">
					<img src="/public/templates/cnews/images/header.jpg" alt="" width="800">
				</div>
				<div class="topmenu">
					<ul>
						<li><a href="{{route('cnews.index.index')}}">Trang chủ</a></li>
						<li><a href="{{route('cnews.news.index')}}">Tin tức</a></li>
					</ul>
				</div>
			</div>