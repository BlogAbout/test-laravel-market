@extends('layouts.default')

@section('content')
    <main class="orders">
        <div class="container">
            <h1 class="page-title">Список заказов</h1>

            @if (count($orders) === 0)
                <p>Нет заказов</p>
            @else
                @php($total = 0)

                @foreach($orders as $order)
                    @php($total += $order->total)

                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Статус</th>
                            <th scope="col">Сумма</th>
                            <th scope="col">Итог</th>
                            <th scope="col">Дата</th>
                            <th scope="col">Удалить</th>
                        </tr>
                        </thead>

                        <tbody>
                        <tr>
                            <th scope="col">{{$order->id}}</th>
                            <th scope="col">{{$order->status}}</th>
                            <th scope="col">{{$order->sum}}</th>
                            <th scope="col">{{$order->total}}</th>
                            <th scope="col">{{$order->created_at}}</th>
                            <th scope="col">
                                <form action="{{route('order.delete', $order->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm">Удалить заказ</button>
                                </form>
                            </th>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <table class="table mb-0">
                                    <thead>
                                    <tr>
                                        <th scope="col">Название</th>
                                        <th scope="col">Цена</th>
                                        <th scope="col">Количество</th>
                                        <th scope="col">Сумма</th>
                                        <th scope="col">Удалить</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($order->ordersItems as $item)
                                        <tr>
                                            <td>
                                                <a href="{{route('product.show', $item->product->id)}}">{{$item->product->name}}</a>
                                            </td>
                                            <td>{{$item->cost}} &#8381;</td>
                                            <td>{{$item->qty}}</td>
                                            <td>{{$item->sum}} &#8381;</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                @endforeach

                <div class="alert alert-light" role="alert">
                    {{count($orders)}} заказов на сумму {{$total}} &#8381;
                </div>
            @endif
        </div>
    </main>
@endsection
