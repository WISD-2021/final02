<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use Illuminate\Support\Facades\DB;

class AdminFavoriteController extends Controller
{
    public function index()
    {
        $fav_data = DB::table('favorites')->orderBy('id','ASC')->get();
        $user_data = DB::table('users')->orderBy('id','ASC')->get();

        return view('admin.favorites.index', ['favorite' => $fav_data],['user' => $user_data]);
    }
}
