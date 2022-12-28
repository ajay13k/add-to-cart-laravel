@extends('layout')
@section('contain')
    <div class="container">
        <div class="row m-5">
            <h1>Order Details</h1>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>Id</th>
                        <th>Address</th>
                        <th>Payment Method</th>
                        <th>Payment Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $list)
                        <tr>
                            <td>
                                {{ $list->id }}
                            </td>
                            <td>
                                {{ $list->address }}
                            </td>
                            <td>{{ $list->payment_method }}</td>
                            <td>
                                {{ $list->payment_status }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
