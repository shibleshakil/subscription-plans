@extends('admin.layouts.app')
@section('content')
<!-- Main Content -->
<div class="page-wrapper">
    <div class="container-fluid">
				
        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h3 class="txt-dark">User
                    <button type="button" class="btn btn-primary" id="add" data-toggle="modal"
                        data-target="#userEntry" style="padding:4px 8px;"><i class="fa fa-plus-circle"></i>
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
                                    <table id="example" class="table table-hover table-bordered display">
                                        <thead>
                                            <tr>
                                                <th>Sl</th>
                                                <th>Member Name</th>
                                                <th>Plan Name</th>
                                                <th>Interest Rate (%)</th>
                                                <th>Price (R)</th>
                                                <th>Start Date</th>
                                                <th>Maturity Date</th>
                                                <th>Next Payment In (Days)</th>
                                                <th>Matured In (Days)</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tfoot class="hidden">
                                            <tr>
                                                <th>Sl</th>
                                                <th>Member Name</th>
                                                <th>Plan Name</th>
                                                <th>Interest Rate (%)</th>
                                                <th>Price (R)</th>
                                                <th>Start Date</th>
                                                <th>Maturity Date</th>
                                                <th>Next Payment In (Days)</th>
                                                <th>Matured In (Days)</th>
                                                <th>Status</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @if(sizeof($subscriber) > 0)
                                            @foreach($subscriber as $key => $user)
                                            <tr class="@if(($key%2) == 0) even @else odd @endif">
                                                <td>{{++$sl}}</td>
                                                <td>{{$user->user->name}}</td>
                                                <td>{{$user->create_subscription->name}}</td>
                                                <td>{{$user->create_subscription->interest_rate}}%</td>
                                                <td>ZAR{{$user->create_subscription->price}}</td>
                                                <td>{{$user->active_date}}</td>
                                                <td>{{$user->maturity_exp}}</td>
                                                <td>{{$user->maturity_left}}</td>
                                                <td>{{$user->create_subscription->maturity_date}} Days</td>
                                                <td>@if($user->status == 1) Active @else Deactive @endif</td>
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
    </div>
	
	<!-- footer -->
<!-- Main Content -->
@endsection

<!-- script -->
@section('script')
<script type="text/javascript">
</script>
@endsection
<!-- /script -->
