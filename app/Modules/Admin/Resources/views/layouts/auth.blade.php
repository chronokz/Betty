<!DOCTYPE html>
<html>
	<head>
        <meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
        <title>@yield('title', 'Administrator')</title>
		
		<!-- Stylesheets -->
		{{ admin_css('css/bootstrap.min.css') }}
		{{ admin_css('css/font-awesome.min.css') }}
		{{ admin_css('css/animate/animate.min.css') }}
		{{ admin_css('css/bootstrapValidator/bootstrapValidator.min.css') }}
		{{ admin_css('css/iCheck/all.css') }}
		{{ admin_css('css/style.css') }}
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
			{{ admin_js('vendor/html5shiv/html5shiv.js') }}
			{{ admin_js('vendor/respond/respond.min.js') }}
        <![endif]-->
	</head>
	<body class="login fixed">
		<div class="wrapper animated flipInY">
			<div class="logo"><a href="#"><i class="fa fa-bitcoin"></i> <span>Betty</span></a></div>
			
			@yield('content')
			
			<footer>
				Developed by chrono &copy; {{ date('Y') }}.
			</footer>
		</div>
		
        <!-- Javascript -->
        {{ admin_js('js/plugins/jquery/jquery-1.10.2.min.js') }}

        {{ admin_js('js/plugins/jquery/jquery-1.10.2.min.js') }}
        {{ admin_js('js/plugins/jquery-ui/jquery-ui-1.10.4.min.js') }}
		
		<!-- Bootstrap -->
        {{ admin_js('js/plugins/bootstrap/bootstrap.min.js') }}
		
		<!-- Interface -->
        {{ admin_js('js/plugins/pace/pace.min.js') }}
		
		<!-- Forms -->
        {{ admin_js('js/plugins/bootstrapValidator/bootstrapValidator.min.js') }}
        {{ admin_js('js/plugins/iCheck/icheck.min.js') }}
		
		<script type="text/javascript">
			//iCheck
			$("input[type='checkbox'], input[type='radio']").iCheck({
				checkboxClass: 'icheckbox_minimal',
				radioClass: 'iradio_minimal'
			});
			
			$(document).ready(function() {
				$('#loginform').bootstrapValidator({
					message: 'This value is not valid',
					fields: {
						username: {
							message: 'The username is not valid',
							validators: {
								notEmpty: {
									message: 'The username is required and can\'t be empty'
								}
							}
						},
						password: {
							validators: {
								notEmpty: {
									message: 'The password is required and can\'t be empty'
								}
							}
						}
					}
				});
			});
		</script>
    </body>
</html>