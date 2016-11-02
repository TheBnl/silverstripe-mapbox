# User form page slice

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
For getting the location this module uses `silverstripe-australia/addressable` 
you can eighter add the addressable extensions to your SiteConfig or the page that holds your map e.g. the HomePage.
Make sure to configure the Google Geocoding api key, otherwise the Geocodable class is not able to retrieve a valid location point from the given address.
```
SiteConfig: # Or the the page model that holds the map
  extensions:
    - Addressable
    - Geocodable
 
GoogleGeocoding:
  google_api_key: 'YOUR_API_KEY'
```
The map can be configured to hold an icon as such:
```
MapBox:
  icon_image: 'path/to/the.icon'
  icon_size:
    width: 43
    height: 50
  icon_anchor:
    x: 22
    y: 50
```

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