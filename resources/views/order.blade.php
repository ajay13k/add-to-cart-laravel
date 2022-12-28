@extends('layout')
@section('contain')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-6">
                <table class="table">
                    <tbody>
                        <tr>
                            <td>Tax</td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <td>Delivery Charge</td>
                            <td>100</td>
                        </tr>
                        <tr>
                            <td>Total Amount</td>
                            <td>{{ $product + 100 }}</td>
                        </tr>
                    </tbody>
                </table>
                <form method="POST" action="orderplace">
                    @csrf
                    <div class="form-group">
                        <textarea placeholder="enter your address" name="address" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Payment Method</label><br>
                        <input name="payment" value="cash" type="radio">
                        <label for="css">Cash On Delivery</label><br>
                    </div>
                    <button type="submit" class="btn btn-primary">Order Now</button>
                </form>
            </div>
        </div>
    </div>
@endsection
