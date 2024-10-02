@extends('layouts.default')

@section('content')
    <main class="cart">
        <div class="container">
            <h1 class="page-title">Корзина</h1>
            @if (session('success'))
                <div class="alert alert-success" role="alert">{{session('success')}}</div>
            @endif

            @if (session('warning'))
                <div class="alert alert-danger" role="alert">{{session('warning')}}</div>
            @endif

            @if (count($cart['products']) === 0)
                <div class="alert alert-light" role="alert">В корзине нет товаров</div>
            @else
                <table class="table">
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
                    @php($total = 0)
                    @foreach($cart['products'] as $product)
                        @php($total += $cart['cart'][$product->id] * $product->cost)
                        <tr>
                            <td><a href="{{route('product.show', $product->id)}}">{{$product->name}}</a></td>
                            <td>{{$product->cost}} &#8381;</td>
                            <td>{{$cart['cart'][$product->id]}}</td>
                            <td>{{$cart['cart'][$product->id] * $product->cost}} &#8381;</td>
                            <td>
                                <form action="{{route('cart.remove', $product->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm">X</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                    <tfoot>
                    <tr>
                        <td colspan="4" style="text-align: right">Итого</td>
                        <td>{{$total}} &#8381;</td>
                    </tr>
                    </tfoot>
                </table>

                <form action="{{route('order.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="submit" class="btn btn-primary" value="Оформить заказ"/>
                </form>
            @endif
        </div>
    </main>
@endsection
