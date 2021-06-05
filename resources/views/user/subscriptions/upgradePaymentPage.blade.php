@extends('user.layouts.app')
@section('content')
<!-- Main Content -->
<div class="page-wrapper ml-0">
    <div class="container-fluid">
        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Payment Details</h5>
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
                <div class="panel panel-default card-view pa-0">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body pt-0">
                            <form id="example-advanced-form2" action="{{ route('user-subscriptions-upgrade')}}" method="post" enctype="multipart/form-data">@csrf                              
                                <!-- <h3><span class="number"><i class="icon-credit-card txt-black"></i></span></h3> -->
                                <fieldset>
                                    <!--CREDIT CART PAYMENT-->                                    
                                    <input type="hidden" id="id" name="id" value="{{$recomandation->id}}">
                                    <input type="hidden" id="maturity_date" name="maturity_date" value="{{$recomandation->maturity_date}}">
                                    <input type="hidden" id="price" name="price" value="{{$recomandation->price}}">
                                    <input type="hidden" id="create_subscription_id"  name="create_subscription_id" value="{{ isset($old) ? $old->create_subscription_id : '' }}">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="control-label mb-10" for="CreditCardType">card type:</label>
                                                <select id="CreditCardType" name="CreditCardType" class="form-control required">
                                                    <option value="5">Visa</option>
                                                    <option value="6">MasterCard</option>
                                                    <option value="7">American Express</option>
                                                    <option value="8">Discover</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label mb-10" for="cardNo">Credit Card Number:</label>
                                                <input type="text" id="cardNo" data-mask="9999-9999-9999-9999" class="form-control required" name="car_number" value="" />
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label mb-10" for="cvv">card cvv:</label>
                                                <input type="text" id="cvv" class="form-control  required" data-mask="999" name="car_code" value="" />
                                            </div>
                                            <div class="col-md-6 pa-0">
                                                <div class="form-group">
                                                    <label class="control-label mb-10">expiration month:</label>
                                                    <input type="text" id="cvv" class="form-control  required" data-mask="999" name="car_code" value="" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 pa-0">
                                                <div class="form-group">
                                                    <label class="control-label mb-10">expiration year:</label>
                                                    <input type="text" id="cvv" class="form-control  required" data-mask="999" name="car_code" value="" />
                                                </div>
                                            </div>
                                            <div class="form-group mb-0">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <ul class="cards" style="display:flex;">
                                                            <li class="visa hand"><img src="{{asset('dist/img/1-s.png')}}" alt="card"/></li>
                                                            <li class="mastercard hand"><img src="{{asset('dist/img/2-s.png')}}" alt="card"/></li>
                                                            <li class="amex hand"><img src="{{asset('dist/img/3-s.png')}}" alt="card"/></li>
                                                            <li class="amex hand"><img src="{{asset('dist/img/4-s.png')}}" alt="card"/></li>
                                                        </ul>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row text-center mt-10 mb-30">
                                                <button type="button" class="btn btn-default btn-rounded">Cancel</button>
                                                <button type="submit" class="btn btn-success btn-rounded">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!--CREDIT CART PAYMENT END-->
                                </fieldset>
                            </form>
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