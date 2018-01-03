
	
@extends('frontend.layout.app')
@push('css-style')
	<link href="{{asset('public/css/map.css')}}" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/dropdown_com.css')}}" />
	<!-- <link rel="stylesheet" href="{{asset('public/css/dialog.css')}}" /> -->
	<link rel="stylesheet" href="{{asset('public/frontend/css/pages/aside_right_chat.css')}}" />
	<link href="{{asset('public/backend/css/style.min_2.css')}}" rel="stylesheet" />
	<link rel="stylesheet" href="{{asset('public/frontend/css/profile_settings/personal_information.css')}}">
	<link rel="stylesheet" href="{{asset('public/frontend/css/profile_settings/notifications.css')}}">
	<link rel="stylesheet" href="{{asset('public/frontend/css/profile_settings/friend_request.css')}}">
	<link rel="stylesheet" href="{{asset('public/frontend/css/new/profile_settings/all_search_list.css')}}">
	
	
@endpush
@section('content')
@include('frontend._partials.nav')
<style>
	.right-section{padding: 0px !important;border: 1px solid #fff;border-bottom: none;border-top: none;border-right: none;height: 582px;z-index: 10;position: fixed;right: 5px;top: 55px;width: 285px;
	}
	.popover{    min-width: 330px !important;/*top: 228px !important;
    left: 355.805px!important;*/
    display: block;min-height: 220px !important;}
    .popover.bottom>.arrow {
        top: -11px;
        left: 40% !important;
        margin-left: -11px;
        padding: 0px;
        border-top-width: 0;
        border-bottom-color: #999;
        border-bottom-color: rgba(0,0,0,.25);
    }
    .popover-content{padding: 0px;}
    .fb-image-lg{width: 100%;margin-top: -30px;z-index: 0;height: 110px;}
    .fb-image-profile {
        margin: -40px 10px 0px 5px;
        z-index: 9;
        width: 20%;
        border-radius: 32px;
    }
    .popover-username{position: absolute;
    color: #fff;
    top: 25%;
    left: 25%;
    font-size: 15px;
    font-weight: bold;}
    .popover-userinfo{position: absolute;
    color: #fff;
    top: 57%;
    left: 25%;}
    .popover-mutual{margin-top: 20px;padding-top: 90px;padding-left: 81px;}
    .popover-live{margin-left: 80px;}
    .popover-place{margin-left: 82px;}
    .popover-friend{    margin-left: 180px;
    margin-top: 6px;}
    .accept-request svg {
    width: 14px;
    height: 14px;
}

.fb-profile{position: absolute;left: 0%;}

</style>


