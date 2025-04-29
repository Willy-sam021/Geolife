@extends('adminfile/adminlayout')

@section('content')
{{-- {{dd($usermsg)}} --}}
<div class="container-fluid pt-4 px-4">
    <div class="row g-4" style='min-height:500px'>
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">All Messages</h6>
                <div class="table-responsive">
                    <table class="table" id='dashtable'>
                         {{-- {{dd($allmsg)}}  --}}
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Property Name</th>
                                <th scope="col">Property image</th>
                                <th scope="col">property location</th>
                                <th scope="col">action</th>

                            </tr>
                        </thead>
                        <tbody>
                            {{-- loop starts --}}
                            @foreach($allmsg as $user)
                            {{-- {{dd($allmsg)}} --}}
                            <tr>
                                {{-- {{dd($allmsg)}} --}}
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$user->property->name}}</td>
                                <td><img src="{{asset('uploads/'.$user->property->image)}}" width='100px' alt=""></td>
                                <td>{{$user->property->location}}</td>
                                {{-- {{dd($allmsg)}} --}}

                                <td><a href="{{route('admin_view.Msg',["propid"=>$user->property->id])}}" class='btn btn-success'>view message</a></td>
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
