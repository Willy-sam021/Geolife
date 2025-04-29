@extends('adminfile.adminlayout')
@section('content')
    {{-- {{dd($message)}} --}}
    <div class="container">
        <div class="bg-light rounded p-3">
            <div class="bg-white rounded p-4" style="border: 1px dashed rgba(0, 185, 142, .3)">
                <div class="row">
                    <div class="col">
                        <h3 class='text-center'>Send Your Reply</h3>
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
                {{-- reply section --}}
                <div class="row g-5 align-items-center">
                    <div class="col-md-5 " >

                        <img class="img-fluid rounded w-100" src="{{asset('uploads/'.$message->property->image)}}" alt="">
                    </div>
                    <div class="col-md-7 ">

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
                        </div>


                    </div>
                </div>
                <div class="row">
                    <div class="col shadow">
                        {{-- reply text area starts --}}
                        <div>
                            <form action="{{route('sendReply.Msg')}}" method='post'>
                                @csrf
                                <div>
                                    <p class='text-danger'>Type your reply here</p>
                                    <textarea name="reply" id="reply" cols="3" rows="5" class='form-control'></textarea>
                                @error('reply')
                                <p class='text-danger'>{{$message}}</p>
                                @enderror
                                </div>
                                     <input type="hidden" value='{{$message->id}}' name='messageid'>
                                <div>

                                    <p class='text-center mt-2'><button class="btn btn-success rounded-0 py-3 px-4">Reply</button></p>
                                </div>
                            </form>
                        </div>
                        {{-- reply text area ends --}}

                    </div>
                </div>
                {{-- reply section ends --}}

                {{-- edit reply section starts --}}
                <div class="row mt-md-4">
                    <div class="col-md-7 bg-dark shadow rounded-5 offset-md-2">
                        <h4 class='text-center m-3 text-light'>Edit reply</h4>
                        @if(session('editsuccess'))
                        <p class='alert alert-success'>{{session('editsuccess')}}</p>
                        @endif
                        @if(session('editerror'))
                        <p class='alert alert-danger'>{{session('editerror')}}</p>
                        @endif

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
                {{-- edit reply section ends --}}
            </div>
        </div>
    </div>

@endsection
