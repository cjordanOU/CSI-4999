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

                const ouEngineering = { lat: 42.67, lng: -83.21 };
				const flagstarBank = { lat: 42.64, lng: -83.20 };
				const fanuc = { lat: 42.65, lng: -83.22 };
				const beaumont = { lat: 42.62, lng: -83.09 };
				const pattEngineering = { lat: 42.68, lng: -83.25 };
				const gm = { lat: 42.51, lng: -83.03 };
				const ford = { lat: 42.65, lng: -83.13 };
				const uwm = { lat:42.62, lng: -83.26 };
				const quicken = { lat: 42.33, lng: -83.05 };
				const blueCross = { lat: 42.34, lng: -83.04};

                const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 10,
                center: ouEngineering,
                });
				const markerOU = new google.maps.Marker({
					position: ouEngineering,
					map,
					title: "Oakland University",

                });
                const stringOU = 
                '<div id="content">' +
                '<div id="siteNotice">' +
                "</div>" +
                '<h1 id="firstHeading" class="firstHeading">Oakland University</h1>' +
                '<div id="bodyContent">' +
                "<p>318 Meadow Brook Rd, Rochester, MI 48309</p>" +
                "</div>" +
                "</div>";
				const windowOU = new google.maps.InfoWindow({
                    content:stringOU,
                
                })
				markerOU.addListener("click", () => {
                    windowOU.open({
                    anchor: markerOU,
                    map,
                    shouldFocus: false,
                    
                })
                })
				
				const markerFlagstar = new google.maps.Marker({
                position: flagstarBank,
                map,
                title: "Flagstar Bank",

                });
				const stringFlagstar = 
                '<div id="content">' +
                '<div id="siteNotice">' +
                "</div>" +
                '<h1 id="firstHeading" class="firstHeading">Flagstar Bank</h1>' +
                '<div id="bodyContent">' +
                "<p>2744 S Adams Rd, Rochester Hills, MI 48309</p>" +
                "</div>" +
                "</div>";
				const windowFlagstar = new google.maps.InfoWindow({
                    content:stringFlagstar,
                
                })
				markerFlagstar.addListener("click", () => {
                    windowFlagstar.open({
                    anchor: markerFlagstar,
                    map,
                    shouldFocus: false,
                    
                })
                })
				
				const markerFanuc = new google.maps.Marker({
                position: fanuc,
                map,
                title: "Fanuc",

                });
				const stringFanuc = 
                '<div id="content">' +
                '<div id="siteNotice">' +
                "</div>" +
                '<h1 id="firstHeading" class="firstHeading">FANUC America Corporation</h1>' +
                '<div id="bodyContent">' +
                "<p>3900 W Hamlin Rd, Rochester Hills, MI 48309</p>" +
                "</div>" +
                "</div>";
				const windowFanuc = new google.maps.InfoWindow({
                    content:stringFanuc,
                
                })
				markerFanuc.addListener("click", () => {
                    windowFanuc.open({
                    anchor: markerFanuc,
                    map,
                    shouldFocus: false,
                    
                })
                })
				
				const markerBeaumont = new google.maps.Marker({
                position: beaumont,
                map,
                title: "Beaumont Hospital",

                });
				const stringBeaumont = 
                '<div id="content">' +
                '<div id="siteNotice">' +
                "</div>" +
                '<h1 id="firstHeading" class="firstHeading">Beaumont Hospital</h1>' +
                '<div id="bodyContent">' +
                "<p>44201 Dequindre Rd, Troy, MI 48085</p>" +
                "</div>" +
                "</div>";
				const windowBeaumont = new google.maps.InfoWindow({
                    content:stringBeaumont,
                
                })
				markerBeaumont.addListener("click", () => {
                    windowBeaumont.open({
                    anchor: markerBeaumont,
                    map,
                    shouldFocus: false,
                    
                })
                })
				
				const markerPatti = new google.maps.Marker({
                position: pattEngineering,
                map,
                title: "Patti Engineering",

                });
				const stringPatti = 
                '<div id="content">' +
                '<div id="siteNotice">' +
                "</div>" +
                '<h1 id="firstHeading" class="firstHeading">Patti Engineering</h1>' +
                '<div id="bodyContent">' +
                "<p>2110 E Walton Blvd a, Auburn Hills, MI 48326</p>" +
                "</div>" +
                "</div>";
				const windowPatti = new google.maps.InfoWindow({
                    content:stringPatti,
                
                })
				markerPatti.addListener("click", () => {
                    windowPatti.open({
                    anchor: markerPatti,
                    map,
                    shouldFocus: false,
                    
                })
                })
				
				const markerGM = new google.maps.Marker({
                position: gm,
                map,
                title: "General Motors Tech Center",

                });
				const stringGM = 
                '<div id="content">' +
                '<div id="siteNotice">' +
                "</div>" +
                '<h1 id="firstHeading" class="firstHeading">General Motors Tech Center</h1>' +
                '<div id="bodyContent">' +
                "<p>30001 Van Dyke Ave, Warren, MI 48093</p>" +
                "</div>" +
                "</div>";
				const windowGM = new google.maps.InfoWindow({
                    content:stringGM,
                
                })
				markerGM.addListener("click", () => {
                    windowGM.open({
                    anchor: markerGM,
                    map,
                    shouldFocus: false,
                    
                })
                })
				
				const markerFord = new google.maps.Marker({
                position: ford,
                map,
                title: "Serra Ford Dealer",

                });
				const stringFord = 
                '<div id="content">' +
                '<div id="siteNotice">' +
                "</div>" +
                '<h1 id="firstHeading" class="firstHeading">Serra Ford</h1>' +
                '<div id="bodyContent">' +
                "<p>2890 S Rochester Rd, Rochester Hills, MI 48307</p>" +
                "</div>" +
                "</div>";
				const windowFord = new google.maps.InfoWindow({
                    content:stringFord,
                
                })
				markerFord.addListener("click", () => {
                    windowFord.open({
                    anchor: markerFord,
                    map,
                    shouldFocus: false,
                    
                })
                })
				
				const markerUWM = new google.maps.Marker({
                position: uwm,
                map,
                title: "United Wholesale Mortgage",

                });
				const stringUWM = 
                '<div id="content">' +
                '<div id="siteNotice">' +
                "</div>" +
                '<h1 id="firstHeading" class="firstHeading">United Wholesale Mortgage</h1>' +
                '<div id="bodyContent">' +
                "<p>585 S Blvd E, Pontiac, MI 48341</p>" +
                "</div>" +
                "</div>";
				const windowUWM = new google.maps.InfoWindow({
                    content:stringUWM,
                
                })
				markerUWM.addListener("click", () => {
                    windowUWM.open({
                    anchor: markerUWM,
                    map,
                    shouldFocus: false,
                    
                })
                })
				
				const markerQuicken = new google.maps.Marker({
                position: quicken,
                map,
                title: "Quicken Loans",

                });
				const stringQuicken = 
                '<div id="content">' +
                '<div id="siteNotice">' +
                "</div>" +
                '<h1 id="firstHeading" class="firstHeading">Quicken Loans</h1>' +
                '<div id="bodyContent">' +
                "<p>1050 Woodward Ave, Detroit, MI 48226</p>" +
                "</div>" +
                "</div>";
				const windowQuicken = new google.maps.InfoWindow({
                    content:stringQuicken,
                
                })
				markerQuicken.addListener("click", () => {
                    windowQuicken.open({
                    anchor: markerQuicken,
                    map,
                    shouldFocus: false,
                    
                })
                })
				
				const markerBlueCross = new google.maps.Marker({
                position: blueCross,
                map,
                title: "Blue Cross Blue Shield",

                });
				const stringBlueCross = 
                '<div id="content">' +
                '<div id="siteNotice">' +
                "</div>" +
                '<h1 id="firstHeading" class="firstHeading">Blue Cross Blue Shield</h1>' +
                '<div id="bodyContent">' +
                "<p>600 E. Lafayette Blvd, Detroit, MI 48226</p>" +
                "</div>" +
                "</div>";
				const windowBlueCross = new google.maps.InfoWindow({
                    content:stringBlueCross,
                
                })
				markerBlueCross.addListener("click", () => {
                    windowBlueCross.open({
                    anchor: markerBlueCross,
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
