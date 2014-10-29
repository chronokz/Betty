<!DOCTYPE html>
<html>
<head>
	<title>@yield('title', 'Administrator')</title>
	{{ admin_style('components/bootstrap/css/bootstrap.min.css') }}
</head>
<body>

	<div class="container">
		@yield('content')
	</div>

    {{ admin_script('js/jquery.min.js') }}
    {{ admin_script('components/bootstrap/js/bootstrap.min.js') }}
</body>
</html>