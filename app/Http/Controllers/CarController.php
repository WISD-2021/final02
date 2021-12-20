<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CarController extends Controller
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
        $data = DB::table('cars')->where('member_id',auth()->user()->id)->get();
        $p_data = DB::table('products')->get();
        return view('car', ['car' => $data],['product'=> $p_data]);
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
     * @param  \App\Http\Requests\StoreCarRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCarRequest $request)
    {
        //
    }
    public function  add($id) //store方法怪怪的，先自行創造add方法使用
    {
        $addOK=0; //避免重複的商品
        if(\Illuminate\Support\Facades\Auth::check())
        {
            $data = DB::table('cars')->where('product_id',$id)->get();
            foreach ($data as $dates)
            {
                if($dates->member_id==auth()->user()->id)
                    $addOK=1;
            }

            if ($addOK==0){
                DB::table('cars')->insert(
                    [

                        'member_id'=>auth()->user()->id,
                        'product_id'=>$id,
                        'quan'=>1   //因傳值部分有問題先寫死測試


                    ]
                );
                echo "<script>alert('已加入購物車'); location.href ='../';</script>";
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
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCarRequest  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCarRequest $request, Car $car)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        //
    }
    public function delete($id)
    { //先自行設定delete方法
        if(\Illuminate\Support\Facades\Auth::check())
        {

            Car::destroy($id);
            return redirect()->route('car.index');

        }
        else
        {
            return redirect()->route('login');
        }
    }
}
