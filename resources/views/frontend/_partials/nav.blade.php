@push('css-style')
	<link rel="stylesheet" href="{{asset('public/frontend/css/nav/nav.css')}}">
@endpush
<section class="navigation">
	<!-- begin #header -->
		<div id="header" class="header navbar navbar-default navbar-fixed-top">
			<!-- begin container-fluid -->
			<div class="container-fluid">
				<!-- begin mobile sidebar expand / collapse button -->
				<div class="navbar-header">
					<!-- <a href="index_2.html" class="navbar-brand"><span class="navbar-logo"></span> </a> -->
					<button type="button" class="navbar-toggle" data-click="sidebar-toggled">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<!-- end mobile sidebar expand / collapse button -->
				
				<!-- left -->
				<div class="status"></div>
				<ul class="nav navbar-nav navbar-left">
					<li class="header_logo"><img src="{{asset('public/frontend/img/logo.png')}}" alt=""></li>
					<li class=" {{ Request::is('/')?"active":"" }} "><a href="{{URL::to('/')}}">Home</a></li>
		            <li class=" {{ Request::is('profile')?"active":"" }} "><a href="{{URL::to('/profile')}}">Profile</a></li>
		            <li class=" {{ Request::is('connection')?"active":"" }} "><a href="{{URL::to('/connection')}}">Connection</a></li>
		            <li class=""><a href="#">Map</a></li>
					
				</ul>
				<!-- left end -->

				<!-- begin header navigation right -->
				<ul class="nav navbar-nav navbar-right">
					<li>
						<form class="navbar-form full-width">
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Enter keyword" />
								<button type="submit" class="btn btn-search "><i class="fa fa-search navbar-search"></i></button>
							</div>
						</form>
					</li>
					<li class="dropdown">
						<a href="javascript:;" data-toggle="dropdown" class="dropdown-toggle f-s-14">
							<i class="fa fa-bell-o"></i>
							<span class="label">5</span>
						</a>
						<ul class="dropdown-menu media-list pull-right animated fadeInDown">
                            <li class="dropdown-header">Notifications (5)</li>
                            <li class="media">
                                <a href="javascript:;">
                                    <div class="media-left"><i class="fa fa-bug media-object bg-red"></i></div>
                                    <div class="media-body">
                                        <h6 class="media-heading">Server Error Reports</h6>
                                        <div class="text-muted f-s-11">3 minutes ago</div>
                                    </div>
                                </a>
                            </li>
                            <li class="media">
                                <a href="javascript:;">
                                    <div class="media-left"><img src="" class="media-object" alt="" /></div>
                                    <div class="media-body">
                                        <h6 class="media-heading">John Smith</h6>
                                        <p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
                                        <div class="text-muted f-s-11">25 minutes ago</div>
                                    </div>
                                </a>
                            </li>
                            <li class="media">
                                <a href="javascript:;">
                                    <div class="media-left"><img src="" class="media-object" alt="" /></div>
                                    <div class="media-body">
                                        <h6 class="media-heading">Olivia</h6>
                                        <p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
                                        <div class="text-muted f-s-11">35 minutes ago</div>
                                    </div>
                                </a>
                            </li>
                            <li class="media">
                                <a href="javascript:;">
                                    <div class="media-left"><i class="fa fa-plus media-object bg-green"></i></div>
                                    <div class="media-body">
                                        <h6 class="media-heading"> New User Registered</h6>
                                        <div class="text-muted f-s-11">1 hour ago</div>
                                    </div>
                                </a>
                            </li>
                            <li class="media">
                                <a href="javascript:;">
                                    <div class="media-left"><i class="fa fa-envelope media-object bg-blue"></i></div>
                                    <div class="media-body">
                                        <h6 class="media-heading"> New Email From John</h6>
                                        <div class="text-muted f-s-11">2 hour ago</div>
                                    </div>
                                </a>
                            </li>
                            <li class="dropdown-footer text-center">
                                <a href="javascript:;">View more</a>
                            </li>
						</ul>
					</li>
					<li class="dropdown navbar-user">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
							<img src='public/frontend/img/user.jpg' alt="{{ Auth::user()->username }}" />
							<span class="hidden-xs">{{Auth::user()->username}}</span> <b class="caret"></b>
						</a>
						<ul class="dropdown-menu animated fadeInLeft">
							<li class="arrow"></li>
							<li><a href="javascript:;">Edit Profile</a></li>
							<li><a href="javascript:;"><span class="badge badge-danger pull-right">2</span> Inbox</a></li>
							<li><a href="javascript:;">Calendar</a></li>
							<li><a href="javascript:;">Setting</a></li>
							<li class="divider"></li>
							<li><a href="{{URL::to('admin/logout')}}">Log Out</a></li>
						</ul>
					</li>
				</ul>
				<!-- end header navigation right -->
			</div>
			<!-- end container-fluid -->


			<!-- sroll-show navbar -->
				<nav class="navbar navbar-default navbar-xs fadeout_navbar" role="navigation" style="margin-bottom: 0px; display: none;">
				  <!-- Brand and toggle get grouped for better mobile display -->
				  <div class="navbar-header">
				    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				      <span class="sr-only">Toggle navigation</span>
				      <span class="icon-bar"></span>
				      <span class="icon-bar"></span>
				      <span class="icon-bar"></span>
				    </button>
				  </div>

				  <!-- Collect the nav links, forms, and other content for toggling -->
				  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="margin-top: 10px;">
				    <ul class="nav navbar-nav">
				      <li class="active"><a href="#map-timeline"><i class="fa fa-fw fa-bars"></i> Timeline</a></li>
				      <li><a href="about.html"><i class="fa fa-fw fa-user"></i> About</a></li>
				      <li><a href="friends.html"><i class="fa fa-fw fa-users"></i> Friends</a></li>
				      <li><a href="photos1.html"><i class="fa fa-fw fa-image"></i> Photos</a></li>
				      <li class="dropdown">
				        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b class="caret"></b></a>
				        <ul class="dropdown-menu">
				          <li><a href="#">Action</a></li>
				          <li><a href="#">Another action</a></li>
				          <li><a href="#">Something else here</a></li>
				          <li class="divider"></li>
				          <li><a href="#">Separated link</a></li>
				          <li class="divider"></li>
				          <li><a href="#">One more separated link</a></li>
				        </ul>
				      </li>
				    </ul>
				  </div><!-- /.navbar-collapse -->
				</nav>
				<!-- end scroll-show navbar -->
		</div>
		<!-- end #header -->

</section>