@extends('template.application')
@section('main')
    <div class="container-fluid mx-2 my-2">
        <h3 class="text-bold text-primary">產品管理</h3>
        <div class="row">
            <div class="col-12">
                @if (session()->has('notice'))
                <div class="alert alert-success" role="alert">{{ session()->get('notice'); }}</div>
                @endif
                <a class="btn btn-sm btn-primary" href="{{ route('product.create') }}">新增產品</a>
                <hr>
                <table class="table table-striped table-hover">
                    <thead class="table-primary">
                        <th>#</th>
                        <th>產品名稱</th>
                        <th>進貨價</th>
                        <th>供應商</th>
                        <th>庫存</th>
                        <th>操作</th>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->supplier->name}}</td>
                                <td>{{$product->inventory->quantity}}</td>
                                <td>
                                    <a class="btn btn-warning btn-sm mx-1 my-1" href="{{ route('product.edit', $product) }}">編輯</a>
                                    <form class="d-inline" action="{{route('product.destroy', $product)}}" method="post" id="delete_form">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm" type="submit">刪除</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
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
