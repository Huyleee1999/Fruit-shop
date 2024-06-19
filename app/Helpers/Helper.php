<?php

use Illuminate\Support\Str;


if (!function_exists('descriptionLimit')) {
    function descriptionLimit($text, $limit)
    {
        if (Str::length($text) > $limit) {
            return Str::limit($text, $limit);
        } else {
            return Str::padRight($text, $limit, '-');
        }
    }
}

