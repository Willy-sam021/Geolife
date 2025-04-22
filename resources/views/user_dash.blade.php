@extends('userdashboard/dash_layout')

@section('table')
{{-- {{dd($usermsg)}} --}}
<div class="container-fluid pt-4 px-4">
    <div class="row g-4" style='min-height:500px'>
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">All interested properties</h6>
                <div class="table-responsive">
                    <table class="table" id='dashtable'>
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Property Name</th>
                                <th scope="col">Property image</th>
                                <th scope="col">property location</th>
                                <th scope="col">Message sent</th>
                                <th scope="col">Time sent</th>
                                <th scope="col">Reply</th>
                                <th scope="col">time replied</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($usermsg as $user)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$user->property->name}}</td>
                                <td><img src="{{asset('uploads/'.$user->property->image)}}" width='100px' alt=""></td>
                                <td>{{$user->property->location}}</td>
                                <td>{{$user->message}} <br><a href="{{route('updateReply',["id"=>$user->id])}}" class='btn btn-success'>edit</a></td>
                                <td>{{date('d/F/Y H:i:s a',strtotime($user->updated_at))}}</td>
                                @foreach($user->reply as $rep)
                                <td>{{$rep->content}}</td>
                                <td>{{date('d/F/Y H:i:s a',strtotime($rep->updated_at))}}</td>
                                @endforeach

                            </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>



</div>

@endsection
<script src="/jquery-3.7.1.min.js"></script>
<script>
    $(document).ready(function(){
        let table = new DataTable('#dashtable');
    })
</script>
