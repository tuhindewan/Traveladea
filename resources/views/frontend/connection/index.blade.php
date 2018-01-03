@include('frontend._partials.header')
<link href="{{asset('public/backend/css/style.min_2.css')}}" rel="stylesheet" />
@include('frontend._partials.nav')
<style>
	
	.right-section{
		padding: 0px !important;
	    border: 1px solid #fff;
	    border-bottom: none;
	    border-top: none;
	    border-right: none;
	    height: 582px;
	    z-index: 10;
	    position: fixed;
	    right: 5px;
	    top: 55px;
	    width: 285px;
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
		.fa-search{position: absolute;top: 11px;left: 28px;}
		
		.side-button{border-radius: 27px;}
		.suggestion-button{width: 7.6%;height: auto;position: absolute;top: 26.5%;margin-left: 32px;}
		.experience-button{width: 7.6%;height: auto;position: absolute;top: 33%;margin-left: 32px;}
		.question-button{width: 6.6%;height: auto;position: absolute;top: 39.5%;margin-left: 32px;}
		.semi-transparent-button {display: block; box-sizing: border-box;padding: 3px;width: 4%;max-width: 200px; background: #fff;background: rgba(255, 255, 255, 0.3);color: #fff;text-align: center;text-decoration: noneletter-spacing: 1px;transition: all 0.3s ease-out;position: absolute;top: 20%;margin-left: 60px;border-radius: 12px;height: 25px;
		}
		.semi-transparent-button:hover,
		.semi-transparent-button:focus,
		.semi-transparent-button:active {
		  transition: all 0.5s ease-in;
		  text-decoration: none;
		  color: white;
		  background: rgba(255, 255, 255, 0.6);
		}
		.suggestions-transparent-button {display: block;box-sizing: border-box;padding: 3px;width: 7.5%;max-width: 200px;background: #fff;background: rgba(255, 255, 255, 0.3);color: #fff;text-align: center;text-decoration: none; letter-spacing: 1px;transition: all 0.3s ease-out;position: absolute; top: 25.5%; margin-left: 60px;border-radius: 12px;height: 25px;
		}
		.suggestions-transparent-button:hover,
		.suggestions-transparent-button:focus,
		.suggestions-transparent-button:active {
		  transition: all 0.5s ease-in;
		  text-decoration: none;
		  color: white;
		  background: rgba(255, 255, 255, 0.6);
		}
		.experiences-transparent-button {display: block;box-sizing: border-box;padding: 3px;width: 7.5%;max-width: 200px;background: #fff;background: rgba(255, 255, 255, 0.3);color: #fff;text-align: center;text-decoration: none;letter-spacing: 1px;transition: all 0.3s ease-out;position: absolute;top: 31%;margin-left: 60px;border-radius: 12px;height: 25px;
		}
		.experiences-transparent-button:hover,
		.experiences-transparent-button:focus,
		.experiences-transparent-button:active {
		  transition: all 0.5s ease-in;
		  text-decoration: none;
		  color: white;
		  background: rgba(255, 255, 255, 0.6);
		}
		.questions-transparent-button {display: block;box-sizing: border-box;padding: 3px;width: 6.4%;max-width: 200px; background: #fff;background: rgba(255, 255, 255, 0.3);color: #fff;text-align: center;text-decoration: none;letter-spacing: 1px;transition: all 0.3s ease-out;position: absolute;top: 36.5%;margin-left: 60px;border-radius: 12px;height: 25px;
		}
		.questions-transparent-button:hover,
		.questions-transparent-button:focus,
		.questions-transparent-button:active {
		  transition: all 0.5s ease-in;
		  text-decoration: none;
		  color: white;
		  background: rgba(255, 255, 255, 0.6);
		}
		.plan-image{position: absolute;top: 20.3%;background-color: white;border-radius: 42px;width: 21px;margin-left: 33px;padding: 2px;}
		.suggestions-image{position: absolute;top: 26%;background-color: white;border-radius: 42px;width: 21px;margin-left: 33px;padding: 2px;}
		.experiences-image{position: absolute;top: 31.4%;background-color: white;border-radius: 42px;width: 21px;margin-left: 33px;padding: 2px;}
		.questions-image{position: absolute;top: 37%;background-color: white;border-radius: 42px;width: 21px;margin-left: 33px;padding: 2px;}
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
			/* position: absolute;
			top: 18px;
			color: #023e58;
			right: 13px; */
		}
		    /* position: absolute;
		    top: -7px;
		    right: -8px;
		    border: 0;
		    height: 100%;
		    width: 60px;
		    font-size: 16px;
		    color: #2196f3;
		    background: 0 0; */

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
	    colr: red;
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
		.plan-section{
			border: 1px solid #fff;
		    width: 340px;
		    background-color: #fff;
		    height: 563px;
		    max-height: 563px;
		    z-index: 10;
		    position: fixed;
		    right: 22%;
		    overflow: hidden;
		    border-radius: 5px;
		}
		.plan-scroll { width: 200px;height: 400px;overflow-y: scroll;}
		.plan-scroll::-webkit-scrollbar {width: 0px;background: transparent;}
		.plan-scroll::-webkit-scrollbar-track {-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);border-radius: 10px;
		}
		.plan-scroll::-webkit-scrollbar-thumb {border-radius: 10px;-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5)
		}
		.mid-section{

			width: 482px;
			border-radius: 5px;
		}
		.radius{border-radius: 5px !important;font-size: 13px;font-weight: bolder;}	
		.announce-text-color{color: #808487; text-transform: none;}
		.chat-user-name{color: #808487 !important;}

		.plan-shape{
			border: 2px solid #fff;
		    width: 50px;
		    height: 20px;
		    text-align: center;
		    background-color: #0275d8;
		    border-radius: 10px;
		    color: white;
		}

		.suggestion-shape{
			border: 2px solid #fff;
		    width: 85px;
		    height: 21px;
		    text-align: center;
		    background-color: #5cb85c;
		    border-radius: 10px;
		    color: white;
		    margin-top: -4px;
		}

		.question-shape{
			border: 2px solid #fff;
		    width: 75px;
		    height: 21px;
		    text-align: center;
		    background-color: #5bc0de;
		    border-radius: 10px;
		    color: white;
		    margin-top: -4px;
		}
		.set_box_panel{margin: 5px 0; background: white !important; position: relative;z-index: 11; color: #fff; border: 0; cursor: text;}




</style>

<section class="connection_page">
	 <div class="container-fluid">
	 	<div class="row">
	 		<div class="col-md-2">
				<div class="tabbable tabs-left">
					<ul class="nav nav-tabs" role="tablist" style="width: 15%;border-radius: 5px; height: 169px;position: fixed;">
						<li role="presentation" class="active"><a class="radius" href="#experiences" role="tab" data-toggle="tab">Experiences</a></li>
						<li role="presentation"><a class="radius" href="#plans" role="tab" data-toggle="tab">Plans</a></li>
						<li role="presentation"><a  class="radius" href="#suggestions" role="tab" data-toggle="tab">Suggestions</a></li>
						<li role="presentation"><a  class="radius" href="#questions" role="tab" data-toggle="tab">Questions</a></li>
					</ul>
				</div>
	 		</div>
	 		<div class="col-md-4 mid-section">
 			    <div class="row" style="margin-top: -5px;">
					<a href="" data-toggle="modal" data-target="#myModal"><textarea class="form-control set_box_panel show-dialog" id="" rows="3" placeholder="What's on your mind?"></textarea></a>

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
 			    </div>
 			    <div class="row">
 			    	    <div class="tab-content">
 			    			<div role="tabpanel" class="tab-pane active" id="experiences">                
 			    				<div class="panel panel-default">
 			    					<div class="panel-body">
 			    			    		<p>Experiences</p> <p>Experiences</p> 
 			    			    		<p>Experiences</p> <p>Experiences</p> 
 			    			    		<p>Experiences</p> <p>Experiences</p> 
 			    			    		<p>Experiences</p> <p>Experiences</p> 
 			    			    		<p>Experiences</p> <p>Experiences</p> 
 			    			    		<p>Experiences</p> <p>Experiences</p> 
 			    			    		<p>Experiences</p> <p>Experiences</p> 
 			    			    		<p>Experiences</p> <p>Experiences</p> 
 			    			    		<p>Experiences</p> <p>Experiences</p> 
 			    			    		<p>Experiences</p> <p>Experiences</p> 
 			    			    		<p>Experiences</p> <p>Experiences</p> 
 			    			    		<p>Experiences</p> <p>Experiences</p> 
 			    			    		<p>Experiences</p> <p>Experiences</p> 
 			    			    		<p>Experiences</p> <p>Experiences</p> 
 			    			    		<p>Experiences</p> <p>Experiences</p> 
 			    			    		<p>Experiences</p> <p>Experiences</p> 
 			    			    		<p>Experiences</p> <p>Experiences</p> 
 			    			    		<p>Experiences</p> <p>Experiences</p> 
 			    			    		<p>Experiences</p> <p>Experiences</p> 
 			    			    		<p>Experiences</p> <p>Experiences</p> 
 			    			    		<p>Experiences</p> <p>Experiences</p> 
 			    			    		<p>Experiences</p> <p>Experiences</p> 
 			    			    		<p>Experiences</p> <p>Experiences</p> 
 			    			    		<p>Experiences</p> <p>Experiences</p> 
 			    			    		<p>Experiences</p> <p>Experiences</p> 
 			    			    		<p>Experiences</p> <p>Experiences</p> 
 			    			    		<p>Experiences</p> <p>Experiences</p> 
 			    			    		<p>Experiences</p> <p>Experiences</p> 
 			    			    		<p>Experiences</p> <p>Experiences</p> 
 			    			    		<p>Experiences</p> <p>Experiences</p> 
 			    			    		<p>Experiences</p> <p>Experiences</p> 
 			    			    		<p>Experiences</p> <p>Experiences</p> 
 			    			    		<p>Experiences</p> <p>Experiences</p> 
 			    			    		<p>Experiences</p> <p>Experiences</p> 
 			    			    		<p>Experiences</p> <p>Experiences</p> 
 			    			    		<p>Experiences</p> <p>Experiences</p> 
 			    			    		<p>Experiences</p> <p>Experiences</p> 
 			    			    		<p>Experiences</p> <p>Experiences</p> 
 			    			    		<p>Experiences</p> <p>Experiences</p> 
 			    			    		<p>Experiences</p> <p>Experiences</p> 
 			    			    		<p>Experiences</p> <p>Experiences</p> 
 			    			    		<p>Experiences</p> <p>Experiences</p> 
 			    			    		<p>Experiences</p> <p>Experiences</p> 
 			    			    		<p>Experiences</p> <p>Experiences</p> 
 			    			    		<p>Experiences</p> <p>Experiences</p> 
 			    			    		<p>Experiences</p> <p>Experiences</p> 
 			    			    		<p>Experiences</p> <p>Experiences</p> 
 			    			    		<p>Experiences</p> <p>Experiences</p> 
 			    			    		<p>Experiences</p> <p>Experiences</p> 
 			    			    		<p>Experiences</p> <p>Experiences</p> 
 			    			    		<p>Experiences</p> <p>Experiences</p> 
 			    			    		<p>Experiences</p> <p>Experiences</p> 
 			    			    		<p>Experiences</p> <p>Experiences</p> 
 			    			    		<p>Experiences</p> <p>Experiences</p> 
 			    			    		<p>Experiences</p> <p>Experiences</p> 
 			    			    		<p>Experiences</p> <p>Experiences</p> 
 			    			    		<p>Experiences</p> <p>Experiences</p> 
 			    			    		<p>Experiences</p> <p>Experiences</p> 
 			    			    		<p>Experiences</p> <p>Experiences</p> 
 			    			    		<p>Experiences</p> <p>Experiences</p> 
 			    			    		<p>Experiences</p> <p>Experiences</p> 
 			    			    		<p>Experiences</p> <p>Experiences</p> 
 			    			    		<p>Experiences</p> <p>Experiences</p> 
 			    			    		<p>Experiences</p> <p>Experiences</p> 
 			    			    		<p>Experiences</p> <p>Experiences</p> 
 			    			    		<p>Experiences</p> <p>Experiences</p> 
 			    			    		<p>Experiences</p> <p>Experiences</p> 
 			    			    		<p>Experiences</p> <p>Experiences</p> 
 			    			    		<p>Experiences</p> <p>Experiences</p> 
 			    			    		<p>Experiences</p> <p>Experiences</p> 
 			    			    		<p>Experiences</p> <p>Experiences</p> 
 			    			    		<p>Experiences</p> <p>Experiences</p> 
 			    			    		<p>Experiences</p> <p>Experiences</p> 
 			    		  			</div>
 			    				</div>
 			    			</div> 
 			    			<div class="tab-pane" id="plans"> 
 			    				<div class="panel panel-default">
 			    					<div class="panel-body">
 			    						<p>Plans</p>  
 			    					</div>              
 			    				</div>
 			    			</div>
 			    			<div class="tab-pane" id="suggestions"> 
 			    				<div class="panel panel-default">
 			    					<div class="panel-body">
 			    						<p>Suggestions</p>  
 			    					</div>              
 			    				</div>
 			    			</div>
 			    			<div class="tab-pane" id="questions"> 
 			    				<div class="panel panel-default">
 			    					<div class="panel-body">
 			    						<p>Questions</p>  
 			    					</div>              
 			    				</div>
 			    			</div>
 			    		</div>
 			    </div>
	 		</div>
	 		<div class="col-md-3 plan-section">
	 			<div class="plan-shape">
					<div class="shape-text">
						Plans								
					</div>
				</div>
	 			<div class="row plan-scroll top-split"  style=" width: 328px;background-color:transparent; padding: 30px;margin: 0px;padding-left: 20px; height: 165px; max-height: 165px;" >
	 				<div class="col-md-12">
	 					<div class="row">
	 						<div class="row announce-text-div">
	 							<a href="" onclick="announcePopover(); return false;" id="pop-One" style="width: 100%;overflow: hidden;color:white;" >
	 								<p class="list-group-item">
 										<div class="row">
 											<div class="col-md-12">
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
 											<!-- <div class="col-md-2">
 												<img src="{{asset('public/img/Friends/guy-2.jpg')}}" class="img-chat" style="">
 											</div> -->
 											<div class="col-md-12">
 												<span class="chat-user-name announce-text-color">This is first post posting by admin named zinnah.the great zinnah.....</span>
 											</div>
 										</div>
 								</p>
	 						</div>
	 						<hr class="announce-hr">
	 						<div class="row announce-text-div">
	 							<p class="list-group-item">
											<div class="row">
												<!-- <div class="col-md-2">
													<img src="{{asset('public/img/Friends/guy-2.jpg')}}" class="img-chat" style="">
												</div> -->
												<div class="col-md-12">
													<span class="chat-user-name announce-text-color">This is first post posting by admin named zinnah.the great zinnah.....</span>
												</div>
											</div>
									</p>
	 						</div>
	 						<hr class="announce-hr">
	 						<div class="row announce-text-div">
	 							<p class="list-group-item">
										<div class="row">
											<!-- <div class="col-md-2">
												<img src="{{asset('public/img/Friends/guy-2.jpg')}}" class="img-chat" style="">
											</div> -->
											<div class="col-md-12">
												<span class="chat-user-name announce-text-color">This is first post posting by admin named zinnah.the great zinnah.....</span>
											</div>
										</div>
								</p>
	 						</div>
	 						<hr class="announce-hr">
	 						<div class="row announce-text-div">
	 							<p class="list-group-item">
									<div class="row">
										<!-- <div class="col-md-2">
											<img src="{{asset('public/img/Friends/guy-2.jpg')}}" class="img-chat" style="">
										</div> -->
										<div class="col-md-12">
											<span class="chat-user-name announce-text-color">This is first post posting by admin named zinnah.the great zinnah.....</span>
										</div>
									</div>
								</p>
	 						</div>
	 						<hr class="announce-hr">
 						<div class="row announce-text-div">
 							<p class="list-group-item">
								<div class="row">
									<!-- <div class="col-md-2">
										<img src="{{asset('public/img/Friends/guy-2.jpg')}}" class="img-chat" style="">
									</div> -->
									<div class="col-md-12">
										<span class="chat-user-name announce-text-color">This is first post posting by admin named zinnah.the great zinnah.....</span>
									</div>
								</div>
							</p>
 						</div>								
	 					</div>
	 				</div>
	 			</div>
	 			<div class="panel-mid splitter-horizontal">
	 				<hr class="PlanhrStyle">
	 			</div>
	 			<div class="suggestion-shape">
					<div class="shape-text">
						Suggestions								
					</div>
				</div>
	 			<div class="row plan-scroll top-split"  style=" width: 328px;background-color:transparent; padding: 30px;margin: 0px;padding-left: 20px; height: 165px; max-height: 165px;" >
	 				<div class="col-md-12">
	 					<div class="row">
	 						<div class="row announce-text-div">
	 							<a href="" onclick="announcePopover(); return false;" id="pop-One" style="width: 100%;overflow: hidden;color:white;" >
	 								<p class="list-group-item">
 										<div class="row">
 											<div class="col-md-12">
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
 											<!-- <div class="col-md-2">
 												<img src="{{asset('public/img/Friends/guy-2.jpg')}}" class="img-chat" style="">
 											</div> -->
 											<div class="col-md-12">
 												<span class="chat-user-name announce-text-color">This is first post posting by admin named zinnah.the great zinnah.....</span>
 											</div>
 										</div>
 								</p>
	 						</div>
	 						<hr class="announce-hr">
	 						<div class="row announce-text-div">
	 							<p class="list-group-item">
											<div class="row">
												<!-- <div class="col-md-2">
													<img src="{{asset('public/img/Friends/guy-2.jpg')}}" class="img-chat" style="">
												</div> -->
												<div class="col-md-12">
													<span class="chat-user-name announce-text-color">This is first post posting by admin named zinnah.the great zinnah.....</span>
												</div>
											</div>
									</p>
	 						</div>
	 						<hr class="announce-hr">
	 						<div class="row announce-text-div">
	 							<p class="list-group-item">
										<div class="row">
											<!-- <div class="col-md-2">
												<img src="{{asset('public/img/Friends/guy-2.jpg')}}" class="img-chat" style="">
											</div> -->
											<div class="col-md-12">
												<span class="chat-user-name announce-text-color">This is first post posting by admin named zinnah.the great zinnah.....</span>
											</div>
										</div>
								</p>
	 						</div>
	 						<hr class="announce-hr">
	 						<div class="row announce-text-div">
	 							<p class="list-group-item">
									<div class="row">
										<!-- <div class="col-md-2">
											<img src="{{asset('public/img/Friends/guy-2.jpg')}}" class="img-chat" style="">
										</div> -->
										<div class="col-md-12">
											<span class="chat-user-name announce-text-color">This is first post posting by admin named zinnah.the great zinnah.....</span>
										</div>
									</div>
								</p>
	 						</div>
	 						<hr class="announce-hr">
 						<div class="row announce-text-div">
 							<p class="list-group-item">
								<div class="row">
									<!-- <div class="col-md-2">
										<img src="{{asset('public/img/Friends/guy-2.jpg')}}" class="img-chat" style="">
									</div> -->
									<div class="col-md-12">
										<span class="chat-user-name announce-text-color">This is first post posting by admin named zinnah.the great zinnah.....</span>
									</div>
								</div>
							</p>
 						</div>								
	 					</div>
	 				</div>
	 			</div>
	 			<div class="panel-mid splitter-horizontal">
	 				<hr class="PlanhrStyle">
	 			</div>
	 			<div class="question-shape">
					<div class="shape-text">
						Questions								
					</div>
				</div>
 			<div class="row plan-scroll top-split"  style=" width: 328px;background-color:transparent; padding: 30px;margin: 0px;padding-left: 20px; height: 165px; max-height: 165px;" >
 				<div class="col-md-12">
 					<div class="row">
 						<div class="row announce-text-div">
 							<a href="" onclick="announcePopover(); return false;" id="pop-One" style="width: 100%;overflow: hidden;color:white;" >
 								<p class="list-group-item">
										<div class="row">
											<div class="col-md-12">
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
											<!-- <div class="col-md-2">
												<img src="{{asset('public/img/Friends/guy-2.jpg')}}" class="img-chat" style="">
											</div> -->
											<div class="col-md-12">
												<span class="chat-user-name announce-text-color">This is first post posting by admin named zinnah.the great zinnah.....</span>
											</div>
										</div>
								</p>
 						</div>
 						<hr class="announce-hr">
 						<div class="row announce-text-div">
 							<p class="list-group-item">
										<div class="row">
											<!-- <div class="col-md-2">
												<img src="{{asset('public/img/Friends/guy-2.jpg')}}" class="img-chat" style="">
											</div> -->
											<div class="col-md-12">
												<span class="chat-user-name announce-text-color">This is first post posting by admin named zinnah.the great zinnah.....</span>
											</div>
										</div>
								</p>
 						</div>
 						<hr class="announce-hr">
 						<div class="row announce-text-div">
 							<p class="list-group-item">
									<div class="row">
										<!-- <div class="col-md-2">
											<img src="{{asset('public/img/Friends/guy-2.jpg')}}" class="img-chat" style="">
										</div> -->
										<div class="col-md-12">
											<span class="chat-user-name announce-text-color">This is first post posting by admin named zinnah.the great zinnah.....</span>
										</div>
									</div>
							</p>
 						</div>
 						<hr class="announce-hr">
 						<div class="row announce-text-div">
 							<p class="list-group-item">
								<div class="row">
									<!-- <div class="col-md-2">
										<img src="{{asset('public/img/Friends/guy-2.jpg')}}" class="img-chat" style="">
									</div> -->
									<div class="col-md-12">
										<span class="chat-user-name announce-text-color">This is first post posting by admin named zinnah.the great zinnah.....</span>
									</div>
								</div>
							</p>
 						</div>
 						<hr class="announce-hr">
						<div class="row announce-text-div">
							<p class="list-group-item">
							<div class="row">
								<!-- <div class="col-md-2">
									<img src="{{asset('public/img/Friends/guy-2.jpg')}}" class="img-chat" style="">
								</div> -->
								<div class="col-md-12">
									<span class="chat-user-name announce-text-color">This is first post posting by admin named zinnah.the great zinnah.....</span>
								</div>
							</div>
						</p>
						</div>								
 					</div>
 				</div>
 			</div>	
	 		</div>
	 		<div class="col-md-2 right-section">
	 			@include('frontend.common.aside_right_chat')
	 		</div>
	 	</div>
	 </div>
</section>
@include('frontend._partials/footer')