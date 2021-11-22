<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require_once('Includes/metadata.php'); ?>

        <title>Maps - GrizzChat</title>
        <link rel="shortcut icon" href="Images/favicon.ico" type="image/x-icon">

        <!-- Styles -->
        <link href="Styles/style.css" rel="stylesheet">
    
        <!-- Temporary Style -->
        <style type = "text/css">
			#map { 
			height: 55em;
			width: 100%;
			}
		</style>
    </head>
    <body>
        <section id="background-gradient"></section>
        
        <?php
            require_once('Includes/page_elements.php');
            displayHeader();
            displaySidebarNavigation();
        ?>

        <script>
			function initMap() {
				const ouEngineering = { lat: 42.67166149555433, lng: -83.21499758857931};
				const map = new google.maps.Map(
					document.getElementById("map"), 
					{
						zoom: 13,
						center: ouEngineering,
					}
				);
				const marker = new google.maps.Marker({
					position: ouEngineering,
					map: map,
				});
			}
		</script>

        <section id="page-content">
            
            <section id="page-container">
                <div id="map"></div>
            </section>

            <script
			src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyBF8_thPcmONP8UeT6nu47m8huxcGWt4po&callback=initMap&libraries=&v=weekly&channel=2"
			async
		    ></script>

            <?php displayFooter(); ?>
        </section>
    </body>
</html>
