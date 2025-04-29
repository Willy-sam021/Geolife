@extends('adminfile.adminlayout')

@section('content')
{{-- {{dd($usermsg)}} --}}
<div class="container-fluid pt-4 px-4">
    <div class="row g-4" style='min-height:500px'>
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">All Messages</h6>
                <div class="table-responsive">
                    <table class="table" id='dashtable'>
                         {{-- {{dd($usermsg)}} --}}
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">prospective buyer</th>
                                <th scope="col">phone number</th>
                                <th scope="col">address</th>


                                <th scope="col">action</th>

                            </tr>
                        </thead>
                        <tbody>
                            {{-- loop starts --}}
                            @foreach($usermsg as $user)
                            {{-- {{dd($usermsg)}} --}}
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$user->user->firstname}}   {{$user->user->lastname}}</td>
                                <td>{{$user->user->phone}}</td>


                                <td>{{$user->user->address}}</td>

                                {{-- {{dd($user->user->id)}} --}}

                                <td><a href='{{route('admin_see',["id"=>$user->user->id, "propid"=>$user->property->id])}}' class='btn btn-success'>view message</a></td>
                            </tr>
                            @endforeach
                            {{-- loop ends --}}

                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </div>
    <div class="row mt-2">
        <div class="col">

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