<section class="profile_page" style="margin-top: 55px;">
	 <div class="container-fluid">
	 	<div class="row">
	 		<div class="col-md-10 profile-left-section">
				<nav class="navbar navbar-default navbar-xs search-navbar" role="navigation">
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
				  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="margin-top: 10px;padding-left: 80px;">
				    <ul class="nav navbar-nav nav-tabs" role="tablist" >
					    <li role="presentation" class="active"><a href="#all" role="tab" data-toggle="tab"><i class="fa fa-globe" aria-hidden="true"></i> All</a></li>
					    <li role="presentation"><a href="#posts" role="tab" data-toggle="tab"><i class="fa fa-envelope-o" aria-hidden="true"></i> Posts</a></li>
					    <li role="presentation"><a href="#people" role="tab" data-toggle="tab"><i class="fa fa-fw fa-users"></i> People</a></li>
					    <li role="presentation"><a href="#photos" role="tab" data-toggle="tab"><i class="fa fa-fw fa-image"></i> Photos</a></li>
					    <li role="presentation"><a href="#videos" role="tab" data-toggle="tab"><i class="fa fa-file-video-o" aria-hidden="true"></i> Videos</a></li>
					    <li role="presentation"><a href="#agencies" role="tab" data-toggle="tab"><i class="fa fa-file-text-o" aria-hidden="true"></i> Agencies</a></li>
				    </ul>
				  </div><!-- /.navbar-collapse -->
				</nav>

				<div class="row">
					<div class="col-md-3">
						<div class="profileSet-ui-block">
							<div class="your-profile">
								<div class="profileSet-ui-block-title profileSet-ui-block-title-small">
									<h6 class="title">Filter Results</h6>
								</div>

								<div id="accordion" role="tablist" aria-multiselectable="true">
									<div class="card">
										<div class="card-header chat-card-header" role="tab" id="headingOne">
											<h6 class="mb-0">
												<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
													Posted By
												</a>
											</h6>
										</div>

										<div role="tabpanel" aria-labelledby="headingOne">
											<form style="margin-left: 25px;">
											    <div class="radio">
											      <label class="filterlist"><input style="margin-top: 2px;" type="radio" name="optradio" checked="checked">Anyone</label>
											    </div>
											    <div class="radio">
											      <label class="filterlist" ><input style="margin-top: 2px;"  type="radio" name="optradio">You</label>
											    </div>
											    <div class="radio">
											      <label class="filterlist"><input style="margin-top: 2px;" type="radio" name="optradio">Your Friends</label>
											    </div>
											    <div class="radio">
											      <label class="filterlist"><input style="margin-top: 2px;" type="radio" name="optradio">Agencies</label>
											    </div>
											    <div class="radio">
											      <label class="filterlist"><input style="margin-top: 2px;" type="radio" name="optradio">Admins</label>
											    </div>
											 </form>
										</div>
									</div>
									<div class="card">
										<div class="card-header chat-card-header" role="tab" id="headingOne">
											<h6 class="mb-0">
												<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
													Tagged Location
												</a>
											</h6>
										</div>

										<div role="tabpanel" aria-labelledby="headingOne">
											<form style="margin-left: 25px;">
											    <div class="radio">
											      <label class="filterlist"><input style="margin-top: 2px;" type="radio" name="optradio" checked="checked">Anywhere</label>
											    </div>
											    <div class="radio">
											      <label class="filterlist" ><input style="margin-top: 2px;"  type="radio" name="optradio">will appeared last visited place</label>
											    </div>
											    <div class="radio">
											      <label class="filterlist" ><input style="margin-top: 2px;"  type="radio" name="optradio">will appeared last visited place</label>
											    </div>
											    <div class="radio tag-location-search">
											      <button type="button" class="btn btn-tag-location btn-xs"><i class="fa fa-plus-circle" style="font-size: 14px;" aria-hidden="true"></i> Choose a Location</button>
											    </div>
											 </form>
										</div>
									</div>

									<div class="card">
										<div class="card-header chat-card-header" role="tab" id="headingOne">
											<h6 class="mb-0">
												<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
													Date Posted
												</a>
											</h6>
										</div>

										<div role="tabpanel" aria-labelledby="headingOne">
											<form style="margin-left: 25px;">
											    <div class="radio">
											      <label class="filterlist"><input style="margin-top: 2px;" type="radio" name="optradio" checked="checked">Any Date</label>
											    </div>
											    <div class="radio">
											      <label class="filterlist" ><input style="margin-top: 2px;"  type="radio" name="optradio">2017</label>
											    </div>
											    <div class="radio">
											      <label class="filterlist" ><input style="margin-top: 2px;"  type="radio" name="optradio">2016</label>
											    </div>
											    <div class="radio">
											      <label class="filterlist" ><input style="margin-top: 2px;"  type="radio" name="optradio">2015</label>
											    </div>
											    <div class="radio tag-date-search">
											      <button type="button" class="btn btn-tag-date btn-xs"><i class="fa fa-plus-circle" style="font-size: 14px;" aria-hidden="true"></i> Choose a Date</button>
											    </div>
											 </form>
										</div>
									</div>

									<div class="card">
										<div class="card-header chat-card-header" role="tab" id="headingOne">
											<h6 class="mb-0">
												<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
													City
												</a>
											</h6>
										</div>

										<div role="tabpanel" aria-labelledby="headingOne">
											<form style="margin-left: 25px;">
											    <div class="radio">
											      <label class="filterlist"><input style="margin-top: 2px;" type="radio" name="optradio" checked="checked">Anywhere</label>
											    </div>
											    <div class="radio">
											      <label class="filterlist" ><input style="margin-top: 2px;"  type="radio" name="optradio">will appeared last visited place</label>
											    </div>
											    <div class="radio">
											      <label class="filterlist" ><input style="margin-top: 2px;"  type="radio" name="optradio">will appeared last visited place</label>
											    </div>
											    <div class="radio tag-city-search">
											      <button type="button" class="btn btn-tag-city btn-xs"><i class="fa fa-plus-circle" style="font-size: 14px;" aria-hidden="true"></i> Choose a City</button>
											    </div>
											 </form>
										</div>
									</div>

									<div class="card">
										<div class="card-header chat-card-header" role="tab" id="headingOne">
											<h6 class="mb-0">
												<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
													Mutual Friends
												</a>
											</h6>
										</div>

										<div role="tabpanel" aria-labelledby="headingOne">
											<form style="margin-left: 25px;">
											    <div class="radio">
											      <label class="filterlist"><input style="margin-top: 2px;" type="radio" name="optradio" checked="checked">Anyone</label>
											    </div>
											    <div class="radio">
											      <label class="filterlist" ><input style="margin-top: 2px;"  type="radio" name="optradio">Friends</label>
											    </div>
											    <div class="radio">
											      <label class="filterlist" ><input style="margin-top: 2px;"  type="radio" name="optradio">Friends of Friends</label>
											    </div>
											    <div class="radio tag-friends-search">
											      <button type="button" class="btn btn-tag-friends btn-xs"><i class="fa fa-plus-circle" style="font-size: 14px;" aria-hidden="true"></i> Mutuak Friends With</button>
											    </div>
											 </form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-md-9">
						<div class="tab-content">
							<div class="tab-pane active" id="all">
								<div class="profileSet-ui-block">
									<div class="profileSet-ui-block-title" style="border-bottom: 1px solid #e6ecf5;">
										<h6 class="title" style="width: 725px;"><i class="fa fa-fw fa-file-text-o"></i> Agency</h6>
										<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="public/frontend/icons/icons.svg#olymp-three-dots-icon"></use></svg></a>
									</div>

									<ul class="notification-list friend-requests">
										<li>
											<div class="author-thumb">
												<img src="public/frontend/img/avatar15-sm.jpg" alt="author">
											</div>
											<div class="notification-event">
												<a href="#" class="h6 notification-friend">Traveladea</a>
												<span class="chat-message-item">Aranya Paul, Irfana Mimi and 67 other friends like this</span><br>
												<span class="chat-message-item">FLY HIGHER, GO FURTHER</span>
											</div>
											<span class="notification-icon">
												<a href="#" class="agency-msg alredy-friends">

													<span class="icon-add">
														<svg class="olymp-chat---messages-icon"><use xlink:href="public/frontend/icons/icons.svg#olymp-chat---messages-icon"></use></svg>
													</span>
													Send Message
												</a>

												<a href="#" class="accept-request request-del">
													<span class="icon-minus">
														<i class="fa fa-thumbs-o-down" style="font-size: 22px;" aria-hidden="true"></i>
													</span>
													Unlike
												</a>

											</span>

											<div class="more">
												<svg class="olymp-three-dots-icon"><use xlink:href="public/frontend/icons/icons.svg#olymp-three-dots-icon"></use></svg>
												<svg class="olymp-little-delete"><use xlink:href="public/frontend/icons/icons.svg#olymp-little-delete"></use></svg>
											</div>
										</li>

										<li>
											<div class="author-thumb">
												<img src="public/frontend/img/avatar15-sm.jpg" alt="author">
											</div>
											<div class="notification-event">
												<a href="#" class="h6 notification-friend">Traveladea</a>
												<span class="chat-message-item">Aranya Paul, Irfana Mimi and 67 other friends like this</span><br>
												<span class="chat-message-item">FLY HIGHER, GO FURTHER</span>
											</div>
											<span class="notification-icon">
												<a href="#" class="agency-msg alredy-friends">

													<span class="icon-add">
														<svg class="olymp-chat---messages-icon"><use xlink:href="public/frontend/icons/icons.svg#olymp-chat---messages-icon"></use></svg>
													</span>
													Send Message
												</a>

												<a href="#" class="accept-request">
													<span class="icon-add">
														<i class="fa fa-thumbs-o-up" style="font-size: 22px;" aria-hidden="true"></i>
													</span>
													Like
												</a>

											</span>

											<div class="more">
												<svg class="olymp-three-dots-icon"><use xlink:href="public/frontend/icons/icons.svg#olymp-three-dots-icon"></use></svg>
												<svg class="olymp-little-delete"><use xlink:href="public/frontend/icons/icons.svg#olymp-little-delete"></use></svg>
											</div>
										</li>

									</ul>

									<div class="profileSet-ui-block-title" style="border: none;">
										<a href="" class="title" style="width: 725px;text-align: center;">See All</a>
									</div>

								</div>
							</div>

							<div class="tab-pane active" id="people">
								<div class="profileSet-ui-block">
									<div class="profileSet-ui-block-title" style="border-bottom: 1px solid #e6ecf5;">
										<h6 class="title" style="width: 725px;"><i class="fa fa-fw fa-users"></i> People</h6>
										<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="public/frontend/icons/icons.svg#olymp-three-dots-icon"></use></svg></a>
									</div>
									
									<ul class="notification-list friend-requests">

										@foreach($all_user as $user )
										 
										<li>
											<div class="author-thumb">
												<?php 
													$image = $user->user_image['image']; 

												?>
												<img src='{{asset("images/users$image")}}' height="45px;" width="45px;" alt="author">
											</div>
											<div class="notification-event" style="position: relative;">
												<a href="#" onmouseover="popup(this.id)" id="pop{{$user['_id']}}" class="h6 notification-friend pop" data-container="body" data-toggle="popover" data-placement="bottom" data-content='<div class="fb-profile"><img align="left" class="fb-image-lg" src="public/frontend/images/Cover/cover.jpg" alt="Profile image example"/><img align="left" class="fb-image-profile thumbnail" src="public/frontend/images/Friends/guy-2.jpg" alt="Profile image example"/><div class="fb-profile-text"><h1 class="popover-username">{{$user['firstname']}} {{$user['middlename']}} {{$user['lastname']}}</h1><p class="popover-userinfo">I am Traveler and Doctor</p></div></div><div class="popover-mutual"><i class="fa fa-user-o" aria-hidden="true" style="font-size: 12px;"></i> <span style="font-size:12px;">16 mutual friends</span></div><div class="popover-live"><i class="fa fa-home" aria-hidden="true" style="font-size: 12px;"></i> <span style="font-size:12px;">Lives in <a href="">Dhaka, Bangladesh</a></span></div><div class="popover-place"><i class="fa fa-map-marker" aria-hidden="true" style="font-size: 14px;"></i> <span style="font-size:12px;">Recently in <a href="">Dhaka, Bangladesh</a></span></div><div class="popover-friend"><span class="notification-icon"><a href="#" class="accept-request" style="height:25px;padding:5px;"><span class="icon-add"><svg class="olymp-happy-face-icon"><use xlink:href="public/frontend/icons/icons.svg#olymp-happy-face-icon"></use></svg></span> Send Request</a><a href="#" class="accept-request request-del" style="height:25px;padding:5px;><span class="icon-minus"><svg class="olymp-happy-face-icon"><use xlink:href="public/frontend/icons/icons.svg#olymp-chat---messages-icon"></use></svg></span></a></span></div>'
											  data-original-title="" title="">{{$user['firstname']}} {{$user['middlename']}} {{$user['lastname']}} </a><br>
												<span class="chat-message-item">Mutual Friend: Sarah Hetfield</span>
											</div>
											<span class="notification-icon">
											
									

											<!-- {!! Form::open(['url' => 'send_request', 'method' => 'POST']) !!} 
											{!! csrf_field() !!}
												<input type="hidden" value="{{$user['_id']}}" name="user_id_two">
												<input type="hidden" value="0" name="status">
												<input type="submit" class="accept-request alredy-friends" name="" value="Send Friend Request">
											{!! Form::close(); !!} -->

											<?php 
											$check = DB::collection('relationships')
													->where('user_id_two','=',$user['_id'])
													->where('user_id_one','=',Auth::user()->_id)
													->first();
											if($check==''){		
											?>
											<p><a href="{{url('/')}}/addFriend/{{$user['_id']}}" class="btn btn-success">Add To Friend</a></p>
											<?php }else{ ?>
											<p>Request Already Sent</p>
											<?php } ?>

											

												<a href="#" class="accept-request request-del">
													<span class="icon-minus">
														<svg class="olymp-happy-face-icon"><use xlink:href="public/frontend/icons/icons.svg#olymp-happy-face-icon"></use></svg>
													</span>
												</a>

											</span>

											<div class="more">
												<svg class="olymp-three-dots-icon"><use xlink:href="public/frontend/icons/icons.svg#olymp-three-dots-icon"></use></svg>
												<svg class="olymp-little-delete"><use xlink:href="public/frontend/icons/icons.svg#olymp-little-delete"></use></svg>
											</div>
										</li>


										@endforeach
									</ul>
									<div class="profileSet-ui-block-title" style="border: none;">
										<a href="" class="title" style="width: 725px;text-align: center;">See All</a>
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
$(document).ready(function(){
    $(".btn-tag-location").click(function(){
            $(".btn-tag-location").hide("fast", function(){
                $(".tag-location-search").html(
					    					  "<input style='width: 165px;height: 25px;margin-top: -5px;padding: 5px;' type='text' class='form-control' placeholder='Choose a Location'>"
					    				);
            });
        });
});
</script> 


