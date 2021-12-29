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
        $data = DB::table('orders')->orderBy('id','ASC')->get();;
        $p_data = DB::table('products')->orderBy('id','ASC')->get();
        return view('orders', ['order' => $data],['product'=> $p_data]);
    }
    public function searchstatus($status)
    {


        $data = DB::table('orders')->where('status',$status)->get();
        $p_data = DB::table('products')->get();
        return view('orders', ['order' => $data],['product'=> $p_data]);

    }
    public  function  use($id){
      $q=DB::table('orders')->where('id',$id)->get();
        foreach ($q as $qs)
        {
            $quan=$qs->quan;//取買了幾張票

        }
        if($quan==1){ //剩下最後一張且要使用時

            DB::table('orders')->where('id',$id)->update(
                [

                    'status'=>1,//全部使用完了所以狀態為1
                    'quan'=>0//全部使用完了所以數量歸零





                ]
            );
        }
       else {
           $quan=$quan-1;//使用一張後數量減1
        DB::table('orders')->where('id',$id)->update(
            [




                'quan'=>$quan,//更新能使用的數量


            ]
        );}
        $data = DB::table('orders')->get();
        $p_data = DB::table('products')->get();
        return view('orders', ['order' => $data],['product'=> $p_data]);
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
               $member = DB::table('members')->orderBy('id','ASC')->get();
               foreach($member as $members)
               {
                    if(auth()->user()->id==$members->user_id)
                        $member_id=$members->id;
               }
                DB::table('orders')->insert(
                    [

                        'member_id'=>$member_id,
                        'product_id'=>$id,
                        'total'=> $_SESSION['total'],
                        'quan'=>$_SESSION['qu1'],
                        'date'=>date('Y/m/d'),
                        'status'=>0


                    ]
                );
            Car::destroy($_SESSION['c_id']);
//            $_SESSION['c_id']=0;
//            $_SESSION['total']=0;
//            $_SESSION['qu1']=0;
//            $_SESSION['p1']=0;
            unset($_SESSION['c_id']);
            unset($_SESSION['total']);
            unset($_SESSION['qu1']);
            unset($_SESSION['p1']);
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
