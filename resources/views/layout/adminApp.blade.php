<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js" lang=""> <!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
	{{-- TITLE AND ICON --}}
	<title>Dog Adoption Admin</title>
	<link rel="icon" href={{asset("image/paw.ico")}}>
	{{-- END --}}
<meta name="description" content="Sufee Admin - HTML5 Admin Template">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="apple-touch-icon" href="apple-icon.png">
<link rel="shortcut icon" href="favicon.ico">

<link rel="stylesheet" href="css/normalize.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/themify-icons.css">
<link rel="stylesheet" href="css/flag-icon.min.css">
<link rel="stylesheet" href="css/cs-skin-elastic.css">
<!-- <link rel="stylesheet" href="css/bootstrap-select.less"> -->
<link rel="stylesheet" href="scss/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

<!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

{{-- FOR UPLOAD PIC --}}
<style type="text/css">
    .gallery{
        overflow: auto;
        text-align: center;
        width: 100%;
    }
</style>
{{-- END --}}

</head>
<body>

	<!-- Left Panel -->

	<aside id="left-panel" class="left-panel">
	<nav class="navbar navbar-expand-sm navbar-default">

	<div class="navbar-header">
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
	    <i class="fa fa-bars"></i>
	</button>
	{{-- <a class="navbar-brand" href="./"><img src="images/logo.png" alt="Logo"></a>
	<a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a> --}}
	<a class="navbar-brand" href="/adminDashboard">DOGS</a>
	<a class="navbar-brand hidden" href="/adminDashboard">D</a>
	</div>

	<div id="main-menu" class="main-menu collapse navbar-collapse">
	<ul class="nav navbar-nav">
	    <li>
	        <a href="/adminDashboard"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
	    </li>
	    <h3 class="menu-title">Dog Adoption</h3><!-- /.menu-title -->
	    <li class="menu-item-has-children dropdown">
	        <li>
	            <a href="/adminDogs"> <i class="menu-icon fa fa-paw"></i>Dogs for Adoption</a>
	        </li>
	        <li>
	            <a href="/adminAdoptionRequest"> <i class="menu-icon fa fa-file-text"></i>Adoption Request </a>
	        </li>
	    </li>


	    <h3 class="menu-title">Messages</h3><!-- /.menu-title -->
		<li>
			<a href="/adminMissingReports"> <i class="menu-icon fa fa-exclamation-circle"></i>Missing Reports </a>
		</li>

	    <li>
	        <a href="/adminStrayReports"> <i class="menu-icon fa fa-envelope"></i>Stray Reports</a>
	    </li>
		
	    <h3 class="menu-title">Account</h3><!-- /.menu-title -->

	    <li>
	        <a href="/adminAccountSettings"> <i class="menu-icon fa fa-gear"></i>Account Settings </a>
	    </li>
	    <li>
	        <a href=""> <i class="menu-icon fa fa-sign-out"></i>Logout </a>
	    </li>

	</ul>
	</div><!-- /.navbar-collapse -->
	</nav>
	</aside><!-- /#left-panel -->

	<!-- Left Panel -->

@yield('content')

<!-- jQuery (Necessary for All JavaScript Plugins) -->
<script src="js/jquery/jquery-2.2.4.min.js"></script>
<!-- Popper js -->
<script src="js/popper.min.js"></script>
<!-- Bootstrap js -->
<script src="js/bootstrap.min.js"></script>
<!-- Plugins js -->
<script src="js/plugins.js"></script>
<!-- Classy Nav js -->
<script src="js/classy-nav.min.js"></script>
<!-- Active js -->
<script src="js/active.js"></script>

<script src="js/vendor/jquery-2.1.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/main.js"></script>

</body>
</html>