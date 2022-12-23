@extends('layout')
@section('contain')
    <div class="container">
        <div class="row">
            <div> <a class="btn btn-success" href="/order">Order Now</a></div>
            @foreach ($product as $list)
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('storage/media/' . $list->image) }}" class="card-img-top" alt="...">
                    <div>
                        <h5 style="text-align: center">{{ $list->name }}</h5>
                        <h6 style="text-align: center">{{ $list->discription }}</h6>
                    </div>
                    <a class="removecart" href="cartremove/{{ $list->cart_id }}"> <button class="btn btn-danger">Remove Cart</button></a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
