@extends('template.application')
@section('main')
    <div class="container mx-2 my-2">
        <h3 class="text-bold text-primary">訂單內容</h3>
        <div class="row">
            <div class="col-8">
                {{-- @if (session()->has('notice'))
                <div class="alert alert-success" role="alert">{{ session()->get('notice'); }}</div>
                @endif --}}
                <p class="text-bold"><strong>日期：</strong>{{$order->ordered_date}}</p>
                <p class="text-bold"><strong>客戶：</strong>{{$order->customer->name}}</p>
                <hr>
            </div>
            <div class="col-8">
                <table class="table table-sm">
                    <thead class="table-secondary">
                        <th>品名</th>
                        <th>單價</th>
                        <th>數量</th>
                    </thead>
                    <tbody>
                        @foreach ($order->items as $item)
                            <tr>
                                <td>{{$item->product->name}}</td>
                                <td>{{$item->price}}</td>
                                <td>{{$item->quantity}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <p><strong>訂單金額：</strong>NTD {{$total}}</p>
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
