@extends('adminfile/adminlayout')

@section('content')

<div class="container-fluid pt-4 px-4">
    <div class="row g-4" style='min-height:500px'>
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">All Messages</h6>

                    <table class="table table-responsive" id='dashtable'>
                        <thead>
                            <tr>
                                <th scope="col">#</th>

                                <th scope="col">Message sent</th>
                                <th scope="col">Time sent</th>
                                <th scope="col">admin Reply</th>
                                <th scope="col">Time Replied</th>
                                <th scope='col'>action</th>
                            </tr>
                        </thead>
                        <tbody>

                            {{-- loop starts --}}
                            @foreach($message as $user)
                            {{-- {{dd($usermsg)}} --}}
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>


                                <td>{{$user->message}} <br></td>
                                <td>{{date('d/F/Y H:i:s a',strtotime($user->updated_at))}}</td>
                                <td>
                                    <div class="row">
                                        <div class="col">
                                            @foreach($user->reply as $rep)
                                            <p>{{$rep->content}}</p>
                                           
                                            @endforeach
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col">
                                            @foreach($user->reply as $rep)

                                            <p>{{date('d/F/Y H:i:s a',strtotime($rep->updated_at))}}</p>
                                            @endforeach
                                        </div>
                                    </div>
                                </td>
                              <td><a href="{{route('reply.Msg',["id"=>$user->id])}}" class='btn btn-success'>Reply</a></td>


                            </tr>
                            @endforeach
                            {{-- loop ends --}}

                        </tbody>
                    </table>


            </div>

        </div>

    </div>
    {{-- {{dd($message)}}
    <div class="row mt-2">
        <div class="col">
            <a href="{{route('reply.Msg',["id"=>$messge->id])}}" class='btn btn-success'>Reply</a>
        </div>
    </div> --}}



</div>

@endsection
<script src="/jquery-3.7.1.min.js"></script>
<script>
    $(document).ready(function(){
        let table = new DataTable('#dashtable');
    })
</script>
