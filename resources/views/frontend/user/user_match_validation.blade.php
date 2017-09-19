@include('frontend._partials.header')
<section class="user_verifi_page first">
	<div class="user_verifi_content">
		<img class="map-bg" src="{{asset('public/frontend/img/map-bg.png')}}" alt="">
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
										<img class="min_profile_home" src="{{asset('public/frontend/img/user.jpg')}}" alt=""> {{$getUser->username}}  <i class="fa fa-chevron-down" aria-hidden="true"></i>
									</button>
									<ul class="dl-menu">
										<li><a href="{{URL::to('users/logout')}}" class="last">Logout</a> </li>
										<div class="home_submenu_overlay"></div>
									</ul>
								</div><!-- /dl-menuwrapper -->
								
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-offset-2 col-md-8">
							<div class="user_verification_section">
							{!! Form::open(array('url' => 'users.check-code','class'=>'form-horizontal','method'=>'POST','files'=>'true')) !!} 
							{!! csrf_field() !!}
								<div class="panel panel-info">
									<div class="panel-heading">Enter Security Code</div>
									<div class="panel-body">
										<p>Please check your email for a message with your code. Your code is 4 numbers long</p>
									    <div class="row">
									    	<div class="col-md-6">
									    		<input type="hidden" name="id" class="id" value="{{$getUser->_id}}">
									    		<input type="hidden" name="email" class="userEmail" value="{{$getUser->email}}">
									    		<div class="form-group" style="margin-left: 0;">
												    <input type="text" name="code" class="form-control" id="code" placeholder="Type Code..." required>
												</div>
												<div id="message"></div>
												@if(Session::has('error'))
													
											    <div class="alert alert-danger alert-dismissable">
											        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
											       <b>{!! Session::get('error')!!}</b> 
											    </div>
													
												@endif

									    	</div>
									    	<div class="col-md-6">
									    		<div class="confirm_email text-right">
									    			<p>We sent your code to:</p>
									    			<?php 
									    				$email = $getUser->email;
									    				$emailExp  = explode('@', $email);
									    				$emailPart1 = $emailExp[0];
									    				$emailPart2 = $emailExp[1];
									    				$emailcharFirst = $emailPart1[0]; 	
									    				$emailcharLast = substr($emailPart1, -1); 
									    				$emailExm = $emailcharFirst."******".$emailcharLast;

									    			 ?>
									    			<p>{{$emailExm.'@'.$emailPart2}}</p>
									    		</div>
									    	</div>
									    </div>
									</div>
									<div class="panel-footer ">
										<div class="row">
											<div class="col-md-6">
												<a href="#" class="sendCode">re send a code.</a>
											</div>
									    	<div class="col-md-6 pull-right">
									    		<button type="submit" class="btn btn-success">Continue</button>
									    		
									    		<a href="{{URL::to('index')}}" class="btn btn-danger">Cancel</a>
									    	</div>	
										</div>
									</div>
								</div>
							{!! Form::close(); !!}
							</div>
						</div>
					</div>
				</div>	
			</div>

		</div>

	</div>
		
</section>
<script>
	$(".sendCode").click(function(){
		id = $(".id").val();
		_token = $('input[name="_token"]').val();
		userEmail = $('.userEmail').val();
		$.ajax({
			url: "{{URL::to('/')}}"+'/users/re-generate-code',
          	type: "post",
          	data: {_token : _token,
          		id:id,
          		email:userEmail
          		},
          	success:function(result)
          	{
            	console.log(result);
            
	          	if(result == 'success'){
	                $("#message").html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><b>An Activation Code Send Your Email .This code active in 24 hours</b></div>');
	            }
	            else
	            {
	                $("#message").html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><b>'+result+'</b></div>');
	            }
	        }
	        
        });
	});
</script>
@include('frontend._partials.footer')