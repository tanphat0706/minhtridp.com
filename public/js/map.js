/*
* @Author: lich.dv
* @Date:   2016-04-01 09:22:52
* @Last Modified by:   lich.dv
* @Last Modified time: 2016-04-22 12:03:44
*/

// google marker
var gmarkers = [];
$(function(){
    $('#pac-input').keydown(function(e) {
        if(e.keyCode == 13) {
            return false;
        }
    });
});
function initializeMarker(latitude = 10.781157, longitude = 106.698414, icon = null) {
    $('#map').parent().prepend('<input name="pac-input" id="pac-input" type="text" class="form-control" style="width: auto; margin-top: 8px">');
    var $latitude = document.getElementById('latitude');
    var $longitude = document.getElementById('longitude');
    var zoom = 18;
    var LatLng = new google.maps.LatLng(latitude, longitude);
    var mapOptions = {
        zoom: zoom,
        center: LatLng,
        panControl: false,
        zoomControl: true,
        scaleControl: true,
        mapTypeControl: true,
        mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
        navigationControl: true,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    var map = new google.maps.Map(document.getElementById('map'),mapOptions);

    var infoWindow = new google.maps.InfoWindow();
    var marker = new google.maps.Marker({
        position: LatLng,
        map: map,
        draggable: true,
        icon: icon,
        animation: google.maps.Animation.DROP
    });
    google.maps.event.addListener(marker, 'dragend', function(marker){
        var latLng = marker.latLng;
        $latitude.value = latLng.lat();
        $longitude.value = latLng.lng();
    });
    gmarkers.push(marker);

    google.maps.event.addListener(map, 'click', function (e) {
        //Determine the location where the user has clicked.
        var location = e.latLng;
        $latitude.value = location.lat();
        $longitude.value = location.lng();

        for(var i=0; i < gmarkers.length; i++){
            gmarkers[i].setMap(null);
        }
        gmarkers = new Array();

        //Create a marker and placed it on the map.
        marker = new google.maps.Marker({
            position: location,
            map: map,
            draggable: true,
            icon: icon,
            animation: google.maps.Animation.DROP
        });

        gmarkers.push(marker);
        //Attach click event handler to the marker.
        google.maps.event.addListener(marker, 'click', (function(marker) {
            return function() {
                infoWindow.setContent('Latitude: ' + location.lat() + '<br />Longitude: ' + location.lng());
                infoWindow.open(map, marker);
            }
        })(marker, -1));

        google.maps.event.addListener(marker, 'dragend', function(marker){
            var latLng = marker.latLng;
            $latitude.value = latLng.lat();
            $longitude.value = latLng.lng();
        });
    });


    // Create the search box and link it to the UI element.
    var input = document.getElementById('pac-input');
    var searchBox = new google.maps.places.SearchBox(input);

    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

    // Bias the SearchBox results towards current map's viewport.
    map.addListener('bounds_changed', function() {
        searchBox.setBounds(map.getBounds());
    });

    var markers = [];

    searchBox.addListener('places_changed', function() {
        var places = searchBox.getPlaces();

        if (places.length == 0) {
            return;
        }

        // Clear out the old markers.
        markers.forEach(function(markers) {
            markers.setMap(null);
        });
        markers = [];

        // For each place, get the icon, name and location.
        var bounds = new google.maps.LatLngBounds();
        places.forEach(function(place) {
            var icon = {
                url: place.icon,
                size: new google.maps.Size(71, 71),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(17, 34),
                scaledSize: new google.maps.Size(25, 25)
            };

            // Create a markers for each place.
            markers.push(new google.maps.Marker({
                map: map,
                icon: icon,
                title: place.name,
                position: place.geometry.location,
                animation: google.maps.Animation.DROP
            }));

            if (place.geometry.viewport) {
                // Only geocodes have viewport.
                bounds.union(place.geometry.viewport);
            } else {
                bounds.extend(place.geometry.location);
            }
        });
        map.fitBounds(bounds);
    });
}

// google iframe
function initializeIframe(latitude, longitude, title = null, address = null, icon = null) {
    var zoom = 18;
    var LatLng = new google.maps.LatLng(latitude, longitude);
    var content = '<h4>' + title + '</h4>';
    content += '<p>' + address + '</p>';
    var mapOptions = {
        zoom: zoom,
        center: LatLng,
        panControl: false,
        zoomControl: true,
        scaleControl: true,
        mapTypeId: google.maps.MapTypeId.ROADMAP 
    }  

    var map = new google.maps.Map(document.getElementById('map-iframe'), mapOptions);
    var infoWindow = new google.maps.InfoWindow()

    var marker = new google.maps.Marker({
        position: LatLng,
        map: map,
        title: title,
        address: address,
        icon: icon,
        animation: google.maps.Animation.DROP
    });
    infoWindow.setContent(content);
    infoWindow.open(map, marker);
    google.maps.event.addListener(marker, 'click', (function(marker) {
        return function() {
            infoWindow.setContent(content);
            infoWindow.open(map, marker);
        }
    })(marker, -1));
}

function initializeViewMarker(points, center = null) {
    var marker_list = document.getElementById("marker_list");
    if(marker_list != null) {
        marker_list.innerHTML = '';
    }
    if($.isEmptyObject(points)){
        return;
    }
    var zoom = 15;
    var centerIcon = null;
    var centerContent = '';
    var centerTitle = '';
    var centerPoint = {latitude: 10.781157, longitude: 106.698414};
    if(center != null && !$.isEmptyObject(center)) {
        centerPoint = center;
        centerIcon = center.icon;
        centerContent = center.content;
        centerTitle = center.title;
    }
    var centerLT = new google.maps.LatLng(centerPoint.latitude, centerPoint.longitude);

    var map = new google.maps.Map(document.getElementById('map-view'), {
        zoom: zoom,
        center: centerLT,
        panControl: true,
        zoomControl: true,
        scaleControl: true,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infoWindow = new google.maps.InfoWindow(), marker, i;
    var bounds = new google.maps.LatLngBounds();

    bounds.extend(centerLT);
    marker = new google.maps.Marker({
        position: centerLT,
        map: map,
        icon: centerIcon,
        title: centerTitle,
        animation: google.maps.Animation.DROP
    });
    infoWindow.setContent(centerContent);
    infoWindow.open(map, marker);
    google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
            infoWindow.setContent(centerContent);
            infoWindow.open(map, marker);
        }
    })(marker, -1));

    createMarkerButton(marker);

    $.each(points, function(index, value) {
        var position = new google.maps.LatLng(value.latitude, value.longitude);
        bounds.extend(position);
        marker = new google.maps.Marker({
            position: position,
            map: map,
            icon: value.icon,
            title: value.title,
            animation: google.maps.Animation.DROP
        });

        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infoWindow.setContent(value.content);
                infoWindow.open(map, marker);
            }
        })(marker, i));

        createMarkerButton(marker);
    });

    map.fitBounds(bounds);

}

