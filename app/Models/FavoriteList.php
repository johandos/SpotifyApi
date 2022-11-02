<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoriteList extends Model
{
    use HasFactory;

    public function getExcerptAttribute(): string
    {
        return substr($this->slug, 0, 120);
    }

    public function getPublishedAtAttribute()
    {
        return $this->created_at->diffForHumans();
    }
}
