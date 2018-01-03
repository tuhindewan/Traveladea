
@extends('backend.layout.app')
    @section('content') 
    <style>
        .form_delete{display: inline;}
        .form-group{display: block !important;}
        .modal-body input{width: 100% !important;} 
        .form-group {width: 100%;overflow: hidden;}
        .light-widget .panel-heading {
    background: #FFFFFF;
}
.panel .panel-heading {
    position: relative;
    padding: 7px 15px;
}
.panel .no-title {
    height: 30px;
}
.panel .panel-body {
    padding: 15px 25px 25px;
}
.panel .panel-body, .panel .panel-body-list {
    background: #fff;
    position: relative;
}
.vd_info-parent {
    position: relative;
    margin-top: -15px;
}
img {
    max-width: 100%;
}
.mgtp-15 {
    margin-top: -15px !important;
}

.table-user>tbody>tr>td, .table-user>tbody>tr>th, .table-user>tfoot>tr>td, .table-user>tfoot>tr>th, .table-user>thead>tr>td, .table-user>thead>tr>th {
    border-color: #e2e7eb;
    padding: 10px 15px;
    background: #e8ecf1!important;
    color: black;
}
.userlist-nav-tabs {
    background-color: #2d353c;
    border-bottom: none;
    padding: 0px;
    margin-bottom: 1px;
}


.tabs .userlist-nav-tabs>li.active>a, .tabs .userlist-nav-tabs>li.active>a:hover, .tabs .userlist-nav-tabs>li.active>a:focus{
	background-color: #e8ecf1;
	color: black;
}

.tabs .userlist-nav-tabs>li>a:hover{
	color: #333;
	background: #e8ecf1 !important;
}

