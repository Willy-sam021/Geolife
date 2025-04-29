@extends('layout')
@section('header')
<div class="container-fluid header bg-white p-0">
    {{-- hero section --}}
    <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
        <div class="col-md-6 p-5 mt-lg-5">
            <h1 class="display-5 animated fadeIn mb-4">Property Details</h1>
            <p class='fw-bold'>Unlock Your Land Potential with Geolife.
                Find exceptional land listings in all states to build your dreams, invest wisely, and secure your future.
            </p>
        </div>
        <div class="col-md-6 animated fadeIn">
            <img class="img-fluid" src="/img/land20.png" alt="">
        </div>
    </div>
</div>
{{-- hero section ends --}}
@endsection

@section('call_to_action')
<div class="container-xxl py-5">
    <div class="container">
        <div class="bg-light rounded p-3">
            <div class="bg-white rounded p-4" style="border: 1px dashed rgba(0, 185, 142, .3)">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                        <img class="img-fluid rounded w-100" src="{{asset('uploads/'.$details->image)}}" alt="">
                    </div>
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">

                            @error('message')
                            <p class='text-danger'>{{$message}}</p>
                            @enderror

                                <form>
                                    <div class='mb-2'>
                                        <label>Property name</label>
                                        <input type="text" class='form-control' readonly value='{{$details->name}}'>
                                    </div>
                                    <div><label >Price</label>
                                        <div class='mb-2 input-group'>

                                            <span class='input-group-text'>&#8358;</span>
                                            <input type="text" class='form-control'readonly value="{{number_format($details->price)}}">
                                        </div>
                                    </div>
                                    <div class='mb-2 card'>
                                        <label class='fw-bold'>Description</label>
                                        <p>{{$details->description}}</p>
                                    </div>
                                    <div class='mb-2 card'>
                                        <label class='fw-bold'>Address</label>
                                        <p >{{$details->location}}</p>
                                    </div>
                                    <div class='mb-2'>
                                        <label>State</label>
                                        <input type="text" class='form-control' readonly value='{{$details->state->name}}'>
                                    </div>

                                </form>

                        <p class='small text-danger'>Please click the button and drop a message if interested,stating if you agree with the price or not. Also do well to check your dashboard you'll be contacted shortly</p>
                        <button class="btn btn-primary py-3 px-4 me-2" id='trigger'><i class="fa fa-phone-alt me-2"></i>interested</button>
                    </div>
                </div>
                 {{-- interest section --}}
                <div class="row mt-1">
                    <div class="col">
                        @if(session('success'))
                        <p class='alert alert-success'>{{session('success')}}</p>
                        @endif
                        @if(session('error'))
                        <p class='alert alert-danger'>{{session('error')}}</p>
                        @endif

                        <div id='hide' class='mt-3 ' style='display:none'>
                            <div>
                                <form action="{{route('user.interest')}}" method="post">
                                @csrf
                                    <textarea name="message" id="" cols="5"  class='form-control border border-dark border-3' rows="5"></textarea>
                                    <input type="hidden" name='userid' value='{{auth()->user()->id}}'>
                                    <input type="hidden" name='propertyid' value="{{$details->id}}">
                                    <p class='text-center'><button class='btn btn-primary mt-2 p-3 col-4'  id='trigger2'>Send</button></p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

<script src="/jquery-3.7.1.min.js"></script>
<script>
    $(document).ready(function(){
        $('#trigger').click(function(){
            $('#hide').show()
        })

        $('#trigger2').click(function(){
            $('#hide').hide()
        })
    })
</script>
{{-- {{dd($details)}} --}}
