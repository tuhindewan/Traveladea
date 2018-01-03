@extends('frontend.layout.app')

@push('css-style')
	<link href="{{asset('public/css/map.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('public/frontend/css/images-grid.css')}}">
	<!-- <link rel="stylesheet" href="{{asset('public/css/dialog.css')}}" /> -->
	<link href="{{asset('public/css/map.css')}}" rel="stylesheet">
	
	<link rel="stylesheet" href="{{asset('public/frontend/css/new/custom.css')}}">
	<link rel="stylesheet" href="{{asset('public/frontend/css/new/errors.css')}}">
	<link rel="stylesheet" href="{{asset('public/frontend/css/new/animate.min.css')}}">
	<link rel="stylesheet" href="{{asset('public/frontend/css/new/cover.css')}}">
	<link rel="stylesheet" href="{{asset('public/frontend/css/new/profile/profile_timeline.css')}}">
	<link rel="stylesheet" href="{{asset('public/frontend/css/new/profile/profile_about.css')}}">
	<link rel="stylesheet" href="{{asset('public/frontend/css/new/profile/profile_friends.css')}}">
	<link rel="stylesheet" href="{{asset('public/frontend/css/new/profile/profile_photos.css')}}">
	<link rel="stylesheet" href="{{asset('public/frontend/css/new/profile/profile_videos.css')}}">
	<link rel="stylesheet" href="{{asset('public/frontend/css/new/connection/connection_index.css')}}">
	<link rel="stylesheet" href="{{asset('public/frontend/css/new/profile_settings/personal_information.css')}}">
	<link rel="stylesheet" href="{{asset('public/frontend/css/new/profile_settings/account_settings.css')}}">
	<link rel="stylesheet" href="{{asset('public/frontend/css/new/profile_settings/change_password.css')}}">
	<link rel="stylesheet" href="{{asset('public/frontend/css/new/profile_settings/notifications.css')}}">
	<link rel="stylesheet" href="{{asset('public/frontend/css/new/profile_settings/friend_request.css')}}">
	<link rel="stylesheet" href="{{asset('public/frontend/css/new/profile_settings/all_messages.css')}}">
	<link rel="stylesheet" href="{{asset('public/frontend/css/new/profile_settings/all_search_list.css')}}">

	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.3/css/swiper.min.css" />
    <link href="{{asset('public/backend/plugins/jquery-jvectormap/jquery-jvectormap_2.css')}}" rel="stylesheet" />
    <link href="{{asset('public/backend/plugins/bootstrap-calendar/css/bootstrap_calendar_2.css')}}" rel="stylesheet" />
    <link href="{{asset('public/backend/plugins/gritter/css/jquery.gritter_2.css')}}" rel="stylesheet" />
    <link href="{{asset('public/backend/plugins/morris/morris_2.css')}}" rel="stylesheet" />

	<link href="{{asset('public/backend/css/style.min_2.css')}}" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.3/js/swiper.js"></script>
@endpush
@section('content')

