<?php
use App\Http\Controllers\ProductController;
$total = 0;
if (session()->has('user')) {
    $total = ProductController::cartItem();
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#">Shooping Cart</a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item ">
                            <a class="nav-link" href="/product">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/order">Orders</a>
                        </li>
                    </ul>
                    <form action="search" class="form-inline mr-5">
                        <input name="query" class="form-control  mr-sm-2" type="text" placeholder="Search"
                            aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                    <ul class="navbar-nav navber-right">
                        <li class="nav-item ">
                            <a class="nav-link" href="cartList">cart({{ $total }})</a>
                        </li>
                        @if (session()->has('user'))
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Session::get('user')['name'] }}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/logout">Logout</a>
                                </div>
                            </li>
                        @else
                            <a class="nav-link" href="/">Login</a>
                        @endif
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>
