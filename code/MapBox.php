<?php
/**
 * MapBox.php
 *
 * @author Bram de Leeuw
 * Date: 02/11/16
 */

 class MapBox extends Extension {

     /**
      * The map style to use
      *
      * @config string
      */
     private static $style = null;


     /**
      * The map box access token
      *
      * @config string
      */
     private static $access_token = null;


     /**
      * The map box zoom level
      *
      * @config int
      */
     private static $zoom = 16;


     /**
      * The icon image
      *
      * @config string
      */
     private static $icon_image = false;


     /**
      * The icon image size, should be an array of width and height
      * MapBox
      *   icon_size:
      *     - [width]
      *     - [height]
      *
      * @config array
      */
     private static $icon_size = array();


     /**
      * The icon image size, should be an array with the x and y position
      * MapBox
      *   icon_anchor:
      *     - [x]
      *     - [y]
      *
      * @config array
      */
     private static $icon_anchor = array();


     public function onAfterInit() {
         $vars = array(
             'MapStyle' => self::map_style(),
             'MapAccessToken' => self::access_token(),
             'Lat' => $this->getLat(),
             'Lng' => $this->getLng(),
             'Zoom' => $this->getZoom(),
             'IconImage' => self::icon_image(),
             'IconWidth' => self::icon_size()['width'],
             'IconHeight' => self::icon_size()['height'],
             'IconAnchorX' => self::icon_anchor()['x'],
             'IconAnchorY' => self::icon_anchor()['y']
         );
         
         Requirements::css(MAPBOX_JAVASCRIPT_DIR . '/thirdparty/leaflet/dist/leaflet.css');
         Requirements::javascript(MAPBOX_JAVASCRIPT_DIR . '/thirdparty/leaflet/dist/leaflet.js');
         Requirements::javascriptTemplate(MAPBOX_JAVASCRIPT_DIR . '/mapbox.js', $vars);
     }


     private function getLat() {
         $siteConfig = SiteConfig::current_site_config();
         return $this->owner->getField('Lat')
             ? $this->owner->getField('Lat')
             : $siteConfig->getField('Lat');
     }


     private function getLng() {
         $siteConfig = SiteConfig::current_site_config();
         return $this->owner->getField('Lng')
             ? $this->owner->getField('Lng')
             : $siteConfig->getField('Lng');
     }


     private function getZoom() {
         return $this->owner->getField('Zoom')
             ? $this->owner->getField('Zoom')
             : self::zoom();
     }


     /**
      * Get the access token
      *
      * @return string
      */
     private static function access_token() {
         return Config::inst()->get('MapBox', 'access_token');
     }


     /**
      * Get the default zoom level
      *
      * @return string
      */
     private static function zoom() {
         return Config::inst()->get('MapBox', 'zoom');
     }


     /**
      * Get the map style
      *
      * @return string
      */
     private static function map_style() {
         return Config::inst()->get('MapBox', 'style');
     }


     /**
      * Get icon image
      *
      * @return string
      */
     private static function icon_image() {
         return Config::inst()->get('MapBox', 'icon_image');
     }


     /**
      * Get icon size
      *
      * @return array
      */
     private static function icon_size() {
         return Config::inst()->get('MapBox', 'icon_size');
     }


     /**
      * Get icon anchor
      *
      * @return array
      */
     private static function icon_anchor() {
         return Config::inst()->get('MapBox', 'icon_anchor');
     }
 }