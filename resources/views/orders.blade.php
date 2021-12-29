@extends('layouts.master')
<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top"  style="background-color: lavender">
        <div class="container-fluid" >
            <a class="container">
                <a style="font-size:50px;color: #6b7280">ゆずのチケット</a>

            </a>

            <div class="collapse navbar-collapse navbar-right " id="navbarCollapse">
                <ul class="nav nav-pills nav-fill"><br>
                    <li class="nav-item">
                        <a class="nav-link"  style="font-size:15px;color: #6b7280"><?php if(\Illuminate\Support\Facades\Auth::check()){ $un=auth()->user()->name; echo "歡迎使用者&nbsp;".$un;}else{}?></a>
                    </li>
                    <li class="nav-item">

                        <a class="nav-link active" aria-current="page" href="{{route('home.index')}}" style="font-size:15px;color: #6b7280">主頁</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('product.index')}}" style="font-size:15px;color: #6b7280">商品</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('car.index')}}" style="font-size:15px;color: #6b7280">購物車</a>
                    </li>


                    <li class="nav-item" >
                    @if(\Illuminate\Support\Facades\Auth::check())
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('favor.index')}}" style="font-size:15px;color: #6b7280">我的最愛</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('order.index')}}" style="font-size:15px;color: #6b7280">訂單管理</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}" style="font-size:15px;color: #6b7280"
                               onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                                {{ __('登出') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" style="font-size:15px;color: #6b7280" href="{{ route('login') }}">登入</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"  style="font-size:15px;color: #6b7280 "href="{{ route('register') }}">註冊</a>
                        </li>
                        @endif
                        </li>

                </ul>
            </div>

        </div>
    </nav>
</header>
<main>

    <ul class="nav nav-tabs">

        <li class="nav-item">
            <a class="nav-link" href="{{route('order.index')}}">購買紀錄</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('order.searchstatus',0)}}">未使用</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('order.searchstatus',1)}}">已使用</a>
        </li>

    </ul>
    <?php
    $member = DB::table('members')->orderBy('id','ASC')->get();
    ?>
    @foreach ($order as $orders)
        @foreach ($product as $products)
            @foreach ($member as $members)
                @if($orders->product_id==$products->id && $orders->member_id==$members->id && $members->user_id==auth()->user()->id)
                    <div class ="m1_div">
                        <div class>

                            <h3> 票券名稱: <a>{{$products->name}}</a></h3><br>
                            <h4> 單價:<a>{{$products->price}}</a></h4><br>
                           <h4>數量:<a>{{$orders->quan}}</a></h4><br>
                            <div class="t_div" >

                                <img class="t_img" src="../img/ticket/{{$products->pic}}">
                                <br><br>

                                <div class="icon4">
                                    <form action='{{route('order.use',$orders->id)}}'>
                                        <button class="btn btn-outline-dark" type="submit" style="background-color: lavender" onClick="return confirm('確定要使用?')">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-octagon-half" viewBox="0 0 16 16">
                                                <path d="M4.54.146A.5.5 0 0 1 4.893 0h6.214a.5.5 0 0 1 .353.146l4.394 4.394a.5.5 0 0 1 .146.353v6.214a.5.5 0 0 1-.146.353l-4.394 4.394a.5.5 0 0 1-.353.146H4.893a.5.5 0 0 1-.353-.146L.146 11.46A.5.5 0 0 1 0 11.107V4.893a.5.5 0 0 1 .146-.353L4.54.146zM8 15h2.9l4.1-4.1V5.1L10.9 1H8v14z"/>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
        {{--                        <div class="icon">--}}
        {{--                            <form action='{{route('favor.add',$products->id)}}'>--}}
        {{--                                <button class="btn btn-outline-dark" type="submit" style="background-color: lavender" >--}}
        {{--                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-suit-heart-fill" viewBox="0 0 16 16">--}}
        {{--                                        <path d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z"/>--}}
        {{--                                    </svg>--}}
        {{--                                </button>--}}
        {{--                            </form>--}}
        {{--                        </div>--}}
                            </div>
                        </div>

                    </div>

            @endif
        @endforeach
    @endforeach
    @endforeach

</main>
