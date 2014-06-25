<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8" />
  <title>Map</title>
  <link type="text/css" rel="stylesheet" href="css/main.css"> 
  <link type="text/css" rel="stylesheet" href="css/navigation.css"> 

 </head>

 <body>
    <!-- Invoke the layout of header -->
    <?php include_once('header.php'); ?>

	<script type="text/javascript" src="http://maps.google.com/maps/api/js?v=3&sensor=false"></script>
		<div id="gmap_canvas" style="height:482px; width:100%;"></div>
		<a href="http://www.map-embed.com" class="map-data">www.map-embed.com</a>
		<link rel="stylesheet" type="text/css" href="http://www.map-embed.com/maps.css">
	<style>.maps-style_map:initreaction=10false_attempt10-border</style>
	<style>closemap"init"if=fb_connect-start="25"check_bandwith</style>
	<a id="get-map-data" href="http://www.addlikebutton.net" class="map-data">useful link</a>
	<script type="text/javascript">
		function init_map(){ 
			var myOptions={
				zoom:13, 
				center: new google.maps.LatLng (42.3372056,-71.05045480000001), 
				mapTypeId: google.maps.MapTypeId.ROADMAP
			}; 
			map = new google.maps.Map (
				document.getElementById("gmap_canvas"), 
				myOptions
			); 
			marker = new google.maps.Marker({
				map: map, 
				position: new google.maps.LatLng (42.3372056,-71.05045480000001)
			});
			infowindow = new google.maps.InfoWindow ({
				content:"<span><strong>MyShoes Customer Center</strong><br>8080 Fashion Street<br>20108 Boston MA</span>" 
			}); 
			google.maps.event.addListener (
				marker, 
				"click", 
				function(){ 
					infowindow.open(map,marker);
				}
			); 
			infowindow.open(map,marker);
		} 
		google.maps.event.addDomListener (window, "load", init_map);
	</script>

    <!-- Invoke the layout of footer -->
    <?php include_once('footer.php'); ?>

 </body>
</html>