@extends('template.application')
@section('main')
    <div class="container my-2">
        <h1 class="text-bold text-primary">顧客管理</h1>
        <div class="row">
            <div class="col-12">
                @if (session()->has('notice'))
                <div class="alert alert-success" role="alert">{{ session()->get('notice'); }}</div>
                @endif
                <a href="{{ route('customer.create') }}">新增顧客</a>
                <hr>
                <table class="table table-striped table-hover">
                    <thead class="table-primary">
                        <th>#</th>
                        <th>顧客名稱</th>
                        <th>電話</th>
                        <th>地址</th>
                        <th>操作</th>
                    </thead>
                    <tbody>
                        @foreach ($customers as $customer)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$customer->name}}</td>
                                <td>{{$customer->phone}}</td>
                                <td>{{$customer->address}}</td>
                                <td>
                                    <a class="btn btn-warning mx-1 my-1" href="{{ route('customer.edit', $customer) }}">修改</a>
                                    <a class="btn btn-danger mx-1 my-1" href="{{ route('customer.destroy', $customer) }}">刪除</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
