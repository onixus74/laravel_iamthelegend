<?php

function splitUpercase($string)
{
    return preg_split('/(?=[A-Z])/', $string, -1, PREG_SPLIT_NO_EMPTY);
}

function isActive($route)
{
    return Route::is($route);
}