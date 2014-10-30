<!DOCTYPE html>
<html>
<head>
	<title>@yield('title', 'Administrator')</title>
	{{ admin_css('components/bootstrap/css/bootstrap.min.css') }}
</head>
<body>

	<div class="container">
		@yield('content')
	</div>

    {{ admin_js('js/jquery.min.js') }}
    {{ admin_js('components/bootstrap/js/bootstrap.min.js') }}
</body>
</html>