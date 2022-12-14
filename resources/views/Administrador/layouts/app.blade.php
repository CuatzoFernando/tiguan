<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Volkswagen</title>
		<!-- Tell the browser to be responsive to screen width -->
		<meta http-equiv="Content-Type: application/vnd.ms-fontobject" content="text/css; charset=UTF-8" />
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<!-- Bootstrap 3.3.7 -->
		<link href="{{ asset('css/app.css') }}" rel="stylesheet">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
		<link rel="stylesheet" href="{{ asset('fonts/fontawesome-webfont.eot') }}">
		<link rel="stylesheet" href="{{ asset('fonts/fontawesome-webfont.svg') }}">
		<link rel="stylesheet" href="{{ asset('fonts/fontawesome-webfont.ttf') }}">
		<link rel="stylesheet" href="{{ asset('fonts/fontawesome-webfont.woff') }}">
		<link rel="stylesheet" href="{{ asset('fonts/fontawesome-webfont.woff2') }}">
		<link rel="stylesheet" href="{{ asset('fonts/FontAwesome.otf') }}">
		<!-- Ionicons -->
		<link rel="stylesheet" href="{{ asset('css/ionicons.min.css') }}">
		<!-- Theme style -->
		<link rel="stylesheet" href="{{ asset('css/AdminLTE.min.css') }}">
		<!-- AdminLTE Skins. Choose a skin from the css/skins
		folder instead of downloading all of them to reduce the load. -->
		<link rel="stylesheet" href="{{ asset('css/_all-skins.min.css') }}">
		<link rel="stylesheet" href="{{asset('css/new.css')}}">

		<script src = "{{URL::asset('js/app.js') }}"></script>


	</head>
	<body class="hold-transition skin-blue sidebar-mini">
		<div class="wrapper">
			<header class="main-header">
				<!-- Logo -->
				<a href="{{url('/Administracion')}}" class="logo">
					<!-- mini logo for sidebar mini 50x50 pixels -->
					<span class="logo-mini"><b>V</b>W</span>
					<!-- logo for regular state and mobile devices -->
					<span class="logo-lg"><b>Volkswagen</b></span>
				</a>
				<!-- Header Navbar: style can be found in header.less -->
				<nav class="navbar navbar-static-top">
					<!-- Sidebar toggle button-->
					<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
						<span class="sr-only">Toggle navigation</span>
					</a>
					<div class="navbar-custom-menu">
						<ul class="nav navbar-nav">

							<!-- END notification navbar list-->
							<li class="dropdown user user-menu">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<img src="{{ asset('images/user.jpg') }}" class="user-image" alt="User Image">
									<span class="hidden-xs">{{Auth::user()->nombre}}</span>
								</a>
								<ul class="dropdown-menu">
									<!-- User image -->
									<li class="user-header">
										<img src="{{ asset('images/user.jpg') }}" class="img-circle" alt="User Image">
										<p>
											{{Auth::user()->nombre}}
										</p>
									</li>
									<!-- Menu Footer-->
									<li class="user-footer">
										<div class="pull-right">
											<a href="{{url('logout')}}" class="btn btn-default btn-flat"
												onclick="event.preventDefault();
											document.getElementById('logout-form').submit();">Salir</a>
											<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
												{{ csrf_field() }}
											</form>
										</div>
									</li>
								</ul>
							</li>
						</ul>
					</div>
				</nav>
			</header>
			<aside class="main-sidebar">
				<!-- sidebar: style can be found in sidebar.less -->
				<section class="sidebar">


					<ul class="sidebar-menu">
						<li class="header">APLICACI??N</li>
						<li class="treeview"><a href="{{url('/home' )}}"><i class="fa fa-home"></i><span>P??gina Principal</span></a></li>
						<li class="treeview"><a href="#" data-toggle="modal" data-target="#ManualAdminPDF">Manual</a></li>
					</ul>
					<ul class="sidebar-menu">
						<li class="header">ADMINISTRADOR</li>
						<li class="treeview"><a href="{{url('/Administracion' )}}"><i class="fa fa-tachometer fa-1x"></i><span>Panel de Control</span></a></li>
						<li class="treeview"><a href="{{url('/usuarios' )}}"><i class="fa fa-users"></i> <span>Usuarios</span></a></li>
						<li class="treeview"><a href="{{url('/roles' )}}"><i class="fa fa-user-plus"></i> <span>Roles</span></a></li>
						<li class="treeview"><a href="{{url('/permissions' )}}"><i class="fa fa-key"></i> <span>Permisos</span></a></li>
					</ul>


				</section>
				<!-- /.sidebar -->
			</aside>
			<div class="content-wrapper">
				@yield('content')
			</div>
		</div>
		<!-- Compiled and minified JavaScript -->
		<script src = "{{URL::asset('js/admin/appLTE.min.js') }}"></script>
		<script src = "{{URL::asset('js/admin/demo.js') }}"></script>
		<script> var baseURL = "{{ URL::to('/') }}"</script>
		<script src = "{{URL::asset('js/admin/AjaxisBootstrap.js') }}"></script>
		<script src = "{{URL::asset('js/admin/customA.js') }}"></script>
		<script src = "{{URL::asset('js/admin/crearAdmin.js') }}"></script>

	</body>
</html>


<!-- Modal -->
  <div class="modal fade" id="ManualAdminPDF" role="dialog">
    <div class="modal-dialog modal-lg">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <!--<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>-->
        </div>
        <div class="modal-body">
          <embed src="{{ asset('manual/manual_administrador.pdf') }}" type="application/pdf" width="100%" height="800px" />
        </div>
      </div>

    </div>
  </div>
