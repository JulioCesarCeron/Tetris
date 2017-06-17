<html>
<head>
    <title> @yield('title') </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Material Design fonts -->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/icon?family=Material+Icons">

	<link rel="stylesheet" type="text/css" href="{{ secure_asset('css/app.css') }}">    
    
</head>


<body>
	@include('templates.navbar')
	@yield('content')


	<script src="{{ secure_asset('js/app.js') }}"></script>

	<script>
	    $(document).ready(function() {
	        // This command is used to initialize some elements and make them work properly
	        $.material.init();
	    });
	</script>

</body>
</html>