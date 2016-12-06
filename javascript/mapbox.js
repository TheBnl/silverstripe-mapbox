(function ($) {
    'use strict';

    var mapBox = 'https://api.mapbox.com/styles/v1/$MapStyle/tiles/256/{z}/{x}/{y}?access_token=$MapAccessToken';

    $(document).ready(function () {
        initLeaflet();
    });

    function initLeaflet() {
        var map = L.map('$MapID', JSON.parse('$MapOptions')).setView([$Lat, $Lng], $Zoom);

        L.tileLayer(mapBox, {
            attribution: '&copy; <a href="https://www.mapbox.com/about/maps/">Mapbox</a> &copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        var iconOptions = JSON.parse('$IconOptions');
        if (iconOptions !== null) {
            var Icon = L.icon(JSON.parse('$IconOptions'));
            L.marker([$Lat, $Lng], {icon: Icon}).addTo(map);
        }
    }

})(jQuery);