@extends('userdashboard/dash_layout')

@section('table')
<div class="container" style='min-height:500px'>
    <div class="row" >
        <div class="col-md-7 shadow bg-dark  rounded rounded-5">
            <h4 class='text-center text-light m-md-3  '>Update Profile</h4>
            @if(session('success'))
            <p class='alert alert-success'>{{session('success')}}</p>
            @endif
            @if(session('error'))
            <p class='alert alert-danger'>{{session('error')}}</p>
            @endif
            <div>
                <form action="{{route('userUpdate')}}" method='post'>
                    @method('put')
                    @csrf
                    <div class="row mt-3">
                        <div class="col-md-6 ">
                            <div class='form-floating'>
                                <input type="text" name='firstname' class='form-control' value='{{auth()->user()->firstname}}'>
                                <label for="">Firstname</label>
                             </div>
                             @error('firstname')
                             <p class='text-danger'>{{$message}}</p>
                             @enderror
                        </div>
                        <div class="col-md-6">
                            <div class='form-floating'>
                                <input type="text" name='lastname'  class='form-control'value='{{auth()->user()->lastname}}'>
                                <label for="">Lastname</label>
                             </div>
                             @error('lastname')
                             <p class='text-danger'>{{$message}}</p>
                             @enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class='form-floating'>
                                <input type="text" name='phone' class='form-control' value='{{auth()->user()->phone}}'>
                                <label for="">Phone</label>
                             </div>
                             @error('phone')
                             <p class='text-danger'>{{$message}}</p>
                             @enderror
                        </div>
                        <div class="col-md-6">
                            <div class='form-floating'>
                                <input type="text" name='address'  class='form-control'value='{{auth()->user()->address}}'>
                                <label for="">Address</label>
                             </div>
                             @error('address')
                             <p class='text-danger'>{{$message}}</p>
                             @enderror
                        </div>
                    </div>
                    <div>
                        <p class='text-center mt-2'><button class='btn btn-success mt-2'>Update</button></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
