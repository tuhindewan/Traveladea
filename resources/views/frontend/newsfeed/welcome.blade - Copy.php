@include('frontend._partials.header')

<style>
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
</style>

<section class="home_main_container first">
	<div class="home_container_top">

		<!-- map section start -->
		@include('frontend.map.map_markerCluster_click')
		<!-- map section end -->
		<div class="container_top_bar">
			<div class="container_section">
				<div class="col-md-12">
					<div class="row">
						
						<div class="col-md-4 home_top_panel no_padding">
						{!! Form::open(array('route' => 'user-post.store','class'=>'form-horizontal','method'=>'POST','files'=>'true')) !!} 
                			{!! csrf_field() !!}
							<input type="hidden" name="fk_user_id" value="{{Auth::user()->_id}}" > 
							<a href="" data-toggle="modal" data-target="#myModal"><textarea class="form-control home_set_box_panel show-dialog" id="" rows="3" placeholder="What's on your mind?"></textarea></a>
							<div class="home_post_overlay"></div>
							<!-- <button class="show-dialog"> Show Dialog </button> -->
							<div class="post-modal"> 

								<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								  <div class="modal-dialog" role="document">
								    <div class="modal-content">
								      <div class="modal-header" style="padding-top: 13px; padding-left: 10px; padding-bottom: 2px;">
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								        <!-- <h4 class="modal-title" id="myModalLabel">Make Post</h4> -->
								        <select name="post_type" required="required" class="form-control chosen">
				                            
			                              	<option value=""> - Select Post Type - </option>
			                              	<option value="1">Suggestion</option>
			                              	<option value="2">Question</option>
			                              	<option value="3">Plane</option>
			                              	<option value="4">Experience</option>
				                              
				                              
				                        </select>
								      </div>
								      <div class="modal-body">
								      
				                        <div class="body-content" style="margin: 0 15px;">
				                        	<div class="form-group" style="margin-bottom: 0px;">
					                        	<div id="map" class="">  
											        <input id="pac-input" name="place" class="controls form-control" placeholder="Type the location" ame="location" type="text" required>  
											        <div id="map-canvas"> </div>  
											        <input name="lat" class="lat" type="hidden">  
											        <input name="lon" class="lon" type="hidden">  
											    </div>
					                        </div>
					                        <br>
									      	<div class="form-group">
									      		<textarea name="description" class="form-control post-body" id="description" rows="10" placeholder="What's on your mind?"></textarea>
									      	</div>
				                        </div>

								      	<!-- load live image /video -->
								      	<div class="row">
								      		<div class="load_select_option">
								      			<div class="file_load" style="display: inline;"></div>
										        <div class="load_chose_file"></div>
								      		</div>
								      	</div>
								        
										<hr>
										<div class="post-bottom">
											<div class="row">
												<div class="add_file_button col-md-6">
													<label class="" for="post_file">
										        		<a class="btn btn-success add_photo">Add Photo/Video </a>
											        </label>
													<input type="file" id="post_file" multiple onchange="readURL(this,this.id)" style="display:none;">

												</div>
												<div class="add_current_location col-md-6">
													<a class="btn btn-info add_photo">Add Location</a>	
													
												</div>
											</div>
											    
										</div>
								      </div>
								      <div class="modal-footer">
								        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								        <button type="submit" class="btn btn-primary">Post</button>
								      </div>
								    </div>
								  </div>
								</div>
							</div>
						{!! Form::close(); !!}
						</div>

						<div class="col-md-2">
							<div class="home_profile">
								<div id="dl-menu" class="dl-menuwrapper">
									<button>
										<div class="home_profile_overlay"></div>
										<?php 
											$profile = $userProfile['image'];
										 ?>
										<img class="min_profile_home" src='{{asset("images/users$profile")}}' alt=""> {{Auth::user()->username}}  <i class="fa fa-chevron-down" aria-hidden="true"></i>
									</button>
									<ul class="dl-menu">
										<li><a href="#">View Profile</a> </li>
										<li><a href="#">Edit Profile</a> </li>
										<li><a href="#">Setting</a> </li>
										<li><a href="{{URL::to('/users/logout')}}" class="last">Logout</a> </li>
										<div class="home_submenu_overlay"></div>
									</ul>
								</div><!-- /dl-menuwrapper -->
								
							</div>
						</div>
						<div class="col-md-5"></div>
					</div>
				</div>	
			</div>
		</div>
		<div class="container_side_bar">
					
		</div>
		
	</div>

	@include('frontend.user_newsfeed.nav_bottom')
		
</section>
<section id="test"></section>



<script>

	$(".bottom").click(function(){
	     window.location.href=("home-activity");
	})
</script>
<!-- mousewheel scroll up and down -->

<script type="text/javascript">
 	function readURL(input,image_load) {
        if (input.files && input.files[0]) {
 		var i=$('i').length;
            var reader = new FileReader();
            
            reader.onload = function (e) {
            	var video = 'data:video';
            	var string = e.target.result;
		    	if(string.match(video)){
		    		$('.file_load').append('<div class="single_load_file" id="single_file_'+i+'"><video src="'+e.target.result+'" class="append_load_image" id="append_select_image">এই পাকনামি টা</video><button class="btn btn-danger btn-sm file_cancel_btn" id="'+i+'"><i class="fa fa-times" aria-hidden="true"></i></button><input type="hidden" name="video[]" value="'+e.target.result+'"></div>');
		    	}else{
		    		$('.file_load').append('<div class="single_load_file" id="single_file_'+i+'"><img src="'+e.target.result+'" class="append_load_image" id="append_select_image"><button class="btn btn-danger btn-sm file_cancel_btn" id="'+i+'"><i class="fa fa-times" aria-hidden="true"></i></button><input type="hidden" name="image[]" value="'+e.target.result+'"></div>');
		    	}

                
            }
            reader.readAsDataURL(input.files[0]);
        i++;
        }
        $('.load_chose_file').html('<label class="load_file_label" for="post_file"><div class="slide_upload"></div></label>');
        /**/
        $(".load_chose_file").removeClass('remove_file');
         
    }

      
</script>
<script>
    $(document).on('click', '.file_cancel_btn', function(){
	    var id = $(this).attr('id');
	    //alert(id);
    	$("#single_file_"+id).remove();
    	var extFile = $(".file_load").html();
    	if(extFile==""){
    		$(".load_chose_file").addClass('remove_file');
    	}else{
    		$(".load_chose_file").removeClass('remove_file');
    	}

	});


</script>

@include('frontend._partials.footer')