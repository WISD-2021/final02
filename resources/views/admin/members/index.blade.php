@extends('admin.layouts.master')

@section('title', '票券管理')

@section('content')
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                會員管理 <small>所有會員列表</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-edit"></i> 會員管理
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
                        <th>電子郵件 Email</th>
                        <th width="70" style="text-align: center">電話</th>
                        <th width="150" style="text-align: center">加入時間</th>
                       <!-- <th width="150" style="text-align: center">新增時間</th>-->
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($member as $members)
                        <tr>
                            <td style="text-align: center">{{ $members->id }}</td>
                            @foreach($user as $users)
                                @if($members->user_id == $users->id)
                                    <td style="text-align: center">{{ $users->name }}</td>
                                    <td>{{ $users->email}}</td>
                                    <td>{{ $members->tel }}</td>
                                    <td>{{ $users->created_at }}</td>
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
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
@endsection
