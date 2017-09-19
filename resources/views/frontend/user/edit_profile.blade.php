@include('frontend._partials.header')

<style type="text/css">
	hr{margin:5px 0;}
	.tab-content {width:100%; overflow: hidden;}
	
    .nav-tabs { background: #e7e9ef;}
</style> 
@include('frontend._partials.nav')

<section>
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-2" id="company-info">
				<div class="company_basic_info">
					
					<div class="company_name">
						<h3>XYZ name</h3>
						
					</div>
					<hr>
					<div class="company_list">
						<!-- tabs -->
						<div class="tabbable tabs-left">
							<ul class="nav nav-tabs" role="tablist" style="width: 100%;">
								<li><a href="{{URL::to('profile')}}" role="tab" >Home</a></li>
								<li role="presentation" class="active"><a href="#genaral" role="tab" data-toggle="tab">Genaral</a></li>
								<li role="presentation"><a href="#security" role="tab" data-toggle="tab">Security</a></li>
								<li role="presentation"><a href="#profile-photo" role="tab" data-toggle="tab">Profile Photo</a></li>
								
							</ul>

							
						</div>
					</div>
				</div>	
			</div>
			<div class="col-md-10" id="company_contant">
				
				<div id="content" style="margin:10px 0; width: 100%; overflow: hidden;">
				    <div class="tab-content" style="background: #e7e9ef; border-radius: 10px; padding: 10px;padding-bottom: 0;">
				    	
						<div role="tabpanel" class="tab-pane active" id="genaral">                
							<div class="panel panel-default">
								<div class="panel-body">
						    		<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
									
					  			</div>
							</div>
						</div> 
						<div class="tab-pane" id="security"> 
							<div class="panel panel-default">
								<div class="panel-body">
									<p>because they are the most important for an encyclopedia to have, as determined by the community of participating editors. They may also be of interest to readers as an alternative to lists of overview articles.</p>  
								</div>              
							</div>
						</div>
						<div class="tab-pane" id="profile-photo"> 
							<div class="panel panel-default">
								<div class="panel-body">
									<p>because they are the most important for an encyclopedia to have, as determined by the community of participating editors. They may also be of interest to readers as an alternative to lists of overview articles.</p>  
								</div>              
							</div>
						</div>
					</div>
				</div>			
						
			</div>
			
		</div>
	</div>
</section>
<script type="text/javascript">
// $(document).ready(function(){
//     $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
//         localStorage.setItem('activeTab', $(e.target).attr('href'));
//     });
//     var activeTab = localStorage.getItem('activeTab');
//     if(activeTab){
//         $('#myTab a[href="' + activeTab + '"]').tab('show');
//     }
// });
</script>
@include('frontend._partials/footer')