@extends('user.layouts.app')
@section('content')
<!-- Main Content -->
<div class="page-wrapper ml-0">
    <div class="container-fluid">
        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Offered Plans To Upgrade</h5>
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
                        
        <!--  Row  -->
        <div class="row">
            @if(sizeof($uplist) > 0)
            @foreach($uplist as $key => $recom)
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
                                <button type="submit" data-toggle="modal" data-target="#upgradePayment" data-target-id="{{$recom->id}}"
                                    data-maturity_date="{{ $recom->maturity_date }}" data-price="{{ $recom->price }}" 
                                    class="btn  btn-primary btn-rounded mt-20" id="submitbtn">Upgrade</button>
                                <!-- <form action="{{ route('user-subscriptions.store')}}" method="post" id="addSubscribe" enctype="multipart/form-data">@csrf
                                    <input type="hidden" id="id" name="id" value="{{$recom->id}}">
                                    <input type="hidden" id="maturity_date" name="maturity_date" value="{{$recom->maturity_date}}">
                                    <button type="submit" class="btn  btn-primary btn-rounded mt-20" id="submitbtn">Subscribe</button>
                                </form> -->
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
                                <p><span class="h1 font-weight-bold">You're Already Using The Upgraded Plan.</span></p>
                            </div>
                        </div>
                    </div>	
                </div>	
            </div>
            @endif				
        </div>	
        <!-- / Row  -->  

         <!--upgrade Model-->
         <div class="modal fade" id="upgradePayment" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Payment For Subscription
                            <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </h5>
                    </div>
                    <form role="form" action="{{ route('user-subscriptions-upgrade')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="hidden" id="id" name="id">
                                    <input type="hidden" id="maturity_date" name="maturity_date">
                                    <input type="hidden" id="price" name="price">
                                    <input type="hidden" id="create_subscription_id"  name="create_subscription_id" value="{{ isset($old) ? $old->create_subscription_id : '' }}">
                                   
                                    <div class="panel panel-default card-view">
                                        <div class="panel-wrapper collapse in">
                                            <div class="panel-body">
                                                <div  class="tab-struct custom-tab-1">
                                                    <ul role="tablist" class="nav nav-tabs" id="myTabs_7">
                                                        <li class="active" role="presentation"><a aria-expanded="true"  data-toggle="tab" role="tab" id="home_tab_7" href="#home_7">Payment Details</a></li>
                                                        <li role="presentation" class=""><a  data-toggle="tab" id="profile_tab_7" role="tab" href="#profile_7" aria-expanded="false">Others</a></li>
                                                    </ul>
                                                    <div class="tab-content" id="myTabContent_7">
                                                        <div  id="home_7" class="tab-pane fade active in" role="tabpanel">
                                                            <div class="col-md-6 mt-10">
                                                                <div class="input-group">
                                                                    <img src="{{ asset('dist/img/visa.jpg') }}" style="width:100%; height:auto;" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <h5>Payment Details</h5>
                                                                <div class="form-group {{ $errors->has('c_name') ? ' has-error' : '' }}">
                                                                    <label class="control-label mb-10">Name on card</label>
                                                                    <input type="text" class="form-control" id="c_name" placeholder="Mr John"
                                                                        name="c_name" value="{{ old('c_name') }}" autocomplete="off">
                                                                    @if ($errors->has('c_name'))
                                                                    <span class="help-block">
                                                                        <strong>{{ $errors->first('c_name') }}</strong>
                                                                    </span>
                                                                    @endif
                                                                </div>
                                                                <div class="form-group {{ $errors->has('card_no') ? ' has-error' : '' }}">
                                                                    <label class="control-label mb-10">Card Number</label>
                                                                    <input type="text" class="form-control" id="card_no" placeholder=".... .... .... ...." data-slots="." data-accept="\d" size="19" name="card_no" value="{{ old('card_no') }}" autocomplete="off">
                                                                    @if ($errors->has('card_no'))
                                                                    <span class="help-block">
                                                                        <strong>{{ $errors->first('card_no') }}</strong>
                                                                    </span>
                                                                    @endif
                                                                </div>
                                                                <div class="col-md-6 pa-0 pr-5">
                                                                    <div class="form-group {{ $errors->has('valid_till') ? ' has-error' : '' }}">
                                                                        <label class="control-label mb-10">Valid Through</label>
                                                                        <input type="text" class="form-control" id="valid_till" placeholder="02/22"
                                                                            name="valid_till" value="{{ old('valid_till') }}" autocomplete="off">
                                                                        @if ($errors->has('valid_till'))
                                                                        <span class="help-block">
                                                                            <strong>{{ $errors->first('valid_till') }}</strong>
                                                                        </span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 pa-0 pl-5">
                                                                    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                                                        <label class="control-label mb-10">CVV</label>
                                                                        <input type="text" class="form-control" id="cvv" placeholder="201"
                                                                            name="cvv" value="{{ old('name') }}" autocomplete="off">
                                                                        @if ($errors->has('name'))
                                                                        <span class="help-block">
                                                                            <strong>{{ $errors->first('name') }}</strong>
                                                                        </span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div  id="profile_7" class="tab-pane fade" role="tabpanel">
                                                            <p>under development</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default btn-rounded" data-dismiss="modal">Cancel</button>
                            <button type="submit" id="subscribe" class="btn btn-success btn-rounded">Upgrade</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--/upgrade Model-->    

    </div>
</div>
<!-- /Main Content -->
@endsection

<!-- script -->
@section('script')
<script type="text/javascript">
    $.fn.clearForm = function () {
        return this.each(function () {
            var type = this.type, tag = this.tagName.toLowerCase();
            if (tag == 'form')
                return $(':input', this).clearForm();
            if (type == 'text' || type == 'password' || tag == 'textarea' || type == 'date')
                this.value = '';
            else if (type == 'checkbox' || type == 'radio')
                this.checked = false;
            else if (tag == 'select')
                this.selectedIndex = -1;
        });
    };

    $("#upgradePayment").on("show.bs.modal", function (e) {
        var id = $(e.relatedTarget).data('target-id');
        var maturity_date = $(e.relatedTarget).data('maturity_date');
        var price = $(e.relatedTarget).data('price');

        $('.modal-body #id').val(id);
        $('.modal-body #maturity_date').val(maturity_date);
        $('.modal-body #price').val(price);
        $('.clearForm').clearForm();
        $('.select2').select2();
    });
    
</script>
@endsection
<!-- /script -->