<!DOCTYPE html>
<html lang="en">
	<head>
		<title>eTraining</title>
		<meta charset="utf-8"/>
		<meta name="description" content="Place your description here">
		<meta name="keywords" content="Place your words here">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0">
		<meta name="author" content="">

		<!-- Custom CSS -->
		<link href="{{ asset('fonts/stylesheet.css') }}" rel="stylesheet">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/responsive.css" />

<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="janaojana-follow-wrap">
			<div class="janaojana-box door-box">
			<div class="door-box-wrap">
			<div class="door-box-content">
				<a href="/quiz" class="btn-big janaojana-btn">EXAM HALL</a>
				<p>{{ $quiz_description }}</p>
	  		</div>
	  		</div>
			</div>
			<div class="follow-box door-box">
<div class="door-box-wrap">
<div class="door-box-content">
				<a href="/follow" class="btn-big follow-btn">CLASSROOM</a>
				<p>{{ $follow_description}}</p>
	</div>
	</div>
			</div>
			<div class="clearfix"></div>
		</div>
		<script>

		items = document.getElementsByClassName('btn-big');
		for(var i = 0; i< items.length; i++){
			items[i].addEventListener('click', function(){
				this.parentElement.parentElement.classList.add('rotate');
			})
		}
		</script>
		<script type="text/javascript" src="{{asset('js/mux.js')}}"></script>
	</body>
</html>
