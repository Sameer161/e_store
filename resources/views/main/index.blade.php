@extends('main.body')
@section('content')

<section class="section" id="men">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-heading">
                    @foreach($catemen as $men)
                    <h2>{{ $men->name }} Latest</h2>
                    @endforeach
                    <span>Details to details is what makes Hexashop different from the other themes.</span>
                </div>
            </div>
        </div>
    </div>
    <div class="container mb-5">
        <div class="row">
            <div class="col-lg-12">
                <div class="men-item-carousel">
                    <div class="owl-men-item owl-carousel">
                        @foreach($showpr as $viewpr)
                        <div class="item">
                            <div class="thumb">
                                <div class="hover-content">
                                    <ul>
                                        <li><a href="{{ url('singleproduct/'.$viewpr->id) }}">Select</a></li>
                                       {{--  <li><a href="{{ url('') }}"><i class="fa fa-star"></i></a></li>
                                       <li><a href="{{ url('cart/'.$viewpr->id) }}"><i class="fa fa-shopping-cart"></i></a></li> --}}
                                   </ul>
                               </div>
                               <img src="{{ ('storage/app/'.$viewpr->image) }}">
                           </div>
                           <div class="down-content">
                            <h4>{{ ($viewpr->name) }}</h4>
                            <span>${{ ($viewpr->price) }}</span>
                            <ul class="stars">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                            </ul>
                        </div>
                    </div>
                    @endforeach()
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="section-heading">
                @foreach($catewomen as $women)
                    <h2>{{ $women->name }} Latest</h2>
                    @endforeach
                <span>Details to details is what makes Hexashop different from the other themes.</span>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="men-item-carousel">
                <div class="owl-men-item owl-carousel">
                    @foreach($showwo as $viewwo)
                    <div class="item">
                        <div class="thumb">
                            <div class="hover-content">
                                <ul>
                                    <li><a href="{{ url('singleproduct/'.$viewwo->id) }}">Select</a></li>
                                    {{-- <li><a href="{{ url('') }}"><i class="fa fa-star"></i></a></li> --}}
                                    {{-- <li><a href="{{ url('cart/'.$viewwo->id) }}"><i class="fa fa-shopping-cart"></i></a></li> --}}
                                </ul>
                            </div>
                            <img src="{{ ('storage/app/'.$viewwo->image) }}">
                        </div>
                        <div class="down-content">
                            <h4>{{ ($viewwo->name) }}</h4>
                            <span>${{ ($viewwo->price) }}</span>
                            <ul class="stars">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                            </ul>
                        </div>
                    </div>
                    @endforeach()
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection()