<?php
use App\Models\Setting;


if (! function_exists('trimString')) {
    function trimString($string) {
        $string = strtolower($string);
        //Make alphanumeric (removes all other characters)
        $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
        //Clean up multiple dashes or whitespaces
        $string = preg_replace("/[\s-]+/", " ", $string);
        //Convert whitespaces and underscore to dash
        $string = preg_replace("/[\s_]/", "-", $string);
        return $string;

    }
}

if (! function_exists('logo')) {
    function logo() {
        $setting = Setting::first();
        return $setting->getLogo;
    }
}

if (! function_exists('fav')) {
    function fav() {
        $setting = Setting::first();
        return $setting->getFav;
    }
}

if (! function_exists('websiteTitlte')) {
    function websiteTitlte() {
        $setting = Setting::first();
        return $setting->website_title;
    }
}
?>
