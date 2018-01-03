@include('frontend._partials.header')

<section class="home_main_container first">
	<div class="home_container_top">
		<!-- map section start -->
		@include('frontend.map.map')
		<!-- map section end -->
		<div class="container_top_bar">
			<div class="container">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-3 pull-left home_top_panel no_padding">
							<input type="text" class="form-control home_set_box_panel" name="" value="" placeholder="Search..."><!-- <i class="fa fa-search" aria-hidden="true"></i> -->
							<div class="home_search_overlay"></div>
						</div>
						<div class="col-md-offset-1 col-md-4 home_top_panel no_padding">
							<!-- <input type="text" class="form-control home_search" name="" value="" placeholder="Search..."> --> 
							<textarea name="newsfeed" class="form-control home_set_box_panel show-dialog" id="" rows="3" placeholder="What's on your mind?"></textarea>
							<div class="home_post_overlay"></div>
							<!-- <button class="show-dialog"> Show Dialog </button> -->
							<div class="post-dialog"> 
								<textarea name="" class="form-control post-body" id="" rows="10" placeholder="What's on your mind?"></textarea>
								<div class="file_load"></div>
								<label class="slide_upload" for="post_file"><img id="image_load_logo" src=""></label><input type="file" id="post_file" name="image" onchange="readURL(this,this.id)" style="display:none;">
								<div class="post-bottom">
									<a class="btn btn-success add_photo">Add Photo</a>    
								</div>
								<!-- <a href="#" id="fbclose">Close this dialog</a> -->
							 </div>
						</div>

						<div class="col-md-3 pull-right">
							<div class="home_profile">
								<div id="dl-menu" class="dl-menuwrapper">
									<button>
										<div class="home_profile_overlay"></div>
										<img class="min_profile_home" src="{{asset('public/frontend/img/user.jpg')}}" alt=""> Md. xyz  <i class="fa fa-chevron-down" aria-hidden="true"></i>
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
					</div>
				</div>	
			</div>
		</div>
		<div class="container_side_bar">
					
		</div>
		
	</div>
	<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
	@include('frontend.user_newsfeed.nav_bottom')
		
</section>
<section id="test"></section>

<script>

	$(".bottom").click(function(){
		/*$.ajax({
	        url: "show-page.php",
	        type: "POST",
	        
	        success: function(response){
	            console.log(response);
	            //window.location='sign-up.php'
	            $("#test").html(response);
	            $('.home_main_container').hide();
	                
	        }
	    });*/
	    //$('#test').load("show-page.php");
	     window.location.href=("home-activity");
	    //$('.home_main_container').hide();
		
		
	})
</script>
<!-- mousewheel scroll up and down -->
<script type="text/javascript">
    $(function() {
        $(".show-dialog").click(function() {
            $(".post-dialog").fbdialog({
            title: "Make Post",
            cancel: "Cancel",
            okay: "Okay",
            okaybutton: true,
            cancelbutton: true,
            buttons: true,
            opacity: 0.0, 
            dialogtop: ""},
            function(callback){
	            if(callback == 1){
	                //alert("Okay button clicked.");
			        }
			    if(callback == 2){
			                //alert("Cancel button clicked.");
			       	}
		    }); 

       		$('.post-body').click();

       		$('.fb_close').html('<i class="fa fa-times" aria-hidden="true" style="font-size:13px;"></i>');

       		/*add photo click then append image file*/
       		$(".add_photo").click(function(){
				alert('dlf');
				//var image_chose_option = '<label class="slide_upload" for="post_file"><img id="image_load_logo" src=""></label><input type="file" id="post_file" name="image" onchange="readURL(this,this.id)" style="display:none">';
				//$('.file_select').html(image_chose_option);	
			});
			/*live load image*/
			


        });
        
        

        // $(document).on("click", "#fbclose", function() {     
        //     $(".post-dialog").fbdialog({close: true});
        // });
        /**/
        
    });
</script>
<script type="text/javascript">
	$(".add_photo").click(function(event){
		alert('dlf');
		var add = '<label class="slide_upload" for="post_file"><img id="image_load_logo" src=""></label><input type="file" id="post_file" name="image" onchange="readURL(this,this.id)" style="display:none">';	
	});
	
</script>
<script type="text/javascript">
 	function readURL(input,image_load) {
      var target_image='#'+$('#'+image_load).prev().children().attr('id');

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $(target_image).attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }   
</script>

@include('frontend._partials.footer')