.tabs .userlist-nav-tabs>li>a {
    margin: 0;
    color: #FFF;
    border-left: 1px solid rgba(255,255,255,0.2) !important;
    border-right: 1px solid rgba(0,0,0,0.15) !important;
    border-top: none;
    border-bottom: none;
    line-height: auto;
    height: 36px;
    -webkit-border-radius: 0;
    -moz-border-radius: 0;
    border-radius: 0;
}
.tabs .userlist-nav-tabs>li.active>a .menu-active, .tabs .userlist-nav-tabs>li.active>a:hover .menu-active, .tabs .userlist-nav-tabs>li.active>a:focus .menu-active {
    visibility: visible;
}
.tabs .userlist-nav-tabs>li>a .menu-active {
    width: 100%;
    position: absolute;
    bottom: -8px;
    left: 0;
    text-align: center;
    visibility: hidden;
    font-size: 16px;
}
.pd-20 {
    padding: 10px !important;
}
.mgtp-10 {
    margin-top: -10px !important;
}
.mgbt-xs-15 {
    margin-bottom: 15px !important;
}
.font-semibold {
    font-weight: 500;
}
.profile-icon {
    font-size: 32px;
}
.mgr-10 {
    margin-right: 10px !important;
}
.mgbt-xs-0 {
    margin-bottom: 0 !important;
}
.mgbt-xs-0 .col-xs-7{
	color: black;
}
.user-post-tr{border-bottom: 1px solid;}
.related-place{color: black;}
.no_padding{padding: 0 !important;}
    </style>
    <!-- begin #content -->
    <div id="content" class="content">
        
        <ol class="breadcrumb pull-right">
            <li><a href="javascript:;">Dashboard</a></li>
            <li class="active">Admin Publish Announcement</li>
        </ol>
        <h1 class="page-header"><small>Dashboard > Administration > </small>User Post Page</h1>
        <hr>
        <!-- start row -->
        <div class="row">
            <div class="role_view_section">
                <!-- begin panel -->
                <div class="panel panel-inverse">
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                        </div>
                        <h4 class="panel-title">{{$getUser['username']}}' Post</h4>
                    </div>
                        <div class="panel-body">
                            
                            <!-- Announcement view section -->
                            
                           <div class="row">

                             <!-- Post Content Column -->
                             <div class="col-md-12">

								<div class="row">
									<div class="col-sm-3">
									  <div class="panel widget light-widget panel-bd-top">
									    <!-- <div class="panel-heading no-title"> </div> -->
									    <div class="panel-body">
									      <div class="mgtp-15">
									        <table class="table-user table-striped table-hover user-post">
									          <tbody>
									            <tr class="user-post-tr">
									              <td style="width:60%;">Status</td>
									              @if($getPost['status']==1)
									              <td><span class="label label-success">Active</span></td>
									              @else
									              <td><span class="label label-danger">Inactive</span></td>
									              @endif
									            </tr>
                                                <tr class="user-memeber user-post-tr">
                                                  <td>Type</td>
                                                  @if($getPost['post_type'] == 1)
                                                  <td>Suggestion</td>
                                                  @elseif($getPost['post_type'] == 2)
                                                  <td>Question</td>
                                                  @elseif($getPost['post_type'] == 3)
                                                  <td>Plan</td>
                                                  @else
                                                  <td>Experience</td>
                                                  @endif
                                                </tr>
									            <tr class="user-memeber user-post-tr">
									              <td>Published Since</td>
									              <td> {{ date('jS M Y',strtotime($getPost['created_at'])) }} </td>
									            </tr>
                                                <tr class="user-memeber user-post-tr">
                                                  <td>Total Hits:</td>
                                                  <td> {{$getPost->hits_count}} </td>
                                                </tr>
                                                <tr class="user-memeber user-post-tr">
                                                  <td>Total Likes:</td>
                                                  <td> {{$getPost->like}} </td>
                                                </tr>
                                                <tr class="user-memeber user-post-tr">
                                                  <td>Total Comments:</td>
                                                  <td> {{$getPost->comment}} </td>
                                                </tr>
									          </tbody>								          
									        </table>
									      </div>
									    </div>
									  </div>
									</div>
									<div class="col-md-9" style="margin-left: -35px;">
						                <div class="tabs widget"> 
										  <div class="tab-content" style="background: #e8ecf1;">
										    <div id="profile-tab" class="tab-pane active">
										      <div class="pd-20">    
                                                <div class="row">

                                                  <!-- Post Content Column -->
                                                  <div class="col-md-12">
                                                         <div class="row">
                                                             <div class="col-md-12 related-place"><strong>Related To:</strong> {{$getPost->places->place_name}}</div>
                                                             
                                                         </div>
                                                    <hr style="border-top: 1px solid;">

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p style="text-align: justify; text-transform: initial;color: black;">{{$getPost->description}}</p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="row">
                                                                @foreach ($getImg as $value)
                                                                <div class="col-md-4 no_padding">
                                                                    <?php $image = $value['images']; ?>
                                                                    <div style="padding: 5px;">
                                                                        <img src='{{asset("images/post/photo/s243/$image")}}' class="img-responsive">
                                                                    </div>
                                                                </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>

                                                  </div>

                                                </div>
										      </div>
										      <!-- pd-20 --> 
										    </div>
										    <!-- home-tab -->						    
										  </div>
										  <!-- tab-content --> 
										</div>
									</div>
								</div>

                             </div>

                           </div>
                           
                        </div>
                </div>
                <!-- end panel -->

            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- end #content -->

    <script>
        
        $('#images').on('change',function(e){
            var files = e.target.files;
            
            $.each(files, function(i, file){
                var reader = new FileReader();

                reader.readAsDataURL(file);
                
                i=$('img').length;

                reader.onload = function(e){
                    var template = '<div class="col-md-3" id="addfile_'+i+'">'+                         
                                    '<img height="100px" class="append_image" id="image_'+i+'" width="100px" src="'+e.target.result+'" alt="" style="margin-top: 27px"> <button type="button" class="close_image" auto= "'+i+'" onclick="myFunction(this.id)" id="'+i+'"><i class="fa fa-times" aria-hidden="true"></i></button>'+
                                            '</div>';

                    $('#images-to-upload').append(template);
                    i++;
                };
            });
            
        });//

        /*$(".close_image").on('click', function(){
            
        });*/
        function myFunction(id) {
            
            $("#addfile_"+id).remove();
        }
    </script>

    <script src="{{asset('public/backend/plugins/jquery/jquery-1.9.1.min_2.js')}}"></script>
        <script src="{{asset('public/backend/plugins/bootstrap-wysihtml5/dist/bootstrap3-wysihtml5.all.min_2.js')}}"></script>


        <script src="{{asset('public/backend/js/form-wysiwyg.demo.min_2.js')}}"></script>
        <script src="{{asset('public/backend/plugins/jquery-file-upload/js/vendor/jquery.ui.widget_2.js')}}"></script>
        <script src="{{asset('public/backend/plugins/jquery-file-upload/js/vendor/tmpl.min_2.js')}}"></script>
        <script src="{{asset('public/backend/plugins/jquery-file-upload/js/vendor/load-image.min_2.js')}}"></script>
        <script src="{{asset('public/backend/plugins/jquery-file-upload/js/vendor/canvas-to-blob.min_2.js')}}"></script>
        <script src="{{asset('public/backend/plugins/jquery-file-upload/blueimp-gallery/jquery.blueimp-gallery.min_2.js')}}"></script>
        <script src="{{asset('public/backend/plugins/jquery-file-upload/js/jquery.iframe-transport_2.js')}}"></script>
        <script src="{{asset('public/backend/plugins/jquery-file-upload/js/jquery.fileupload_2.js')}}"></script>
        <script src="{{asset('public/backend/plugins/jquery-file-upload/js/jquery.fileupload-process_2.js')}}"></script>
        <script src="{{asset('public/backend/plugins/jquery-file-upload/js/jquery.fileupload-image_2.js')}}"></script>
        <script src="{{asset('public/backend/plugins/jquery-file-upload/js/jquery.fileupload-audio_2.js')}}"></script>
        <script src="{{asset('public/backend/plugins/jquery-file-upload/js/jquery.fileupload-video_2.js')}}"></script>
        <script src="{{asset('public/backend/plugins/jquery-file-upload/js/jquery.fileupload-validate_2.js')}}"></script>
        <script src="{{asset('public/backend/plugins/jquery-file-upload/js/jquery.fileupload-ui_2.js')}}"></script>


        <script src="{{asset('public/backend/plugins/bootstrap-datepicker/js/bootstrap-datepicker_2.js')}}"></script>
        <script src="{{asset('public/backend/plugins/ionRangeSlider/js/ion-rangeSlider/ion.rangeSlider.min_2.js')}}"></script>
        <script src="{{asset('public/backend/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min_2.js')}}"></script>
        <script src="{{asset('public/backend/plugins/masked-input/masked-input.min_2.js')}}"></script>
        <script src="{{asset('public/backend/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min_2.js')}}"></script>
        <script src="{{asset('public/backend/plugins/password-indicator/js/password-indicator_2.js')}}"></script>
        <script src="{{asset('public/backend/plugins/bootstrap-combobox/js/bootstrap-combobox_2.js')}}"></script>
        <script src="{{asset('public/backend/plugins/bootstrap-select/bootstrap-select.min_2.js')}}"></script>
        <script src="{{asset('public/backend/plugins/jquery-tag-it/js/tag-it.min_2.js')}}"></script>
        <script src="{{asset('public/backend/plugins/bootstrap-daterangepicker/moment_2.js')}}"></script>
        <script src="{{asset('public/backend/plugins/bootstrap-daterangepicker/daterangepicker_2.js')}}"></script>
        <script src="{{asset('public/backend/plugins/select2/dist/js/select2.min_2.js')}}"></script>
        <script src="{{asset('public/backend/plugins/bootstrap-eonasdan-datetimepicker/build/js/bootstrap-datetimepicker.min_2.js')}}"></script>
        <script src="{{asset('public/backend/plugins/bootstrap-show-password/bootstrap-show-password_2.js')}}"></script>
        <script src="{{asset('public/backend/plugins/bootstrap-colorpalette/js/bootstrap-colorpalette_2.js')}}"></script>
        <script src="{{asset('public/backend/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker_2.js')}}"></script>
        <script src="{{asset('public/backend/plugins/clipboard/clipboard.min_2.js')}}"></script>


        <script src="{{asset('public/backend/js/form-plugins.demo.min_2.js')}}"></script>
        <script src="{{asset('public/backend/js/apps.min_2.js')}}"></script>
        <!--[if (gte IE 8)&(lt IE 10)]>
            <script src="{{asset('public/backend/plugins/jquery-file-upload/js/cors/jquery.xdr-transport.js')}}"></script>
        <![endif]-->
        <script src="{{asset('public/backend/js/form-multiple-upload.demo.min_2.js')}}"></script>
        <script src="{{asset('public/backend/js/apps.min_2.js')}}"></script>
    
    
    <script>
        $(document).ready(function() {
            
            FormWysihtml5.init();
            FormPlugins.init();
            FormMultipleUpload.init();
            TableManageResponsive.init();

        });
    </script>       
@endsection
