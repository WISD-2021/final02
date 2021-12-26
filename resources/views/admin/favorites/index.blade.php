@extends('admin.layouts.master')

@section('title', '票券管理')

@section('content')
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                我的最愛管理 <small>所有我的最愛列表</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-edit"></i> 我的最愛管理
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row
    <div class="row" style="margin-bottom: 20px; text-align: right">
        <div class="col-lg-12">
            <a href=" route('admin.products.create') " class="btn btn-success">新增票券</a>
        </div>
    </div>
     /.row -->

    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th width="70" style="text-align: center">編號</th>
                        <th width="100" style="text-align: center">會員名稱</th>
                        <th>票券名稱</th>
                        <th width="70" style="text-align: center">定價</th>
                        <th width="70" style="text-align: center">庫存</th>
                       <!-- <th width="150" style="text-align: center">新增時間</th>-->
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($favorite as $favorites)
                        <tr>
                            <td style="text-align: center">{{ $favorites->id }}</td>

                            @foreach($user as $users)
                                @if($favorites->member_id == $users->id)
                                     <td style="text-align: center">{{ $users->name }}</td>
                                @endif
                            @endforeach

                            <?php
                            $product = DB::table('products')->orderBy('id','ASC')->get();?>

                            @foreach($product as $products)
                                @if($favorites->product_id == $products->id)
                                    <td>{{ $products->name }}</td>
                                    <td style="text-align: center">{{ $products->price }}</td>
                                    <td style="text-align: center">{{ $products->quan }}</td>
                                @endif
                            @endforeach
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /.row -->
@endsection
