<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="/mainasset/css/bootstrap.min.css" rel="stylesheet">
	<link href="/mainasset/css/carousel.css" rel="stylesheet">
	<title>E-Kantin</title>
</head>
<body>

<x-topbarmain/>
<div class="py-3">
	@yield('content')
</div>

@stack('script')
<script src="/mainasset/js/bootstrap.bundle.min.js"></script>
</body>
</html>