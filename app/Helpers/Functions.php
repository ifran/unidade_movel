<?php

if (!function_exists('isLogged')) {
    function isLogged(): bool
    {
        return session()->get("userId") !== null;
    }
}

if (!function_exists('pre')) {
    function pre($params): void
    {
        echo "<pre>";
        print_r($params);
        echo "</pre>";
    }
}

if (!function_exists('onlyLettersAndNumbers')) {
    function onlyLettersAndNumbers($string): string
    {
        return preg_replace('/[^a-zA-Z0-9]/', '', $string);
    }
}
