@extends('layout')
@section('contain')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-sm-6 ">
                <img src="{{ asset('storage/media/' . $product->image) }}" alt="First slide">
                <div>
                    <h2>Name:{{ $product->name }}</h2>
                    <h4>Price:{{ $product->price }}₹</h4>
                    <h4>Category:{{ $product->category }}</h4>
                    <h4>Featured:{{ $product->discription }}</h4>
                </div>
                <div>
                    <form action="/cart" method="POST">
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        @csrf
                        <button type="submit" class='btn btn-primary'>Add To Cart</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
