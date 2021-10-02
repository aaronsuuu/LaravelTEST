@extends('template.application')
@section('main')
    <div class="container mx-2 my-2">
        <h3 class="text-bold text-primary">進貨管理 > 新增進貨單</h3>
        @if ($errors)
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger" role="alert">{{ $error }}</div>
            @endforeach
        @endif
        @if (session()->has('error'))
            <div class="alert alert-danger" role="alert">{{ session()->get('error'); }}</div>
        @endif
        <div class="px-2 py-2 border border-2 border-primary rounded">
            <form action="{{ route('purchase.store') }}" method="post">
                @csrf
                <div class="form-group my-1">
                    <label for="ordered_date" class="form-label">訂購日期</label>
                    <input type="date" class="form-control" id="ordered_date" name="date" value="{{old('date')}}" required>
                </div>
                <div class="form-group my-1">
                    <label for="supplier" class="from-label">供應商</label>
                    <select class="form-control" name="supplier" id="supplier" value="{{old('supplier')}}" required>
                        @foreach ($suppliers as $supplier)
                            <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group my-1">
                    <button type="button" class="btn btn-sm btn-primary" id="create_product">新增商品</button>
                    <button type="button" class="btn btn-sm btn-danger" id="remove_product">刪除商品</button>
                </div>

                <div class="form-group" id="product_group">
                    {{-- <div class="product my-2">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="product_name" class="form-label">產品名稱</label>
                                    <select class="form-control" name="product_id[]" required>
                                        @foreach ($supplier->products as $product)
                                            <option value="{{ $product->id}}">{{$product->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label class="form-label">價格</label>
                                    <input type="number" class="form-control" name="price[]" required min="0">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label class="form-label">數量</label>
                                    <input type="number" class="form-control" name="quantity[]" required min="1">
                                </div>
                            </div>
                        </div>
                    </div> --}}
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
            let slice = '';
            products_option.products.forEach(element => {
                slice += '<option value="'+element.id+'">'+element.name+'(NTD'+ element.price +')</option>';
            });
            $('#product_group').append('<div class="product my-2"><div class="row"><div class="col-6"><div class="form-group"><label for="product_name" class="form-label">產品名稱</label><select class="form-control" name="product_id[]" required>'+slice+'</select></div></div><div class="col-3"><div class="form-group"><label class="form-label">價格</label><input type="number" class="form-control" name="price[]" required min="0"></div></div><div class="col-3"><div class="form-group"><label class="form-label">數量</label><input type="number" class="form-control" name="quantity[]" required min="1"></div></div></div></div>');
        });
        $('#remove_product').click(()=>{
            $('.product').last().remove();
        });

        var products_option;

        $(function(){
            getProducts();
        });

        $('#supplier').change(function(){
            $('#product_group').html('');
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