<style>
	
	.right-section{padding: 0px !important;border: 1px solid #fff;border-bottom: none;border-top: none;border-right: none;height: 582px;z-index: 10;position: fixed;right: 5px;top: 55px;width: 285px;
	}
		.slide_upload {border: 1px dashed #999; bottom:48px;}
		.load_select_option{width: 100%; height: 100%; margin:0 15px;}
		.load_chose_file{display: inline;}
		.single_load_file{width: 100px;height: 100px; position: relative; display: inherit; clear: both;}
		.file_cancel_btn{padding: 0px 5px; background: transparent; color: #f14949; border-color: #949496; position: absolute; bottom: 37px; right: 0px;}
		.remove_file{display: none;}
		.chosen-container{width: 50%!important;margin-bottom: 10px;}
		.pac-container {z-index: 10000 !important;}
		#pac-input{margin: 0px;width: 100% !important;}
		.post-modal input::placeholder {color: #828282 !important; }
		.post-modal textarea::placeholder{color: #828282 !important; }
		.container_top_bar{display: block; margin-left: 25%;}
		.img-chat {width: 40px;height: 40px;border : 0px !important;border-radius: 22px;}
		.connected-status{color: #00A63A;padding-right: 5px;}
		.absent-status{color: #F60202;padding-right: 5px;}
		.away-status{color: #F6E402;padding-right: 5px;}
		.chat-search{padding: inherit;}
		.chat_search_box_panel{     margin-left: 14px;padding-left: 35px;padding-right: 40px;z-index: 14 !important; color: #808487; cursor: text; text-decoration: inherit; background: transparent; width: 91.6%; border-right: none; border-left: none;}
		.chat_search_box_panel::placeholder{color: #808487;}
		.panel-bottom{flex: 1 1 auto;}
		hr.hrStyle{flex: 0 0 auto;border-top: 3px double #fff; height: 3px; cursor: row-resize; margin: 5px auto;}
		hr.PlanhrStyle{flex: 0 0 auto;border-top: 3px double #d9e0e7; height: 3px; cursor: row-resize; margin: 5px auto;}
		.list-group-item{padding: 5px;background: transparent; color: white; border: none;}
		.list-group-item:hover{background: transparent !important;}
		.list-group-item span{color: white;}
		.announce-scroll { width: 200px;height: 400px;overflow-y: scroll;}
		.announce-scroll::-webkit-scrollbar {width: 12px;}
		.announce-scroll::-webkit-scrollbar-track {-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);border-radius: 10px;
		}
		.announce-scroll::-webkit-scrollbar-thumb {border-radius: 10px;-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5); 
		}
		.message-scroll { width: 200px;height: 400px;overflow-y: scroll;}
		.message-scroll::-webkit-scrollbar {width: 12px;}
		.message-scroll::-webkit-scrollbar-track {-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);border-radius: 10px;
		}
		.message-scroll::-webkit-scrollbar-thumb {border-radius: 10px;-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5); 
		}
		.announce-text-div{margin-left: -3px; margin-bottom: -10px;margin-top: -14px; }
		.announce-text-div p{ margin: -18px 0 6px; }
		.announce-text-div a{ color: #fff; }
		.add-on{margin-bottom: -1px;}
		.fa-search{position: absolute;top: 8px;left: 0px;}
		.chat-fa-search{position: absolute;top:11px;left: 28px;}
		.fa-cog{ position: absolute;right: 30px;bottom: 6px;font-size: 16px;color: #808487;}
		.side-button{border-radius: 27px;}
		.popover-content {padding: 15px 28px;text-align: justify;}
		.popover-title {text-align: center;}
		.popover{top: 2px;left: 807.484px;display: block;width: 343px;min-height: 100px;padding: 10px 0;width: 252px;}
		.announce-hr{margin-top: 22px;}
		.popover.left {margin-left: -8px}
		.chat-popover .popover-content {padding: 0px;text-align: justify;}
		.popup-box
		{
		    display: none;
		    position: absolute;
		    bottom: 48px;
		    right: 328px !important;
		    height: 285px;
		    background-color: rgb(237, 239, 244);
		    width: 257px;
		    border: 1px solid rgba(29, 49, 91, .3);
		}
		.chat-popup{right: 328px;}
		.popup-box .popup-head
		{
		    background-color: #023e58;
		    padding: 5px;
		    color: white;
		    font-weight: bold;
		    font-size: 14px;
		    clear: both;
		}
		
		.popup-box .popup-head .popup-head-left
		{
		    float: left;
		}
		
		.popup-box .popup-head .popup-head-right
		{
		    float: right;
		    opacity: 0.5;
		}
		
		.popup-box .popup-head .popup-head-right a
		{
		    text-decoration: none;
		    color: inherit;
		}
		
		.popup-box .popup-messages
		{
		    height: 76%;
		    overflow-y: scroll;
		}
		.msb-reply {
		    position: relative;
		    margin-top: -5px;
		    background: #f8f8f8;
		    height: 42px;
		}
		.four-zero, .lc-block {
		    box-shadow: 0 1px 11px rgba(0, 0, 0, .27);
		}
		.msb-reply textarea {
		    width: 85%;
		    font-size: 13px;
		    border: 0;
		    padding: 11px 7px;
		    resize: none;
		    height: 43px;
		    background: 0 0;
		    outline: none;
		}
		
		.fa-paper-plane-o{
			font-size: 16px;
		}
		    

		.msb-reply button:hover {
		    background: #f2f2f2;
		}
		.plane-button{
			background-color: #f8f8f8;
	    border: none;
	    outline: none;
	    position: absolute;
	    top: 34%;
	    right: 5%;
	    font-size: 14px;
	    color: #023e58;
		}

		.img-avatar{
			vertical-align: middle;
			width: 40px;
			margin-right: -5px;
			padding: 3px;
			border-radius: 24px;
		}

		.mf-content{
			padding-top: 3px;
		}
		.mf-date{
			    color: #2d659a;
		}
		.navigation {
   			  margin-bottom: 65px;
		}

		.radius{border-radius: 5px !important;font-size: 13px;font-weight: bolder;}	
		.announce-text-color{color: #808487; text-transform: none;}
		.chat-user-name{color: #808487 !important;}

		.set_box_panel{margin: 5px 0; background: white !important; position: relative;z-index: 11; color: #fff; border: 0; cursor: text;}
		.profile-left-section{width: 78.7%;padding: 0px !important;margin-top: -6px;}
		.row-newsletter{margin-top: -21px;}
		.news-scetion{    padding: 10px;width: 502px;padding-left: 2px !important;margin-top: -10px;}

		.comment-form .add-options-message {
		    position: absolute;
		    right: 50px;
		    bottom: 52px;
		    width: auto;
		    padding: 0;
		}

		    
		    
		    
		  
</style>
@section('content')


<section class="profile_page">
	 <div class="container-fluid">
	 	<div class="row">
	 		<div class="col-md-10 profile-left-section">
				<div class="row">
					<div class="col-md-3">
						
					</div>
					<div class="col-md-9">
						<div class="profileSet-ui-block">
							<article class="hentry post">

								<div class="post__author author vcard inline-items">
									<img src="public/frontend/img/author-page.jpg" alt="author">

									<div class="author-date">
										<a class="h6 post__author-name fn" href="02-ProfilePage.html">James Spiegel</a>
										<div class="post__date">
											<time class="published" datetime="2017-03-24T18:18">
												2 hours ago
											</time>
										</div>
									</div>

									<a href="#" class="more" style="position: absolute;left: 90%;"><i style="font-size: 20px;" class="fa fa-ellipsis-h dropdown-toggle" data-toggle="dropdown" aria-hidden="true"></i></a>

									
								</div>

								<p>Here’s a photo from last month’s photoshoot. We really had a great time and got a batch of incredible shots for the new catalog.</p>

								<div class="post-additional-info inline-items">

									<a href="#" class="post-add-icon inline-items">
										<i class="fa fa-heart-o" style="font-size: 22px;color: #c2c5d9;" aria-hidden="true"></i>
										<span>148 Likes</span>
									</a>

									<div class="comments-shared">
										<a href="#" class="post-add-icon inline-items">
											<i class="fa fa-commenting-o" style="font-size: 22px;color: #c2c5d9;" aria-hidden="true"></i>
											<span>61 Comments</span>
										</a>
									</div>


								</div>

							</article>

							<div class="mCustomScrollbar" data-mcs-theme="dark">
								<ul class="comments-list">
									<li>
										<div class="post__author author vcard inline-items">
											<img src="public/frontend/img/avatar48-sm.jpg" alt="author">

											<div class="author-date">
												<a class="h6 post__author-name fn" href="#">Marina Valentine</a>
												<div class="post__date">
													<time class="published" datetime="2017-03-24T18:18">
														46 mins ago
													</time>
												</div>
											</div>

											<a href="#" class="more" style="position: absolute;left: 90%;" ><i style="font-size: 20px;" class="fa fa-ellipsis-h dropdown-toggle" data-toggle="dropdown" aria-hidden="true"></i></a></a>

										</div>

										<p>I had a great time too!! We should do it again!</p>

										<a href="#" class="post-add-icon inline-items">
											<i class="fa fa-heart-o" style="font-size: 22px;color: #c2c5d9;" aria-hidden="true"></i>
											<span>8</span>
										</a>
										<a href="#" class="reply" style="color: #c2c5d9;margin-left: 15px;">Reply</a>
									</li>

									<li>
										<div class="post__author author vcard inline-items">
											<img src="public/frontend/img/avatar4-sm.jpg" alt="author">

											<div class="author-date">
												<a class="h6 post__author-name fn" href="#">Chris Greyson</a>
												<div class="post__date">
													<time class="published" datetime="2017-03-24T18:18">
														1 hour ago
													</time>
												</div>
											</div>

											<a href="#" class="more" style="position: absolute;left: 90%;"><i style="font-size: 20px;" class="fa fa-ellipsis-h dropdown-toggle" data-toggle="dropdown" aria-hidden="true"></i></a></a>

										</div>

										<p>Dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit.</p>

										<a href="#" class="post-add-icon inline-items">
											<i class="fa fa-heart-o" style="font-size: 22px;color: #c2c5d9;" aria-hidden="true"></i>
											<span>7</span>
										</a>
										<a href="#" class="reply" style="color: #c2c5d9;margin-left: 15px;">Reply</a>

									</li>
								</ul>
							</div>

							<form class="comment-form inline-items">

								<div class="post__author author vcard inline-items">
									<img src="public/frontend/img/avatar73-sm.jpg" alt="author">
									<div class="form-group with-icon-right ">
										<textarea class="form-control photo-form-control" style="resize: none;" placeholder="Press Enter to post..." ></textarea>
										<div class="add-options-message">
											<a href="#" class="options-message">
												<svg class="olymp-camera-icon"><use xlink:href="icons/icons.svg#olymp-camera-icon"></use></svg>
											</a>
										</div>
									</div>
								</div>
								
							</form>

						</div>
					</div>
				</div>
	 		</div>
	 		<div class="col-md-2 right-section">
	 			<div class="row announce-scroll top-split"  style=" width: 100%;background-color:transparent; padding: 30px;margin: 0px;padding-left: 20px; height: 246px; max-height: 246px;" >
	 				<div class="col-md-12">
	 					<div class="row">
	 						
	 						<div class="row announce-text-div">
	 							<a href="" onclick="announcePopover(); return false;" id="pop-One" style="width: 100%;overflow: hidden;color:white;" >
	 								<p class="list-group-item">
	 										<div class="row">
	 											<div class="col-md-2">
	 												<img src="public/img/Friends/guy-2.jpg" class="img-chat" style="">
	 											</div>
	 											<div class="col-md-10">
	 												<span class="chat-user-name announce-text-color">This is first post posting by admin named zinnah.the great zinnah.....</span>
	 											</div>
	 										</div>
	 								</p>
	 							</a>
	 						</div>
	 						<hr class="announce-hr">
	 						<div class="row announce-text-div">
	 							<p class="list-group-item">
 									<div class="row">
 										<div class="col-md-2">
 											<img src="public/img/Friends/guy-2.jpg" class="img-chat" style="">
 										</div>
 										<div class="col-md-10">
 											<span class="chat-user-name announce-text-color">This is first post posting by admin named zinnah.the great zinnah.....</span>
 										</div>
 									</div>
	 							</p>
	 						</div>
	 						<hr class="announce-hr">
	 						<div class="row announce-text-div">
	 							<p class="list-group-item">
 									<div class="row">
 										<div class="col-md-2">
 											<img src="public/img/Friends/guy-2.jpg" class="img-chat" style="">
 										</div>
 										<div class="col-md-10">
 											<span class="chat-user-name announce-text-color">This is first post posting by admin named zinnah.the great zinnah.....</span>
 										</div>
 									</div>
	 							</p>
	 						</div>
	 						<hr class="announce-hr">
	 						<div class="row announce-text-div">
	 							<p class="list-group-item">
 									<div class="row">
 										<div class="col-md-2">
 											<img src="public/img/Friends/guy-2.jpg" class="img-chat" style="">
 										</div>
 										<div class="col-md-10">
 											<span class="chat-user-name announce-text-color">This is first post posting by admin named zinnah.the great zinnah.....</span>
 										</div>
 									</div>
	 							</p>
	 						</div>
	 						<hr class="announce-hr">
	 						<div class="row announce-text-div">
	 							<p class="list-group-item">
 									<div class="row">
 										<div class="col-md-2">
 											<img src="public/img/Friends/guy-2.jpg" class="img-chat" style="">
 										</div>
 										<div class="col-md-10">
 											<span class="chat-user-name announce-text-color">This is first post posting by admin named zinnah.the great zinnah.....</span>
 										</div>
 									</div>
	 							</p>
	 						</div>
	 						<hr class="announce-hr">
	 						<div class="row announce-text-div">
	 							<p class="list-group-item">
 									<div class="row">
 										<div class="col-md-2">
 											<img src="public/img/Friends/guy-2.jpg" class="img-chat" style="">
 										</div>
 										<div class="col-md-10">
 											<span class="chat-user-name announce-text-color">This is first post posting by admin named zinnah.the great zinnah.....</span>
 										</div>
 									</div>
	 							</p>
	 						</div>								
	 					</div>
	 				</div>
	 			</div>
	 			<div class="panel-mid splitter-horizontal">
	 				<hr class="hrStyle">
	 			</div>
	 			<div class="row message-scroll bottom-split" style="width: 100%; margin: 0;height: 280px;max-height: 280px;display: inline-block;">
	 				<div class="col-md-12">
	 					<div data-toggle="popover">
	 						<a href="javascript:register_popup('narayan-prusty', 'Jeferh Smith');"  class="list-group-item">
	 						  <i class="fa fa-check-circle connected-status"></i>
	 						  <img src="public/img/Friends/guy-2.jpg" class="img-chat" style="">
	 						  <span class="chat-user-name">Jeferh Smith</span>
	 						</a>
	 					</div>
	 					<div data-toggle="popover" title="Popover title" data-content="Default popover">
	 						<a href="" class="list-group-item">
	 						  <i class="fa fa-minus-circle absent-status"></i>
	 						  <img src="public/img/Friends/guy-2.jpg" class="img-chat" style="">
	 						  <span class="chat-user-name">Jeferh Smith</span>
	 						</a>
	 					</div>
	 					<div data-toggle="popover" title="Popover title" data-content="Default popover">
	 						<a href="" class="list-group-item">
	 						  <i class="fa fa-clock-o away-status"></i>
	 						  <img src="public/img/Friends/guy-2.jpg" class="img-chat" style="">
	 						  <span class="chat-user-name">Jeferh Smith</span>
	 						</a>
	 					</div>
	 					<a href="messages1.html" class="list-group-item" >
	 					  <i class="fa fa-check-circle connected-status"></i>
	 					  <img src="public/img/Friends/guy-2.jpg" class="img-chat" style="">
	 					  <span class="chat-user-name">Jeferh Smith</span>
	 					</a>
	 					<a href="messages1.html" class="list-group-item" >
	 					  <i class="fa fa-check-circle connected-status"></i>
	 					  <img src="public/img/Friends/guy-2.jpg" class="img-chat" style="">
	 					  <span class="chat-user-name">Jeferh Smith</span>
	 					</a>
	 					<a href="messages1.html" class="list-group-item" >
	 					  <i class="fa fa-check-circle connected-status"></i>
	 					  <img src="public/img/Friends/guy-2.jpg" class="img-chat" style="">
	 					  <span class="chat-user-name">Jeferh Smith</span>
	 					</a>
	 					<a href="messages1.html" class="list-group-item" >
	 					  <i class="fa fa-check-circle connected-status"></i>
	 					  <img src="public/img/Friends/guy-2.jpg" class="img-chat" style="">
	 					  <span class="chat-user-name">Jeferh Smith</span>
	 					</a>	
	 				</div>
	 			</div>
	 			<div class="row">
	 				<div class="col-md-12">
	 					<div class="row">
	 					    <div class="form-group add-on">
	 					      <input class="chat_search_box_panel form-control" placeholder="Search" name="srch-term" id="srch-term" type="text">
	 					      <i class="fa fa-search chat-fa-search" aria-hidden="true"></i>
	 					      <a href="#settingModal" data-toggle="modal"><i class="fa fa-cog" aria-hidden="true"></i></a>
	 					    </div>
	 					</div>
	 				</div>
	 			</div>
	 			<div class="aside-right-overlay" style="width: 100%; height: 100%; position: absolute; top: 0; right: 0;  background: #c7c7c7; opacity: 0.3; z-index: -1;">
	 			</div>
	 		</div>
	 	</div>
	 </div>
</section>
  
  
@push('js')

		  

<script>
  (function ($) {
    $(document).ready(function(){
      
    // hide .navbar first
    //$(".navbar-xs").hide();
    

  });
    }(jQuery));
</script>
@endpush
@endsection