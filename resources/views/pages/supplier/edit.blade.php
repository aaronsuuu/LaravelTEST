@extends('template.application')
@section('main')
<div class="container-fluid mx-2 my-2">
        <h3 class="text-bold text-primary"><a href="{{route('supplier.index')}}">供應商管理</a> > 編輯供應商</h3>
        @if ($errors)
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger" role="alert">{{ $error }}</div>
            @endforeach
        @endif
        @if (session()->has('error'))
            <div class="alert alert-danger" role="alert">{{ session()->get('error'); }}</div>
        @endif
        <div class="row">
            <div class="col-6 px-2 py-2 border border-2 border-primary rounded">
                <form action="{{ route('supplier.update', ["supplier"=> $supplier]) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="supplier_name" class="from-label">供應商名稱</label>
                        <input class="form-control" type="text" name="name" id="supplier_name" value="{{$supplier->name}}">
                    </div>
                    <div class="form-group">
                        <label for="supplier_phone" class="from-label">電話</label>
                        <input class="form-control" type="tel" name="phone" id="supplier_phone" value="{{$supplier->phone}}">
                    </div>
                    <div class="form-group">
                        <label for="supplier_address" class="from-label">地址</label>
                        <input class="form-control" type="text" name="address" id="supplier_address" value="{{$supplier->address}}">
                    </div>
                    @method('put')
                    <button class="btn btn-sm btn-primary my-1" type="submit">修改</button>
                    <a class="btn btn-sm btn-secondary" href="{{url()->previous()}}">返回</a>
                </form>
            </div>
        </div>
    </div>

@endsection
