<?php

/**
 * MapBox.php
 *
 * @author Bram de Leeuw
 * Date: 02/11/16
 */
class MapBox extends Extension
{

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
     * The Icon options
     * Just follow the leaflet icon option syntax, the options array will be json encoded
     *
     * @config string
     */
    private static $icon_options = array();


    /**
     * The Map options
     * Just follow the leaflet map option syntax, the options array will be json encoded
     *
     * @config array
     */
    private static $map_options = array(
        'dragging' => false,
        'zoomControl' => false,
        'scrollWheelZoom' => false
    );


    public function onAfterInit()
    {

        $vars = array(
            'MapID' => $this->mapID(),
            'MapStyle' => self::map_style(),
            'MapAccessToken' => self::access_token(),

            // todo: config options ?
            'Lat' => $this->getLat(),
            'Lng' => $this->getLng(),
            'Zoom' => $this->getZoom(),

            'MapOptions' => self::map_options(),
            'IconOptions' => self::icon_options(),

        );

        Requirements::css(MAPBOX_CSS_DIR . '/mapbox.css');
        Requirements::css(MAPBOX_JAVASCRIPT_DIR . '/thirdparty/leaflet/dist/leaflet.css');
        Requirements::javascript(MAPBOX_JAVASCRIPT_DIR . '/thirdparty/leaflet/dist/leaflet.js');
        Requirements::javascriptTemplate(MAPBOX_JAVASCRIPT_DIR . '/mapbox.js', $vars);
    }


    /**
     * Create a map ID
     *
     * @return string
     */
    public function mapID()
    {
        return "mapbox-{$this->owner->ClassName}-{$this->owner->ID}";
    }


    /**
     * Get the latitude
     *
     * @return mixed
     */
    private function getLat()
    {
        $siteConfig = SiteConfig::current_site_config();
        return $this->owner->getField('Lat')
            ? $this->owner->getField('Lat')
            : $siteConfig->getField('Lat');
    }


    /**
     * Get the longitude
     *
     * @return mixed
     */
    private function getLng()
    {
        $siteConfig = SiteConfig::current_site_config();
        return $this->owner->getField('Lng')
            ? $this->owner->getField('Lng')
            : $siteConfig->getField('Lng');
    }


    /**
     * Get the zoom level
     *
     * @return string
     */
    private function getZoom()
    {
        return $this->owner->getField('Zoom')
            ? $this->owner->getField('Zoom')
            : self::zoom();
    }


    /**
     * Get the access token
     *
     * @return string
     */
    private static function access_token()
    {
        return Config::inst()->get('MapBox', 'access_token');
    }


    /**
     * Get the map options
     *
     * @return string
     */
    private static function map_options()
    {
        $options = Config::inst()->get('MapBox', 'map_options');
        return Convert::array2json($options);
    }


    /**
     * Get the icon options
     *
     * @return string
     */
    private static function icon_options()
    {
        $options = Config::inst()->get('MapBox', 'icon_options');
        return Convert::array2json($options);
    }


    /**
     * Get the default zoom level
     *
     * @return string
     */
    private static function zoom()
    {
        return Config::inst()->get('MapBox', 'zoom');
    }


    /**
     * Get the map style
     *
     * @return string
     */
    private static function map_style()
    {
        return Config::inst()->get('MapBox', 'style');
    }
}