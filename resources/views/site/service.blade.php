@extends('site.master')
@section('titel', 'Service | ' . env('APP_NAME'))
@section('content')


    @include('site.part.services')


    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate text-center">
                    <h2 class="mb-4">Hot Meals</h2>
                    <p class="flip"><span class="deg1"></span><span class="deg2"></span><span class="deg3"></span>
                    </p>
                    <p class="mt-5">Far far away, behind the word mountains, far from the countries Vokalia and
                        Consonantia, there live the blind texts.</p>
                </div>
            </div>
            <div class="row">
                @foreach ($meals as $meal)
                    <div class="col-md-3 text-center ftco-animate">
                        <div class="menu-wrap">
                            <a href="#" class="menu-img img mb-4"
                                style="background-image: url({{ asset('uploads/meals/' . $meal->image) }});"></a>
                            <div class="text">
                                <h3><a href="#">{{ $meal->name }}</a></h3>
                                <p>{{ Str::limit($meal->description, 100, '...') }}
                                </p>
                                <p class="price"><span>${{ number_format($meal->price, 2) }}</span></p>
                                <p><a href="#" class="btn btn-white btn-outline-white">Add to cart</a></p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
@stop
