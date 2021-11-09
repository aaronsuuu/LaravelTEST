@extends('template.application')
@section('main')
    <div class="container-fluid mx-2 my-2">
        <h3 class="text-bold text-primary">訂單管理</h3>
        <div class="row">
            <div class="col-12">
                @if (session()->has('notice'))
                <div class="alert alert-success" role="alert">{{ session()->get('notice'); }}</div>
                @endif
                <a class="btn btn-sm btn-primary" href="{{ route('order.create') }}">新增訂單</a>
                <hr>
                <table class="table table-sm table-striped table-hover" id="data_table">
                    <thead class="table-primary">
                        <th>#</th>
                        <th>訂貨日期</th>
                        <th>客戶名稱</th>
                        <th>貨運狀態</th>
                        <th>操作</th>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>
                                    <a href="{{route('order.show', ['order' => $order])}}">{{$order->ordered_date}}</a>
                                </td>
                                <td>{{$order->customer->name}}</td>
                                <td>
                                    @if ($order->is_done)
                                        <button class="btn btn-sm btn-success" type="button">已送</button>
                                    @else
                                        <button class="btn btn-sm btn-danger" type="button">未送</button>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-warning btn-sm mx-1 my-1" href="{{ route('order.edit', $order) }}">編輯</a>
                                    <form class="d-inline" action="{{route('order.destroy', $order)}}" method="post" id="delete_form">
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
    <script type="text/javascript">
        $('#data_table').DataTable();

        // $('.delete').click(()=>{
        //     if(confirm('你確定要刪除這筆資料嗎?')){
        //         $('.delete').find('form').submit();
        //     }
        // });
    </script>
@endsection
