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
                        <a class="nav-link"  style="font-size:15px;color: #6b7280"><?php if(\Illuminate\Support\Facades\Auth::check()){ $un=auth()->user()->name; echo "歡迎使用者:&nbsp;".$un;}else{}?></a>
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
    <center><h1> 購物車</h1></center>
    @foreach ($car as $carts)
        @foreach ($product as $products)
            @if($carts->product_id==$products->id)
            <div class ="m1_div">
                <div>
                    <h3> 票券名稱: <a>{{$products->name}}</a></h3><br>
                    <h4> 單價:<a>{{$products->price}}</a></h4><br>


                    <div class="t_div" >

                        <img class="t_img" src="../img/ticket/{{$products->pic}}"><br>
                    </div>
                    <div class="icon3">
                        <form  method="GET"  action='{{route('car.check',$carts->id)}}'>
                            <h4>數量:<input type='number' name='qu' step='1' min='1' max='10' value={{$carts->quan}}></h4><br>
                            <button class="btn btn-outline-dark" type="submit" style="background-color: lavender" >
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z"/>
                                    <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z"/>
                                    <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z"/>
                                    <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z"/>
                                </svg>  &nbsp;下訂單
                            </button>

                        </form>
                    </div>


            </div>
                        <div class="icon3">
                            <form action='{{route('car.delete',$carts->id)}}'>
                                <button class="btn btn-outline-dark" type="submit" style="background-color: lavender" >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-square" viewBox="0 0 16 16">
                                        <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </button>
                            </form>
                        </div>
                </div>
            </div>
            </div>
     @endif
    @endforeach
    @endforeach

</main>
