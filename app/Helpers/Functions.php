<?php

if (!function_exists('isLogged')) {
    function isLogged(): bool
    {
        return session()->get("userId") !== null;
    }
}