function initMapDirection(origin, destination, showStep = false) {
    if($.isEmptyObject(origin) || $.isEmptyObject(destination)) {
        return;
    }
    var map = new google.maps.Map(document.getElementById('map-direction'), {
        zoom: 15,
        center: new google.maps.LatLng(origin.latitude, origin.longitude)
    });

    var directionsService = new google.maps.DirectionsService;
    panel = null;
    if(showStep) {
        panel = document.getElementById('right-panel');
    }
    var directionsDisplay = new google.maps.DirectionsRenderer({
        draggable: false,
        map: map,
        panel: panel
    });
    if(showStep) {
        directionsDisplay.addListener('directions_changed', function() {
            computeTotalDistance(directionsDisplay.getDirections());
        });
    }

    displayRoute(origin.latitude + ',' + origin.longitude, destination.latitude + ',' + destination.longitude, directionsService, directionsDisplay);
}

function displayRoute(origin, destination, service, display = null) {
    service.route({
        origin: origin,
        destination: destination,
        waypoints: [],
        travelMode: google.maps.TravelMode.DRIVING,
        avoidTolls: true
    }, function(response, status) {
        if(display != null) {
            if (status === google.maps.DirectionsStatus.OK) {
                display.setDirections(response);
            } else {
                alert('Could not display directions due to: ' + status);
            }
        }
    });
}

function computeTotalDistance(result) {
    var total = 0;
    var myroute = result.routes[0];
    for (var i = 0; i < myroute.legs.length; i++) {
        total += myroute.legs[i].distance.value;
    }
    total = total / 1000;
    document.getElementById('total').innerHTML = total + ' km';
}

function createMarkerButton(marker) {
    //Creates a sidebar button
    var ul = document.getElementById("marker_list");
    var li = document.createElement("li");
    var a = document.createElement("a");
    var title = marker.getTitle();
    a.innerHTML = title;
    a.href = '#';
    li.appendChild(a);
    ul.appendChild(li);

    //Trigger a click event to marker when the button is clicked.
    google.maps.event.addDomListener(li, "click", function(){
        marker.getMap().setCenter(marker.getPosition());
        google.maps.event.trigger(marker, "click");
    });
}