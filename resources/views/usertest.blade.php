<!DOCTYPE html>
<html>
<head>
	<title> Welcome </title>
</head>
<body>
	
	<h1> Detail </h1>
	
    {{-- Backend --}}
	<label> Name: <?php echo $name; ?> </label> <br>
	<label> Position: {{ $position }} </label> <br>
	<label> City: {!! $city !!}  </label>


</body>
</html>