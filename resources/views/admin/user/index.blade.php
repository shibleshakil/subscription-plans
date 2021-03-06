@extends('admin.layouts.app')
@section('content')
<!-- Main Content -->
<div class="page-wrapper">
    <div class="container-fluid mt-20">
				
        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h3 class="txt-dark">Member
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
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>User Type</th>
                                                <th>Member's Fund (ZAR)</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot class="hidden">
                                            <tr>
                                                <th>Sl</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>User Type</th>
                                                <th>Member's Fund (ZAR)</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @if(sizeof($users) > 0)
                                            @foreach($users as $key => $user)
                                            <tr class="@if(($key%2) == 0) even @else odd @endif">
                                                <td>{{++$sl}}</td>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>{{$user->type}}</td>
                                                <td>ZAR {{$user->balance}}</td>
                                                <td><a data-toggle="modal" data-target="#editUser" data-target-id="{{$user->id}}"
                                                  data-name="{{ $user->name }}"data-email="{{ $user->email }}"
                                                  data-type="{{$user->type}}"><button class="btn btn-info btn-icon-anim btn-square"
                                                  title="Edit"><i class="fa fa-pencil"> </i></button></a>

                                                  <a data-toggle="modal" data-target="#addFund" data-target-id="{{$user->id}}"
                                                  data-name="{{ $user->name }}"data-email="{{ $user->email }}"
                                                  data-type="{{$user->type}}"><button class="btn btn-primary btn-icon-anim btn-square"
                                                  title="Add Fund"><i class="fa fa-plus-circle"></i></button></a>

                                                  {!! Form::open([
                                                  'method'=>'DELETE',
                                                  'url' => [route('admin-user.destroy', $user->id)],
                                                  'style' => 'display:inline'
                                                  ]) !!}
                                                  {!! Form::button('<span class="glyphicon glyphicon-trash"
                                                      aria-hidden="true" title="Delete User" />', array(
                                                  'type' => 'submit',
                                                  'class' => 'btn btn-danger btn-icon-anim btn-square',
                                                  'title' => 'Delete User',
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
        <div class="modal fade" id="userEntry" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Member Entry Form
                            <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </h5>
                    </div>
                    <form role="form" action="{{ route ('admin-user.store') }}" method="post" enctype="multipart/form-data" class="clearForm">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label class="control-label mb-10">Member Name</label>
                                        <input type="text" class="form-control" id="name" placeholder="Member Name"
                                            name="name" value="{{ old('name') }}" autocomplete="off">
                                        @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label class="control-label mb-10">Member Email</label>
                                        <input type="emaill" class="form-control" id="email" placeholder="Member Email"
                                            name="email" value="{{ old('email') }}" autocomplete="off">
                                        @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label class="control-label mb-10">User Password</label>
                                        <input type="password" class="form-control" id="password" placeholder="User Password"
                                            name="password" value="{{ old('password') }}" autocomplete="off">
                                        @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group {{ $errors->has('type') ? ' has-error' : '' }}">
                                        <label class="control-label mb-10">Member Type</label>
                                        <select class="form-control select2" id="type" name="type">
                                            <option value="Member">Member</option>
                                            <option value="Admin">Admin</option>
                                        </select>
                                        @if ($errors->has('type'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('type') }}</strong>
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
        <div class="modal fade" id="editUser" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Member Edit Form
                            <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </h5>
                    </div>
                    <form role="form" action="{{route('admin-user.update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="hidden" name="id" id="id">
                                    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label class="control-label mb-10">Member Name</label>
                                        <input type="text" class="form-control" id="ename" placeholder="Member Name"
                                            name="name" value="{{ old('name') }}" autocomplete="off" readonly>
                                        @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label class="control-label mb-10">Member Email</label>
                                        <input type="emaill" class="form-control" id="eemail" placeholder="Member Email"
                                            name="email" value="{{ old('email') }}" autocomplete="off" readonly>
                                        @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                    <div class="form-group {{ $errors->has('type') ? ' has-error' : '' }}">
                                        <label class="control-label mb-10">Member Type</label>
                                        <select class="form-control select2" id="etype" name="type">
                                            <option value="Member">Member</option>
                                            <option value="Admin">Admin</option>
                                        </select>
                                        @if ($errors->has('type'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('type') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" id="categorySave" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--/edit Model-->

        <!--fund Model-->
        <div class="modal fade" id="addFund" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Member Edit Form
                            <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </h5>
                    </div>
                    <form role="form" action="{{route('admin-user.fund')}}" method="post" enctype="multipart/form-data" class="clearform">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="hidden" name="id" id="id">
                                    <!-- <div class="form-group {{ $errors->has('balance') ? ' has-error' : '' }}">
                                        <label class="control-label mb-10">Fund Transfer</label>
                                        <input type="text" class="form-control" id="balance" placeholder="Transfer Fund"
                                            name="balance" value="{{ old('balance') }}" autocomplete="off">
                                        @if ($errors->has('balance'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('balance') }}</strong>
                                        </span>
                                        @endif
                                    </div> -->
                                    <div class="form-group {{ $errors->has('balance') ? ' has-error' : '' }}">
                                        <label class="control-label mb-10">Fund Transfer</label>
                                        <input id="balance" type="text"  placeholder="ZAR 1000"  name="balance" value="{{ old('balance') }}" class=" form-control" data-bts-button-down-class="btn btn-default" data-bts-button-up-class="btn btn-default">
                                        @if ($errors->has('balance'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('balance') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" id="categorySave" class="btn btn-primary">Transfer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--/fund Model-->
    </div>
	
	<!-- footer -->
<!-- Main Content -->
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

    $("input[name='balance']").TouchSpin({
        min: 10,
        max: 10000000,
        step: 0.01,
        decimals: 2,
        boostat: 5,
        maxboostedstep: 10,
        postfix: 'ZAR'
    });

    $("#userEntry").on("show.bs.modal", function (e) {
        $('.clearForm').clearForm();
        $('.select2').select2();
    });
    
    $("#editUser").on("show.bs.modal", function(e) {
        // alert('gg');
        var id = $(e.relatedTarget).data('target-id');
        var name = $(e.relatedTarget).data('name');
        var email = $(e.relatedTarget).data('email');
        var type = $(e.relatedTarget).data('type');

        $('.modal-body #id').val(id);
        $('.modal-body #ename').val(name);
        $('.modal-body #eemail').val(email);
        $('.modal-body #etype').val(type);
        $('.select2').select2();
    });
    
    $("#addFund").on("show.bs.modal", function(e) {
        // alert('gg');
        var id = $(e.relatedTarget).data('target-id');

        $('.modal-body #id').val(id);
        $('.select2').select2();
    });
</script>
@endsection
<!-- /script -->
