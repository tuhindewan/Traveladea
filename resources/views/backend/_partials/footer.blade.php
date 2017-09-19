        <!-- begin theme-panel -->
        <div class="theme-panel">
            <a href="javascript:;" data-click="theme-panel-expand" class="theme-collapse-btn"><i class="fa fa-cog"></i></a>
            <div class="theme-panel-content">
                <h5 class="m-t-0">Color Theme</h5>
                <ul class="theme-list clearfix">
                    <li class="active"><a href="javascript:;" class="bg-green" data-theme="default" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Default">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-red" data-theme="red" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Red">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-blue" data-theme="blue" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Blue">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-purple" data-theme="purple" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Purple">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-orange" data-theme="orange" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Orange">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-black" data-theme="black" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Black">&nbsp;</a></li>
                </ul>
                <div class="divider"></div>
                <div class="row m-t-10">
                    <div class="col-md-5 control-label double-line">Header Styling</div>
                    <div class="col-md-7">
                        <select name="header-styling" class="form-control input-sm">
                            <option value="1">default</option>
                            <option value="2">inverse</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-5 control-label">Header</div>
                    <div class="col-md-7">
                        <select name="header-fixed" class="form-control input-sm">
                            <option value="1">fixed</option>
                            <option value="2">default</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-5 control-label double-line">Sidebar Styling</div>
                    <div class="col-md-7">
                        <select name="sidebar-styling" class="form-control input-sm">
                            <option value="1">default</option>
                            <option value="2">grid</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-5 control-label">Sidebar</div>
                    <div class="col-md-7">
                        <select name="sidebar-fixed" class="form-control input-sm">
                            <option value="1">fixed</option>
                            <option value="2">default</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-5 control-label double-line">Sidebar Gradient</div>
                    <div class="col-md-7">
                        <select name="content-gradient" class="form-control input-sm">
                            <option value="1">disabled</option>
                            <option value="2">enabled</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-5 control-label double-line">Content Styling</div>
                    <div class="col-md-7">
                        <select name="content-styling" class="form-control input-sm">
                            <option value="1">default</option>
                            <option value="2">black</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-12">
                        <a href="index_v2_2.html#" class="btn btn-inverse btn-block btn-sm" data-click="reset-local-storage"><i class="fa fa-refresh m-r-3"></i> Reset Local Storage</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- end theme-panel -->
		
		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
	<!-- end page container -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	
	<script src="{{asset('public/backend/plugins/jquery/jquery-migrate-1.1.0.min_2.js')}}"></script>
	<script src="{{asset('public/backend/plugins/jquery-ui/ui/minified/jquery-ui.min_2.js')}}"></script>
    <script src="{{asset('public/backend/plugins/bootstrap/js/bootstrap.min_2.js')}}"></script>
	<script src="{{asset('public/js/jquery-tagsinput.js')}}"></script>

	<script src="{{asset('public/backend/plugins/slimscroll/jquery.slimscroll.min_2.js')}}"></script>
	<script src="{{asset('public/backend/plugins/jquery-cookie/jquery.cookie_2.js')}}"></script>
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <script src="{{asset('public/backend/plugins/bootstrap-wysihtml5/dist/bootstrap3-wysihtml5.all.min_2.js')}}"></script>
    <script src="{{asset('public/backend/js/form-wysiwyg.demo.min_2.js')}}"></script>
    <script src="{{asset('public/backend/plugins/morris/raphael.min_2.js')}}"></script>
    <script src="{{asset('public/backend/plugins/morris/morris_2.js')}}"></script>
    <script src="{{asset('public/backend/plugins/jquery-jvectormap/jquery-jvectormap.min_2.js')}}"></script>
    <script src="{{asset('public/backend/plugins/jquery-jvectormap/jquery-jvectormap-world-merc-en_2.js')}}"></script>
    <script src="{{asset('public/backend/plugins/bootstrap-calendar/js/bootstrap_calendar.min_2.js')}}"></script>
	<script src="{{asset('public/backend/plugins/gritter/js/jquery.gritter_2.js')}}"></script>
	<script src="{{asset('public/backend/js/dashboard-v2.min_2.js')}}"></script>
	<script src="{{asset('public/backend/js/apps.min_2.js')}}"></script>
    <script src="{{asset('public/js/chosen.jquery.min.js')}}"></script>
    <script src="{{asset('public/js/chosen.proto.min.js')}}"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->

    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <script src="{{asset('public/backend/plugins/switchery/switchery.min_2.js')}}"></script>
    <script src="{{asset('public/backend/plugins/powerange/powerange.min_2.js')}}"></script>
    <script src="{{asset('public/backend/js/form-slider-switcher.demo.min_2.js')}}"></script>
    <script src="{{asset('public/backend/plugins/DataTables/media/js/jquery.dataTables_2.js')}}"></script>
    <script src="{{asset('public/backend/plugins/DataTables/media/js/dataTables.bootstrap.min_2.js')}}"></script>
    <script src="{{asset('public/backend/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min_2.js')}}"></script>
    <script src="{{asset('public/backend/js/table-manage-responsive.demo.min_2.js')}}"></script>
    <!-- tag -->
    

    <!-- ================== END PAGE LEVEL JS ================== -->
    <script>
        jQuery(document).ready(function(){
            jQuery(".chosen").chosen();
        });
    </script>
	<script>
        $(document).ready(function() {
            //DashboardV2.init();
            App.init();
        });
        function confirmDelete(){
            return confirm("Do You Sure Want To Delete This Data ?");
        }
    </script>

</body>
</html>
