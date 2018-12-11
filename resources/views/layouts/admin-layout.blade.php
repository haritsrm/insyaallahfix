<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin | PTIPD</title>
	<link rel="shortcut icon" type="image/png" href="http://uinsgd.ac.id/wp-content/uploads/2017/12/logo_uin2-e1521272551439.png"/>
	
	<link rel="stylesheet" href="/css/style.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- Core JS files -->
	<script type="text/javascript" src="/assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="/assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="/assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="/assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="/assets/js/plugins/notifications/bootbox.min.js"></script>
	<script type="text/javascript" src="/assets/js/plugins/notifications/sweet_alert.min.js"></script>
	<script type="text/javascript" src="/assets/js/pages/components_modals.js"></script>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="/assets/css/core.css" rel="stylesheet" type="text/css">
	<link href="/assets/css/components.css" rel="stylesheet" type="text/css">
	<link href="/assets/css/colors.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="/assets/js/plugins/ui/nicescroll.min.js"></script>

	<script type="text/javascript" src="/assets/js/core/app.js"></script>
	<script type="text/javascript" src="/assets/js/pages/layout_fixed_custom.js"></script>
    <!-- /theme JS files -->
    
    <!-- Theme JS files -->
	<script type="text/javascript" src="/assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="/assets/js/plugins/forms/selects/select2.min.js"></script>

	<script type="text/javascript" src="/assets/js/pages/datatables_basic.js"></script>
    <!-- /theme JS files -->
    
    <!-- Theme JS files -->
	<script type="text/javascript" src="/assets/js/core/libraries/jquery_ui/interactions.min.js"></script>
	<script type="text/javascript" src="/assets/js/plugins/forms/selects/select2.min.js"></script>

	<script type="text/javascript" src="/assets/js/pages/form_select2.js"></script>
	<!-- /theme JS files -->

	<!-- sweet_alert -->
	<link rel="stylesheet" href="/assets/sweetalert2/sweetalert2.min.css">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body class="navbar-top">
	@include('sweet::alert')
	<!-- Main navbar -->
	<div class="navbar navbar-default navbar-fixed-top header-highlight">
		<div class="navbar-header">
			<a class="navbar-brand" href="/"><img src="/assets/images/logo_light.png" alt=""></a>
			
			<ul class="nav navbar-nav pull-right visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
				<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav">
				<li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>

			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown dropdown-user">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<img src="/assets/images/image.png" alt="">
						<span>{{ Auth::user()->name }}</span>
						<i class="caret"></i>
					</a>

					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="/admina/profile"><i class="icon-user-plus"></i> My profile</a></li>
						<li class="divider"></li>
						@if(\App\Admin::find(Auth::user()->id)->super == 0)
						<li><a href="/admina/setting"><i class="icon-cog5"></i> Account settings</a></li>
						@else
						<li><a href="/setting"><i class="icon-cog5"></i> Account settings</a></li>
						@endif
						<li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                <i class="icon-switch2"></i>{{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main sidebar -->
			<div class="sidebar sidebar-main sidebar-fixed">
				<div class="sidebar-content">

					<!-- User menu -->
					<div class="sidebar-user">
						<div class="category-content">
							<div class="media">
								<a href="#" class="media-left"><img src="/assets/images/image.png" class="img-circle img-sm" alt=""></a>
								<div class="media-body">
									<span class="media-heading text-semibold">{{ Auth::user()->name }}</span>
									<div class="text-size-mini text-muted">
										<i class="icon-pin text-size-small"></i> &nbsp;Cibiru - Bandung
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /user menu -->


					<!-- Main navigation -->
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion">

								<!-- Main -->
								<li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
                                <li {{{ (Request::is('admina') ? 'class=active' : '') }}}><a href="/admina"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
                                @if (\App\Admin::find(Auth::user()->id)->super == 1)
								<li class="navigation-header"><span>Admin</span> <i class="icon-menu" title="Admins"></i></li>
                                <li><a href="#"><i class="icon-users"></i> <span> Admin</span></a>
                                    <ul>
										<li {{{ (Request::is('admina/showadmin') ? 'class=active' : '') }}}><a href="/admina/showadmin">Tampilkan Admin</a></li>
										<li {{{ (Request::is('admina/newadmin') ? 'class=active' : '') }}}><a href="/admina/newadmin">Tambah Admin</a></li>
									</ul>
                                </li>
                                @endif
                                <li class="navigation-header"><span>User</span> <i class="icon-menu" title="User"></i></li>
								<li {{{ (Request::is('admina/showuser') ? 'class=active' : '') }}}><a href="/admina/showuser"><i class="icon-users"></i><span>User</span></a></li>
                                <li class="navigation-header"><span>Barang Pinjam</span> <i class="icon-menu" title="Barang Pinjam"></i></li>
                                <li>
                                    <a href="#"><i class="icon-basket"></i> <span>Barang</span></a>
									<ul>
                                        <li {{{ (Request::is('admina/showbarang') ? 'class=active' : '') }}}><a href="/admina/showbarang">Tampilkan Barang</a></li>
                                        <li {{{ (Request::is('admina/newbarang') ? 'class=active' : '') }}}><a href="/admina/newbarang">Tambah Barang</a></li>
									</ul>
								</li>
								<li>
                                    <a href="#"><i class="icon-home9"></i> <span>Ruangan</span></a>
									<ul>
                                        <li {{{ (Request::is('admina/showruangan') ? 'class=active' : '') }}}><a href="/admina/showruangan">Tampilkan Ruangan</a></li>
                                        <li {{{ (Request::is('admina/newruangan') ? 'class=active' : '') }}}><a href="/admina/newruangan">Tambah Ruangan</a></li>
									</ul>
								</li>
								

                                <li class="navigation-header"><span>Peminjaman & Pengembalian</span> <i class="icon-menu" title="Peminjaman & Pengembalian"></i></li>
                                <li>
                                    <a href="#"><i class="icon-newspaper"></i> <span>Peminjaman 
										{{! $pending = \App\Acc::where('activate', 0)->get() }}
										@if(count($pending) > 0)
										<span class="badge badge-warning">{{ count($pending) }}</span>
										@endif
										</span>
									</a>
									<ul>
                                        <li {{{ (Request::is('admina/peminjaman') ? 'class=active' : '') }}}><a href="/admina/peminjaman">Daftar Peminjaman</a></li>
                                        <li {{{ (Request::is('admina/verifikasipeminjaman') ? 'class=active' : '') }}}><a href="/admina/verifikasipeminjaman">Verifikasi Peminjaman</a></li>
									</ul>
								</li>
								<li {{{ (Request::is('admina/pengembalian') ? 'class=active' : '') }}}><a href="/admina/pengembalian"><i class="icon-grab"></i><span>Pengembalian Barang</span></a></li>
								<!-- /main -->

							</ul>
						</div>
					</div>
					<!-- /main navigation -->

				</div>
			</div>
			<!-- /main sidebar -->


			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header">
					<div class="page-header-content">
						<div class="page-title">
							<h4>
								<span class="text-semibold">{{{ (Request::is('admina') ? 'Dashboard' : '') }}}</span>
                                <span class="text-semibold">{{{ (Request::is('admina/newadmin') ? 'Tambah Admin' : '') }}}</span>
                                <span class="text-semibold">{{{ (Request::is('admina/showadmin') ? 'Data Admin' : '') }}}</span>
                                <span class="text-semibold">{{{ (Request::is('admina/showbarang') ? 'Data Barang' : '') }}}</span>
                                <span class="text-semibold">{{{ (Request::is('admina/newbarang') ? 'Tambah Barang' : '') }}}</span>
                                <span class="text-semibold">{{{ (Request::is('admina/showruangan') ? 'Data Ruangan' : '') }}}</span>
                                <span class="text-semibold">{{{ (Request::is('admina/newruangan') ? 'Tambah Ruangan' : '') }}}</span>
                                <span class="text-semibold">{{{ (Request::is('admina/peminjaman') ? 'Data Peminjaman' : '') }}}</span>
                                <span class="text-semibold">{{{ (Request::is('admina/verifikasipeminjaman') ? 'Verifikasi Peminjaman' : '') }}}</span>
                                <span class="text-semibold">{{{ (Request::is('admina/pengembalian') ? 'Form Pengembalian' : '') }}}</span>  - Admin Panel
                            </h4>
						</div>
                        @if (Session::has('message'))
                        <div class="alert bg-success alert-styled-left">
                            <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                            <span class="text-semibold">{{ Session::get('message') }}</span>
                        </div>
                        @endif
					</div>
				</div>
				<!-- /page header -->

				<!-- Content area -->
				<div class="content">
                    @yield('content')

                    <!-- Footer -->
					<div class="footer text-muted">
						&copy; 2018. <a href="#">PTIPD</a> by <a href="https://uinsgd.ac.id" target="_blank">UIN Sunan Gunung Djati Bandung</a>
					</div>
					<!-- /footer -->
                </div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

</body>
</html>
