@extends('admin.layouts.master')

@section('title', '票券管理')

@section('content')
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                票券管理 <small>所有票券列表</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-edit"></i> 票券管理
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <div class="row" style="margin-bottom: 20px; text-align: right">
        <div class="col-lg-12">
            <a href="{{ route('admin.products.create') }}" class="btn btn-success">新增票券</a>
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
                        <th>票券名稱</th>
                        <th width="70" style="text-align: center">定價</th>
                        <th width="70" style="text-align: center">庫存</th>
                        <th width="100" style="text-align: center">商品狀態</th>
                        <th width="130" style="text-align: center">功能</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($product as $products)
                        <tr>
                            <td style="text-align: center">{{ $products->id }}</td>
                            <td>{{ $products->name }}</td>
                            <td style="text-align: center">{{ $products->price }}</td>
                            <td style="text-align: center">{{ $products->quan }}</td>
                            @if($products->status == 1)
                                <td style="text-align: center">已上架</td>
                            @else
                                <td style="text-align: center">未上架</td>
                            @endif
                            <td style="text-align: center">
                                <a href="{{ route('admin.products.edit', $products->id) }}" class="btn btn-sm btn-primary">編輯</a>
                                /
                                <a href="{{ route('admin.products.delete',$products->id) }}" class="btn btn-sm btn-danger" onClick="return confirm('確定要刪除此商品?')">刪除</a>
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
