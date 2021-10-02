@extends('template.application')
@section('main')
    <div class="container mx-2 my-2">
        <h3 class="text-bold text-primary">訂單管理 > 編輯訂單</h3>
        <div class="px-2 py-2 border border-2 border-primary rounded">
            <form action="{{ route('order.update', ['order' => $order]) }}" method="post">
                @csrf
                @method('put')
                <div class="form-group my-1">
                    <label for="ordered_date" class="form-label">訂購日期</label>
                    <input type="date" class="form-control" id="ordered_date" name="ordered_date" required value="{{$order->ordered_date}}">
                </div>
                <div class="form-group my-1">
                    <label for="customer" class="from-label">顧客</label>
                    <select class="form-control" name="customer" id="customer" required>
                        @foreach ($customers as $customer)
                            @if ($customer->id == $order->customer->id)
                                <option value="{{$customer->id}}" selected>{{$customer->name}}</option>
                            @else
                                <option value="{{$customer->id}}">{{$customer->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group my-1">
                    <button type="button" class="btn btn-sm btn-primary" id="create_product">新增商品</button>
                    <button type="button" class="btn btn-sm btn-danger" id="remove_product">刪除商品</button>
                </div>

                <div class="form-group" id="product_group">
                    @foreach ($order->items as $item)
                        <div class="product my-2">
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="product_name" class="from-label">產品名稱</label>
                                        <select class="form-control" name="product_id[]" required>
                                            @foreach ($products as $product)
                                                @if ($product->id == $item->product->id)
                                                    <option value="{{ $product->id}}" selected>{{$product->name}}</option>
                                                @else
                                                    <option value="{{ $product->id}}">{{$product->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="from-label">產品單價</label>
                                        <input type="number" class="form-control" name="product_price[]" required min="0" value="{{$item->price}}">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="from-label">產品數量</label>
                                        <input type="number" class="form-control" name="product_quantity[]" required min="1" value="{{$item->quantity}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="btn btn-sm btn-primary my-1" type="submit">送出</button>
                <a href="{{url()->previous()}}" class="btn btn-sm btn-secondary">返回</a>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $('#create_product').click(()=>{
        $('#product_group').append('<div class="product my-2"><div class="row"><div class="col-4"><div class="form-group"><label for="product_name" class="from-label">產品名稱</label><select class="form-control" name="product_id[]" required>@foreach ($products as $product)<option value="{{ $product->id}}">{{$product->name}}</option>@endforeach</select></div></div><div class="col-4"><div class="form-group"><label class="from-label">產品單價</label><input type="number" class="form-control" name="product_price[]" required min="0"></div></div><div class="col-4"><div class="form-group"><label class="from-label">產品數量</label><input type="number" class="form-control" name="product_quantity[]" required min="1"></div></div></div></div>');
        });
        $('#remove_product').click(()=>{
            $('.product').last().remove();
        });
    </script>
@endsection
