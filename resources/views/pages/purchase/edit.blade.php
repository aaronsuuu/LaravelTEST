@extends('template.application')
@section('main')
    <div class="container mx-2 my-2">
        <h3 class="text-bold text-primary">進貨管理 > 編輯進貨單</h3>
        <div class="px-2 py-2 border border-2 border-primary rounded">
            <form action="{{ route('purchase.update', ['purchase'=>$purchase]) }}" method="post">
                @csrf
                @method('put')
                <div class="form-group my-1">
                    <label for="ordered_date" class="form-label">訂購日期</label>
                    <input type="date" class="form-control" id="ordered_date" name="date" value="{{$purchase->date}}" required>
                </div>
                <div class="form-group my-1">
                    <label for="supplier" class="from-label">供應商</label>
                    <select class="form-control" name="supplier" id="supplier" value="{{$purchase->supplier_id}}" required>
                        @foreach ($suppliers as $supplier)
                            <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group my-1">
                    <button type="button" class="btn btn-sm btn-primary" id="create_product">新增商品</button>
                    {{-- <button type="button" class="btn btn-sm btn-danger" id="remove_product">刪除商品</button> --}}
                </div>

                <table class="table table-sm" id="product_group">
                    <thead class="table-secondary">
                        <th class="col-1">#</th>
                        <th class="col-5">產品名稱</th>
                        <th class="col-3">價格</th>
                        <th class="col-3">數量</th>
                    </thead>
                    <tbody>
                        @foreach ($purchase->purchaseItems as $item)
                            <div class="product my-2">
                                <tr>
                                    <td class="col-1">
                                        <button type="button" class="btn btn-sm btn-danger item_btn">刪除</button>
                                    </td>
                                    <td class="col-5">
                                        <div class="form-group">
                                            <select class="form-control" name="product_id[]" required>
                                                @foreach ($item->product->supplier->products as $product)
                                                    @if ($item->product_id == $product->id)
                                                        <option value="{{ $product->id}}" selected>{{$product->name}}</option>
                                                    @else
                                                        <option value="{{ $product->id}}">{{$product->name}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </td>
                                    <td class="col-3">
                                        <div class="form-group">
                                            <input type="number" class="form-control" name="price[]" required min="0" value="{{$item->price}}">
                                        </div>
                                    </td>
                                    <td class="col-3">
                                        <div class="form-group">
                                            <input type="number" class="form-control" name="quantity[]" required min="1" value="{{$item->quantity}}">
                                        </div>
                                    </td>
                                </tr>
                            </div>
                        @endforeach
                    </tbody>
                </table>
                <button class="btn btn-sm btn-primary my-1" type="submit">送出</button>
                <a href="{{url()->previous()}}" class="btn btn-sm btn-secondary">返回</a>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $('#create_product').click(()=>{
            let slice = '';
            products_option.products.forEach(element => {
                slice += '<option value="'+element.id+'">'+element.name+'</option>';
            });
            console.log(slice);
            $('#product_group').find('tbody').append('<tr><td class="col-1"><button type="button" class="btn btn-sm btn-danger item_btn">刪除</button></td><td class="col-5"><div class="form-group"><select class="form-control" name="product_id[]" required>'+slice+'</select></div></td><td class="col-3"><div class="form-group"><input type="number" class="form-control" name="price[]" required min="0"></div></td><td class="col-3"><div class="form-group"><input type="number" class="form-control" name="quantity[]" required min="1"></div></td></tr>');
        });

        $('#remove_product').click(()=>{
            $('#product_group').find('tr').last().remove();
        });

        $(document).on('click','.item_btn', function(){
            $(this).parent().parent().remove();
        });

        var products_option;

        $(function(){
            getProducts();
        });

        $('#supplier').change(function(){
            $('#product_group').find('tbody').html('');
            getProducts();
        });

        function getProducts() {
            $.ajax({
                type: "POST",
                url : "{{url('/purchase/getProducts')}}",
                data: {
                    _token : "{{csrf_token()}}",
                    supplier_id: $('#supplier').val()
                },
                success: function(result){
                    console.log(result);
                    products_option = result;
                }
            });
        }
    </script>
@endsection
