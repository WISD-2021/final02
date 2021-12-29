<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminMemberController extends Controller
{
    public function index()
    {
        $user_data = DB::table('users')->orderBy('id','ASC')->get();
        $member_data = DB::table('members')->orderBy('id','ASC')->get();

        return view('admin.members.index', ['user' => $user_data],['member' => $member_data]);
    }
}
