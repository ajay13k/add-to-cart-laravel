<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    {{ View::make('header') }}
    @yield('contain')
    {{ View::make('footer') }}
</body>
<script></script>
<style>
    .img {
        height: 400px !important;
        width: 600px;
        margin-left: 280px;
    }

    .card {
        margin: 20px;
        float: left;
        width: 33.33%;
    }

    .removecart {
        text-align: center
    }

    .bg-primary {
        background-color: #cccccc !important;

    }

    .text-white {
        color: black !important;
    }
    .price_name{
        list-style: none;
        color: black;

    }
</style>

</html>
