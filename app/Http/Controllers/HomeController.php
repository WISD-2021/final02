<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public  function random_string($length = 32, $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ') {
        if (!is_int($length) || $length < 0) {
            return false;
        }
        $characters_length = strlen($characters) - 1;
        $string = '';

        for ($i = 0; $i < $length; $i++) {
            $string .= $characters[mt_rand(0, $characters_length)];
        }
        return $string;
    }
    public function index()
    {
        if(\Illuminate\Support\Facades\Auth::check()){
            if(auth()->user()->type==0)
            {
                $m_data = DB::table('members')->get();//取得目前的members資料表
                foreach ($m_data as $m_datas){//判斷目前的members資料表有沒有該使用者
                    $uid=$m_datas->user_id;
                    if($uid==auth()->user()->id){

                        $aru=1;//有的話為1
                    }
                    else{
                        $aru=0;//沒有為0
                        $mytel = $this->random_string(9, "0123456789");
                        $tel='0'.$mytel;
                        }
                }
               if($aru==0){//如果沒有就新增

                DB::table('members')->insert(
                    [

                        'user_id'=>auth()->user()->id,
                        'tel'=>$tel,//電話先用隨機產生的


                    ]
                );
                            }
            }
        }
        $data = DB::table('products')->get();
        return view('index', ['product' => $data]);
    }
}
