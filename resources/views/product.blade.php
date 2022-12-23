@extends('layout')
@section('contain')
    <div class="container">
        <div class="row mt-5">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div style="display: flex, justify-content:center">
                    <div class="carousel-inner">
                        @foreach ($product as $list)
                            <div class="carousel-item {{ $list->id == 11 ? 'active' : '' }}">
                                <a href="detail/{{ $list->id }}">
                                    <img class="img" src="{{ asset('storage/media/' . $list->image) }}"
                                        alt="First slide">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>{{ $list->name }}</h5>
                                        <p style="text-align: center">{{ $list->discription }}</p>
                                    </div>
                                </a>

                            </div>
                        @endforeach
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <div class="trending">
                <h1>Trending Product</h1>
                @foreach ($product as $list)
                    <div class="card" style="width: 18rem;">
                        <a href="detail/{{ $list->id }}">
                            <img src="{{ asset('storage/media/' . $list->image) }}" class="card-img-top" alt="...">
                            <div>
                                <h5 style="text-align: center">{{ $list->name }}</h5>
                            </div>
                        </a>

                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
