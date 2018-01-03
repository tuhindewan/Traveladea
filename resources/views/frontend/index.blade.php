@include('frontend._partials.header')
	<style>
		label{color: #fff;}
	</style>
	<div class="container-fluid no_padding index_main">
		<div class="main-section-header">
			<div class="main-map-section">
				<img src="{{asset('public/frontend/img/banner.jpg')}}" alt="">
			</div>
			<div class="main-map-bottom">
				<div class="container">
					<div class="row">
						<div class="logo">
							<img src="{{asset('public/frontend/img/logo.png')}}" alt="">
						</div>
					</div>
					
					<div class="row">
						
						<div class="login-section">
							<div class="row">
								<div class="col-md-9"></div>
								<div class="col-md-3">
									<div class="login">
										<div class="overlay"></div>
										<div class="login-form">
											<form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        					{{ csrf_field() }}
											  <div class="form-group no_margin {{ $errors->has('email') ? ' has-error' : '' }}">
											    <label for="email">Username / E-Mail</label>
											    <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Username / E-Mail">
											    @if ($errors->has('email'))
				                                    <span class="help-block">
				                                        <strong>{{ $errors->first('email') }}</strong>
				                                    </span>
				                                @endif
											  </div>
											  <div class="form-group no_margin {{ $errors->has('password') ? ' has-error' : '' }}">
											    <label for="password">Password</label>
											    <input id="password" type="password" class="form-control" name="password" required placeholder="Password">

				                                @if ($errors->has('password'))
				                                    <span class="help-block">
				                                        <strong>{{ $errors->first('password') }}</strong>
				                                    </span>
				                                @endif
											  </div>
											  
											  <div class="from-group">
											  	<div class="checkbox">
												    <label>
												      <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> remember me
												    </label>
												  </div>
											  </div>
											  <div class="from-group" style="margin:10px 0;">
											  		<button type="submit" class="btn btn-success">Log in</button>
											  </div>
											  <br>
											  <label><a href="#">Forget Password?</a></label>
											  <br>
											  <label>Not a Member , <a href="{{URL::to('users/create')}}" class="">sign up</a></label>

											</form>

										</div>
										
									</div>
								</div>
							</div>
						</div>
						
					</div>
					<div class="row">
						<!-- end login section -->
						<div class="get-started-section">
							
							<div class="get-started">
								<h2>My Home is <br> in forest, not in Cage</h2>
								<a href="{{URL::to('users/create')}}" class="btn btn-success">Get Started</a>
							</div>	
							
						</div>
					</div>
					
				</div>
				<footer class="index_footer">
					<div class="footer_contianer">
						<div class="footer_overlay"></div>
						<div class="container">
							<div class="footer_top">
								<div class="row">
									<div class="col-md-12">
										
										<div class="row">
											<div class="col-md-8 no_padding">
												<nav class="footer_nav">
													<ul>
														<li><a href="">Home</a></li>
														<li><a href="">Home</a></li>
														<li><a href="">Home</a></li>
														<li><a href="">Home</a></li>
														<li><a href="">Home</a></li>
														<li><a href="">Home</a></li>
														<li><a href="">Home</a></li>
														<li><a href="">Home</a></li>
														<li><a href="">Home</a></li>
														<li><a href="">Home</a></li>
													</ul>
												</nav>
											</div>	
											<div class="col-md-4 no_padding">
												<div class="live_chat">
													<a href="" class="btn btn-info">Live Chat</a>
												</div>
											</div>
										</div>
									</div>
								</div>	
							</div>
							<div class="footer_bottom">
								<p class="copy-right">@ Adea 2017</p>
							</div>
						</div>
						
					</div>
				</footer>
			</div>
		</div>

		
		
	</div>



@include('frontend._partials.footer')