@extends('user.layouts.app')
@section('content')
<!-- Main Content -->
<div class="page-wrapper ml-0">
    <div class="container-fluid">
        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Offered Plans</h5>
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
            @if(sizeof($recomandation) > 0)
            @foreach($recomandation as $key => $recom)
            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
                <div class="panel panel-default card-view pa-0">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body pa-15 text-center">
                            <div class="bg-white p-5 rounded-lg shadow">
                                <h4>{{$recom->name}}</h4>
                                <h5>Interest Rate: <span class="h1 font-weight-bold">{{$recom->interest_rate}}%</span></h5>
                                <h5>ZAR{{$recom->price}}</h5>

                                <div class="custom-separator"></div>

                                <ul class="list-unstyled my-5 text-small text-center plan-data">
                                    <li class="mb-3">
                                        <i class="fa fa-check mr-2 text-primary"></i>Payment Type: {{$recom->bill_type}}</li>
                                    <li class="mb-3">
                                        <i class="fa fa-check mr-2 text-primary"></i>Maturity Date: {{$recom->maturity_date}} Days</li>
                                </ul>
                                <!-- <a href="#" class="btn  btn-primary btn-rounded">Subscribe</a> -->
                                <form action="{{ route('user-subscriptions.store')}}" method="post" id="addSubscribe" enctype="multipart/form-data">@csrf
                                    <input type="hidden" id="id" name="id" value="{{$recom->id}}">
                                    <input type="hidden" id="maturity_date" name="maturity_date" value="{{$recom->maturity_date}}">
                                    <button type="submit" class="btn  btn-primary btn-rounded mt-20" id="submitbtn">Subscribe</button>
                                </form>
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