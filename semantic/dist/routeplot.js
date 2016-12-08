function initMap() {
    var latlng = {lat: 57.063171, lng: -2.139793};
    var mapOptions = new google.maps.Map(document.getElementById('map'), {
        zoom: 12,
        center: {lat: 57.061681, lng: -2.129468}  // Portlethen.
    });

    // var directionsService = new google.maps.DirectionsService;
    // var directionsDisplay = new google.maps.DirectionsRenderer({
    //     draggable: true,
    //     map: map,
    //     panel: document.getElementById('right-panel')
    // });
    //
    // directionsDisplay.addListener('directions_changed', function() {
    //     computeTotalDistance(directionsDisplay.getDirections());
    // });
    //
    // displayRoute('57.061959, -2.131337', '57.054993, -2.145402', directionsService,
    //     directionsDisplay);
    var map = new google.maps.Map(document.getElementById("map"), mapOptions);

    var marker = new google.maps.Marker({
        position: myLatlng,
        title:"Hello World!"
    });

// To add the marker to the map, call setMap();
    marker.setMap(map);
}

function displayRoute(origin, destination, service, display) {
    service.route({
        origin: origin,
        destination: destination,
        waypoints: [{location: '57.058727, -2.134105'}, {location: '57.053802, -2.135103'}],
        travelMode: 'WALKING',
        avoidTolls: true
    }, function(response, status) {
        if (status === 'OK') {
            display.setDirections(response);
        } else {
            alert('Could not display directions due to: ' + status);
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