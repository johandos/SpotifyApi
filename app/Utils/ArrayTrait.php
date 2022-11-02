<?php


namespace App\Utils;


trait ArrayTrait
{
    public final function arrayToStringUrl(array $array): string
    {
        return http_build_query($array, '', '&');
    }

}
