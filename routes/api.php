<?php

use App\Http\Controllers\Api\V1\AlbumController;
use Illuminate\Support\Facades\Route;

Route::get('v1/albums', [AlbumController::class, 'search']);
