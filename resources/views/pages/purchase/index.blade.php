@extends('template.application')
@section('main')
    <div class="container-fluid mx-2 my-2">
        <h3 class="text-bold text-primary">進貨管理</h3>
        <div class="row">
            <div class="col-12">
                @if (session()->has('notice'))
                    <div class="alert alert-success" role="alert">{{ session()->get('notice'); }}</div>
                @endif
                <a class="btn btn-sm btn-primary" href="{{ route('purchase.create') }}">新增進貨單</a>
                <hr>
                <table class="table table-striped table-hover">
                    <thead class="table-primary">
                        <th>#</th>
                        <th>進貨日期</th>
                        <th>供應商</th>
                        <th>總金額</th>
                        <th>操作</th>
                    </thead>
                    <tbody>
                        @foreach ($purchases as $purchase)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td><a href="{{route('purchase.show', ['purchase' => $purchase])}}">{{$purchase->date}}</a></td>
                                <td>{{$purchase->supplier->name}}</td>
                                <td>
                                    {{$purchase->purchaseItems->sum('total_price')}}
                                </td>
                                <td>
                                    <a class="btn btn-warning btn-sm mx-1 my-1" href="{{ route('purchase.edit', $purchase) }}">編輯</a>
                                    <form class="d-inline" action="{{route('purchase.destroy', $purchase)}}" method="post" id="delete_form">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm mx-1 my-1" type="submit">刪除</button>
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
