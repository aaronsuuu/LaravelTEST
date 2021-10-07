@extends('template.application')
@section('main')
    <div class="container-fluid mx-2 my-2">
        <h3 class="text-bold text-primary"><a href="{{route('purchase.index')}}">進貨管理</a> > 進貨單資料</h3>
        <hr>
        <div class="row">
            <div class="col-12">
                @if (session()->has('notice'))
                    <div class="alert alert-success" role="alert">{{ session()->get('notice'); }}</div>
                @endif
                @if (session()->has('error'))
                    <div class="alert alert-danger" role="alert">{{ session()->get('error'); }}</div>
                @endif
                @if ($errors)
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">{{ $error }}</div>
                    @endforeach
                @endif

                <p><strong>名稱</strong> {{$purchase->supplier->name}}</p>
                <p><strong>電話</strong> {{$purchase->supplier->phone}}</p>
                <p><strong>地址</strong> {{$purchase->supplier->address}}</p>
                <p><strong>進貨日期</strong> {{$purchase->date}}</p>
                {{-- <a href="{{route('product.create', ['purchase' => $purchase])}}" class="btn btn-sm btn-primary">新增產品</a> --}}
                <table class="table table-hover">
                    <thead class="table-secondary">
                        <th>#</th>
                        <th>產品名稱</th>
                        <th>價格</th>
                        <th>數量</th>
                        <th>金額</th>
                    </thead>
                    <tbody>
                        @foreach ($purchase->purchaseItems as $item)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$item->product->name}}</td>
                                <td>{{$item->price}}</td>
                                <td>{{$item->quantity}}</td>
                                <td>${{$item->price * $item->quantity}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>總金額:{{$purchase->purchaseItems->sum('total_price')}}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

    {{-- <script type="text/javascript">
        $('.delete').click(()=>{
            if(confirm('你確定要刪除這筆資料嗎?')){
                $('.delete').find('form').submit();
            }
        })
    </script> --}}
@endsection
