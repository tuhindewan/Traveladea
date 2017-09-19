@extends('frontend.layout.app')
@section('content')
	<style>
		.form-group {margin-bottom: 5px;}
		body{	
			background: #7db9e8; /* Old browsers */
			background: -moz-linear-gradient(top, #7db9e8 0%, #207cca 50%, #7db9e8 100%); /* FF3.6-15 */
			background: -webkit-linear-gradient(top, #7db9e8 0%,#207cca 50%,#7db9e8 100%); /* Chrome10-25,Safari5.1-6 */
			background: linear-gradient(to bottom, #7db9e8 0%,#a6acb1 50%,#7db9e8 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
			filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#7db9e8', endColorstr='#7db9e8',GradientType=0 ); /* IE6-9 */
		}
		label span{color:red !important;}
		.radio-inline input[type="radio"] {margin-top: 4px;}
	</style>
    <!-- main content -->
    <section class="form-box">
        <div class="container">
            
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
				
					<!-- Form Wizard -->
					<div class="form-wizard form-header-stylist form-body-stylist">
					{!! Form::open(array('route' => 'users.store','class'=>'form-horizontal','method'=>'POST','files'=>'true')) !!} 
                		{!! csrf_field() !!}
                		<h3>Create an account</h3>
						
						<!-- Form progress -->
                		<div class="form-wizard-steps form-wizard-tolal-steps-4">
                			<div class="form-wizard-progress">
                			    <div class="form-wizard-progress-line" data-now-value="12.25" data-number-of-steps="4" style="width: 12.25%;"></div>
                			</div>
							<!-- Step 1 -->
                			<div class="form-wizard-step active">
                				<div class="form-wizard-step-icon"><i class="fa fa-unlock-alt" aria-hidden="true"></i></div>
                				<p>Account</p>
                			</div>
							<!-- Step 1 -->
							
							<!-- Step 2 -->
                			<div class="form-wizard-step">
                				<div class="form-wizard-step-icon"><i class="fa fa-camera" aria-hidden="true"></i></div>
                				<p>Image</p>
                			</div>
							<!-- Step 2 -->
							
							<!-- Step 3 -->
                			<div class="form-wizard-step">
                				<div class="form-wizard-step-icon"><i class="fa fa-users" aria-hidden="true"></i></div>
                				<p>invite friends</p>
                			</div>
							<!-- Step 3 -->
							
							<!-- Step 4 -->
							<div class="form-wizard-step">
                				<div class="form-wizard-step-icon"><i class="fa fa-check" aria-hidden="true"></i></div>
                				<p>Success</p>
                			</div>
							<!-- Step 4 -->
                		</div>
						<!-- Form progress -->
                		
						
						<!-- Form Step 1 -->
                		<fieldset>
                			<small class="requied_condition"><i class="fa fa-hand-o-right" aria-hidden="true"></i> All * required .</small>
									
							<div class="form-group">
								<label class="radio-inline">
								  <input type="radio" name="gender" value="mr"> Mr.
								</label>
                                <label class="radio-inline">
								  <input type="radio" name="gender" value="ms" checked="checked"> Ms./Mrs.
								</label>
								
                            </div>
					  				
					  			
					  		<div class="row">
					  			<div class="col-sm-12">
					  				<div class="row">
					  					<div class="col-sm-4">
					  						<div class="form-group">
											    <label for="FirstName">First Name: <span>*</span></label>
											    <input type="text" name="firstname" class="form-control input-sm required" id="FirstName" placeholder="First Name" required>
											</div>
					  					</div>
					  					<div class="col-sm-4">
					  						<div class="form-group">
											    <label for="MiddleName">Middle Name :</label>
											    <input type="text" name="middlename" class="form-control " id="MiddleName" placeholder="Middle Name :">
											</div>
					  					</div>
					  					<div class="col-sm-4">
					  						<div class="form-group">
											    <label for="LastName">Last Name: <span>*</span></label>
											    <input type="text" name="lastname" class="form-control required" id="LastName" placeholder="Last Name">
											</div>
					  					</div>
					  				</div>
					  			</div>
					  		</div>
					  		
			  				<div class="form-group">
							    <label for="currentCity">Current City: <span>*</span></label>
							    <select name="fk_city_id" data-placeholder="Choose a Country..." class="chosen required" tabindex="1">
									<option>Choose...</option>
									<option>Barguna</option>
									<option >Barisal</option>
									<option>Bhola</option>
									<option >Jhalokati</option>
									<option >Patuakhali</option>
									<option >Pirojpur</option>
									<option >Bandarban</option>
									<option >Brahmanbaria</option>
									<option >Chandpur</option>
									<option >Chittagong</option>
									<option >Comilla</option>
									<option >Cox's Bazar</option>
									<option >Feni</option>
									<option >Khagrachhari</option>
									<option >Lakshmipur</option>
									<option >Noakhali</option>
									<option >Rangamati</option>
									<option >Dhaka </option>
									<option >Faridpur </option>
									<option >Gazipur </option>
									<option >Gopalganj</option>
									<option >Kishoreganj</option>
									<option >Madaripur</option>
									<option >Manikganj</option>
									<option >Munshiganj</option>
									<option >Narsingdi </option>
									<option >Rajbari</option>
									<option >Shariatpur</option>
									<option >Tangail </option>
									<option >Bagerhat </option>
									<option >Chuadanga</option>
									<option >Jessore </option>
									<option >Jhenaidah</option>
									<option >Khulna</option>
								</select>
							</div>	
					  			
					  		<div class="row">
					  			<div class="col-sm-12">
					  				<div class="row">
					  					<div class="col-sm-6">
					  						<div class="form-group">
											    <label for="Email">Email: <span>*</span></label>
											    <input type="Email" name="email" placeholder="Email" class="form-control required" required>
											</div>
					  					</div>
					  					<div class="col-sm-6">
					  						<div class="form-group">
											    <label for="PhoneNumber">Mobile Number: <span>*</span></label>
											    <input type="phone" name="phone" class="form-control required" id="PhoneNumber" placeholder="Phone Number">
											</div>
					  					</div>
					  				</div>
					  			</div>
					  		</div>
                			
                            <div class="form-group">
                			    <label>User Name: <span>*</span></label>
                                <input type="text" name="username" placeholder="User Name" class="form-control required">
                            </div>
							<div class="form-group">
                			    <label>Password: <span>*</span></label>
                                <input type="password" name="password" placeholder="User Password" class="form-control required">
                            </div>
							<div class="form-group">
                			    <label>Confirm Password: <span>*</span></label>
                                <input type="password" name="password_confirmation" placeholder="Confirm Password" class="form-control required">
                            </div>
                            <div class="form-wizard-buttons">
                                <button type="button" class="btn btn-next">Next</button>
                            </div>
                        </fieldset>
						<!-- Form Step 1 -->

						<!-- Form Step 2 -->
                        <fieldset>
							
							<div style="clear:both;"></div>
								<div class="form-group image-upload">
								  <div class="setting image_picker">
									  <br/><h3 class="text-center">Upload Profile Image</h3>
									  <div class="settings_wrap">
										<label class="drop_target">
										  <div class="image_preview"></div>
										  <input id="inputFile" type="file" name="image" />
										</label>
										<!-- <div class="settings_actions vertical"><a class="disabled" data-action="remove_current_image"><i class="fa fa-trash" aria-hidden="true"></i> Remove Image</a></div> -->
										<div class="setting_actions"> <p>Take Photo</p></div>
									  </div>
									</div>							  
								</div>
							  	
                            <div class="form-wizard-buttons">
                                <button type="button" class="btn btn-previous">Previous</button>
                                <button type="button" class="btn btn-next">Next</button>
                            </div>
                        </fieldset>
						<!-- Form Step 2 -->

						<!-- Form Step 3 -->
                        <fieldset>
							<div class="form-group image-upload">
								  <div class="setting image_picker">
									  <br/><h3 class="text-center">Invite Friends</h3>
									  <div class="settings_wrap">
										
										
										<div class="invite_friend_section"> <p></p></div>
									  </div>
									</div>							  
								</div>
                			
							
                            <div class="form-wizard-buttons">
                                <button type="button" class="btn btn-previous">Previous</button>
                                <button type="button" class="btn btn-next">Next</button>
                            </div>
                        </fieldset>
						<!-- Form Step 3 -->
						
						<!-- Form Step 4 -->
						<fieldset>
							
							<div style="clear:both;"></div>
								<div class="success">
										<h3>Sing Up Success</h3>
									  	<div class="success-icon"><i class="fa fa-check" aria-hidden="true"></i></div>					  
								</div>
                            <div class="form-wizard-buttons">
                                <button type="button" class="btn btn-previous">Previous</button>
                                <button type="submit" class="btn btn-submit">Confirm</button>
                            </div>
                        </fieldset>
						<!-- Form Step 4 -->
                	
                	{!! Form::close(); !!}
					
					</div>
					<!-- Form Wizard -->
                </div>
            </div>
                
        </div>
    </section>
	<!-- main content -->
@endsection