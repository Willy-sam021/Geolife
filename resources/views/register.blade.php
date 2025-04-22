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
                        <h4 class='text-center'>Register</h4>
                        @if(session('regsuccess'))
                            <p class="alert alert-success">{{session('regsuccess')}}</p>
                        @endif
                        @if(session('regfailure'))
                        <p class="alert alert-danger">{{session('regfailure')}}</p>
                        @endif

                        <form action='{{route('register.store')}}' method='post'>
                            @csrf
                            <div class='row mb-3 mt-3'>
                                <div class=" col-md-6">
                                    <div class="form-floating ">
                                        <input type="text" class="form-control" value="{{old('fname')}}" name='fname' id="fname" placeholder="first name">
                                        <label >Firstname</label>
                                    @error('fname')
                                    <p class='text-danger'>{{$message}}</p>
                                    @enderror
                                    </div>
                               </div>
                               <div class="col-md-6">
                                    <div class="form-floating ">
                                        <input type="text" class="form-control" value="{{old('lname')}}" name='lname' id="lname" placeholder="last name">
                                        <label >Lastname</label>
                                    @error('lname')
                                        <p class='text-danger'>{{$message}}</p>
                                    @enderror
                                    </div>
                                </div>
                            </div>
                            <div class='row mb-3'>
                                <div class=" col-md-6">
                                    <div class="form-floating ">
                                        <input type="email" class="form-control" value="{{old('email')}}" name='email'id="email" placeholder="Email">
                                        <label >Email</label>
                                    @error('email')
                                        <p class='text-danger'>{{$message}}</p>
                                    @enderror
                                    </div>
                               </div>
                               <div class="col-md-6">
                                    <div class="form-floating ">
                                        <input type="text" class="form-control" value="{{old('phone')}}" name='phone' id="phone" placeholder="Phone">
                                        <label >Phone </label>
                                    @error('phone')
                                        <p class='text-danger'>{{$message}}</p>
                                    @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row  mb-3">
                                <div class="form-group col-md-12">
                                    <div class='form-floating'>
                                        <input type="text" class="form-control" name='address' value="{{old('address')}}" id="inputAddress" placeholder="Address">
                                        <label for="inputAddress">Address</label>
                                    @error('address')
                                        <p class='text-danger'>{{$message}}</p>
                                    @enderror
                                    </div>
                                 </div>
                            </div>


                            <div class='row mb-3'>
                                <div class=" col-md-6">
                                    <div class="form-floating ">
                                        <input type="password" class="form-control" name='password'id="pass1" placeholder="password">
                                        <label >Password</label>
                                    @error('password')

                                     <p class='text-danger'>{{$message}}</p>
                                    @enderror
                                    </div>
                               </div>
                               <div class="col-md-6">
                                    <div class="form-floating ">
                                        <input type="password" class="form-control" name='password_confirmation' id="pass2" placeholder="confirm password">
                                        <label >Confirm password</label>
                                    @error('password_confirmation')
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
