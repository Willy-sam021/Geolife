@extends('adminfile/adminlayout')
@section ('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">


        <div class="col-sm-12 col-xl-6">

            <div class="bg-light rounded h-100 p-4">


                <h6 class="mb-4 text-center">Add new property</h6>
                {{-- checking for flash messages --}}
                @if(session('success'))
                <p class='alert alert-success'>{{session('success')}}</p>
                @endif
                @if(session('error'))
                <p class='alert alert-danger'>{{session('success')}}</p>
                @endif
                {{-- checking ends --}}

                {{-- form starts --}}
                <form action="{{route('admin.form')}}" method='post' enctype='multipart/form-data'>
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name='name' id="floatingInput"
                            >
                        <label for="floatingInput">Property name</label>
                        @error('name')
                        <p class='text-danger'>{{$message}}</p>

                        @enderror

                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" name='price' id="floatingInput"
                            >
                        <label for="floatingInput">Property price</label>
                        @error('price')
                        <p class='text-danger'>{{$message}}</p>

                        @enderror

                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name='address'id="floatingPassword"
                            >
                        <label for="floatingPassword">Address</label>
                        @error('address')
                        <p class='text-danger'>{{$message}}</p>

                        @enderror

                    </div>
                    <div class="form-floating mb-3">

                        <select class="form-select" name='state' id="state"
                            aria-label="Floating label select example">

                            @foreach($allstates as $state)

                            <option value="{{$state->id}}">{{$state->name}}</option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">State</label>
                        @error('state')
                        <p class='text-danger'>{{$message}}</p>

                        @enderror

                    </div>
                    <div class='form-floating'>
                        <textarea name="description" class='form-control' id="" cols="4" rows="10"></textarea>
                        <label>Description</label>
                        @error('description')
                        <p class='text-danger'>{{$message}}</p>
                        @enderror

                    </div>
                    <div class="form-floating">
                        <input type='file' name='propimage' class="form-control">
                        <label for="floatingTextarea">property image</label>
                        @error('propimage')
                        <p class='text-danger'>{{$message}}</p>

                        @enderror
                    </div>
                    <div>
                        <p class='text-center'><button class='btn col-6 btn-outline-warning btn-success mt-3'>Add</button></p>
                    </div>
                </form>
                {{-- form ends --}}
            </div>
        </div>
    </div>
</div>
@endsection
