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

                        <a class="nav-link active" aria-current="page" href="{{route('home.index')}}" style="font-size:15px;color: #6b7280">主頁</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('product.index')}}" style="font-size:15px;color: #6b7280">商品</a>
                    </li>



                    <li class="nav-item" >
                    @if(\Illuminate\Support\Facades\Auth::check())
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
    購物車
    @foreach ($car as $carts)
            <div class ="m1_div">
                <div class>
{{--          無法被定義          <h3> 票券名稱: <a>asset{{$carts->products()->name}}</a></h3><br>--}}
{{--                    <h4> 單價:<a>asset{{$carts->products()->price}}</a></h4><br>--}}
                    <h4>數量:<a>{{$carts->quan}}</a></h4><br>

                </div>

            </div>


    @endforeach


</main>
