@extends('template.application')
@section('main')
    <div class="container-fluid mx-2 my-2">
        <h3 class="text-bold text-primary"><a href="{{route('supplier.index')}}">供應商管理</a> > 廠商資料</h3>
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

                <p><strong>名稱</strong> {{$supplier->name}}</p>
                <p><strong>電話</strong> {{$supplier->phone}}</p>
                <p><strong>地址</strong> {{$supplier->address}}</p>
                {{-- <a href="{{route('product.create', ['supplier' => $supplier])}}" class="btn btn-sm btn-primary">新增產品</a> --}}
                {{-- <table class="table table-striped table-hover">
                    <thead class="table-primary">
                        <th>#</th>
                        <th>名稱</th>
                        <th>電話</th>
                        <th>地址</th>
                        <th>操作</th>
                    </thead>
                    <tbody>
                        @foreach ($suppliers as $supplier)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td><a href="{{route('supplier.show', ['supplier' => $supplier])}}">{{$supplier->name}}</a></td>
                                <td>{{$supplier->phone}}</td>
                                <td>{{$supplier->address}}</td>
                                <td>
                                    <a class="btn btn-warning btn-sm mx-1 my-1" href="{{ route('supplier.edit', $supplier) }}">編輯</a>
                                    <form action="{{route('supplier.destroy', $supplier)}}" method="post" id="delete_form">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm mx-1 my-1" type="submit">刪除</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table> --}}
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
