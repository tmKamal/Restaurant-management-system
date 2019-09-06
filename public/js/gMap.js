
var map;
var myLatLng;
var marker;

function createMap(myLatLng) {
    map = new google.maps.Map(document.getElementById('map'), {
        center: myLatLng,

        zoom: 15
    });
    marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        draggable: true,
        title: name
    });
}

function geoLocation() {
    infoWindow = new google.maps.InfoWindow;
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (p) {
            /* var position = {
                lat: p.coords.latitude,
                lng: p.coords.longitude
            }; */
            var latVal = p.coords.latitude;
            var lngVal = p.coords.longitude;
            myLatLng = new google.maps.LatLng(latVal, lngVal);


            createMap(myLatLng);
        }, function () {
            handleLocationError();
        })
    } else {
        handleLocationError();
    }

    function handleLocationError(content, position) {
        // The location of Malabe
        var uluru = { lat: 6.901547, lng: 79.955804 };
        // The map, centered at Malabe
        var map = new google.maps.Map(
            document.getElementById('map'), { zoom: 14, center: uluru });
    }
}

function addMarker(myLatLng) {
    var marker = new google.maps.Marker({
        position: latlang,
        map: map,
        title: name
    });
}

function initMap() {
    geoLocation();


}
