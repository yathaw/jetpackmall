<!DOCTYPE html>
<html>
<head>
	<title> Access Denied </title>
	<!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-light">

	<div class="container mt-5">

		<div class="row">
			<div class="col-12 mb-5 text-center">
				<h1 class="display-1 mt-5"> 403 </h1>

				<h1> Access Denied / Forbidden  </h1>


			</div>

			

			<div class="col-7 p-5">


				<h2> You don't have permission to access request page. </h2>

				<a href="{{ route('index') }}" class="btn btn-secondary mt-5"> Go Back Home </a>
			</div>

			<div class="col-5">
				<img src="{{ asset('403.gif') }}" class="img-fluid">
			</div>
		</div>
	

		
		
	</div>
	
	

</body>
</html>