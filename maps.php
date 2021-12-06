<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
            require_once('Includes/metadata.php');
            require_once('Includes/dbConnection.php');
        ?>

        <title>Maps - GrizzChat</title>
        <link rel="shortcut icon" href="Images/favicon.ico" type="image/x-icon">

        <!-- Styles -->
        <link href="Styles/style.css" rel="stylesheet">
    
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

                const ouEngineering = { lat: 42.67166149555433, lng: -83.21499758857931 };

                const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 13,
                center: ouEngineering,
                });

                const contentString = 
                '<div id="content">' +
                '<div id="siteNotice">' +
                "</div>" +
                '<h1 id="firstHeading" class="firstHeading">Oakland University Alumni</h1>' +
                '<div id="bodyContent">' +
                "<p>This is going to be how our project displays the location of other OU alumni on Google Maps. The goal in the future is to have these markers link to our alumni's profile pages, where users will then be able to contact them</p>" +
                "</div>" +
                "</div>";
                
                const infowindow = new google.maps.InfoWindow({
                    content:contentString,
                
                })
                
                const marker = new google.maps.Marker({
                position: ouEngineering,
                map,
                title: "OU Alumni",

                });
                marker.addListener("click", () => {
                    infowindow.open({
                    anchor: marker,
                    map,
                    shouldFocus: false,
                    
                })
                })
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
