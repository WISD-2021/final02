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
                        @if(Auth::user()->type == '1')
                            <script>alert('管理者登入成功');window.location.href='{{ route('admin.dashboard.index') }}'</script>
                        @else
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
                        @endif
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
    @foreach ($product as $products)
        @if($products->status==1)
            <div class ="m1_div">
                <div class>

                    <h3> 票券名稱: <a>{{$products->name}}</a></h3><br>
                    <h4> 單價:<a>{{$products->price}}</a></h4><br>
                    @if($products->quan!==0)
                        <h4>數量:<a>{{$products->quan}}</a></h4><br>
                    @elseif($products->quan==0)
                        <h4>數量:<a>無庫存</a></h4><br>
                    @endif
                    詳細資料:<br><p style="white-space: pre-line">{{$products->content}}</p><br>

                    <div class="t_div" >

                        <img class="t_img" src="../img/ticket/{{$products->pic}}">
                        <br><br>
                        <div class="icon">
                        <form action='{{route('car.add',$products->id)}}'>
                            @if($products->quan!==0)
                                <button class="btn btn-outline-dark" type="submit" style="background-color: lavender" >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-basket" viewBox="0 0 16 16">
                                        <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9H2zM1 7v1h14V7H1zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5z"/>
                                    </svg>&nbsp;加入購物車
                                </button>
                            @elseif($products->quan==0)
                                <button class="btn btn-outline-dark" type="submit" style="background-color: lavender" disabled>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-basket" viewBox="0 0 16 16">
                                        <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9H2zM1 7v1h14V7H1zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5z"/>
                                    </svg>&nbsp;加入購物車
                                </button>
                            @endif
                        </form>
                        </div>
                        <div class="icon">
                        <form action='{{route('favor.add',$products->id)}}'>
                            <button class="btn btn-outline-dark" type="submit" style="background-color: lavender" >
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-suit-heart-fill" viewBox="0 0 16 16">
                                    <path d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z"/>
                                </svg>
                            </button>
                        </form>
                        </div>
                    </div>
                </div>

            </div>

        @endif
    @endforeach


</main>
