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
						<div class="col-md-3 pull-left home_top_search no_padding">
							<input type="text" class="form-control home_search" name="" value="" placeholder="Search..."><!-- <i class="fa fa-search" aria-hidden="true"></i> -->
							<div class="home_search_overlay"></div>
						</div>
						<div class="col-md-6 pull-right">
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
	<div class="home_navigition">
		<div class="container-fluid no_padding ">
			<nav class="navbar navbar-inverse home_navbar">
			  <div class="container">
			    <!-- Brand and toggle get grouped for better mobile display -->
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			      <a class="navbar-brand" href="#"></a>
			    </div>

			    <!-- Collect the nav links, forms, and other content for toggling -->
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			      <ul class="nav navbar-nav">
			        <li class="active"><a href="#">Home</a></li>
			        <li><a href="#">Profile</a></li>
			        <li><a href="#">Connections</a></li>
			        <li><a href="#">Map</a></li>
			        
			      </ul>
			      <!-- <ul class="nav navbar-nav navbar-right">
			        <li><a href="#" class="scroll-bottom"><i class="fa fa-chevron-circle-down" aria-hidden="true"></i></a></li>
			      </ul> -->
			      
			    </div><!-- /.navbar-collapse -->
			  </div><!-- /.container-fluid -->
			</nav>
			<div class="scroll_to_bottom">
				<a href="#" class="scroll-bottom bottom"><i class="fa fa-chevron-circle-down" aria-hidden="true"></i></a>	
			</div>
		</div>
	</div>	
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
<script>
	// (function() {
	//   var delay = false;

	//   $(document).on('mousewheel DOMMouseScroll', function(event) {
	//     event.preventDefault();
	//     if(delay) return;

	//     delay = true;
	//     setTimeout(function(){delay = false},200)

	//     var wd = event.originalEvent.wheelDelta || -event.originalEvent.detail;

	//     var a= document.getElementsByTagName('section');
	//     if(wd < 0) {
	//       for(var i = 0 ; i < a.length ; i++) {
	//         var t = a[i].getClientRects()[0].top;
	//         if(t >= 40) break;
	//       }
	//     }
	//     else {
	//       for(var i = a.length-1 ; i >= 0 ; i--) {
	//         var t = a[i].getClientRects()[0].top;
	//         if(t < -20) break;
	//       }
	//     }
	    
	//     if(i >= 0 && i < a.length) {
	//       $('html,body').animate({
	//         scrollTop: a[i].offsetTop
	//       });
	//     }
	//   });
	// })();
	// console.clear();
</script>
@include('frontend._partials.footer')