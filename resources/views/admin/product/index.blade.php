@extends('admin.layouts.master')

@section('title', '文章管理')

@section('content')
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                商品管理 <small>所有商品列表</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-edit"></i> 商品管理
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <div class="row" style="margin-bottom: 20px; text-align: right">
        <div class="col-lg-12">
            <a href="#" class="btn btn-success">建立新文章</a>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th width="100" style="text-align: center">商品編號</th>
                        <th>標題</th>
                        <th width="70" style="text-align: center">定價</th>
                        <th width="70" style="text-align: center">庫存</th>
                        <th width="100" style="text-align: center">商品狀態</th>
                        <th width="120" style="text-align: center">功能</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($product as $products)
                        <tr>
                            <td style="text-align: center">{{ $products->id }}</td>
                            <td>{{ $products->name }}</td>
                            <td style="text-align: center">{{ $products->price }}</td>
                            <td style="text-align: center">{{ $products->quan }}</td>
                            @if($products->status = 1)
                                <td style="text-align: center">已上架</td>
                            @else
                                <td style="text-align: center">未上架</td>
                            @endif
                            <td style="text-align: center">
                                <a href="#">編輯</a>
                                /
                                <form action="#" method="POST" style="display:inline">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-sm btn-danger" type="submit">刪除</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /.row -->
@endsection
