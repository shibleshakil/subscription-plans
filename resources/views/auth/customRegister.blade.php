
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<title>Subscription Plans | Register</title>
		<meta name="description" content="Hound is a Dashboard & Admin Site Responsive Template by hencework." />
		<meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Hound Admin, Houndadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
		<meta name="author" content="hencework"/>

		<!-- Favicon -->
		<link rel="shortcut icon" href="favicon.ico">
		<link rel="icon" href="favicon.ico" type="image/x-icon">

		<!-- vector map CSS -->
		<link href="vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css" rel="stylesheet" type="text/css"/>



		<!-- Custom CSS -->
		<link href="dist/css/style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<!--Preloader-->
		<div class="preloader-it">
			<div class="la-anim-1"></div>
		</div>
		<!--/Preloader-->

		<div class="wrapper pa-0">
			<header class="sp-header">
				<!-- <div class="sp-logo-wrap pull-left">
					<a href="index.html">
						<img class="brand-img mr-10" src="dist/img/logo.png" alt="brand"/>
						<span class="brand-text">Subscription Plans</span>
					</a>
				</div> -->
				<div class="form-group mb-0 pull-right">
					<span class="inline-block pr-10">Already have an account?</span>
					<a class="inline-block btn btn-info btn-rounded btn-outline" href="{{ route('login') }}">Login</a>
				</div>
				<div class="clearfix"></div>
			</header>

			<!-- Main Content -->
			<div class="page-wrapper pa-0 ma-0 auth-page">
				<div class="container-fluid">
					<!-- Row -->
					<div class="table-struct full-width full-height">
						<div class="table-cell vertical-align-middle auth-form-wrap">
							<div class="auth-form  ml-auto mr-auto no-float">
								<div class="row" style="padding: 2%; box-shadow: 5px 5px 8px #2879ff; border-radius: 50px 20px;">
									<div class="col-sm-12 col-xs-12">
										<div class="mb-30">
											<h3 class="text-center txt-dark mb-10">Subscription Plans Register</h3>
										</div>
										
										@if ($message = Session::get('success'))
										<div class="alert alert-success alert-block">
											<button type="button" class="close" data-dismiss="alert">×</button>
											<strong>{{ $message }}</strong>
										</div>
										@endif
										@if ($message = Session::get('error'))
										<div class="alert alert-danger alert-block">
											<button type="button" class="close" data-dismiss="alert">×</button>
											<strong>{{ $message }}</strong>
										</div>
										@endif
										<div class="form-wrap">
											<form method="POST" action="{{ route('register') }}">@csrf
												<div class="form-group">
													<label class="control-label mb-10" for="exampleInputName_1">Username</label>
                                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                                                    @error('name')
                                                        <span class="text-danger invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
												</div>
												<div class="form-group">
													<label class="control-label mb-10" for="exampleInputEmail_2">Email address</label>
                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                                        name="email" value="{{ old('email') }}" autocomplete="email">

                                                    @error('email')
                                                        <span class="text-danger invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
												</div>
												<div class="form-group">
													<label class="pull-left control-label mb-10" for="exampleInputpwd_2">Password</label>
                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                                        name="password" autocomplete="new-password">

                                                    @error('password')
                                                        <span class="text-danger invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
												</div>
												<div class="form-group">
													<label class="pull-left control-label mb-10" for="exampleInputpwd_3">Confirm Password</label>
													<input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                                     autocomplete="new-password">
												</div>
												<div class="form-group text-center">
													<button type="submit" class="btn btn-info btn-rounded">Register</button>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Row -->
				</div>

			</div>
			<!-- /Main Content -->

		</div>
		<!-- /#wrapper -->

		<!-- JavaScript -->

		<!-- jQuery -->
		<script src="vendors/bower_components/jquery/dist/jquery.min.js"></script>

		<!-- Bootstrap Core JavaScript -->
		<script src="vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
		<script src="vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>

		<!-- Slimscroll JavaScript -->
		<script src="dist/js/jquery.slimscroll.js"></script>

		<!-- Init JavaScript -->
		<script src="dist/js/init.js"></script>
	</body>
</html>
