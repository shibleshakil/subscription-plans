@extends('user.layouts.app')
@section('content')
<!-- Main Content -->
<div class="page-wrapper user-page-wrapper">
	<div class="container-fluid pt-0">
		@if ($message = Session::get('success'))
		<div class="alert alert-success alert-block">
			<button type="button" class="close txt-danger" data-dismiss="alert">×</button>
			<strong>{{ $message }}</strong>
		</div>
		@endif
		@if ($message = Session::get('error'))
		<div class="alert alert-danger alert-block">
			<button type="button" class="close txt-danger" data-dismiss="alert">×</button>
			<strong>{{ $message }}</strong>
		</div>
		@endif
		@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<button type="button" class="close txt-danger" data-dismiss="alert">×</button>
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif

        <!-- Row -->
        <div class="row">
            <div class="col-md-12 mt-40">
                <div class="panel panel-default border-panel card-view chat-card pa-0">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body pa-0">
                            <div class="chat-cmplt-wrap chat-for-widgets-1">
                                <div class="chat-box-wrap">
                                    <div>
                                        <form role="search" class="chat-search">
                                            <div class="input-group">
                                                <input id="example-input1-group21" name="example-input1-group2" class="form-control" placeholder="Search" type="text">
                                                <span class="input-group-btn">
                                                <button type="button" class="btn  btn-default"><i class="zmdi zmdi-search txt-custom-icon"></i></button>
                                                </span>
                                            </div>
                                        </form>
                                        <div class="chatapp-nicescroll-bar">
                                            <ul class="chat-list-wrap">
                                                <li class="chat-list">
                                                    <div class="chat-body">
                                                        <a  href="javascript:void(0)">
                                                            <div class="chat-data">
                                                                <img class="user-img img-circle"  src="{{ asset ('dist/img/user.png') }}" alt="user"/>
                                                                <div class="user-data">
                                                                    <span class="name block capitalize-font">Clay Masse</span>
                                                                    <span class="time block truncate txt-grey">No one saves us but ourselves.</span>
                                                                </div>
                                                                <div class="status away"></div>
                                                                <div class="clearfix"></div>
                                                            </div>
                                                        </a>
                                                        <a  href="javascript:void(0)">
                                                            <div class="chat-data">
                                                                <img class="user-img img-circle"  src="{{ asset ('dist/img/user1.png') }}" alt="user"/>
                                                                <div class="user-data">
                                                                    <span class="name block capitalize-font">Evie Ono</span>
                                                                    <span class="time block truncate txt-grey">Unity is strength</span>
                                                                </div>
                                                                <div class="status offline"></div>
                                                                <div class="clearfix"></div>
                                                            </div>
                                                        </a>
                                                        <a  href="javascript:void(0)">
                                                            <div class="chat-data">
                                                                <img class="user-img img-circle"  src="{{ asset ('dist/img/user2.png') }}" alt="user"/>
                                                                <div class="user-data">
                                                                    <span class="name block capitalize-font">Madalyn Rascon</span>
                                                                    <span class="time block truncate txt-grey">Respect yourself if you would have others respect you.</span>
                                                                </div>
                                                                <div class="status online"></div>
                                                                <div class="clearfix"></div>
                                                            </div>
                                                        </a>
                                                        <a  href="javascript:void(0)">
                                                            <div class="chat-data">
                                                                <img class="user-img img-circle"  src="{{ asset ('dist/img/user3.png') }}" alt="user"/>
                                                                <div class="user-data">
                                                                    <span class="name block capitalize-font">Mitsuko Heid</span>
                                                                    <span class="time block truncate txt-grey">I’m thankful.</span>
                                                                </div>
                                                                <div class="status online"></div>
                                                                <div class="clearfix"></div>
                                                            </div>
                                                        </a>
                                                        <a  href="javascript:void(0)">
                                                            <div class="chat-data active-user active-chat-user">
                                                                <img class="user-img img-circle"  src="{{ asset ('dist/img/user.png') }}" alt="user"/>
                                                                <div class="user-data">
                                                                    <span class="name block capitalize-font">Ezequiel Merideth</span>
                                                                    <span class="time block truncate txt-grey">Not too bad.</span>
                                                                </div>
                                                                <div class="status offline"></div>
                                                                <div class="clearfix"></div>
                                                            </div>
                                                        </a>
                                                        <a  href="javascript:void(0)">
                                                            <div class="chat-data">
                                                                <img class="user-img img-circle"  src="{{ asset ('dist/img/user1.png') }}" alt="user"/>
                                                                <div class="user-data">
                                                                    <span class="name block capitalize-font">Jonnie Metoyer</span>
                                                                    <span class="time block truncate txt-grey">Genius is eternal patience.</span>
                                                                </div>
                                                                <div class="status online"></div>
                                                                <div class="clearfix"></div>
                                                            </div>
                                                        </a>
                                                        <a  href="javascript:void(0)">
                                                            <div class="chat-data">
                                                                <img class="user-img img-circle"  src="{{ asset ('dist/img/user2.png') }}" alt="user"/>
                                                                <div class="user-data">
                                                                    <span class="name block capitalize-font">Angelic Lauver</span>
                                                                    <span class="time block truncate txt-grey">Every burden is a blessing.</span>
                                                                </div>
                                                                <div class="status away"></div>
                                                                <div class="clearfix"></div>
                                                            </div>
                                                        </a>
                                                        <a  href="javascript:void(0)">
                                                            <div class="chat-data">
                                                                <img class="user-img img-circle"  src="{{ asset ('dist/img/user3.png') }}" alt="user"/>
                                                                <div class="user-data">
                                                                    <span class="name block capitalize-font">Priscila Shy</span>
                                                                    <span class="time block truncate txt-grey">Wise to resolve, and patient to perform.</span>
                                                                </div>
                                                                <div class="status online"></div>
                                                                <div class="clearfix"></div>
                                                            </div>
                                                        </a>
                                                        <a  href="javascript:void(0)">
                                                            <div class="chat-data">
                                                                <img class="user-img img-circle"  src="{{ asset ('dist/img/user4.png') }}" alt="user"/>
                                                                <div class="user-data">
                                                                    <span class="name block capitalize-font">Linda Stack</span>
                                                                    <span class="time block truncate txt-grey">Our patience will achieve more than our force.</span>
                                                                </div>
                                                                <div class="status away"></div>
                                                                <div class="clearfix"></div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="recent-chat-box-wrap">
                                    <div class="recent-chat-wrap">
                                        <div class="panel-heading ma-0 pt-15">
                                            <div class="goto-back">
                                                <a  id="goto_back_widget_1" href="javascript:void(0)" class="inline-block txt-custom-icon">
                                                    <i class="zmdi zmdi-account-add"></i>
                                                </a>	
                                                <span class="inline-block txt-success">Ezequiel</span>
                                                <a href="javascript:void(0)" class="inline-block text-right txt-custom-icon"><i class="zmdi zmdi-more"></i></a>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                        <div class="panel-wrapper collapse in">
                                            <div class="panel-body pa-0">
                                                <div class="chat-content">
                                                    <ul class="chatapp-chat-nicescroll-bar pt-20">
                                                        <li class="friend">
                                                            <div class="friend-msg-wrap">
                                                                <img class="user-img img-circle block pull-left"  src="{{ asset ('dist/img/user.png') }}" alt="user"/>
                                                                <div class="msg pull-left">
                                                                    <p>Hello Jason, how are you, it's been a long time since we last met?</p>
                                                                    <div class="msg-per-detail text-right">
                                                                        <span class="msg-time txt-grey">2:30 PM</span>
                                                                    </div>
                                                                </div>
                                                                <div class="clearfix"></div>
                                                            </div>	
                                                        </li>
                                                        <li class="self mb-10">
                                                            <div class="self-msg-wrap">
                                                                <div class="msg block pull-right self-msg-bg"> Oh, hi Sarah I'm have got a new job now and is going great.
                                                                    <div class="msg-per-detail text-right">
                                                                        <span class="msg-time txt-white">2:31 pm</span>
                                                                    </div>
                                                                </div>
                                                                <div class="clearfix"></div>
                                                            </div>	
                                                        </li>
                                                        <li class="self">
                                                            <div class="self-msg-wrap">
                                                                <div class="msg block pull-right self-msg-bg">  How about you?
                                                                    <div class="msg-per-detail text-right">
                                                                        <span class="msg-time txt-white">2:31 pm</span>
                                                                    </div>
                                                                </div>
                                                                <div class="clearfix"></div>
                                                            </div>	
                                                        </li>
                                                        <li class="friend">
                                                            <div class="friend-msg-wrap">
                                                                <img class="user-img img-circle block pull-left"  src="{{ asset ('dist/img/user.png') }}" alt="user"/>
                                                                <div class="msg pull-left"> 
                                                                    <p>Not too bad.</p>
                                                                    <div class="msg-per-detail  text-right">
                                                                        <span class="msg-time txt-grey">2:35 pm</span>
                                                                    </div>
                                                                </div>
                                                                <div class="clearfix"></div>
                                                            </div>	
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="input-group">
                                                    <input type="text" id="input_msg_send_chatapp" name="send-msg" class="input-msg-send form-control chat-input-group" placeholder="Type something........">
                                                    <div class="input-group-btn emojis">
                                                        <div class="dropup  custom-emoji">
                                                            <button type="button" class="btn  btn-default  dropdown-toggle" data-toggle="dropdown" ><i class="zmdi zmdi-mood"></i></button>
                                                            <ul class="dropdown-menu dropdown-menu-right">
                                                                <li><a href="javascript:void(0)">Action</a></li>
                                                                <li><a href="javascript:void(0)">Another action</a></li>
                                                                <li class="divider"></li>
                                                                <li><a href="javascript:void(0)">Separated link</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="input-group-btn attachment">
                                                        <div class="fileupload btn  btn-default  custom-file"><i class="zmdi zmdi-attachment-alt"></i>
                                                            <input type="file" class="upload">
                                                        </div>
                                                    </div>
                                                    <div class="input-group-btn attachment send-div">
                                                        <img src="{{ asset ('dist/img/send.png') }}" class="send-img" alt="">
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Row -->
	</div>
</div>
<!-- Main Content -->
@endsection

<!-- script -->
@section('script')
<script type="text/javascript">
</script>
@endsection
<!-- /script -->