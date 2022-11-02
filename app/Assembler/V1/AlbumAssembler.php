<?php

namespace App\Assembler\V1;

class AlbumAssembler
{
    public function assembler($source) : array
    {
        $albums = $source->albums->items;
        $results = [];
        foreach ($albums as $key => $album){
            $results[$key]['name'] = $album->name;
            $results[$key]['release_date'] = $album->release_date;
            $results[$key]['total_tracks'] = $album->total_tracks;
            $results[$key]['images'] = $album->images;
        }

        return $results;
    }

}
