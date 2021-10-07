@extends('template.application')
@section('main')
    <div class="container mx-2 my-2">
        <h3 class="text-bold text-primary">訂單管理 > 新增訂單</h3>
        <div class="px-2 py-2 border border-2 border-primary rounded">
            <form action="{{ route('order.store') }}" method="post">
                @csrf
                <div class="form-group my-1">
                    <label for="ordered_date" class="form-label">訂購日期</label>
                    <input type="date" class="form-control" id="ordered_date" name="ordered_date" required>
                </div>
                <div class="form-group my-1">
                    <label for="customer" class="from-label">顧客</label>
                    <select class="form-control" name="customer" id="customer" required>
                        @foreach ($customers as $customer)
                            <option value="{{$customer->id}}">{{$customer->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group my-1">
                    <button type="button" class="btn btn-sm btn-primary" id="create_product">新增商品</button>
                    {{-- <button type="button" class="btn btn-sm btn-danger" id="remove_product">刪除商品</button> --}}
                </div>

                <table class="table table-sm table-hover">
                    <thead class="table-primary">
                        <th>#</th>
                        <th>供應商</th>
                        <th>產品名稱</th>
                        <th>產品單價</th>
                        <th>產品數量</th>
                    </thead>
                    <tbody id="product_group">
                        {{-- <tr class="col-1 add_item">
                            <td>
                                <button type="button" class="btn btn-sm btn-danger delete_item">刪除</button>
                            </td>
                            <td class="col-4">
                                <select name="" id="" class="form-control supplier">
                                        <option value="0">請選擇供應商</option>
                                    @foreach ($suppliers as $supplier)
                                        <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td class="col-3">
                                <select class="form-control product" name="product_id[]" required>
                                    <option value="0">請選擇商品</option>
                                </select>
                            </td>
                            <td class="col-2">
                                <input type="number" class="form-control" name="product_price[]" required min="0">
                            </td>
                            <td class="col-2">
                                <input type="number" class="form-control" name="product_quantity[]" required min="1">
                            </td>
                        </tr> --}}
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
            $('#product_group').append('<tr class="col-1 add_item"><td><button type="button" class="btn btn-sm btn-danger delete_item">刪除</button></td><td class="col-4"><select name="" id="" class="form-control supplier"><option value="0">請選擇供應商</option>@foreach ($suppliers as $supplier)<option value="{{$supplier->id}}">{{$supplier->name}}</option>@endforeach</select></td><td class="col-3"><select class="form-control product" name="product_id[]" required><option value="0">請選擇商品</option></select></td><td class="col-2"><input type="number" class="form-control" name="product_price[]" required min="0"></td><td class="col-2"><input type="number" class="form-control" name="product_quantity[]" required min="1"></td></tr>');
        });
        // $('#remove_product').click(()=>{
        //     $('.product').last().remove();
        // });

        $(document).on('change', '.supplier', function(){
            let product = $(this).parent().parent().find('.product');
            getProducts($(this).val(), product);
        });

        $(document).on('click', '.delete_item', function(){
            $(this).parent().parent().remove();
        });

        function getProducts(id, object) {
            $.ajax({
                type: "POST",
                url : "{{url('/purchase/getProducts')}}",
                data: {
                    _token : "{{csrf_token()}}",
                    supplier_id: id
                },
                success: function(result){
                    // console.log(result);
                    let append = '<option value="0">請選擇商品</option>';
                    result.products.forEach(element => {
                        append += '<option value="'+element.id+'">'+element.name+'</option>';
                    });
                    object.html(append);
                    // console.log(object);
                }
            });
        }
    </script>
@endsection
