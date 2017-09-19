<?php include('_partials/header.php'); ?>
<section class="home_main_container">
	<div class="home_container_top">
		<!-- <img src="" alt=""> -->
		
		<div class="container_top_bar">
			<div class="container">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-3 pull-left">
							<input type="text" class="form-control home_search" name="" value="" placeholder="search..."><!-- <i class="fa fa-search" aria-hidden="true"></i> -->
						</div>
						<div class="col-md-6 pull-right">
							<div class="home_profile">
								<div class="column">
									<div id="dl-menu" class="dl-menuwrapper">
										<button><img class="min_profile_home" src="assets/img/user.jpg" alt=""> Md. xyz  <i class="fa fa-chevron-down" aria-hidden="true"></i></button>
										<ul class="dl-menu">
											<li><a href="#">View Profile</a> </li>
											<li><a href="#">Edit Profile</a> </li>
											<li><a href="#">Setting</a> </li>
											<li><a href="#">Logout</a> </li>
										</ul>
									</div><!-- /dl-menuwrapper -->
								</div>
							</div>
						</div>
					</div>
				</div>	
			</div>
		</div>
		<div class="container_side_bar">
				
		</div>
		
		
	</div>	
</section>
<section>
	<div class="home_navigition">
		<div class="container-fluid no_padding">
			<nav class="navbar navbar-inverse">
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
			      
			    </div><!-- /.navbar-collapse -->
			  </div><!-- /.container-fluid -->
			</nav>
		</div>
	</div>
	<div class="experience_section">
		<div class="container">
			<div>
				<!-- tabs -->
				<div class="tabbable tabs-left">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#plans" data-toggle="tab">Plans</a></li>
						<li><a href="#suggestion" data-toggle="tab">Suggestion</a></li>
						<li><a href="#questions" data-toggle="tab">Questions</a></li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="plans">                
							<div class="">
								<h1>Plans </h1>
								<p>These lists are meant to identify articles which deserve editor attention because they are the most important for an encyclopedia to have, as determined by the community of participating editors. They may also be of interest to readers as an alternative to lists of overview articles.</p>	

							</div>
						</div> 
						<div class="tab-pane" id="suggestion"> 
							<div class="">
								<h1>Suggestion </h1>
								<p>because they are the most important for an encyclopedia to have, as determined by the community of participating editors. They may also be of interest to readers as an alternative to lists of overview articles.</p>                 
							</div>
						</div>
					
						<div class="tab-pane" id="questions"> 
							<div class="">
								<h1>Questions </h1>
								<p>meant to identify articles which deserve editor attention because they are the most important for an encyclopedia to have, as determined by the community of participating editors. They may also be of interest to readers as an alternative to lists of overview articles.</p>                 
							</div>
						</div>
					
						
					</div>
				</div>
				<!-- /tabs -->
			  

			</div>		

		</div>	
	</div>
</section>
<?php include('_partials/footer.php'); ?>