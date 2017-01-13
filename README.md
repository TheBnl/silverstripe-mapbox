# Silverstripe Mapbox

Add a Mapbox map to your Silverstripe pages. 
 
### Instalation
Simply install the moduel by requireing it in you composer.json or by running:
```
composer require "bramdeleeuw/silverstripe-mapbox"
```

Then add the controller extension to the page you want the map to show and configure the basic properties:
```
HomePage_controller:
  extensions:
    - MapBox
    
MapBox:
  access_token: 'YOUR_MAPBOX_ACCESS_TOKEN'
  style: 'YOUR_MAPBOX_STYLE'
```

### Configuration
The map can be configured and optionally be configured to hold an icon, the sintax follows the leaflet configuration, any option that you can pass there is passable here. All set options will be combined to a json object.
```
MapBox:
  map_options:
    dragging: false
    zoomControl: false
    scrollWheelZoom: false
  icon_options:
    iconUrl: 'path/to/the.icon'
    iconSize:
      - 50
      - 50
    iconAnchor:
      - 25
      - 50
```
To center the map to a location you need to add the method `mapBoxMarkers()` to the model that holds the MapBox extension. This method needs to return an array with at least one location to center the map on. If using multiple markers you can set the config setting `fit_bounds_to_markers` to true so all markers will be displayed on the map. 

A interface is available for models that use the extension, just add `implements UseMapBox` to your class to force the method. 

## License

Copyright (c) 2016, Bram de Leeuw
All rights reserved.

All rights reserved.

Redistribution and use in source and binary forms, with or without
modification, are permitted provided that the following conditions are met:

 * Redistributions of source code must retain the above copyright
   notice, this list of conditions and the following disclaimer.
 * Redistributions in binary form must reproduce the above copyright
   notice, this list of conditions and the following disclaimer in the
   documentation and/or other materials provided with the distribution.
 * The name of Bram de Leeuw may not be used to endorse or promote products
   derived from this software without specific prior written permission.

THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
DISCLAIMED. IN NO EVENT SHALL <COPYRIGHT HOLDER> BE LIABLE FOR ANY
DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
(INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND
ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
(INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.