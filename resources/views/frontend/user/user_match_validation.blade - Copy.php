@include('frontend._partials.header')
<style>
	.login-form { background: #fff; box-shadow: 0 3px 8px rgba(0, 0, 0, .25); color: #000;}
	label{color: #000;}
</style>

<section class="terms_main_page">
	<div class="terms_nav_section">
		<div class="container">
			<div class="row">
				<div class="col-md-6 pull-left home_top_search no_padding">
					<div class="terms_top_logo">
						<img src="{{asset('public/frontend/img/logo.png')}}" alt="">
					</div>
					<!-- <a href="" class="btn btn-primary">sing up</a> -->
				</div>
				<div class="col-md-6 pull-right">
					<div class="home_profile">
						<div class="home_profile">
								<div id="dl-menu" class="dl-menuwrapper" style="max-width: 260px;">
									<button>
										Join or log in  <i class="fa fa-chevron-down" aria-hidden="true"></i>
									</button>
									<ul class="dl-menu">
										<li>
											<div class="login">
												<div class="overlay"></div>
												<div class="login-form">
													<form>
													  <div class="form-group">
													    <label for="exampleInputEmail1">Email address</label>
													    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
													  </div>
													  <div class="form-group">
													    <label for="exampleInputPassword1">Password</label>
													    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
													  </div>
													  
													  <div class="checkbox">
													    <label>
													      <input type="checkbox"> remember me
													    </label>
													  </div>
													  <button type="button" class="btn btn-info" style="    background-color: #5cb85c; border-color: #4cae4c;">Log in</button>
													  <br>
													  <label>Do you want to join</label>
													  <br>
													  <button type="button" class="btn btn-success" style="background: cadetblue;">Sign Up</button>

													</form>

												</div>
												
											</div>
										</li>
										
									</ul>
								</div><!-- /dl-menuwrapper -->
								
							</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="contant_section">
		<div class="container">
			<div class="row">
				<div class="col-md-offset-2 col-md-8">
					<div class="user_verification_section">
					{!! Form::open(array('url' => 'users.check-code','class'=>'form-horizontal','method'=>'POST','files'=>'true')) !!} 
						<div class="panel panel-info">
							<div class="panel-heading">Enter Security Code</div>
							<div class="panel-body">
								<p>Please check your email for a message with your code. Your code is 4 numbers long</p>
							    <div class="row">
							    	<div class="col-md-6">
							    		<input type="hidden" name="id" class="id" value="{{$getUser->_id}}">
							    		<input type="hidden" name="email" class="userEmail" value="{{$getUser->email}}">
							    		<div class="form-group" style="margin-left: 0;">
										    <input type="text" name="code" class="form-control" id="code" placeholder="Type Code...">
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