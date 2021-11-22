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