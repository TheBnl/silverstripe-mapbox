<?php
/**
 * UseMapBox.php
 *
 * @author Bram de Leeuw
 * Date: 13/01/17
 */
 

interface UseMapBox {

    /**
     * Function to overwrite in extended class
     * Return a array containing one or multiple markers in at least the following format
     * array(
     *   array(
     *     'Lat' => $this->YourLatValue,
     *     'Lng' => $this->YourLngValue
     *   ),
     *   etc..
     * )
     *
     * @return array|null
     */
    public function mapBoxMarkers();
}