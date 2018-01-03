@extends('frontend.layout.app')
@push('css-style')
	<link href="{{asset('public/css/map.css')}}" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/dropdown_com.css')}}" />
	
	<link rel="stylesheet" href="{{asset('public/frontend/css/pages/aside_right_chat.css')}}" />
	<link href="{{asset('public/backend/css/style.min_2.css')}}" rel="stylesheet" />

	<link rel="stylesheet" href="{{asset('public/frontend/css/profile_settings/personal_information.css')}}">
	<link rel="stylesheet" href="{{asset('public/frontend/css/profile_settings/notifications.css')}}">
	
	
@endpush
@section('content')
@include('frontend._partials.nav')
<style>
	
	.right-section{padding: 0px !important;border: 1px solid #fff;border-bottom: none;border-top: none;border-right: none;height: 582px;z-index: 10;position: fixed;right: 5px;top: 55px;width: 285px;
	}
	.friend-header-thumb {
	    border-bottom: 1px solid #e6ecf5;
	    overflow: hidden;
	    height: 90px;
	}
	.friend-item {
	    border-radius: 5px;
	    overflow: hidden;
	}
	.friend-item-content {
	    padding: 0 25px 25px 25px;
	    text-align: center;
	    position: relative;
	}
	.friend-item-content .more {
	    z-index: 5;
	    position: absolute;
	    right: 150px;
	    top: 50px;
	    font-size: 16px;
	    padding: 10px;
	}
	.fa-ellipsis-h {
	    font-size: 15px;
	    color: #a1a3a6;
	}
	.friend-avatar {margin-top: -49px;position: relative;margin-bottom: 8px;}
	.friend-avatar .author-thumb {margin: 0 auto; height: 75px; width: 75px;margin-bottom: 10px;}
	.author-thumb {display: inline-block;position: relative;}
	.friend-avatar .author-thumb img {border: 4px solid #fff;}
	.author-thumb img {border-radius: 100%;overflow: hidden;max-width: 75px;max-height: 75px;}
	.more .dropdown-menu li a:hover {color: #ff5e3a;background-color: #fff;}
	.author-name{font-weight: bold;}
	.author-name:hover {color: #ff5e3a;}

		  
</style>


<section class="profile_page">
	 <div class="container-fluid">
	 	<div class="row">
	 		<div class="col-md-10 profile-left-section">
				<div class="row">
					<div class="col-md-3">
						<div class="profileSet-ui-block">
							<div class="your-profile">
								<div class="profileSet-ui-block-title profileSet-ui-block-title-small">
									<h6 class="title">Your PROFILE</h6>
								</div>

								<div id="accordion" role="tablist" aria-multiselectable="true">
									<div class="card">
										<div class="card-header" role="tab" id="headingOne">
											<h6 class="mb-0">
												<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
													Profile Settings
													<!-- <svg class="olymp-dropdown-arrow-icon"><use xlink:href="icons/icons.svg#olymp-dropdown-arrow-icon"></use></svg> -->
												</a>
											</h6>
										</div>

										<div role="tabpanel" aria-labelledby="headingOne">
											<ul class="your-profile-menu">
												<li>
													<a href="{{ URL::to('personal_information')}}">Personal Information</a>
												</li>
												<li>
													<a href="{{ URL::to('account_settings')}}">Account Settings</a>
												</li>
												<li>
													<a href="{{ URL::to('change_password')}}">Change Password</a>
												</li>
											</ul>
										</div>
									</div>
								</div>


								<div class="profileSet-ui-block-title">
									<a href="{{ URL::to('all_notifications')}}" class="h6 title">Notifications</a>
									<a href="#" class="items-round-little bg-primary-notty">8</a>
								</div>
								<div class="profileSet-ui-block-title">
									<a href="{{ URL::to('all_activity')}}" class="h6 title">Activity Log</a>
								</div>
								<div class="profileSet-ui-block-title">
									<a href="{{ URL::to('friend_request')}}" class="h6 title">Friend Requests</a>
									<a href="#" class="items-round-little bg-blue-request">4</a>
								</div>
								<div class="profileSet-ui-block-title">
									<a href="{{ URL::to('all_messages')}}" class="h6 title">Chat / Messages</a>
									<a href="#" class="items-round-little bg-green-message">10</a>
								</div>
								<div class="profileSet-ui-block-title">
									<a href="{{ URL::to('fav_agencies')}}" class="h6 title">Favourite Agencies</a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-9">
						<div class="row" style="display: flex;flex-wrap: wrap;margin-right: -10px;margin-left: -25px;">
							<div class="col-md-3">
								<div class="profileSet-ui-block">
									<div class="friend-item">
										<div class="friend-header-thumb">
											<img src="public/frontend/img/friend1.jpg" alt="friend">
										</div>

										<div class="friend-item-content">

											<div class="more dropdown">
												<i class="fa fa-ellipsis-h dropdown-toggle" data-toggle="dropdown" aria-hidden="true"></i>
												<ul class="dropdown-menu">
													<li>
														<a href="#">Unlike</a>
													</li>
													<li>
														<a href="#">Report</a>
													</li>
												</ul>
											</div>
											<div class="friend-avatar">
												<div class="author-thumb">
													<img src="public/frontend/img/avatar1.jpg" alt="author">
												</div>
												<div class="author-content">
													<a href="#" class="h5 author-name">Nicholas Grissom</a>
													<div class="country">San Francisco, CA</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="profileSet-ui-block">
									<div class="friend-item">
										<div class="friend-header-thumb">
											<img src="public/frontend/img/friend1.jpg" alt="friend">
										</div>

										<div class="friend-item-content">

											<div class="more dropdown">
												<i class="fa fa-ellipsis-h dropdown-toggle" data-toggle="dropdown" aria-hidden="true"></i>
												<ul class="dropdown-menu">
													<li>
														<a href="#">Unlike</a>
													</li>
													<li>
														<a href="#">Report</a>
													</li>
												</ul>
											</div>
											<div class="friend-avatar">
												<div class="author-thumb">
													<img src="public/frontend/img/avatar1.jpg" alt="author">
												</div>
												<div class="author-content">
													<a href="#" class="h5 author-name">Nicholas Grissom</a>
													<div class="country">San Francisco, CA</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="profileSet-ui-block">
									<div class="friend-item">
										<div class="friend-header-thumb">
											<img src="public/frontend/img/friend1.jpg" alt="friend">
										</div>

										<div class="friend-item-content">

											<div class="more dropdown">
												<i class="fa fa-ellipsis-h dropdown-toggle" data-toggle="dropdown" aria-hidden="true"></i>
												<ul class="dropdown-menu">
													<li>
														<a href="#">Unlike</a>
													</li>
													<li>
														<a href="#">Report</a>
													</li>
												</ul>
											</div>
											<div class="friend-avatar">
												<div class="author-thumb">
													<img src="public/frontend/img/avatar1.jpg" alt="author">
												</div>
												<div class="author-content">
													<a href="#" class="h5 author-name">Nicholas Grissom</a>
													<div class="country">San Francisco, CA</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="profileSet-ui-block">
									<div class="friend-item">
										<div class="friend-header-thumb">
											<img src="public/frontend/img/friend1.jpg" alt="friend">
										</div>

										<div class="friend-item-content">

											<div class="more dropdown">
												<i class="fa fa-ellipsis-h dropdown-toggle" data-toggle="dropdown" aria-hidden="true"></i>
												<ul class="dropdown-menu">
													<li>
														<a href="#">Unlike</a>
													</li>
													<li>
														<a href="#">Report</a>
													</li>
												</ul>
											</div>
											<div class="friend-avatar">
												<div class="author-thumb">
													<img src="public/frontend/img/avatar1.jpg" alt="author">
												</div>
												<div class="author-content">
													<a href="#" class="h5 author-name">Nicholas Grissom</a>
													<div class="country">San Francisco, CA</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="col-md-3">
								<div class="profileSet-ui-block">
									<div class="friend-item">
										<div class="friend-header-thumb">
											<img src="public/frontend/img/friend1.jpg" alt="friend">
										</div>

										<div class="friend-item-content">

											<div class="more dropdown">
												<i class="fa fa-ellipsis-h dropdown-toggle" data-toggle="dropdown" aria-hidden="true"></i>
												<ul class="dropdown-menu">
													<li>
														<a href="#">Unlike</a>
													</li>
													<li>
														<a href="#">Report</a>
													</li>
												</ul>
											</div>
											<div class="friend-avatar">
												<div class="author-thumb">
													<img src="public/frontend/img/avatar1.jpg" alt="author">
												</div>
												<div class="author-content">
													<a href="#" class="h5 author-name">Nicholas Grissom</a>
													<div class="country">San Francisco, CA</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="profileSet-ui-block">
									<div class="friend-item">
										<div class="friend-header-thumb">
											<img src="public/frontend/img/friend1.jpg" alt="friend">
										</div>

										<div class="friend-item-content">

											<div class="more dropdown">
												<i class="fa fa-ellipsis-h dropdown-toggle" data-toggle="dropdown" aria-hidden="true"></i>
												<ul class="dropdown-menu">
													<li>
														<a href="#">Unlike</a>
													</li>
													<li>
														<a href="#">Report</a>
													</li>
												</ul>
											</div>
											<div class="friend-avatar">
												<div class="author-thumb">
													<img src="public/frontend/img/avatar1.jpg" alt="author">
												</div>
												<div class="author-content">
													<a href="#" class="h5 author-name">Nicholas Grissom</a>
													<div class="country">San Francisco, CA</div>
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
	 		<div class="col-md-2 right-section">
	 			@include('frontend.common.aside_right_chat')
	 		</div>
	 	</div>
	 </div>
</section>
  
  @push('js')
  <script>
  	$(function(){
  	 $(".dropdown").hover(            
  	         function() {
  	             $('.dropdown-menu', this).stop( true, true ).fadeIn("fast");
  	             $(this).toggleClass('open');
  	             $('b', this).toggleClass("caret caret-up");                
  	         },
  	         function() {
  	             $('.dropdown-menu', this).stop( true, true ).fadeOut("fast");
  	             $(this).toggleClass('open');
  	             $('b', this).toggleClass("caret caret-up");                
  	         });
  	 });
  	 
  </script>

@endpush
@endsection