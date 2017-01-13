(function ($) {
    'use strict';

    var mapBox = 'https://api.mapbox.com/styles/v1/$MapStyle/tiles/256/{z}/{x}/{y}?access_token=$MapAccessToken';
    var mapOptions = JSON.parse('$MapOptions');
    var iconOptions = JSON.parse('$IconOptions');
    var tileLayerOptions = JSON.parse('$TileLayerOptions');
    var markers = JSON.parse('$Markers');
    var fitBounds = $FitBounds;

    $(document).ready(function () {
        initLeaflet();
    });

    function initLeaflet() {
        var map = L.map('$MapID', mapOptions);
        L.tileLayer(mapBox, tileLayerOptions).addTo(map);
        if (markers !== null) {
            var markerBounds = [];
            markers.forEach(function (marker) {
                var m = L.marker([marker.Lat, marker.Lng]);
                if (iconOptions !== null) {
                    m.setIcon(L.icon(iconOptions));
                }
                m.addTo(map);
                markerBounds.push(m);
                map.setView([marker.Lat, marker.Lng], $Zoom);
            });

            if (fitBounds) {
                var group = new L.featureGroup(markerBounds);
                map.fitBounds(group.getBounds());
            }
        } else {
            console.error('MapBoxSlice :: There are no markers set, give at least one marker in the following format', [{Lat: 0.0, Lng: 0.0}])
        }
    }

})(jQuery);