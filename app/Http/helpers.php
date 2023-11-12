<?php

if (! function_exists('is_active')){
    function is_active($route): string
    {
        return request()->route()->getName() == $route ? 'active' : '';
    }
}

