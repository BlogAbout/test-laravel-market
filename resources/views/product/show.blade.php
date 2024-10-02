@extends('layouts.default')

@section('content')
    <main class="product">
        <div class="container">
            <section class="products-section">
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <img src="{{asset('images/noimage.png')}}"
                             alt="{{$product->name}}"
                             class="w-100"
                        />
                    </div>

                    <div class="col-md-8 mb-8">
                        <h1 class="page-title">{{$product->name}}</h1>

                        @if ($product->in_stoke > 0)
                            <p class="stock">На складе: <span>{{$product->in_stoke}}</span></p>
                        @else
                            <p class="out-stock">Ожидается: <span>{{$product->receipt_at}}</span></p>
                        @endif

                        <p class="cost">{{$product->cost}} &#8381;</p>

                        <form action="{{route('cart.add')}}" method="POST">
                            @csrf

                            <div class="form-group mb-3">
                                <label for="qty">Количество</label>

                                <input type="number"
                                       class="form-control"
                                       id="qty"
                                       name="qty"
                                       min="0"
                                       placeholder="Количество"
                                       value="1"
                                />
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Купить"/>
                            </div>

                            <input type="hidden"
                                   id="productId"
                                   name="productId"
                                   value="{{$product->id}}"
                            />
                        </form>
                    </div>

                    <div class="col-lg-12 mx-auto">
                        {!! $product->description !!}
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection
