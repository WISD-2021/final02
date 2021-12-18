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

                        <a class="nav-link active" aria-current="page" href="#" style="font-size:15px;color: #6b7280">主頁</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" style="font-size:15px;color: #6b7280">商品</a>
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

    @if(\Illuminate\Support\Facades\Auth::check())
        登入_OK
<!--        --><?php
//        $n_mail=auth()->user()->email;
//        echo  $n_mail;
//        if($n_mail=='yoyo1@gmail.com')
//            echo  "<br>1";
//
//
//        ?>

    @else
        登入_NO
    @endif

{{--    @foreach ($ticket as $ticket1)--}}
{{--        @if($ticket1->status==1)--}}
{{--            <div class="m1_div">--}}
{{--                <div>--}}
{{--                    <h3> 票券名稱: <a>{{$ticket1->name}}</a></h3><br>--}}
{{--                    <h4> 單價:<a>{{$ticket1->cost}}</a></h4><br>--}}
{{--                    <h4>數量:<a>{{$ticket1->quantity}}</a></h4><br>--}}
{{--                    詳細資料:  <p class="card-text">{{$ticket1->content}}</p><hr>--}}

{{--                    <div class="t_div" >--}}
{{--                        <img class="t_img" src="../img/ticket/{{$ticket1->img}}">--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--            <hr>--}}
{{--        @endif--}}
{{--    @endforeach--}}


</main>
