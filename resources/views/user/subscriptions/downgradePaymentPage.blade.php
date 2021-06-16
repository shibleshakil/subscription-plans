@extends('user.layouts.app')
@section('content')
<!-- Main Content -->
<div class="page-wrapper paypanel">
    <div class="container-fluid mt-20">
        <!-- Title -->  
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
            <div class="col-sm-10 pay-panel">
                <div class="panel panel-default">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body pay-panel-body">
                            <form id="example-advanced-form2" action="{{ route('user-subscriptions-downgrade')}}" method="post" enctype="multipart/form-data">@csrf
                                <h3><span class="head-font capitalize-font">your order</span></h3>
                                <fieldset>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-wrap">
                                                <div class="form-group">
                                                    <label class="control-label mb-10" for="firstName">Plan Name:</label>
                                                    <input type="text" class="form-control pay-input" value="{{$recomandation->name}}" readonly />
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label mb-10" for="firstName">Plan Price:</label>
                                                    <input type="text" class="form-control pay-input" value="{{$recomandation->price}}" readonly />
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label mb-10" for="firstName">Interest Rate:</label>
                                                    <input type="text" class="form-control pay-input" value="{{$recomandation->interest_rate}}" readonly />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-wrap">
                                                <div class="form-group">
                                                    <label class="control-label mb-10" for="firstName">Maturity Days:</label>
                                                    <input type="text" class="form-control pay-input" value="{{$recomandation->maturity_date}} Days" readonly />
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label mb-10" for="firstName">Payment Type:</label>
                                                    <input type="text" class="form-control pay-input" value="{{$recomandation->bill_type}}" readonly />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                
                                <h3><span class="head-font capitalize-font">shipping details</span></h3>
                                <fieldset>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-wrap">
                                                <div class="form-group">
                                                    <label class="control-label mb-10" for="exampleCountry">country:</label>
                                                    <select id="exampleCountry" class="form-control pay-select" name="country">
                                                        <option value="1">USA</option>
                                                        <option value="2">Australia</option>
                                                        <option value="3">Canada</option>
                                                        <option value="4">Japan</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-6 col-xs-12">
                                                            <label class="control-label mb-10" for="firstName">first name:</label>
                                                            <input id="firstName" type="text" name="first_name" class="form-control pay-input" value="" />
                                                        </div>
                                                        <div class="span1"></div>
                                                        <div class="col-md-6 col-xs-12">
                                                            <label class="control-label mb-10" for="lastName">last name:</label>
                                                            <input id="lastName" type="text" name="last_name" class="form-control  pay-input" value="" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label mb-10" for="addressDetail">Address:</label>
                                                    <input id="addressDetail"  type="text" name="address" class="form-control  pay-input" value="" />
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label mb-10" for="cityName">city:</label>
                                                    <select id="cityName" class="form-control pay-select" name="country">
                                                        <option value="">Sitka</option>
                                                        <option value="">Brownsville</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-wrap">
                                                <div class="form-group">
                                                    <label class="control-label mb-10" for="stateName">state:</label>
                                                    <select id="stateName" class="form-control pay-select" name="country">
                                                        <option value="">Alaska</option>
                                                        <option value="">Texas</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label mb-10" for="postalCode">zip/postal code:</label>
                                                    <input id="postalCode" type="text" name="zip_code"  data-mask="99999-9999" class="form-control pay-input" value="" />
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label mb-10" for="phoneNumber">phone number:</label>
                                                    <input type="text" id="phoneNumber"  data-mask="+40 999 999 999" name="phone_number" class="form-control pay-input" value="" />
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label mb-10" for="emailAddress">email address:</label>
                                                    <input id="emailAddress" type="text" name="email_address" class="form-control pay-input" value="" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-wrap">
                                                <div class="form-group mb-0">
                                                    <div class="checkbox checkbox-success">
                                                        <input id="checkbox_1" type="checkbox">
                                                        <label for="checkbox_1">Billing address is same as shipping address.</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                
                                <h3><span class="head-font capitalize-font">payment details</span></h3>
                                <fieldset>
                                     <!--CREDIT CART PAYMENT-->                                    
                                    <input type="hidden" id="id" name="id" value="{{$recomandation->id}}">
                                    <input type="hidden" id="maturity_date" name="maturity_date" value="{{$recomandation->maturity_date}}">
                                    <input type="hidden" id="price" name="price" value="{{$recomandation->price}}">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group mb-0">
                                                <img src="{{asset('dist/img/visa1.png')}}" class="pay-img" alt="">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <h5 class="pay-header">Payment Details</h5>
                                            <div class="form-group">
                                                <label class="control-label mb-10" for="cardNo">Name On Card:</label>
                                                <input type="text" class="form-control pay-input" name="card_name" value="" placeholder="Jack Sparrow" />
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label mb-10" for="cardNo">Card Number:</label>
                                                <input type="text" id="cardNo" placeholder="1456 1298 6574 1287" class="form-control pay-input" name="card_number" value="" />
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-6 col-xs-12">
                                                        <label class="control-label mb-10">Valid Through:</label>
                                                        <input type="text" class="form-control pay-input" placeholder="02/22" name="card_valid_till" value="" />
                                                    </div>
                                                    <div class="span1"></div>
                                                    <div class="col-md-6 col-xs-12">
                                                        <label class="control-label mb-10" for="cvv">card CVV:</label>
                                                        <input type="text" class="form-control pay-input" placeholder="20" name="card_ccv" value="" />
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                                $btn = number_format((float)$recomandation->price, 2, '.', '');
                                            ?>
                                            <div class="form-group text-center">
                                                <button type="button" class="btn btn-primary btn-lg pay-btn"> <span style="color: #d4e4ec;">PAY</span> ZAR{{$btn}}</button>
                                            </div>

                                        </div>
                                    </div>
                                    <!--CREDIT CART PAYMENT END-->
                                </fieldset>
                                
                                <h3><span class="head-font capitalize-font">confirmation</span></h3>
                                <fieldset>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-wrap">
                                                <div class="form-group">
                                                    <label class="control-label mb-10" for="firstName">Plan Name:</label>
                                                    <input type="text" class="form-control pay-input" value="{{$recomandation->name}}" readonly />
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label mb-10" for="firstName">Plan Price:</label>
                                                    <input type="text" class="form-control pay-input" value="{{$recomandation->price}}" readonly />
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label mb-10" for="firstName">Interest Rate:</label>
                                                    <input type="text" class="form-control pay-input" value="{{$recomandation->interest_rate}}" readonly />
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label mb-10" for="firstName">Maturity Days:</label>
                                                    <input type="text" class="form-control pay-input" value="{{$recomandation->maturity_date}} Days" readonly />
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label mb-10" for="firstName">Payment Type:</label>
                                                    <input type="text" class="form-control pay-input" value="{{$recomandation->bill_type}}" readonly />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-wrap">
                                                <div class="form-group">
                                                    <label class="control-label mb-10" for="firstName">User Name:</label>
                                                    <input type="text" class="form-control pay-input" value="{{Auth()->user()->name}}" readonly />
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label mb-10" for="firstName">Email:</label>
                                                    <input type="text" class="form-control pay-input" value="{{Auth()->user()->email}}" readonly />
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label mb-10" for="firstName">Address:</label>
                                                    <input type="text" class="form-control pay-input" value="827 Deerfield Ave. Greenwood" readonly />
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label mb-10" for="firstName">City:</label>
                                                    <input type="text" class="form-control pay-input" value="New York" readonly />
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label mb-10" for="firstName">Country:</label>
                                                    <input type="text" class="form-control pay-input" value="USA" readonly />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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