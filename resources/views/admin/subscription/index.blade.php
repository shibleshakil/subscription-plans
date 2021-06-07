@extends('admin.layouts.app')
@section('content')
<!-- Main Content -->
<div class="page-wrapper">
    <div class="container-fluid mt-20">
				
        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h3 class="txt-dark">Subscription
                    <button type="button" class="btn btn-primary" id="add" data-toggle="modal"
                        data-target="#subscriptionNew" style="padding:4px 8px;"><i class="fa fa-plus-circle"></i>
                    </button>
                </h3>
                
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
            </div>
        </div>
        <!-- /Title -->
        
        <!-- Row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default card-view">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="table-wrap">
                                <div class="table-responsive">
                                    <table id="example" class="table table-hover table-bordered display" >
                                        <thead>
                                            <tr>
                                                <th>Sl</th>
                                                <th>Plan</th>
                                                <th>Price (ZAR)</th>
                                                <th>Start Date</th>
                                                <th>Billing Frequency</th>
                                                <th>Maturity Days</th>
                                                <th>Interest Rate (%)</th>
                                                <th>Total Earning (ZAR)</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot class="hidden">
                                            <tr>
                                                <th>Sl</th>
                                                <th>Plan</th>
                                                <th>Price (ZAR)</th>
                                                <th>Start Date</th>
                                                <th>Billing Frequency</th>
                                                <th>Maturity Dats</th>
                                                <th>Interest Rate (%)</th>
                                                <th>Total Earning (ZAR)</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @if(sizeof($data) > 0)
                                            @foreach($data as $key => $d)
                                            <tr class="@if(($key%2) == 0) even @else odd @endif">
                                                <td>{{++$sl}}</td>
                                                <td>{{$d->name}}</td>
                                                <td>ZAR {{$d->price}}</td>
                                                <td>{{$d->start_date}}</td>
                                                <td>{{$d->bill_type}}</td>
                                                <td>{{$d->maturity_date}} Days</td>
                                                <td>{{$d->interest_rate}} %</td>
                                                <td>ZAR {{$d->total_earning}}</td>
                                                <td>@if($d->status == 1) Active @else Deactive @endif</td>
                                                <td><a data-toggle="modal" data-target="#subscriptionEdit" data-target-id="{{$d->id}}"
                                                    data-name="{{ $d->name }}" data-price="{{ $d->price }}" data-maturity_date="{{ $d->maturity_date }}"
                                                    data-start_date="{{$d->start_date}}" data-bill_type="{{ $d->bill_type }}" 
                                                    data-interest_rate="{{ $d->interest_rate }}" data-total_earning="{{ $d->total_earning }}">
                                                    <button class="btn btn-primary btn-icon-anim btn-square"
                                                    title="Edit"><i class="fa fa-pencil"> </i></button></a>

                                                    {!! Form::open([
                                                    'method'=>'DELETE',
                                                    'url' => [route('admin-subscription.destroy', $d->id)],
                                                    'style' => 'display:inline'
                                                    ]) !!}
                                                    {!! Form::button('<span class="glyphicon glyphicon-trash"
                                                        aria-hidden="true" title="Delete Subscription Plan" />', array(
                                                    'type' => 'submit',
                                                    'class' => 'btn btn-danger btn-icon-anim btn-square',
                                                    'title' => 'Delete Subscription Plan',
                                                    'onclick'=>'return confirm("Confirm delete?")'
                                                    )) !!}
                                                    {!! Form::close() !!}
                                                </td>
                                            </tr>
                                            @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>	
            </div>
        </div>
        <!-- /Row -->

        <!--add Model-->
        <div class="modal fade" id="subscriptionNew" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New Subscription Add Form
                            <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </h5>
                    </div>
                    <form role="form" action="{{ route ('admin-subscription.store') }}" method="post" enctype="multipart/form-data" class="clearForm">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label class="control-label mb-10">Plan Name</label>
                                        <input type="text" class="form-control" id="name" placeholder="Plan Name"
                                            name="name" value="{{ old('name') }}" autocomplete="off">
                                        @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group {{ $errors->has('price') ? ' has-error' : '' }}">
                                        <label class="control-label mb-10">Plan Price</label>
                                        <input id="price" type="text" placeholder="ZAR 1000" name="price" value="{{ old('price') }}" class=" form-control" data-bts-button-down-class="btn btn-default" data-bts-button-up-class="btn btn-default">
                                        @if ($errors->has('price'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('price') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group {{ $errors->has('interest_rate') ? ' has-error' : '' }}">
                                        <label class="control-label mb-10">Interest Rate</label>
                                        <input id="interest_rate" type="text" class="form-control" value="{{ old('interest_rate') }}" name="interest_rate" placeholder="40%">
                                        @if ($errors->has('interest_rate'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('interest_rate') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group {{ $errors->has('total_earning') ? ' has-error' : '' }}">
                                        <label class="control-label mb-10">Total Earning</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="total_earning" name="total_earning" placeholder="Total Earning" readonly>
                                            <div class="input-group-addon" style="border-radius: 0px 10px 10px 0px;"><i class="fa fa-dollar"></i></div>
                                        </div>
                                        @if ($errors->has('total_earning'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('total_earning') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group {{ $errors->has('start_date') ? ' has-error' : '' }}">
                                        <label class="control-label mb-10">Plan Start Date</label>
                                        <input type="date" class="form-control" id="start_date" placeholder="Start date"
                                            name="start_date" value="<?php echo date("Y-m-d"); ?>" autocomplete="off">
                                        @if ($errors->has('start_date'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('start_date') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group {{ $errors->has('bill_type') ? ' has-error' : '' }}">
                                        <label class="control-label mb-10">Billing Frequency</label>
                                        <select class="form-control select2" id="bill_type" name="bill_type">
                                            <option>Select</option>
                                            <option value="Weekly">Weekly</option>
                                            <option value="Forthrightly">Forthrightly</option>
                                            <option value="Monthly">Monthly</option>
                                            <option value="Annually">Annually</option>
                                        </select>
                                        @if ($errors->has('bill_type'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('bill_type') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group {{ $errors->has('maturity_date') ? ' has-error' : '' }}">
                                        <label class="control-label mb-10">Maturity Date</label>
                                        <select class="form-control select2" id="maturity_date" name="maturity_date">
                                            <option>Select</option>
                                            <option value="96">96 Days</option>
                                            <option value="188">188 Days</option>
                                            <option value="370">370 Days</option>
                                        </select>
                                        @if ($errors->has('maturity_date'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('maturity_date') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" id="categorySave" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--/add Model-->

        <!--edit Model-->
        <div class="modal fade" id="subscriptionEdit" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Subscription Edit Form
                            <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </h5>
                    </div>
                    <form role="form" action="{{ route ('admin-subscription.update') }}" method="post" enctype="multipart/form-data" class="clearForm">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="hidden" name="id" id="id">
                                    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label class="control-label mb-10">Plan Name</label>
                                        <input type="text" class="form-control" id="ename" placeholder="Plan Name"
                                            name="name" value="{{ old('name') }}" autocomplete="off">
                                        @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group {{ $errors->has('price') ? ' has-error' : '' }}">
                                        <label class="control-label mb-10">Plan Price</label>
                                        <input id="eprice" type="text" name="price" value="{{ old('price') }}" class=" form-control" data-bts-button-down-class="btn btn-default" data-bts-button-up-class="btn btn-default">
                                        @if ($errors->has('price'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('price') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group {{ $errors->has('interest_rate') ? ' has-error' : '' }}">
                                        <label class="control-label mb-10">Interest Rate</label>
                                        <input id="einterest_rate" type="text" class="form-control" value="{{ old('interest_rate') }}" name="interest_rate" placeholder="40%">
                                        @if ($errors->has('interest_rate'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('interest_rate') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group {{ $errors->has('total_earning') ? ' has-error' : '' }}">
                                        <label class="control-label mb-10">Total Earning</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="etotal_earning" name="total_earning" placeholder="Total Earning" readonly>
                                            <div class="input-group-addon" style="border-radius: 0px 10px 10px 0px;"><i class="fa fa-dollar"></i></div>
                                        </div>
                                        @if ($errors->has('total_earning'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('total_earning') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group {{ $errors->has('start_date') ? ' has-error' : '' }}">
                                        <label class="control-label mb-10">Plan Start Date</label>
                                        <input type="date" class="form-control" id="estart_date" placeholder="Start date"
                                            name="start_date" value="<?php echo date("Y-m-d"); ?>" autocomplete="off">
                                        @if ($errors->has('start_date'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('start_date') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group {{ $errors->has('bill_type') ? ' has-error' : '' }}">
                                        <label class="control-label mb-10">Billing Frequency</label>
                                        <select class="form-control select2" id="ebill_type" name="bill_type">
                                            <option>Select</option>
                                            <option value="Weekly">Weekly</option>
                                            <option value="Forthrightly">Forthrightly</option>
                                            <option value="Monthly">Monthly</option>
                                            <option value="Annually">Annually</option>
                                        </select>
                                        @if ($errors->has('bill_type'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('bill_type') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group {{ $errors->has('maturity_date') ? ' has-error' : '' }}">
                                        <label class="control-label mb-10">Maturity Date</label>
                                        <select class="form-control select2" id="ematurity_date" name="maturity_date">
                                            <option>Select</option>
                                            <option value="96">96 Days</option>
                                            <option value="188">188 Days</option>
                                            <option value="370">370 Days</option>
                                        </select>
                                        @if ($errors->has('maturity_date'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('maturity_date') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" id="categorySave" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--/edit Model-->
    </div>
	
	<!-- footer -->
<!-- Main Content -->
@endsection

<!-- script -->
@section('script')
<script type="text/javascript">
    $("input[name='interest_rate']").TouchSpin({
        min: 1,
        max: 100,
        step: 0.01,
        decimals: 2,
        boostat: 5,
        maxboostedstep: 1,
        postfix: '%'
    });
    $("input[name='price']").TouchSpin({
        min: 10,
        max: 10000000,
        step: 0.01,
        decimals: 2,
        boostat: 5,
        maxboostedstep: 10,
        postfix: 'ZAR'
    });

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

    $("#subscriptionNew").on("show.bs.modal", function (e) {
        $('.clearForm').clearForm();
        $('.select2').select2();
    });
    
    $("#subscriptionEdit").on("show.bs.modal", function(e) {
        // alert('gg');
        var id = $(e.relatedTarget).data('target-id');
        var name = $(e.relatedTarget).data('name');
        var price = $(e.relatedTarget).data('price');
        var interest_rate = $(e.relatedTarget).data('interest_rate');
        var total_earning = $(e.relatedTarget).data('total_earning');
        var start_date = $(e.relatedTarget).data('start_date');
        var bill_type = $(e.relatedTarget).data('bill_type');
        var maturity_date = $(e.relatedTarget).data('maturity_date');

        $('.modal-body #id').val(id);
        $('.modal-body #ename').val(name);
        $('.modal-body #eprice').val(price);
        $('.modal-body #einterest_rate').val(interest_rate);
        $('.modal-body #etotal_earning').val(total_earning);
        $('.modal-body #estart_date').val(start_date);
        $('.modal-body #ebill_type').val(bill_type);
        $('.modal-body #ematurity_date').val(maturity_date);
        $('.select2').select2();
    });
</script>
@endsection
<!-- /script -->
