<?php

function get_location_details_for_lat_long($latitude, $longitude) {
        // Ensure we have a lat long
        if (!$latitude or !$longitude) return NULL;

        // Download google maps api data for this lat long
        $maps_api_url = "http://maps.googleapis.com/maps/api/geocode/json?latlng=".$latitude.",".$longitude."&sensor=true";
        $content_json = file_get_contents($maps_api_url);
        if (!$content_json) return NULL;

        $geocode_array = json_decode($content_json);
        if (!$geocode_array) return NULL;

        // Variables for storing our resulting location details
        $street_address = NULL;
        $street_no = NULL;
        $street = NULL;
        $city = NULL;
        $country = NULL;

        $first_address = $geocode_array->{'results'}[0];
        $components = $first_address->{"address_components"};
        if (count($components) != 0) {
            foreach ($components as $component) {
               $type = $component->{"types"}[0];
               $value = $component->{"long_name"};
               if ($type == "street_number") {
                   $street_no = $value;
               } else if ($type == "route") {
                   $street = $value;
               } else if ($type == "postal_town") {
                   $city = $value;
               } else if ($type == "country") {
                   $country = $value;
               }
            }
            $street_address = $street_no . " " . $street;
        }

        $result = [
            "latitude" => $latitude,
            "longitude" => $longitude,
            "street_address" => $street_address,
            "city" => $city,
            "country" => $country
        ];

        return $result;
    }

  ?>