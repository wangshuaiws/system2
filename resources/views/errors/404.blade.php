<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" />

</head>
<body>
	<div id="main">
		<!-- header -->
		<div id="header">
			<h1>We bet this is not what you expected to see here!<span>404 error - not found.</span></h1>
		</div>
		<!-- content -->
		<div id="content">
			<ul class="nav">
         	<li class="home"><a href="{{ url('/home') }}">Home Page</a></li>
            <li class="search"><a href="javascript:window.location.reload()">Refresh</a></li>
         </ul>
         <p>Ok, stop now and think about what you're doing. The page you're looking for just doesn't exist, ok? Go to our <a href="{{ url('/home') }}">homepage</a>or try To <a href="javascript:window.location.reload()">Refresh</a> this page</p>
         <h2>Happy Halloween!</h2>
		</div>
		<!-- footer -->
	</div>
</body>
</html>