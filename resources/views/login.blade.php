@extends ('layout')


@section('call_to_action')
<div class="container-xxl py-5">
    <div class="container">
        <div class="bg-light rounded p-3">
            <div class="bg-white rounded p-4" style="border: 1px dashed rgba(0, 185, 142, .3)">
                <div class="row ">
                    <div class="col-lg-6 mt-md-5 wow fadeIn" data-wow-delay="0.1s">
                        <img class="img-fluid rounded" width='100%' height='100%'src="img/call-to-action.jpg" alt="">
                    </div>
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                        <h4 class='text-center'>Login</h4>
                        @if(session('regsuccess'))
                            <p class="alert alert-success">{{session('regsuccess')}}</p>
                        @endif
                        @if(session('regfailure'))
                        <p class="alert alert-danger">{{session('regfailure')}}</p>
                        @endif

                        <form action='{{route('login.store')}}' method='post'>
                            @csrf

                            <div class='row mb-3 mt-3'>
                                <div class=" col-md-12 mb-4">
                                    <div class="form-floating ">
                                        <input type="email" class="form-control" value="{{old('email')}}" name='email'id="email" placeholder="Email">
                                        <label >Email</label>
                                    @error('email')
                                        <p class='text-danger'>{{$message}}</p>
                                    @enderror
                                    </div>
                               </div>
                               <div class=" col-md-12">
                                    <div class="form-floating ">
                                        <input type="password" class="form-control" name='password'id="pass1" placeholder="password">
                                        <label >Password</label>
                                @error('password')
                                        <p class='text-danger'>{{$message}}</p>
                                @enderror
                                    </div>
                                </div>
                            </div>
                            <div class='row'>
                                <div class="col">
                                    <button type="submit" class="btn btn-primary col-12">Sign in</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
