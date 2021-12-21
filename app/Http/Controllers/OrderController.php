<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        //
    }
    public function  add($id)
    {

        if(\Illuminate\Support\Facades\Auth::check())
        {
session_start();
                DB::table('orders')->insert(
                    [

                        'member_id'=>auth()->user()->id,
                        'product_id'=>$id,
                        'total'=> $_SESSION['total'],
                        'date'=>date('Y/m/d'),
                        'status'=>0


                    ]
                );
            Car::destroy($_SESSION['c_id']);
            $_SESSION['c_id']=0;
            $_SESSION['total']=0;
            $_SESSION['qu1']=0;
            $_SESSION['p1']=0;
                echo "<script>alert('已送出'); location.href ='../';</script>";
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
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
