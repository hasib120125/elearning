<!DOCTYPE html>
<html lang="en">
	<head>
		<title>@yield('page-title', 'Login')</title>
		<meta charset="utf-8"/>
		<meta name="description" content="Place your description here">
		<meta name="keywords" content="Place your words here">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0">
		<meta name="author" content="">
		<!-- Custom CSS -->
    <link href="{{ asset('fonts/stylesheet.css') }}" rel="stylesheet">
		<link rel="stylesheet" href="{{ asset('css/style.css') }}">
		<link rel="stylesheet" href="{{ asset('css/responsive.css') }}" />
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="login-form-wrap">
			<div class="login-form-content">
				<div class="login-logo text-center">
					<a href="#"><img src="{{ asset('img/robi-airtel-logo-red.png') }}" alt="Robi Airtel" /></a>
					<span><img src="{{ asset('img/elearning.gif') }}" alt="etraining" style="width:400px"/></span>
				</div>
				@yield('content')
			</div>
		</div>

		@stack('scripts')
		<script>
		var timeout
		function refresh(){
			clearTimeout(timeout)
			timeout = setTimeout(() => {
				location.reload()
			}, {{ (config('session.lifetime')-10) * 60 * 1000 }})
		}
		refresh()
		document.addEventListener('click', refresh)
		// user nav dropdown
		document.getElementsByClassName('btn-login')[0].addEventListener('click', function(){
			document.getElementsByClassName('login-form')[0].classList.add('rotate');
		});

		</script>
	</body>
</html>
