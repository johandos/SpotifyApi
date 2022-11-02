<?php


namespace App\Utils;


trait UrlTrait
{
    public final function formatUrl(string $url, $id, $parameters): string
    {
        $site = self::URI_SITE.'/'.$url;
        $url = "$site?$parameters";

        if ($id){
            $url = "$site/$id?$parameters";
        }

        return $url;
    }
}