<script>
$(document).ready(function(){
    $(".btn-tag-date").click(function(){
            $(".btn-tag-date").hide("fast", function(){
                $(".tag-date-search").html(
					    					  "<input style='width: 165px;height: 25px;margin-top: -5px;padding: 5px;' type='text' class='form-control' placeholder='Choose a Location'>"
					    				);
            });
        });
});
</script>

<script>
$(document).ready(function(){
    $(".btn-tag-city").click(function(){
            $(".btn-tag-city").hide("fast", function(){
                $(".tag-city-search").html(
					    					  "<input style='width: 165px;height: 25px;margin-top: -5px;padding: 5px;' type='text' class='form-control' placeholder='Choose a City'>"
					    				);
            });
        });
});
</script>

<script>
$(document).ready(function(){
    $(".btn-tag-friends").click(function(){
            $(".btn-tag-friends").hide("fast", function(){
                $(".tag-friends-search").html(
					    					  "<input style='width: 165px;height: 25px;margin-top: -5px;padding: 5px;' type='text' class='form-control' placeholder='Mutual Friends With'>"
					    				);
            });
        });
});
</script>



		  

<script>
  (function ($) {
    $(document).ready(function(){
      
    // hide .navbar first
    $(".fadeout_navbar").hide();
    

  });
    }(jQuery));
