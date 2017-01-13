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
     * Fit the map bounds to show all set markers
     * @var bool
     */
    private static $fit_bounds_to_markers = false;


    /**
     * The Icon options
     * Just follow the leaflet icon option syntax, the options array will be json encoded
     *
     * @config string
     */
    private static $icon_options = null;


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

    /**
     * The Tile layer options
     * Just follow the leaflet map option syntax, the options array will be json encoded
     *
     * @var array
     */
    private static $tile_layer_options = array(
        "attribution" => "&copy; <a href=\"//www.mapbox.com/about/maps\" target=\"_blank\">Mapbox</a> &copy; <a href=\"//www.openstreetmap.org/copyright\" target=\"_blank\">OpenStreetMap</a>"
    );


    public function onAfterInit()
    {
        $vars = array(
            'MapID' => $this->mapID(),
            'MapStyle' => Config::inst()->get('MapBox', 'style'),
            'MapAccessToken' => self::access_token(),
            'FitBounds' => (int)Config::inst()->get('MapBox', 'fit_bounds_to_markers'),
            'Markers' => $this->getMarkers(),
            'Zoom' => $this->getZoom(),
            'MapOptions' => self::options_as_json('map_options'),
            'IconOptions' => self::options_as_json('icon_options'),
            'TileLayerOptions' => self::options_as_json('tile_layer_options'),
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
     * Get the zoom level
     *
     * @return string
     */
    private function getZoom()
    {
        return $this->owner->getField('Zoom')
            ? $this->owner->getField('Zoom')
            : Config::inst()->get('MapBox', 'zoom');
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
     * Get options as json
     *
     * @param $for
     * @return string
     */
    private static function options_as_json($for)
    {
        $options = Config::inst()->get('MapBox', $for);
        return Convert::array2json($options);
    }


    /**
     * Get the icon options
     *
     * @return string
     */
    public function getMarkers()
    {
        $markers = $this->owner->mapBoxMarkers();
        return Convert::array2json($markers);
    }
}