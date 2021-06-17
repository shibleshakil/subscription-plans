@extends('user.layouts.app')
@section('content')
<!-- Main Content -->
<div class="page-wrapper">
    <div class="container-fluid mt-20">
        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-xs-12 text-center">
                <h3><span class="plan-color">My</span>
                <span> Plan</span></h3>
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

        <!-- Row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel offered-plan pb-0">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body of-pbody pb-0">
                            <!-- <div class="row"> -->
                                @if(sizeof($data) > 0)
                                @foreach($data as $key => $recom)
                                <!-- item -->
                                <div class="col-lg-3 col-md-6 col-sm-12 text-center mb-30">
                                    <div class="panel panel-pricing offered-plan-table mb-0">
                                        <div class="panel-heading">
                                            @if($recom->create_subscription->name == "Platinam")
                                            <i class=" ti-shield"></i>
                                            @elseif($recom->create_subscription->name == "Gold")
                                            <i class="ti-crown"></i>
                                            @elseif($recom->create_subscription->name == "Silver")
                                            <i class="ti-wallet"></i>
                                            @else
                                            <i class="ti-bookmark-alt"></i>
                                            @endif

                                            <h6>{{$recom->create_subscription->name}}</h6>
                                            <h5>Interest Rate: <span class="panel-price">{{$recom->create_subscription->interest_rate}}%</span></h5>
                                            <h6 class="mt-25">Price : ZAR{{$recom->create_subscription->price}}</h6>
                                        </div>
                                        <div class="panel-body text-center pl-0 pr-0">
                                            <hr class="mb-30"/>
                                            <ul class="list-group mb-0 text-center">
                                                <li class="list-group-item"><i class="fa fa-check"></i> Start Date : {{$recom->active_date}}</li>
                                                <li><hr class="mt-5 mb-5"/></li>
                                                <li class="list-group-item"><i class="fa fa-check"></i> Payment Type : {{$recom->create_subscription->bill_type}}</li>
                                                <li><hr class="mt-5 mb-5"/></li>
                                                <li class="list-group-item"><i class="fa fa-check"></i> Maturity Date : {{$recom->maturity_exp}}</li>
                                                <li><hr class="mt-5 mb-5"/></li>
                                                <li class="list-group-item"><i class="fa fa-check"></i>  
                                                    <?php   
                                                        $exp_date = $recom->maturity_exp;
                                                        // $exp = toDateTimeString($exp_date);
                                                        $exp = date('Y-m-d H:i:s', strtotime($exp_date));

                                                        $diff = Carbon\Carbon::now()->diffInDays($exp, false);
                                                        if($diff > 0){ 
                                                            echo "Remaining"." : ".$diff." "."Days";
                                                        }elseif($diff == 0){ 
                                                            echo "Expired Today";
                                                        }
                                                        else{
                                                            $difff = abs($diff);
                                                            echo "Expired"." : ".$difff." "."Days Ago";
                                                        }
                                                    ?>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12 text-center mb-30">
                                                <a class="btn btn-primary btn-sm renew" href="#">Renew</a>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 text-center mb-30">
                                                <!-- <a class="btn btn-info btn-rounded btn-sm" href="{{ route ('user-subscriptions-upgrade-list') }}">Upgrade</a> -->
                                                <form action="{{ route ('user-subscriptions-upgrade-list') }}" method="POST" enctype="multipart/form-data">@csrf
                                                    <input type="hidden" id="id" name="id" value="{{$recom->create_subscription_id}}">
                                                    <input type="hidden" id="price" name="price" value="{{$recom->create_subscription->price}}">
                                                    <button type="submit" class="btn  btn-info btn-sm upgrade">Upgrade</button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12 text-center mb-30">
                                                <form action="{{ route ('user-subscriptions-downgrade-list') }}" method="POST" enctype="multipart/form-data">@csrf
                                                    <input type="hidden" id="id" name="id" value="{{$recom->create_subscription_id}}">
                                                    <input type="hidden" id="price" name="price" value="{{$recom->create_subscription->price}}">
                                                    <button type="submit" class="btn  btn-info btn-sm downgrade">Downgrade</button>
                                                </form>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 text-center mb-30">
                                                <!-- <a class="btn btn-danger btn-rounded btn-sm" href="#">Cancel</a> -->
                                                <form action="{{ route ('user-subscriptions.delete')}}" method="post" id="cancelSubscribe" enctype="multipart/form-data">@csrf
                                                    <input type="hidden" id="id" name="id" value="{{$recom->id}}">
                                                    <button type="submit" class="btn  btn-danger btn-sm cancel">Cancel</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /item -->
                                @endforeach
                                @else
                                <!-- item -->
                                <div class="col-lg-12 col-md-12 col-sm-12 text-center mb-30">
                                    <div class="panel panel-pricing offered-plan-table mb-0">
                                        <p><span class="h1 font-weight-bold">No Subscription Avaiable</span></p>
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