</script>

<!-- <script>	   
       $("#pop-One").popover({
              placement: 'bottom',
              html: 'true',
              trigger : 'hover',
              container: 'body',
              content : '<div class="fb-profile"><img align="left" class="fb-image-lg" src="public/frontend/images/Cover/cover.jpg" alt="Profile image example"/><img align="left" class="fb-image-profile thumbnail" src="public/frontend/images/Friends/guy-2.jpg" alt="Profile image example"/><div class="fb-profile-text"><h1 class="popover-username">Eli Macy</h1><p class="popover-userinfo">I am Traveler and Doctor</p></div></div><div class="popover-mutual"><i class="fa fa-user-o" aria-hidden="true" style="font-size: 12px;"></i> <span style="font-size:12px;">16 mutual friends</span></div><div class="popover-live"><i class="fa fa-home" aria-hidden="true" style="font-size: 12px;"></i> <span style="font-size:12px;">Lives in <a href="">Dhaka, Bangladesh</a></span></div><div class="popover-place"><i class="fa fa-map-marker" aria-hidden="true" style="font-size: 14px;"></i> <span style="font-size:12px;">Recently in <a href="">Dhaka, Bangladesh</a></span></div><div class="popover-friend"><span class="notification-icon"><a href="#" class="accept-request" style="height:25px;padding:5px;"><span class="icon-add"><svg class="olymp-happy-face-icon"><use xlink:href="public/frontend/icons/icons.svg#olymp-happy-face-icon"></use></svg></span> Send Request</a><a href="#" class="accept-request request-del" style="height:25px;padding:5px;><span class="icon-minus"><svg class="olymp-happy-face-icon"><use xlink:href="public/frontend/icons/icons.svg#olymp-chat---messages-icon"></use></svg></span></a></span></div>'
        }).on('shown.bs.popover', function() {
          var popup = $(this);
          $(this).parent().find("div.popover .close").click(function() {
            popup.click();
          });
        });  
       //window.location.href=("home-activity");
