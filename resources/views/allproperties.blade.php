@extends('layout')
{{-- {{dd($allproperty)}} --}}
@section('header')
<div class="container-fluid  bg-white p-0">
    <div class="row g-0 align-items-center ">
        <div class="col-md-6 p-5 mt-lg-5">
            <h1 class="display-5 animated fadeIn mb-4">Property List</h1>
            <p class='fw-bold'>Discover Your Ideal Landscape in any state with Geolife.
             Explore a diverse selection of prime land opportunities across Lagos. Your perfect plot awaits.</p>

        </div>
        <div class="col-md-6 animated fadeIn">
            <img class="img-fluid" src="/img/land12.png"alt="">
        </div>
    </div>
</div>

@section('searchbar')
<div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
    <div class="container ">
        <div class="row g-2">
            <div class="col-md-10">
                <div class="row g-4">
                    {{-- <div class="col-md-6">
                        <input type="text" class="form-control border-0 py-3" placeholder="Search Keyword">
                    </div> --}}
                    {{-- <div class="col-md-4">
                        <select class="form-select border-0 py-3">
                            <option selected>Property Type</option>
                            <option value="1">Property Type 1</option>
                            <option value="2">Property Type 2</option>
                            <option value="3">Property Type 3</option>
                        </select>
                    </div> --}}
                    <div class="col-md-8">
                        <select class="form-select border-0 py-3">
                            <option selected>Location</option>
                            <option value="1">Location 1</option>
                            <option value="2">Location 2</option>
                            <option value="3">Location 3</option>
                        </select>
                    </div>
                    <div class="col-md-4">

                        <button class="btn btn-dark border-0 w-100 py-3">Search</button>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection

@section('property_list')
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-0 gx-5 align-items-end">
            <div class="col-lg-6">
                <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                    <h1 class="mb-3">Property Listing</h1>
                    <p class='fw-bold'>Explore our available lands</p>
                </div>
            </div>


        </div>
        <div class="tab-content">
            <div id="tab-1" class="tab-pane fade show p-0 active">
                <div class="row g-4">
                    @foreach($allproperty as $prop)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="property-item rounded overflow-hidden">
                            <div class="position-relative overflow-hidden">
                                <a href="{{route('propdeets',['id'=>$prop->id])}}"><img class="img-fluid" src="{{asset('uploads/'.$prop->image)}}" alt=""></a>
                                <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">For Sell</div>
                                {{-- <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">Appartment</div> --}}
                            </div>
                            <div class="p-4 pb-0">
                                <h5 class="text-primary mb-3">{{Number_format($prop->price)}}</h5>
                                <a class="d-block h5 mb-2" href="">{{$prop->description}}</a>
                                <p><i class="fa fa-map-marker-alt text-primary me-2"></i>{{$prop->state->name}}</p>
                            </div>

                        </div>
                    </div>
                    @endforeach

                </div>
            </div>


            {{-- end --}}
        </div>
    </div>
</div>
@endsection
