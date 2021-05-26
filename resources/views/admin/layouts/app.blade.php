<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>Admin | Dashboard</title>
	<meta name="description" content="Hound is a Dashboard & Admin Site Responsive Template by hencework." />
	<meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Hound Admin, Houndadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
	<meta name="author" content="hencework"/>
	
	<!-- Favicon -->
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Custom CSS -->
	<link href="{{ asset('dist/css/style.css') }}" rel="stylesheet" type="text/css">

    <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="http://www.datatables.net/rss.xml">
    
    <!-- select2 CSS -->
    <link href="vendors/bower_components/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css"/>
    
    <!-- bootstrap-select CSS -->
    <link href="vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" type="text/css"/>

	<!-- bootstrap-touchspin CSS -->
	<link href="{{asset('vendors/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" type="text/css"/>
    
	<!-- Data table CSS -->
	<link href="{{ asset('vendors/bower_components/datatables/media/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
	
	<!-- Morris Charts CSS -->
    <link href="{{ asset('vendors/bower_components/morris.js/morris.css') }}" rel="stylesheet" type="text/css"/>
	
	<!-- Data table CSS -->
	<link href="{{ asset('vendors/bower_components/datatables/media/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
	
	<link href="{{ asset('vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.css') }}" rel="stylesheet" type="text/css">

	<!-- Custom CSS -->
	<link href="{{asset('src/scss/style.scss')}}" rel="stylesheet" type="text/css">		
	
</head>

<body>
    <div class="wrapper theme-1-active pimary-color-red">
        @include('admin.layouts.header')
        @include('admin.layouts.sidebar')
        @yield('content')
        @include('admin.layouts.footer')

    </div>
    <!-- /#wrapper -->
	
	<!-- JavaScript -->
	
    <!-- jQuery -->
    <script src="vendors/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="dist/js/modal-data.js"></script>

            
    <!-- Bootstrap Select JavaScript -->
    <script src="vendors/bower_components/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    
    <!-- Select2 JavaScript -->
    <script src="vendors/bower_components/select2/dist/js/select2.full.min.js"></script>
    
	<!-- Data table JavaScript -->
	<script src="vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
	<script src="vendors/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
	<script src="vendors/bower_components/datatables.net-buttons/js/buttons.flash.min.js"></script>
	<script src="vendors/bower_components/jszip/dist/jszip.min.js"></script>
	<script src="vendors/bower_components/pdfmake/build/pdfmake.min.js"></script>
	<script src="vendors/bower_components/pdfmake/build/vfs_fonts.js"></script>
	
	<script src="vendors/bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>
	<script src="vendors/bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>
	<script src="dist/js/export-table-data.js"></script>
	
	<!-- Slimscroll JavaScript -->
	<script src="dist/js/jquery.slimscroll.js"></script>

	<!-- Bootstrap Touchspin JavaScript -->
	<script src="{{asset('vendors/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js')}}"></script>
	
	<!-- simpleWeather JavaScript -->
	<script src="vendors/bower_components/moment/min/moment.min.js"></script>
	<script src="vendors/bower_components/simpleWeather/jquery.simpleWeather.min.js"></script>
	<script src="dist/js/simpleweather-data.js"></script>
	
	<!-- Progressbar Animation JavaScript -->
	<script src="vendors/bower_components/waypoints/lib/jquery.waypoints.min.js"></script>
	<script src="vendors/bower_components/jquery.counterup/jquery.counterup.min.js"></script>
	
	<!-- Fancy Dropdown JS -->
	<script src="dist/js/dropdown-bootstrap-extended.js"></script>
	
	<!-- Sparkline JavaScript -->
	<script src="vendors/jquery.sparkline/dist/jquery.sparkline.min.js"></script>
	
	<!-- Owl JavaScript -->
	<script src="vendors/bower_components/owl.carousel/dist/owl.carousel.min.js"></script>
	
	<!-- ChartJS JavaScript -->
	<script src="vendors/chart.js/Chart.min.js"></script>
	
	<!-- Morris Charts JavaScript -->
    <script src="vendors/bower_components/raphael/raphael.min.js"></script>
    <script src="vendors/bower_components/morris.js/morris.min.js"></script>
    <script src="vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.js"></script>
	
	<!-- Switchery JavaScript -->
	<script src="vendors/bower_components/switchery/dist/switchery.min.js"></script>
	
	<!-- Init JavaScript -->
	<script src="dist/js/init.js"></script>
	<script src="dist/js/dashboard-data.js"></script>
    @yield('script')
</body>

</html>
