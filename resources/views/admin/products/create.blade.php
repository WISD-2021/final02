@extends('admin.layouts.master')

@section('title', '新增票券')

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            新增票券 <small>請輸入票券內容</small>
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-edit"></i> 票券管理
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="fa fa-info-circle"></i>  <strong>警告！</strong> 請修正表單錯誤：
        </div>
    </div>
</div>
<!-- /.row --><div class="row">
    <div class="col-lg-12">
        <form action="/admin/products" method="POST" role="form">
            @method('POST')
            @csrf
            <div class="form-group">
                <label for="name">票券名稱：</label>
                <input name="name" class="form-control" placeholder="票券名稱" value="{{old('name')}}">
            </div>

            <div class="form-group">
                <label for="type">票券類型：</label>
                <input name="type" class="form-control" placeholder="票券類型" value="{{old('name')}}">
            </div>

            <div class="form-group">
                <label for="price">票券價格：</label>
                <input name="price" class="form-control" placeholder="票券價格" value="{{old('name')}}">
            </div>

            <div class="form-group">
                <label for="quan">票券數量：</label>
                <input name="quan" class="form-control" placeholder="票券數量" value="{{old('name')}}">
            </div>

            <div class="form-group">
                <label for="content">票券內容：</label>
                <textarea id="content" name="content" class="form-control" rows="10">{{old('name')}}</textarea>
            </div>

            <div class="form-group">
                <label for="pic">票券圖片：</label>
                <input name="pic" class="form-control" placeholder="票券圖片" value="{{old('name')}}">
            </div>


            <div class="form-group">
                <label for="status">票券狀態：</label>
                <label class="radio-inline" for="t1">
                    <input type="radio" name="status" id="0" value="0">未上架
                </label>
                <label class="radio-inline" for="t2">
                    <input type="radio" name="status" id="1" value="1">已上架
                </label>
            </div>

            <div class="text-right">
                <button type="submit" class="btn btn-success">新增</button>
            </div>

            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>

        </form>
    </div>
</div>


<!-- /.row -->
@endsection
