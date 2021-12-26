@extends('admin.layouts.master')

@section('title', '票券管理')

@section('content')
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                訂單管理 <small>所有訂單列表</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-edit"></i> 訂單管理
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
                        <th width="70" style="text-align: center">數量</th>
                        <th width="70" style="text-align: center">總計</th>
                       <!-- <th width="150" style="text-align: center">新增時間</th>-->
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order as $orders)
                        <tr>
                            <td style="text-align: center">{{ $orders->id }}</td>
                            @foreach($member as $members)
                                @if($orders->member_id == $members->id)
                                    <?php
                                    $user= DB::table('users')->orderBy('id','ASC')->get();?>

                                    @foreach($user as $users)
                                        @if($members->user_id == $users->id )
                                            <td style="text-align: center">{{ $users->name }}</td>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach

                            <?php
                            $product = DB::table('products')->orderBy('id','ASC')->get();?>

                            @foreach($product as $products)
                                @if($orders->product_id == $products->id)
                                    <td>{{ $products->name }}</td>
                                    <td style="text-align: center">{{ $products->price }}</td>
                                    <?php
                                        $q=(int)($orders->total)/($products->price);
                                        echo "<td style='text-align: center'>$q</td>";
                                    ?>
                                    <td style="text-align: center">{{ $orders->total }}</td>
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
