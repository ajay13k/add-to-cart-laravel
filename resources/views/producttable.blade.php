@extends('adminlayout');
@section('container')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Product Table</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>

    <body>
        <h1 style="padding-top:20px">Product Table</h1>

        {{ session('message') }}

        <a style="float:right;padding:20px;margin-right:60px" href="/addproduct"><button type="button"
                class="btn btn-success">Add Product</button></a>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>price</th>
                    <th>Category</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $list)
                    <tr>
                        <td>{{ $list->id }}</td>
                        <td>{{ $list->name }}</td>
                        <td>{{ $list->price }}</td>
                        <td>{{ $list->category }}</td>
                        <td>
                            @if ($list->image == '')
                            @else
                                <img width="100px" src="{{ asset('storage/media/' . $list->image) }}" />
                            @endif

                        </td>
                        <td>
                            <a href="/editproduct/{{ $list->id }}"><button type="button"
                                    class="btn btn-btn btn-primary">Edit</button></a>
                            <a href="/delete/{{ $list->id }}"><button type="button"
                                    class="btn btn-danger">Delete</button></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>


    </body>.

    </html>
@endsection
