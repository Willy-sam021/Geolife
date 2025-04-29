@extends('adminfile.adminlayout')
@section('content')
<div class="container">
    <div class="row">
        <div class="container-fluid pt-4 px-4">
            <div class="row  g-4" style='min-height:500px'>
                <div class="col ">
                    <div class="row">
                        <div class="col">
                            <div class=" mb-2">
                                <h6 class="mb-0 text-center ">Messages &nbsp;<span class='badge bg-success'>{{count($message)}}</span></h6>
                                {{-- <a href="">Show All</a> --}}
                            </div>
                        </div>
                    </div>


                    <div class="row ">
                        {{-- loop starts --}}
                         @foreach($message as $msg)
                         @if($msg->user->is_deleted == true)
                            @continue
                         @endif
                        <div class='col-md-3 mt-2'>
                            <div class="h-100 bg-light rounded p-4">
                                <div class="d-flex align-items-center border-bottom py-3">
                                    {{-- <img class="rounded-circle flex-shrink-0" src="img/user.jpg" alt="" style="width: 40px; height: 40px;"> --}}
                                    <div class="w-100 ms-3">
                                        <hr color='red' size='5'>
                                        <div class="d-flex w-100 justify-content-between  mb-2">
                                            <h6 class="mb-0"></h6>
                                            {{-- <small >{{ date('d-F-Y H:i:s a',strtotime($message->property->created_at))}}</small> --}}

                                        </div>
                                        {{-- {{dd($msg->message)}} --}}

                                        <h6>{{$msg->user->firstname}} {{$msg->user->lastname}}</h6>


                                        <p class='text-end mt-1'><a href="{{route('adminAllMsg',['id'=>$msg->user->id])}}"class='btn btn-success btn-sm m-2'>view</a></p>
                                        <hr color='red' size='5'>
                                    </div>
                                </div>
                            </div>
                            <hr color='red' size='5'>
                        </div>

                     @endforeach

                     {{-- Loop ends --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
