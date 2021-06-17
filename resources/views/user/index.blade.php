@extends('user.layouts.app')
@section('content')
<!-- Main Content -->
<div class="page-wrapper">
    <div class="container-fluid mt-20">
        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-xs-12 text-center">
                <h3><span class="plan-color">Flexible</span>
                <span> Plans</span></h3>
                <span class="plan-color1">Choose a plan that works best for you</span>
            </div>
        </div>
        
            
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
        <!-- /Title -->

        <!-- Row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel offered-plan pb-0">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body of-pbody pb-0">
                            <!-- <div class="row"> -->
                                <!-- item -->
                                @if(sizeof($recomandation) > 0)
                                @foreach($recomandation as $key => $recom)
                                <div class="col-lg-3 col-md-6 col-sm-12 text-center mb-30">
                                    <div class="panel panel-pricing offered-plan-table mb-0">
                                        <div class="panel-heading">
                                            @if($recom->name == "Platinam")
                                            <i class=" ti-shield"></i>
                                            @elseif($recom->name == "Gold")
                                            <i class="ti-crown"></i>
                                            @elseif($recom->name == "Silver")
                                            <i class="ti-wallet"></i>
                                            @else
                                            <i class="ti-bookmark-alt"></i>
                                            @endif

                                            <h6>{{$recom->name}}</h6>
                                            <h5>Interest Rate: <span class="panel-price">{{$recom->interest_rate}}%</span></h5>
                                            <h6 class="mt-25">Price : ZAR{{$recom->price}}</h6>
                                        </div>
                                        <div class="panel-body text-center pl-0 pr-0">
                                            <hr class="mb-30"/>
                                            <ul class="list-group mb-0 text-center">
                                                <li class="list-group-item"><i class="fa fa-check"></i> Payment Type: {{$recom->bill_type}}</li>
                                                <li><hr class="mt-5 mb-5"/></li>
                                                <li class="list-group-item"><i class="fa fa-check"></i> Maturity Date: {{$recom->maturity_date}} Days</li>
                                                <li><hr class="mt-5 mb-5"/></li>
                                                <li class="list-group-item"><i class="fa fa-check"></i> 24/7 support</li>
                                            </ul>
                                        </div>
                                        <div class="panel-footer pb-35">
                                            <!-- <a class="btn btn-success btn-rounded btn-lg" href="#">subscribe now</a> -->
                                            <form action="{{ route ('user-payment-details')}}" method="post" id="cancelSubscribe" enctype="multipart/form-data">@csrf
                                                <input type="hidden" id="id" name="id" value="{{$recom->id}}">
                                                <button type="submit" class="btn btn-primary btn-lg sbtn">subscribe now <span class="pl-5"><i class="fa fa-arrow-right"></i></span></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- /item -->
                                @endforeach
                                @else
                                <!-- item -->
                                <div class="col-lg-12 col-md-12 col-sm-12 text-center mb-30">
                                    <div class="panel panel-pricing offered-plan-table mb-0">
                                        <p><span class="h1 font-weight-bold">No Offered Plan Avaiable</span></p>
                                    </div>
                                </div>
                                <!-- /item -->
                                @endif                                
                            <!-- </div>	 -->
                        </div>	
                    </div>	
                </div>	
            </div>	
        </div>	
        <!-- /Row -->
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