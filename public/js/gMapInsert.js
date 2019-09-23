var map;
var myLatLng;
//var restaurantCoords=new google.maps.LatLng(7.547601,  80.312415);
var marker;
var popup, Popup;/* only used when user doesnt allow geoLocation in the browser  */

/* Custom Markers */
var iconBase = 'https://maps.google.com/mapfiles/kml/shapes/';
var icons = {
  parking: {
    icon: iconBase + 'parking_lot_maps.png'
  },
  restaurant: {
    icon: iconBase + 'snack_bar.png'
  },
  info: {
    icon: iconBase + 'info-i_maps.png'
  }
};
/* custom markers end */

function createMap(myLatLng) {
    map = new google.maps.Map(document.getElementById('map'), {
        center: myLatLng,

        zoom: 15
    });

  marker = new google.maps.Marker({
        position: myLatLng,
        //icon: icons['info'].icon,
        //icon: iconBase + 'parking_lot_maps.png',
        map: map,
        draggable: true
    });

    /* These Addlistners are use to find marker lat lang values when dragging the marker */
    marker.addListener('drag', handleEvent);/* for more details see the handleEvent function */
    marker.addListener('dragend', handleEvent);


    /* Restaurant location Static */
    marker = new google.maps.Marker({
        position: new google.maps.LatLng(6.922020880726874,  79.96466670349128),
        icon: icons['restaurant'].icon,
        map: map
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
            document.getElementById("latVal").value =latVal;
            document.getElementById("langVal").value =lngVal;
        }, function () {
            handleLocationError();
        })
    } else {
        handleLocationError();
    }

    function handleLocationError() {
         // The location of Malabe
        var uluru = { lat: 6.901547, lng: 79.955804 };
        // The map, centered at Malabe
        var map = new google.maps.Map(
            document.getElementById('map'), { zoom: 14, center: uluru });
        
        Popup = createPopupClass();
        popup = new Popup(
            new google.maps.LatLng(6.901547, 79.955804),
            document.getElementById('content'));
        popup.setMap(map);
    }
}

/* function addMarker(myLatLng) {
    var marker = new google.maps.Marker({
        position: latlang,
        map: map,
        title: name
    });
    
} */

function initMap() {
    geoLocation();

    
}



/* This is only for showing pop msg ont top of Gmap */
/* Pop up Msg */
function createPopupClass() {
    /**
     * A customized popup on the map.
     * @param {!google.maps.LatLng} position
     * @param {!Element} content The bubble div.
     * @constructor
     * @extends {google.maps.OverlayView}
     */
    function Popup(position, content) {
        this.position = position;

        content.classList.add('popup-bubble');

        // This zero-height div is positioned at the bottom of the bubble.
        var bubbleAnchor = document.createElement('div');
        bubbleAnchor.classList.add('popup-bubble-anchor');
        bubbleAnchor.appendChild(content);

        // This zero-height div is positioned at the bottom of the tip.
        this.containerDiv = document.createElement('div');
        this.containerDiv.classList.add('popup-container');
        this.containerDiv.appendChild(bubbleAnchor);

        // Optionally stop clicks, etc., from bubbling up to the map.
        google.maps.OverlayView.preventMapHitsAndGesturesFrom(this.containerDiv);
    }
    // ES5 magic to extend google.maps.OverlayView.
    Popup.prototype = Object.create(google.maps.OverlayView.prototype);

    /** Called when the popup is added to the map. */
    Popup.prototype.onAdd = function () {
        this.getPanes().floatPane.appendChild(this.containerDiv);
    };

    /** Called when the popup is removed from the map. */
    Popup.prototype.onRemove = function () {
        if (this.containerDiv.parentElement) {
            this.containerDiv.parentElement.removeChild(this.containerDiv);
        }
    };

    /** Called each frame when the popup needs to draw itself. */
    Popup.prototype.draw = function () {
        var divPosition = this.getProjection().fromLatLngToDivPixel(this.position);

        // Hide the popup when it is far out of view.
        var display =
            Math.abs(divPosition.x) < 4000 && Math.abs(divPosition.y) < 4000 ?
                'block' :
                'none';

        if (display === 'block') {
            this.containerDiv.style.left = divPosition.x + 'px';
            this.containerDiv.style.top = divPosition.y + 'px';
        }
        if (this.containerDiv.style.display !== display) {
            this.containerDiv.style.display = display;
        }
    };

    return Popup;
}

/* End PopUp  */



/* This function will retrive the marker current latlang values when dragging */
function handleEvent(event) {
    document.getElementById('latVal').value = event.latLng.lat();
    document.getElementById('langVal').value = event.latLng.lng();
}
