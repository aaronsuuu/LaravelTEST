@extends('template.application')
@section('main')
<div class="container-fluid mx-2 my-2">
        <h3 class="text-bold text-primary">產品管理 > 編輯產品</h3>
        <div class="row">
            <div class="col-6 px-2 py-2 border border-2 border-primary rounded">
                <form action="{{ route('product.update', ["product"=> $product]) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="product_name" class="from-label">產品名稱</label>
                        <input class="form-control" type="text" name="name" id="product_name" value="{{ $product->name }}">
                    </div>
                    <div class="form-group">
                        <label for="product_purchase_price" class="from-label">產品進價</label>
                        <input class="form-control" type="number" name="price" id="product_purchase_price" value="{{$product->price}}">
                    </div>
                    <div class="form-group">
                        <label for="product_supplier" class="from-label">供應商</label>
                        <select class="form-control" name="supplier" id="product_supplier">
                            @foreach ($suppliers as $supplier)
                                @if ($product->supplier_id == $supplier->id)
                                    <option value="{{$supplier->id}}" selected>{{$supplier->name}}</option>
                                @else
                                    <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    @method('put')
                    <button class="btn btn-sm btn-primary my-1" type="submit">修改</button>
                    <a href="{{url()->previous()}}" class="btn btn-sm btn-success">返回</a>
                </form>
            </div>
        </div>
    </div>

@endsection