</script> -->

<script type="text/javascript">

	// $(".pop").mouseover(function() {
	// 	idName = $(this).attr('id');
	// 	data = idName.split('pop');
	// 	id = data[1];
	// 	$("#pop"+id).popover({ trigger: "manual" , html: true, animation:false})
	// 	    .on("mouseenter", function () {
	// 	    	alert("id");
	// 	        var _this = this;
	// 	        $(this).popover("show");
	// 	        $(".popover").on("mouseleave", function () {
	// 	            $(_this).popover('hide');
	// 	        });
	// 	    }).on("mouseleave", function () {
	// 	        var _this = this;
	// 	        setTimeout(function () {
	// 	            if (!$(".popover:hover").length) {
	// 	                $(_this).popover("hide");
	// 	            }
	// 	        }, 300);
	// 	});

		
	// 	console.log(id);
	// });

	function popup(idName){

		data = idName.split('pop');
		id = data[1];
		if ($('#'+idName).is(':hover')) {
			$("#pop"+id).popover({ trigger: "manual" , html: true, animation:false});
			$("#pop"+id).popover("show");
	        $(".popover").on("mouseleave", function () {
	            $("#pop"+id).popover('hide');
	        });
	    }

	    $('#'+idName).mouseleave(function(){
	     	
	        setTimeout(function () {
	            if (!$(".popover:hover").length) {
	                $("#pop"+id).popover("hide");
	            }
	        }, 300);   
	    });

		
	}

		
</script>


@endpush

@endsection