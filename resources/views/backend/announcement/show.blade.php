
@extends('backend.layout.app')
    @section('content') 
    <style>
        .form_delete{display: inline;}
        .form-group{display: block !important;}
        .modal-body input{width: 100% !important;} 
        .form-group {width: 100%;overflow: hidden;}
    </style>
    <!-- begin #content -->
    <div id="content" class="content">
        
        <ol class="breadcrumb pull-right">
            <li><a href="javascript:;">Dashboard</a></li>
            <li class="active">Admin Publish Announcement</li>
        </ol>
        <h1 class="page-header"><small>Dashboard > Administration > </small>Admin Announcement Page</h1>
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
                        <h4 class="panel-title">Admin Announcement</h4>
                    </div>
                        <div class="panel-body">
                            
                            <!-- Announcement view section -->
                            
                           <div class="row">

                             <!-- Post Content Column -->
                             <div class="col-md-12">

                               <!-- Title -->
                               <h1 class="mt-12 text-center">Announcement</h1>

                               <!-- Author -->
                               <p class="lead text-center">
                                 by
                                 <?php $userId = $user['fk_admin_id']; ?>
                                 <a href='{{URL::to("user-admin/$userId")}}' target="_blank"> {{Auth::user()->username}}</a>
                               </p>
                               <hr>
                                    <div class="row">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-4 text-center"><strong>Publish Date:</strong> {{ date('jS F Y, g:iA',strtotime($data->start_date_time)) }}</div>
                                        <div class="col-md-6"><strong>Valid Untill:</strong> {{ date('jS F Y, g:iA',strtotime($data->last_date_time)) }}</div>
                                    </div>
                               <hr>
                               <br>
                               <div class="row">
                                   <div class="col-md-offset-2 col-md-8">
                                    
                                       <p style="text-align: justify; text-transform: initial;"><?php echo nl2br($data->description); ?></p>
                                   </div>
                               </div>
                               <hr>

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
