@extends('template.application')
@section('main')
    <div class="container-fluid mx-2 my-2">
        <h3 class="text-bold text-primary"><a href="{{route('supplier.index')}}">供應商管理</a> > 新增供應商</h3>
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
                <form action="{{ route('supplier.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="customer_name" class="from-label">顧客名稱</label>
                        <input class="form-control" type="text" name="name" id="customer_name" value="{{old('name')}}">
                    </div>
                    <div class="form-group">
                        <label for="customer_phone" class="from-label">電話 <small>(請輸入10碼，市話請加02)</small></label>
                        <input class="form-control" type="tel" name="phone" id="customer_phone" value="{{old('phone')}}">
                    </div>
                    <div class="form-group">
                        <label for="customer_address" class="from-label">地址</label>
                        <input class="form-control" type="text" name="address" id="customer_address" value="{{old('address')}}">
                    </div>
                    <button class="btn btn-primary my-1" type="submit">新增</button>
                </form>
            </div>
        </div>
    </div>

@endsection
