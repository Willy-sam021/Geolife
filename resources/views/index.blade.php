@extends ('layout')
@section('title','Home page')
{{-- hero section --}}
@section('header')
<div class="container-fluid header bg-white p-0">
    <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
        <div class="col-md-6 p-5 mt-lg-5">
            <h1 class="display-5 animated fadeIn mb-4">Find The <span class="text-primary">Perfect Land</span> To Live With Your Family</h1>

        </div>
        <div class="col-md-6 animated fadeIn">
            @if(session('logout'))
            <p class='alert alert-success'>{{session('logout')}}</p>
            @endif
            <div class="owl-carousel header-carousel">
                <div class="owl-carousel-item">
                    <img class="img-fluid" src="{{asset('img/land8.png')}}" alt="">
                </div>
                <div class="owl-carousel-item">
                    <img class="img-fluid" src="img/land9.png" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
{{-- hero section ends --}}

{{-- about geolife overview --}}
@section('about')
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="about-img position-relative overflow-hidden p-5 pe-0">
                    <img class="img-fluid w-100" src="{{asset('img/land10.png')}}">
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <h1 class="mb-4">#1 Place To Find The Perfect Land Property</h1>
                <p class="mb-4">We are more than just a listing company; we are your partners in finding the perfect piece of land to bring your aspirations to life. We offer:</p>
                <h6>Our Differences</h6>
                <p><i class="fa fa-check text-primary me-3"></i>A carefully selected portfolio of quality land opportunities.</p>
                <p><i class="fa fa-check text-primary me-3"></i>Deep local market knowledge and insights.</p>
                <p><i class="fa fa-check text-primary me-3"></i>A passion for connecting people with the land that matters most to them.</p>
                @auth
                {{-- <a class="btn btn-primary py-3 px-5 mt-3" href="">Read More</a> --}}
                @endauth
            </div>
        </div>
    </div>
</div>
@endsection
{{-- about section ends --}}

@section('property_list')
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-0 gx-5 align-items-end">
            <div class="col-lg-6">
                <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                    <h1 class="mb-3">Property Listing</h1>
                </div>
            </div>

        </div>
        <div class="tab-content">
            <div id="tab-1" class="tab-pane fade show p-0 active">
                <div class="row g-4">
                    {{-- looping starts --}}
                    @foreach($properties as $prop)
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="property-item rounded overflow-hidden">
                                <div class="position-relative overflow-hidden">
                                    @if(auth()->check())
                                    <a href="{{route('propdeets',['id'=>$prop->id])}}"><img class='img-fluid' src="{{asset('./uploads/'.$prop->image)}}" alt=""></a>
                                    @else
                                    <img class="img-fluid " src="{{asset('./uploads/'.$prop->image)}}"  alt="">
                                    @endif
                                    <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">For Sell</div>

                                </div>
                                <div class="p-4 pb-0">
                                    <h5 class="text-primary mb-3">&#8358;{{number_format($prop->price)}}</h5>
                                    @auth
                                    <a class="d-block h5 mb-2" href="">{{$prop->description}}</a>
                                    @endauth
                                    <p><i class="fa fa-map-marker-alt text-primary me-2"></i>{{$prop->location}}</p>
                                </div>

                            </div>
                        </div>
                    @endforeach
                    {{-- looping ends --}}

                    {{-- view more button --}}
                    @auth
                    <div class='row'>
                        <div class="col">
                            <form action="{{route('user.allprop')}}" method='get'>
                                <p class='text-center mt-3 '><button class='btn btn-success p-3 btn-lg rounded-0'>View More</button></p>
                            </form>
                        </div>
                    </div>
                    @endauth
                </div>
            </div>


        </div>
    </div>
</div>
@endsection

