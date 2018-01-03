<!DOCTYPE html>
<html>
<head>
	<title>dsfds</title>
</head>
<body>
<link href="{{asset('public/css/map.css')}}" rel="stylesheet">  
	 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.js"></script>  
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCALSYjrJyQ3R9ONak9nVMaAkOuRetWv4&v=3.exp&libraries=places"></script>
  <script src="{{asset('public/js/map.js')}}"></script>
<div class="form-group">
	<div id="map" class="">  
        <input id="pac-input" class="controls form-control" placeholder="insert the location" ame="location" type="text" >  
        <div id="map-canvas"> </div>  
        <input name="lat" class="lat" type="hidden">  
        <input name="lon" class="lon" type="hidden">  
    </div>
</div>
</body>
</html>
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCMIHwTfrDF3QBOgim5Fox0DRACIMMZuAI&callback=initMap"
    async defer></script>
AIzaSyCCALSYjrJyQ3R9ONak9nVMaAkOuRetWv4 -->