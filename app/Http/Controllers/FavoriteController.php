<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Http\Requests\StoreFavoriteRequest;
use App\Http\Requests\UpdateFavoriteRequest;
use Illuminate\Support\Facades\DB;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(\Illuminate\Support\Facades\Auth::check())
        {
            $data = DB::table('favorites')->orderBy('id','ASC')->get();
            $p_data = DB::table('products')->get();
            return view('favorite', ['favorite' => $data],['product'=> $p_data]);
        }
        else
        {
            echo "<script>alert('尚未登入')</script>";
            return redirect()->route('login');

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFavoriteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFavoriteRequest $request)
    {

    }
    public function  add($id) //store方法怪怪的，先自行創造add方法使用
      {
          $addOK=0; //讓我的最愛裡不會有重複的商品
          if(\Illuminate\Support\Facades\Auth::check())
       {
           $member = DB::table('members')->orderBy('id','ASC')->get();
           foreach($member as $members)
           {
               if(auth()->user()->id==$members->user_id)
                   $member_id=$members->id;
           }

           $data = DB::table('favorites')->where('product_id',$id)->get();
           foreach ($data as $dates)
           {
               if($dates->member_id==$member_id)
                   $addOK=1;
           }

           if ($addOK==0){
             DB::table('favorites')->insert(
             [

                'member_id'=>$member_id,
                'product_id'=>$id

             ]
          );
           echo "<script>alert('已加入我的最愛'); location.href ='../';</script>";
           }
           else if($addOK==1) {
             //  "<script>alert('已存在該商品'); location.href ='../';</script>"; 這種跳轉才會有訊息，但不知為何在這怪怪的
               return redirect()->route('home.index');//先以不跳訊息的方式呈現
           }
      }
    else
    {
        echo "<script >alert('尚未登入')</script>";
        return redirect()->route('login');

    }

}
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function show(Favorite $favorite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function edit(Favorite $favorite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFavoriteRequest  $request
     * @param  \App\Models\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFavoriteRequest $request, Favorite $favorite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Favorite $favorite)
    {
//     怪怪的無法使用   if(\Illuminate\Support\Facades\Auth::check())
//        {
//
//        Favorite::destroy($favorite);
//            return redirect()->route('favor.index');
//
//        }
//        else
//        {
//        return redirect()->route('login');
//        }
    }
    public function delete($id)
    { //先自行設定delete方法
        if(\Illuminate\Support\Facades\Auth::check())
        {

        Favorite::destroy($id);
            return redirect()->route('favor.index');

        }
        else
        {
        return redirect()->route('login');
        }
    }
}
