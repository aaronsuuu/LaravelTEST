@extends('template.application')
@section('main')
    <div class="container mx-5 my-3">
        <h1 class="text-bold text-primary">顧客管理 > 新增顧客</h1>
        <div class="row">
            <div class="col-6 px-2 py-2 border border-2 border-primary rounded">
                <form action="{{ route('customer.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="customer_name" class="from-label">顧客名稱</label>
                        <input class="form-control" type="text" name="name" id="customer_name">
                    </div>
                    <div class="form-group">
                        <label for="customer_phone" class="from-label">電話</label>
                        <input class="form-control" type="tel" name="phone" id="customer_phone">
                    </div>
                    <div class="form-group">
                        <label for="customer_address" class="from-label">地址</label>
                        <input class="form-control" type="text" name="address" id="customer_address">
                    </div>
                    <button class="btn btn-primary my-1" type="submit">新增</button>
                </form>
            </div>
        </div>
    </div>

@endsection
