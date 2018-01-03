@extends('frontend.layout.app')
@push('css-style')
	<link href="{{asset('public/css/map.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('public/frontend/css/images-grid.css')}}">
	<!-- <link rel="stylesheet" href="{{asset('public/css/dialog.css')}}" /> -->
	
	<!-- <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/dropdown_com.css')}}" /> -->

	<link rel="stylesheet" href="{{asset('public/frontend/css/pages/post_type_page.css')}}" />
	<link rel="stylesheet" href="{{asset('public/frontend/css/pages/post_page.css')}}" />
	<link rel="stylesheet" href="{{asset('public/frontend/css/pages/aside_right_chat.css')}}" />
	<link rel="stylesheet" href="{{asset('public/css/like/like.css')}}">
	<link rel="stylesheet" href="{{asset('public/frontend/css/pages/show_home_page.css')}}" />
	<style>
		hr{margin-top: 10px;margin-bottom: 5px;}
	</style>
@endpush


@section('content')


<section class="place_news_main_container first">
	<div class="home_container_top">
				
		@include('frontend.map.place_map')
		
		<div class="col-md-7 pull-right">
			<div class="row row-newsletter">
				<div class="col-md-8 newsletter-scroll">
					<div class="row" style="width: 498px;">
						<a href="" data-toggle="modal" data-target="#myModal"><textarea class="form-control set_box_panel show-dialog" id="" rows="3" placeholder="What's on your mind?"></textarea></a>

						@include('frontend.common.post_section')
					</div>
				    <div class="row news-setion-scroll">
				    	    <div class="tab-content">
				    			<div role="tabpanel" class="tab-pane" id="experiences">                
				    				<div class="post_section">
				    				@foreach($getPosts as $post)
				    					@if($post['post_type'] == 4)
				    					@include('frontend.newsfeed.item_post_body')
										@endif
					    			@endforeach
				    				</div>
				    			</div> 
				    			<div role="tabpanel" class="tab-pane active" id="plans"> 
				    				<div class="post_section">
				    				@foreach($getPosts as $post)
				    					@if($post['post_type'] == 3)
				    					@include('frontend.newsfeed.item_post_body')
										@endif
					    			@endforeach
				    				</div>
				    			</div>
				    			<div role="tabpanel" class="tab-pane" id="suggestions"> 
				    				<div class="post_section">
				    				@foreach($getPosts as $post)
				    					@if($post['post_type'] == 1)
				    					@include('frontend.newsfeed.item_post_body')
										@endif
					    			@endforeach
				    				</div>
				    			</div>
				    			<div role="tabpanel" class="tab-pane" id="questions"> 
				    				<div class="post_section">
				    				@foreach($getPosts as $post)
				    					@if($post['post_type'] == 2)
				    					@include('frontend.newsfeed.item_post_body')
										@endif
					    			@endforeach
				    				</div>
				    			</div>
				    		</div>
				    </div>
				</div>
		 		<div class="col-md-4 right-section">
		 			@include('frontend.common.aside_right_chat')
		 		</div>
			</div>
		</div>

	</div>

	@include('frontend.newsfeed.nav_bottom')
		
</section>
<section id="test"></section>

@push('js')
	<script src="{{asset('public/js/post-section/post-section.js')}}"></script>
	<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script> -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCALSYjrJyQ3R9ONak9nVMaAkOuRetWv4&v=3.exp&libraries=places&callback=initMap"></script>
	<script src="{{asset('public/js/map.js')}}"></script>
	<script type="text/javascript" src="{{asset('public/js/dialog.min.js')}}"></script>

	<script src="{{asset('public/frontend/js/images-grid.js')}}"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
	<script>

		$(".bottom").click(function(){
		     //window.location.href=("home-activity");
		})
	</script>
	<!-- mousewheel scroll up and down -->
	
	
@endpush
@endsection