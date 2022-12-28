<?php
use App\Http\Controllers\ProductController;
$total = 0;
if (session()->has('user')) {
    $total = ProductController::cartItem();
} else {
}

?>
@extends('layout')
@section('contain')
    <div class="container">
        <div class="row">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>Product</th>
                        <th>price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($product as $list)
                        <tr>
                            <td>
                                @if ($list->image == '')
                                @else
                                    <img width="50px" src="{{ asset('storage/media/' . $list->image) }}" />
                                @endif

                            </td>
                            <td>{{ $list->price }}</td>
                            <td>
                                <form action="/cartupdate/" class="d-flex" method="POST">
                                    <input type="hidden" name="product_id" value="{{ $list->id }}">
                                    @csrf
                                    <input style="width: 60px" type="number" name="qty"
                                        value="{{ $list->quantity }}">&nbsp;
                                    <button type="submit" class='btn btn-primary'>update</button>
                                </form>
                            </td>

                            <td>

                                {{ $list->quantity * $list->price }}
                            </td>

                            <td>
                                <a class="removecart" href="cartremove/{{ $list->cart_id }}"> <button
                                        class="btn btn-danger">Remove</button></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>


                <tfoot>
                    <tr>
                    <td  colspan="4" class="text-right bold">Total:        {{ $result }}</td>
                    </tr>

                    <tr>
                        <td colspan="5" class="text-right">
                            <a href="{{ url('/product') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i>
                                Continue
                                Shopping</a>
                            <a href="/order"> <button class="btn btn-success">Checkout</button></a>

                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
