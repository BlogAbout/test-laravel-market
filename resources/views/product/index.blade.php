@extends('layouts.default')

@section('content')
    <main class="market">
        <div class="container">
            <h1 class="page-title">Магазин</h1>

            <section class="products-section">
                <div class="row">
                    @foreach($products as $product)
                        <div class="col-md-3 mb-4">
                            <div class="card">
                                <img src="{{asset('images/noimage.png')}}"
                                     class="card-img-top"
                                     alt="{{$product->name}}"
                                />

                                <div class="card-body">
                                    <h5 class="card-title">{{$product->name}}</h5>

                                    <p class="card-text">{{$product->cost}} &#8381;</p>

                                    <a href="{{route('product.show', $product->id)}}" class="btn btn-primary">Купить</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        </div>
    </main>
@endsection
