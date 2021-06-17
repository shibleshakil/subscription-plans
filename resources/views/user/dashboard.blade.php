@extends('user.layouts.app')
@section('content')
<!-- Main Content -->
<div class="page-wrapper">
	<div class="container-fluid pt-0">
		@if ($message = Session::get('success'))
		<div class="alert alert-success alert-block">
			<button type="button" class="close text-danger" data-dismiss="alert">×</button>
			<strong>{{ $message }}</strong>
		</div>
		@endif
		@if ($message = Session::get('error'))
		<div class="alert alert-danger alert-block">
			<button type="button" class="close text-danger" data-dismiss="alert">×</button>
			<strong>{{ $message }}</strong>
		</div>
		@endif
		@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<button type="button" class="close text-danger" data-dismiss="alert">×</button>
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
		<!-- Row -->
		<div class="row">
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
				<!-- <div class="cards"> -->
					<img src="http://119.148.30.62:8080/subscriptions/public/dist/img/visa.png" class="cards" alt="">
				<!-- </div> -->
				<div class="user-card-bl">
					<span class="font-15">My Balance</span>
					<br>
					<span class="font-20">ZAR<?php echo Auth()->user()->balance ?></span>
				</div>
				<div class="user-card-vl">
					<span class="font-15">Valid Until</span>
					<br>
					<span class=" text-center font-16" >08/03/22</span>
				</div>
				<div class="user-card-name">
					<span class="uppercase-font font-16">Wanda Ndimande</span>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
				<div class="panel-default pa-4">
					<div class="panel-wrapper collapse in">
						<div class="panel-body pa-5">
							<div class="sm-data-box bg1">
								<div class="container-fluid">
									<div class="row">
										<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
											<span class="txt-light block user-counter"><span class="counter-anim">
												4</span></span>
											<span class="weight-500 uppercase-font txt-light block font-13">send</span>
										</div>
										<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
											<i class="fa fa-send txt-light data-right-rep-icon"></i>
										</div>
									</div>	
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
				<div class="panel-default pa-4">
					<div class="panel-wrapper collapse in">
						<div class="panel-body pa-5">
							<div class="sm-data-box bg2">
								<div class="container-fluid">
									<div class="row">
										<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
											<span class="txt-light block user-counter"><span class="counter-anim">4</span></span>
											<span class="weight-500 uppercase-font txt-light block">notification</span>
										</div>
										<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
											<i class="fa fa-bell txt-light data-right-rep-icon"></i>
										</div>
									</div>	
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
				<div class="panel-default pa-4">
					<div class="panel-wrapper collapse in">
						<div class="panel-body pa-5">
							<div class="sm-data-box bg3">
								<div class="container-fluid">
									<div class="row">
										<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
											<span class="txt-light block user-counter"><span class="counter-anim">4</span></span>
											<span class="weight-500 uppercase-font txt-light block">request</span>
										</div>
										<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
											<i class="fa fa-external-link txt-light data-right-rep-icon"></i>
										</div>
									</div>	
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
				<div class="panel-default pa-4">
					<div class="panel-wrapper collapse in">
						<div class="panel-body pa-5">
							<div class="sm-data-box bg4">
								<div class="container-fluid">
									<div class="row">
										<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
											<span class="txt-light block user-counter">ZAR<span class="counter-anim">546454</span></span>
											<span class="weight-500 uppercase-font txt-light block font-13">Loan</span>
										</div>
										<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
											<i class="fa fa-minus-square txt-light data-right-rep-icon"></i>
										</div>
									</div>	
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
				<div class="panel-default pa-4">
					<div class="panel-wrapper collapse in">
						<div class="panel-body pa-5">
							<div class="sm-data-box bg5">
								<div class="container-fluid">
									<div class="row">
										<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
											<span class="txt-light block user-counter">ZAR<span class="counter-anim">4,054</span></span>
											<span class="weight-500 uppercase-font txt-light block">Topup</span>
										</div>
										<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
											<i class="fa fa-plus-square txt-light data-right-rep-icon"></i>
										</div>
									</div>	
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
				<div class="panel-default pa-4">
					<div class="panel-wrapper collapse in">
						<div class="panel-body pa-5">
							<div class="sm-data-box bg6">
								<div class="container-fluid">
									<div class="row">
										<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
											<span class="txt-light block user-counter">ZAR<span class="counter-anim">
												@if(!empty($plan->create_subscription->price))number_format((float)$plan->create_subscription->price, 2, '.', '')@endif</span></span>
											<span class="weight-500 uppercase-font txt-light block">Transactions</span>
										</div>
										<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
											<i class="fa fa-money txt-light data-right-rep-icon"></i>
										</div>
									</div>	
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Row -->
		
		<!-- Row -->
		<div class="row">
			<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
				<div class="panel panel-default">
					<div class="panel-heading user-dash">
						<div class="pull-left">
							<h6 class="panel-title txt-light">Overall Statistics</h6>
						</div>
						<!-- <div class="pull-right">
							<span class="no-margin-switcher">
								<input type="checkbox" id="morris_switch"  class="js-switch" data-color="#ff2a00" data-secondary-color="#2879ff" data-size="small"/>	
							</span>	
						</div> -->
						<div class="clearfix"></div>
					</div>
					<div class="panel-wrapper collapse in">
						<div class="panel-body">
							<div id="morris_extra_line_chart" class="morris-chart ov-st"></div>
							<ul class="flex-stat mt-40">
								<li>
									<span class="block">Weekly Users</span>
									<span class="block txt-dark weight-500 font-18"><span class="counter-anim">3,24,222</span></span>
								</li>
								<li>
									<span class="block">Monthly Users</span>
									<span class="block txt-dark weight-500 font-18"><span class="counter-anim">1,23,432</span></span>
								</li>
								<li>
									<span class="block">Trend</span>
									<span class="block">
										<i class="zmdi zmdi-trending-up txt-success font-24"></i>
									</span>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
				<div class="panel panel-default">
					<div class="panel-wrapper collapse in">
						<div class="panel-body sm-data-box-1">
							<span class="uppercase-font weight-500 font-14 block text-center txt-green">Customer transactions</span>	
							<div class="cus-sat-stat weight-500 txt-success text-center mt-5">
								<span class="counter-anim">93.13</span><span>%</span>
							</div>
							<div class="progress-anim mt-20">
								<div class="progress">
									<div class="progress-bar progress-bar-success wow animated progress-animated" role="progressbar" aria-valuenow="93.12" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
							</div>
							<ul class="flex-stat mt-5">
								<li>
									<span class="block">Previous</span>
									<span class="block txt-dark weight-500 font-15">79.82</span>
								</li>
								<li>
									<span class="block">% Change</span>
									<span class="block txt-dark weight-500 font-15">+14.29</span>
								</li>
								<li>
									<span class="block">Trend</span>
									<span class="block">
										<i class="zmdi zmdi-trending-up txt-success font-20"></i>
									</span>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading user-dash">
						<div class="pull-left">
							<h6 class="panel-title txt-light">browser stats</h6>
						</div>
						<div class="pull-right">
							<a href="#" class="pull-left inline-block mr-15">
								<i class="zmdi zmdi-download txt-light"></i>
							</a>
							<a href="#" class="pull-left inline-block close-panel" data-effect="fadeOut">
								<i class="zmdi zmdi-close txt-light"></i>
							</a>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="panel-wrapper collapse in">
						<div class="panel-body">
							<div>
								<span class="pull-left inline-block capitalize-font txt-dark">
									google chrome
								</span>
								<span class="label label-warning pull-right">50%</span>
								<div class="clearfix"></div>
								<hr class="light-grey-hr row mt-10 mb-10"/>
								<span class="pull-left inline-block capitalize-font txt-dark">
									mozila firefox
								</span>
								<span class="label label-danger pull-right">10%</span>
								<div class="clearfix"></div>
								<hr class="light-grey-hr row mt-10 mb-10"/>
								<span class="pull-left inline-block capitalize-font txt-dark">
									Internet explorer
								</span>
								<span class="label label-success pull-right">30%</span>
								<div class="clearfix"></div>
								<hr class="light-grey-hr row mt-10 mb-10"/>
								<span class="pull-left inline-block capitalize-font txt-dark">
									safari
								</span>
								<span class="label label-primary pull-right">10%</span>
								<div class="clearfix"></div>
							</div>
						</div>	
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
				<div class="panel panel-default panel-refresh">
					<div class="refresh-container">
						<div class="la-anim-1"></div>
					</div>
					<div class="panel-heading user-dash">
						<div class="pull-left">
							<h6 class="panel-title txt-light">transactions types</h6>
						</div>
						<div class="pull-right">
							<a href="#" class="pull-left inline-block refresh mr-15">
								<i class="zmdi zmdi-replay txt-light"></i>
							</a>
							<div class="pull-left inline-block dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false" role="button"><i class="zmdi zmdi-more-vert txt-light"></i></a>
								<ul class="dropdown-menu bullet dropdown-menu-right"  role="menu">
									<li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-reply" aria-hidden="true"></i>Devices</a></li>
									<li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-share" aria-hidden="true"></i>General</a></li>
									<li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-trash" aria-hidden="true"></i>Referral</a></li>
								</ul>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="panel-wrapper collapse in">
						<div class="panel-body">
							<div>
								<canvas id="chart_6" height="191"></canvas>
							</div>	
							<hr class="light-grey-hr row mt-10 mb-15"/>
							<div class="label-chatrs">
								<div class="">
									<span class="clabels clabels-lg inline-block bg-blue1 mr-10 pull-left"></span>
									<span class="clabels-text font-12 inline-block txt-dark capitalize-font pull-left"><span class="block font-15 weight-500 mb-5">44.46% organic</span><span class="block txt-grey">356 visits</span></span>
									<div id="sparkline_1" class="pull-right transaction"></div>
									<div class="clearfix"></div>
								</div>
							</div>
							<hr class="light-grey-hr row mt-10 mb-15"/>
							<div class="label-chatrs">
								<div class="">
									<span class="clabels clabels-lg inline-block bg-green1 mr-10 pull-left"></span>
									<span class="clabels-text font-12 inline-block txt-dark capitalize-font pull-left"><span class="block font-15 weight-500 mb-5">5.54% Refrral</span><span class="block txt-grey">36 visits</span></span>
									<div id="sparkline_2" class="pull-right transaction" ></div>
									<div class="clearfix"></div>
								</div>
							</div>
							<hr class="light-grey-hr row mt-10 mb-15"/>
							<div class="label-chatrs">
								<div class="">
									<span class="clabels clabels-lg inline-block bg-yellow1 mr-10 pull-left"></span>
									<span class="clabels-text font-12 inline-block txt-dark capitalize-font pull-left"><span class="block font-15 weight-500 mb-5">50% Other</span><span class="block txt-grey">245 visits</span></span>
									<div id="sparkline_3" class="pull-right transaction" ></div>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>	
					</div>
				</div>
			</div>
		</div>
		<!-- /Row -->
	</div>
</div>
<!-- Main Content -->
@endsection

<!-- script -->
@section('script')
<script type="text/javascript">
</script>
@endsection
<!-- /script -->