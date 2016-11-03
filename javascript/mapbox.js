(function ($) {
    'use strict';

    var mapBox = 'https://api.mapbox.com/styles/v1/$MapStyle/tiles/256/{z}/{x}/{y}?access_token=$MapAccessToken';

    $(document).ready(function () {
        initLeaflet();
    });

    function initLeaflet() {
        var map = L.map('$MapID', {
            dragging: false,
            zoomControl: false,
            scrollWheelZoom: false
        }).setView([$Lat, $Lng], $Zoom);

        L.tileLayer(mapBox, {
            attribution: '&copy; <a href="https://www.mapbox.com/about/maps/">Mapbox</a> &copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        if ('$IconImage') {
            var Icon = L.icon({
                iconUrl: '$IconImage',
                iconSize: [$IconWidth, $IconHeight],
                iconAnchor: [$IconAnchorX, $IconAnchorY]
            });

            L.marker([$Lat, $Lng], {icon: Icon}).addTo(map);
        }
    }

})(jQuery);