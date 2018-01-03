@extends('frontend.layout.app')
@push('css-style')
	<link href="{{asset('public/css/map.css')}}" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/dropdown_com.css')}}" />
	<!-- <link rel="stylesheet" href="{{asset('public/css/dialog.css')}}" /> -->
	<link rel="stylesheet" href="{{asset('public/frontend/css/pages/post_type_page.css')}}" />
	<link rel="stylesheet" href="{{asset('public/frontend/css/pages/post_page.css')}}" />
	<link rel="stylesheet" href="{{asset('public/frontend/css/pages/aside_right_chat.css')}}" />
	<link rel="stylesheet" href="{{asset('public/frontend/css/pages/welcome_page.css')}}" />
@endpush
@section('content')
<section class="home_main_container first">
	<div class="home_container_top">

		<!-- map section start -->
		@include('frontend.map.map_markerCluster_click')
		<!-- map section end -->
		<div class="container_top_bar">
			<div class="container_section">
				<div class="zinnah">
					<div class="tuhin">
						<div class="col-md-4 home_top_panel no_padding">
						 
							<a href="" data-toggle="modal" data-target="#myModal"><textarea class="form-control home_set_box_panel show-dialog" id="" rows="3" placeholder="What's on your mind?"></textarea></a>
							<div class="home_post_overlay"></div>
							
                			@include('frontend.common.post_section')

						
						</div>

						<div class="col-md-2">
							<div class="home_profile" style="margin-left: 13px;">
								<div id="dl-menu" class="dl-menuwrapper">
									<button>
										<div class="home_profile_overlay"></div>
										<?php 
											$profile = $getUser->user_image['image'];
										 ?>
										<img class="min_profile_home" src='{{asset("images/users$profile")}}' alt=""> {{Auth::user()->username}}  <i class="fa fa-chevron-down" aria-hidden="true"></i>
									</button>
									<ul class="dl-menu">
										<li><a href="{{URL::to('/profile')}}">View Profile</a> </li>
										<li><a href="{{URL::to('/edit-profile')}}">Edit Profile</a> </li>
										<!-- <li><a href="#">Setting</a> </li> -->
										<li><a href="{{URL::to('/users/logout')}}" class="last">Logout</a> </li>
										<div class="home_submenu_overlay"></div>
									</ul>
								</div><!-- /dl-menuwrapper -->
								
							</div>
						</div>
						
						<div class="col-md-3" style="padding-right: 0px;" >
							
							@include('frontend.common.aside_right_chat')

						</div>
					</div>
				</div>	
			</div>
		</div>
	</div>

	@include('frontend.newsfeed.nav_bottom')
		
</section>
<section id="test"></section>

@push('js')
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCALSYjrJyQ3R9ONak9nVMaAkOuRetWv4&v=3.exp&libraries=places&callback=initMap"></script>
	<script src="{{asset('public/js/map.js')}}"></script>
	<script>

		$(".bottom").click(function(){
		     //window.location.href=("home-activity");
		})
	</script>
	
	<script src="{{asset('public/frontend/js/modernizr.custom.js')}}"></script>
	<script src="{{asset('public/frontend/js/jquery.dlmenu.js')}}"></script>
	<script>
		$(function() {
			$( '#dl-menu' ).dlmenu({
				animationClasses : { in : 'dl-animate-in-4', out : 'dl-animate-out-4' }
			});
		});
	</script>

@endpush
@endsection