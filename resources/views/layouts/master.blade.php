<!-- resources/views/layouts/master.blade.php-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    @yield('css')
</head>
<body id="app-layout">
	<div>
		@yield('header')
	</div>
	<div>
	    @yield('content')
	</div>
	<div>
		@yield('footer')
	</div>
	@yield('script')
</body>
</html>