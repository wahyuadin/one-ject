<!DOCTYPE html>
<html lang="en">
@include('template.header')
<body data-background-color="bg2">
    @include('sweetalert::alert')
	<div class="wrapper fullheight-side no-box-shadow-style">
		<!-- Logo Header -->
		<div class="logo-header position-fixed" data-background-color="dark">

			<a href="/dashboard" class="logo">
				<img src="{{ asset('assets/img/oj.svg') }}" alt="navbar brand" class="navbar-brand">
			</a>
			<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon">
					<i class="icon-menu"></i>
				</span>
			</button>
			<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
			<div class="nav-toggle">
				<button class="btn btn-toggle toggle-sidebar">
					<i class="icon-menu"></i>
				</button>
			</div>
		</div>
		<!-- End Logo Header -->
		<!-- Sidebar -->
		@include('template.sitebar')
		<!-- End Sidebar -->

		<!-- Navbar -->
        @include('template.navbar')
		<!-- End Navbar -->

		<div class="main-panel full-height">
			<div class="container">
                @yield('content')
			</div>
			@include('template.footer')
		</div>
	</div>
	@include('template.source')
</body>
</html>
