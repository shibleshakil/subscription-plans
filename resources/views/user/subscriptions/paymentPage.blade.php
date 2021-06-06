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
                <div class="panel panel-default card-view">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <form id="example-advanced-form2" action="{{ route('user-subscriptions.store')}}" method="post" enctype="multipart/form-data">@csrf
                                <h3><span class="head-font capitalize-font">your order</span></h3>
                                <fieldset>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-wrap">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><i class="icon-user"></i></div>
                                                        <input type="text" class="form-control"  name="Username" id="exampleInputuname" placeholder="Username">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><i class="icon-envelope-open"></i></div>
                                                        <input type="email" class="form-control" id="exampleInputEmail" name="email" placeholder="Enter email">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><i class="icon-lock"></i></div>
                                                        <input id="password-2" type="password" class="form-control" name="password" placeholder="Enter password">
                                                    </div>
                                                </div>
                                                <div class="form-group mb-0">
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><i class="icon-lock"></i></div>
                                                        <input type="password" class="form-control"  id="confirm-2" name="confirm"  placeholder="confirm password">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                
                                <h3><span class="head-font capitalize-font">shipping details</span></h3>
                                <fieldset>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-wrap">
                                                <div class="form-group">
                                                    <label class="control-label mb-10" for="exampleCountry">country:</label>
                                                    <select id="exampleCountry" class="form-control" name="country">
                                                        <option value="1">India</option>
                                                        <option value="2">Australia</option>
                                                        <option value="3">USA</option>
                                                        <option value="4">Japan</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-6 col-xs-12">
                                                            <label class="control-label mb-10" for="firstName">first name:</label>
                                                            <input id="firstName" type="text" name="first_name" class="form-control" value="" />
                                                        </div>
                                                        <div class="span1"></div>
                                                        <div class="col-md-6 col-xs-12">
                                                            <label class="control-label mb-10" for="lastName">last name:</label>
                                                            <input id="lastName" type="text" name="last_name" class="form-control" value="" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label mb-10" for="addressDetail">Address:</label>
                                                    <input id="addressDetail"  type="text" name="address" class="form-control" value="" />
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label mb-10" for="cityName">city:</label>
                                                    <select id="cityName" class="form-control" name="country">
                                                        <option value="">Banglore</option>
                                                        <option value="">Pune</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label mb-10" for="stateName">state:</label>
                                                    <select id="stateName" class="form-control" name="country">
                                                        <option value="">Karnataka</option>
                                                        <option value="">Maharashtra</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label mb-10" for="postalCode">zip/postal code:</label>
                                                    <input id="postalCode" type="text" name="zip_code"  data-mask="99999-9999" class="form-control" value="" />
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label mb-10" for="phoneNumber">phone number:</label>
                                                    <input type="text" id="phoneNumber"  data-mask="+40 999 999 999" name="phone_number" class="form-control" value="" />
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label mb-10" for="emailAddress">email address:</label>
                                                    <input id="emailAddress" type="text" name="email_address" class="form-control" value="" />
                                                </div>
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
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="control-label mb-10" for="CreditCardType">card type:</label>
                                                <select id="CreditCardType" name="CreditCardType" class="form-control">
                                                    <option value="5">Visa</option>
                                                    <option value="6">MasterCard</option>
                                                    <option value="7">American Express</option>
                                                    <option value="8">Discover</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label mb-10" for="cardNo">Credit Card Number:</label>
                                                <input type="text" id="cardNo" data-mask="9999-9999-9999-9999" class="form-control" name="car_number" value="" />
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label mb-10" for="cvv">card cvv:</label>
                                                <input type="text" id="cvv" class="form-control" data-mask="999" name="car_code" value="" />
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label mb-10">expiration date:</label>
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <select class="form-control required" name="month">
                                                            <option value="">Month</option>
                                                            <option value="1">01</option>
                                                            <option value="2">02</option>
                                                            <option value="3">03</option>
                                                            <option value="4">04</option>
                                                            <option value="5">05</option>
                                                            <option value="6">06</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <select class="form-control required" name="year">
                                                            <option value="1">Year</option>
                                                            <option value="2">2001</option>
                                                        </select>
                                                    </div>
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
                                        </div>
                                    </div>
                                    <!--CREDIT CART PAYMENT END-->
                                </fieldset>
                                
                                <h3><span class="head-font capitalize-font">confirmation</span></h3>
                                <fieldset>
                                        <table class="table display product-overview" id="datable_1">
                                            <thead>
                                                <tr>
                                                    <th>Photo</th>
                                                    <th>Product</th>
                                                    <th>Quantity</th>
                                                    <th>price</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="3">Subtotal:</th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <img src="{{asset('dist/img/chair.jpg')}}" alt="iMac" width="80">
                                                    </td>
                                                    <td>Rounded Chair</td>
                                                    <td>
                                                    <input class="vertical-spin" type="text" data-bts-button-down-class="btn btn-default"   data-bts-button-up-class="btn btn-default" value="20" name="vertical-spin">
                                                    </td>
                                                    <td>$400</td>
                                                    
                                                    <td><a href="javascript:void(0)" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="fa fa-trash"></i></a></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img src="{{asset('dist/img/chair2.jpg')}}" alt="iMac" width="80">
                                                    </td>
                                                    <td>Rounded Chair</td>
                                                    <td>
                                                        <input class="vertical-spin" type="text" data-bts-button-down-class="btn btn-default"   data-bts-button-up-class="btn btn-default" value="10" name="vertical-spin">
                                                    </td>
                                                    <td>$450</td>
                                                    <td><a href="javascript:void(0)" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="fa fa-trash"></i></a></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img src="{{asset('dist/img/chair3.jpg')}}" alt="iMac" width="80">
                                                    </td>
                                                    <td>Rounded Chair</td>
                                                    <td>
                                                    <input class="vertical-spin" type="text" data-bts-button-down-class="btn btn-default"   data-bts-button-up-class="btn btn-default" value="15" name="vertical-spin">
                                                    </td>
                                                    <td>$470</td>
                                                    
                                                    <td><a href="javascript:void(0)" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="fa fa-trash"></i></a></td>
                                                </tr>
                                            </tbody>
                                        </table>
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