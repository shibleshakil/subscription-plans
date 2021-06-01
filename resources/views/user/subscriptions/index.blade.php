@extends('user.layouts.app')
@section('content')
<!-- Main Content -->
<div class="page-wrapper ml-0">
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
                                <h5>Interest Rate: <span class="h1 font-weight-bold">{{$recom->create_subscription->interest_rate}}%</span></h5>
                                <h5>ZAR{{$recom->create_subscription->price}}</h5>

                                <div class="custom-separator"></div>

                                <ul class="list-unstyled my-5 text-small text-center plan-data">
                                    <li class="mb-3">
                                        <i class="fa fa-check mr-2 text-primary"></i>Payment Type: {{$recom->create_subscription->bill_type}}</li>
                                    <li class="mb-3">
                                        <i class="fa fa-check mr-2 text-primary"></i>Start Date: {{$recom->active_date}}</li>
                                    <li class="mb-3">
                                        <i class="fa fa-check mr-2 text-primary"></i>Maturity Date: {{$recom->maturity_exp}}</li>
                                    <li class="mb-3">
                                        <i class="fa fa-check mr-2 text-primary"></i>Days Remainning: {{$recom->maturity_left}} days</li>
                                </ul>
                                <!-- <a href="#" class="btn  btn-primary btn-rounded mt-20">Cancel</a> -->
                                
                            </div>
                            <div class="row text-center pa-5">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <form action="#" enctype="multipart/form-data">
                                        <button type="submit" class="btn  btn-primary btn-rounded">Renue</button>
                                    </form>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <!-- <a href="{{ route ('user-subscriptions-upgrade-list') }}" class="btn  btn-primary btn-rounded">Upgrade</a> -->
                                    <form action="{{ route ('user-subscriptions-upgrade-list') }}" method="POST" enctype="multipart/form-data">@csrf
                                        <input type="hidden" id="id" name="id" value="{{$recom->create_subscription_id}}">
                                        <input type="hidden" id="price" name="price" value="{{$recom->create_subscription->price}}">
                                        <button type="submit" class="btn  btn-info btn-rounded">Upgrade</button>
                                    </form>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-15"></div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <form action="{{ route ('user-subscriptions-downgrade-list') }}" method="POST" enctype="multipart/form-data">@csrf
                                        <input type="hidden" id="id" name="id" value="{{$recom->create_subscription_id}}">
                                        <input type="hidden" id="price" name="price" value="{{$recom->create_subscription->price}}">
                                        <button type="submit" class="btn  btn-info btn-rounded">Downgrade</button>
                                    </form>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <form action="{{ route ('user-subscriptions.delete')}}" method="post" id="cancelSubscribe" enctype="multipart/form-data">@csrf
                                        <input type="hidden" id="id" name="id" value="{{$recom->id}}">
                                        <button type="submit" class="btn  btn-danger btn-rounded">Cancel</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>	
                </div>	
            </div>
            @endforeach
            @else
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default card-view pa-0">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body text-center">
                            <div class="bg-white rounded-lg shadow">
                                <p><span class="h1 font-weight-bold">No Subscription Avaiable</span></p>
                            </div>
                        </div>
                    </div>	
                </div>	
            </div>
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