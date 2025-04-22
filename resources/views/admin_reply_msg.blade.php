@extends('adminfile.adminlayout')
@section('content')
    {{-- {{dd($message)}} --}}
    <div class="container">
        <div class="bg-light rounded p-3">
            <div class="bg-white rounded p-4" style="border: 1px dashed rgba(0, 185, 142, .3)">
                <div class="row">
                    <div class="col">
                        <h1 class='text-center'>send reply</h1>
                        @if(session('success'))
                        <p class='alert alert-success'>{{session('success')}}</p>
                        @endif
                        @if(session('error'))
                        <p class='alert alert-danger'>{{session('error')}}</p>
                        @endif
                        @error('reply')
                        <p class='alert alert-danger'>{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="row g-5 align-items-center">
                        {{-- {{dd($message->property->image)}} --}}
                    <div class="col-md-6 " >
                        <label>Property Image</label>
                        <img class="img-fluid rounded w-100" src="{{asset('uploads/'.$message->property->image)}}" alt="">
                    </div>
                    <div class="col-md-6  shadow">

                        <div class="mb-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Property name</label>
                                    <h5 class="mb-3">{{$message->property->name}}</h5>
                                </div>
                                <div class="col-md-6">
                                    <label>Property Price</label>
                                    <h5 class="mb-3">&#8358;{{number_format($message->property->price)}}.00</h5>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label>Property Location</label>
                                    <h5 class="mb-3 ">{{$message->property->location}}</h5>
                                </div>
                                <div class="col-md-6">
                                    <label>Buyer name</label>
                                    <h5 class="mb-3">{{$message->user->firstname.'  '. $message->user->lastname}}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Buyer Phone number</label>
                                    <h5 class="mb-3">{{$message->user->phone}}</h5>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col">
                                    <label >Buyer message</label>
                                    <textarea class='form-control' readonly rows="5" >{{$message->message}}</textarea>
                                </div>
                            </div>

                            {{-- <p>Eirmod sed ipsum dolor sit rebum magna erat. Tempor lorem kasd vero ipsum sit sit diam justo sed vero dolor duo.</p> --}}
                        </div>
                        <div>
                            <form action="{{route('sendReply.Msg')}}" method='post'>
                                @csrf
                                <div>
                                    <p class='text-danger'>type your reply here</p>
                                    <textarea name="reply" id="reply" cols="3" rows="5" class='form-control'></textarea>
                                @error('reply')
                                <p class='text-danger'>{{$message}}</p>
                                @enderror
                                </div>
                                     <input type="hidden" value='{{$message->id}}' name='messageid'>
                                <div>

                                    <p class='text-center mt-2'><button class="btn btn-dark rounded-0 py-3 px-4">Reply</button></p>
                                </div>
                            </form>

                        </div>


                    </div>
                </div>
                <div class="row mt-md-4">
                    <div class="col-md-7 bg-dark shadow rounded-5 offset-md-2">
                        <h4 class='text-center m-3 text-light'>Edit reply</h4>
                        @if(session('editsuccess'))
                        <p class='alert alert-success'>{{session('editsuccess')}}</p>
                        @endif
                        @if(session('editerror'))
                        <p class='alert alert-danger'>{{session('editerror')}}</p>
                        @endif
                        {{-- @if($errors->any())
                            @foreach($errors->all() as $err)
                            <p>{{$err}}</p>
                            @endforeach
                        @endif --}}
                        <form action="{{route('editReply')}}" method='post'>
                            @method('put')
                            @csrf

                            <div>
                                @foreach($message->reply as $rep)
                                <div class='mb-2'>
                                    <textarea name="editreply" id="" cols="3" class='form-control' rows="5">{{$rep->content}}</textarea>
                                 </div>
                                <input type="hidden" value='{{$message->id}}' name="messageid">
                                @error('editreply')
                                <p class='text-danger'>{{$message}}</p>
                                @enderror
                                @endforeach
                            </div>
                            <div>
                                <p class='text-end'><button class='btn btn-success'>Edit</button></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
