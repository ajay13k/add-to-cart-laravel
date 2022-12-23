@extends('layout')
@section('contain')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="trending">
                <h1>Result for Product</h1>
                @foreach ($product as $list)
                    <div class="card" style="width: 18rem;">

                        <img src="{{ $list->image }}" class="card-img-top" alt="...">
                        <div>
                            <h2 style="text-align: center">Name: {{ $list->name }}</h2>
                            <h5 style="text-align: center">Description: {{ $list->discription }}</h5>
                        </div>
                        <div>
                            <button type="button" class='btn btn-primary'>Add To Cart</button>
                            <button type="button" class="btn btn-success">Buy Now</button>

                        </div>

                    </div>
                @endforeach
                <a href="/product">Go Back</a>
            </div>

        </div>
    </div>
@endsection
