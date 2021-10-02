@extends('template.application')
@section('main')
<div class="container-fluid mx-2 my-2">
        <h3 class="text-bold text-primary">顧客管理 > 編輯顧客</h3>
        <div class="row">
            <div class="col-6 px-2 py-2 border border-2 border-primary rounded">
                <form action="{{ route('customer.update', ["customer"=> $customer]) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="customer_name" class="from-label">顧客名稱</label>
                        <input class="form-control" type="text" name="name" id="customer_name" value="{{$customer->name}}">
                    </div>
                    <div class="form-group">
                        <label for="customer_phone" class="from-label">電話</label>
                        <input class="form-control" type="tel" name="phone" id="customer_phone" value="{{$customer->phone}}">
                    </div>
                    <div class="form-group">
                        <label for="customer_address" class="from-label">地址</label>
                        <input class="form-control" type="text" name="address" id="customer_address" value="{{$customer->address}}">
                    </div>
                    @method('put')
                    <button class="btn btn-primary my-1" type="submit">修改</button>
                </form>
            </div>
        </div>
    </div>

@endsection
