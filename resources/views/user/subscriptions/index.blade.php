@extends('user.layouts.app')
@section('content')
<!-- Main Content -->
<div class="page-front">
    <div class="container-fluid">
        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">My Plan</h5>
            </div>
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
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <button type="button" class="close" data-dismiss="alert">×</button>
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        <!-- /Title -->
                
        <!--  Row  -->
        <div class="row">
            @if(sizeof($data) > 0)
            @foreach($data as $key => $recom)
            <div class="col-lg-2 col-md-4 col-sm-4 col-xs-6">
                <div class="panel panel-default card-view pa-0">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body pa-15 text-center">
                            <div class="bg-white p-5 rounded-lg shadow">
                                <h4>{{$recom->create_subscription->name}}</h4>
                                <h4>Interest Rate: <span class="h1 font-weight-bold">{{$recom->create_subscription->interest_rate}}%</span></h4>
                                <h5>ZAR{{$recom->create_subscription->price}}</h5>

                                <div class="custom-separator"></div>

                                <ul class="list-unstyled my-5 text-small text-center plan-data">
                                    <li class="mb-3">
                                        <i class="fa fa-check mr-2 text-primary"></i>Payment Type: {{$recom->create_subscription->bill_type}}</li>
                                    <li class="mb-3">
                                        <i class="fa fa-check mr-2 text-primary"></i>Maturity Date: {{$recom->create_subscription->maturity_date}} Days</li>
                                </ul>
                                <a href="#" class="btn  btn-primary btn-rounded mt-20">Cancel Subscription</a>
                                <!-- <form action="#" method="post" id="addSubscribe" enctype="multipart/form-data">@csrf
                                    <input type="hidden" id="id" name="id" value="{{$recom->id}}">
                                    <button type="submit" class="btn  btn-primary btn-rounded">Subscribe</button>
                                </form> -->
                            </div>
                        </div>
                    </div>	
                </div>	
            </div>
            @endforeach
            @endif					
        </div>	
        <!-- / Row  -->	
    </div>
</div>
<!-- /Main Content -->
@endsection

<!-- script -->
@section('script')
<script type="text/javascript">
</script>
@endsection
<!-- /script -->