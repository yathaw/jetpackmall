<!DOCTYPE html>
<html>
<head>
	<title> Page Not Found </title>
	<!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body style="background-color: white">

	<div class="container mt-5">

		<div class="row">
			<div class="col-12 mb-5 text-center">
				<h1 class="display-1 mt-5"> 404 </h1>

				<h1> Oops!  </h1>


			</div>

			

			<div class="col-7 p-5">


				<h2> We can't seem to find the page you are looking for </h2>

				<a href="{{ route('index') }}" class="btn btn-secondary mt-5"> Go Back Home </a>
			</div>

			<div class="col-5">
				<img src="{{ asset('404.gif') }}" class="img-fluid">
			</div>
		</div>
	

		
		
	</div>
	
	

</body>
</html>