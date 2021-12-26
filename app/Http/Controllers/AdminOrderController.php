<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use Illuminate\Support\Facades\DB;

class AdminOrderController extends Controller
{
    public function index()
    {
        $order_data = DB::table('orders')->orderBy('id','ASC')->get();
        $member_data = DB::table('members')->orderBy('id','ASC')->get();

        return view('admin.orders.index', ['order' => $order_data],['member' => $member_data]);
    }
}
