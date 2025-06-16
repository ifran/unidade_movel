<?php

if (!function_exists('isLogged')) {
    function isLogged(): bool
    {
        return session()->get("userId") !== null;
    }
}

if (!function_exists('isAdmin')) {
    function isAdmin(): bool
    {
        return session()->get("userType") !== null && session()->get("userType") === \App\Models\Usuario::TYPE_ADMIN;
    }
}

if (!function_exists('isSharingLocation')) {
    function isSharingLocation(): bool
    {
        return session()->get("shareLocation") !== null && session()->get("shareLocation") === 1;
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

function dateToShow($date): string
{
    return date('d/m/Y', strtotime($date));
}
