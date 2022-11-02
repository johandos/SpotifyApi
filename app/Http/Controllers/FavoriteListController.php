<?php

namespace App\Http\Controllers;

use App\Models\FavoriteList;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class FavoriteListController extends Controller
{
    public function index(): Factory|View|Application
    {
        return view ('index', [
            'favoriteList' => FavoriteList::query()->latest()->paginate()
        ]);
    }
}
