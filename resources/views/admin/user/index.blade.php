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
                                    <table id="example" class="table table-hover display  pb-30" >
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Position</th>
                                                <th>Office</th>
                                                <th>Age</th>
                                                <th>Start date</th>
                                                <th>Salary</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Name</th>
                                                <th>Position</th>
                                                <th>Office</th>
                                                <th>Age</th>
                                                <th>Start date</th>
                                                <th>Salary</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <tr>
                                                <td>Tiger Nixon</td>
                                                <td>System Architect</td>
                                                <td>Edinburgh</td>
                                                <td>61</td>
                                                <td>2011/04/25</td>
                                                <td>$320,800</td>
                                            </tr>
                                            <tr>
                                                <td>Tiger Nixon</td>
                                                <td>System Architect</td>
                                                <td>Edinburgh</td>
                                                <td>61</td>
                                                <td>2011/04/25</td>
                                                <td>$320,800</td>
                                            </tr>
                                            <tr>
                                                <td>Tiger Nixon</td>
                                                <td>System Architect</td>
                                                <td>Edinburgh</td>
                                                <td>61</td>
                                                <td>2011/04/25</td>
                                                <td>$320,800</td>
                                            </tr>
                                            <tr>
                                                <td>Tiger Nixon</td>
                                                <td>System Architect</td>
                                                <td>Edinburgh</td>
                                                <td>61</td>
                                                <td>2011/04/25</td>
                                                <td>$320,800</td>
                                            </tr>
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
                        <h5 class="modal-title" id="exampleModalLabel">User Entry Form</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form role="form" action="{{ route ('admin-user.store') }}" method="post" enctype="multipart/form-data" class="clearForm">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group {{ $errors->has('category_id') ? ' has-error' : '' }}">
                                        <label for="">User Name</label>
                                        <input type="text" class="form-control" id="name" placeholder="User Name"
                                            name="name" value="{{ old('name') }}" autocomplete="off">
                                        @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group {{ $errors->has('category_id') ? ' has-error' : '' }}">
                                        <label for="">User Email</label>
                                        <input type="emaill" class="form-control" id="email" placeholder="User Email"
                                            name="email" value="{{ old('email') }}" autocomplete="off">
                                        @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group {{ $errors->has('category_id') ? ' has-error' : '' }}">
                                        <label for="">User Password</label>
                                        <input type="password" class="form-control" id="password" placeholder="User Password"
                                            name="password" value="{{ old('password') }}" autocomplete="off">
                                        @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group {{ $errors->has('category_id') ? ' has-error' : '' }}">
                                        <label for="">User Type</label>
                                        <select class="form-control select2">
                                            <option>Select</option>
                                            <option value="1">Admin</option>
                                            <option value="0">User</option>
                                        </select>
                                        @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
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
    </div>
	
	<!-- footer -->
<!-- Main Content -->
@endsection

<!-- script -->
@section('script')
<script type="text/javascript">
    $(document).ready(function () {
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

        $("#userEntry").on("show.bs.modal", function (e) {
            $('.clearForm').clearForm();
            $('.select2').select2();
        });

    });
</script>
@endsection
<!-- /script -->
