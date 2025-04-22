@extends('adminfile/adminlayout')

@section('content')
{{-- {{dd($usermsg)}} --}}
<div class="container-fluid pt-4 px-4">
    <div class="row g-4" style='min-height:500px'>
        <div class="col-12">
            {{-- {{dd($property)}} --}}
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">All properties</h6>
                <div class="table-responsive" >
                    <table class="table" id='dashtable'>
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Property Name</th>
                                <th scope="col">Property image</th>
                                <th scope="col">property location</th>
                                <th scope="col">property  price</th>
                                <th scope="col">action</th>

                            </tr>
                        </thead>
                        <tbody>
                            {{-- Looping of properties --}}
                            @foreach($property as $prop)
                            <tr>
                                <td></td>
                                <td>{{$prop->name}}</td>
                                <td><img src="{{asset('/uploads/'.$prop->image)}}" width='50px' alt=""></td>
                                <td>{{$prop->location}}</td>
                                <td>&#8358;{{number_format($prop->price)}}</td>
                                <td><a href="{{route('propertyDeets',['id'=>$prop->id])}}" class='btn btn-primary'>more</a></td>
                            </tr>
                            @endforeach
                            {{-- looping ends --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
{{-- Table javascript functionality --}}
<script src="/jquery-3.7.1.min.js"></script>
<script>
    $(document).ready(function(){
        let table = new DataTable('#dashtable');
    })
</script>
