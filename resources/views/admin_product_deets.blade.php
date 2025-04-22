@extends('adminfile/adminlayout')

@section('content')
{{-- {{dd($usermsg)}} --}}
<div class="container-fluid pt-4 px-4">
    <div class="row g-4" style='min-height:500px'>
        <div class="col-12">
            {{-- {{dd($property)}} --}}
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Property detail</h6>
                @if(session('deletesuccess'))
                <p class='alert alert-success'>{{session('deletesuccess')}}</p>
                @endif
                @if(session('deleteerror'))
                <p class='alert alert-danger'>{{session('deleteerror')}}</p>
                @endif
                <div class="table-responsive">
                    <table class="table" id='dashtable'>
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Property Name</th>
                                <th scope="col">Property image</th>
                                <th scope="col">property location</th>
                                <th scope="col">property  price</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td>{{$property->name}}</td>
                                <td><img src="{{asset('/uploads/'.$property->image)}}" width='50px' alt=""></td>
                                <td>{{$property->location}}</td>
                                <td>{{$property->price}}</td>
                                <td>{{$property->is_active}}</td>
                                {{-- updating status logic --}}
                                <td>
                                    @if($property->is_active =='active')
                                        <form action="{{route('deleteproperty')}}"  method='post'>
                                            @csrf
                                            @method('put')
                                        <input type="hidden" name= "propid" value="{{$property->id}}">
                                        <input type="hidden" name= "status" value="inactive">
                                       <button class='btn btn-danger'>deactivate </button>
                                    </form>
                                    @else
                                    <form action="{{route('deleteproperty')}}" method='post'>
                                        @csrf
                                        @method('put')
                                    <input type="hidden" name= "propid" value="{{$property->id}}">
                                    <input type="hidden" name= "status" value="active">
                                   <button class='btn btn-success'>activate </button>
                                </form>
                                    @endif
                                </td>
                                {{-- logic ends --}}
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- propery update by admin --}}
        <div class="col-md-8 offset-md-2 shadow-lg rounded rounded-5">
            @if($errors->any())
            @foreach($errors->all() as $err)
            <p>{{$err}}</p>
            @endforeach
            @endif
            @if(session('propupdate'))
            <p class='alert alert-success'>{{session('propupdate')}}</p>
            @endif
            @if(session('propupdateerror'))
            <p class='alert alert-danger'>{{session('propupdateerror')}}</p>
            @endif
            <h4 class='text-center m-2'>Update Property</h4>
            <form action="{{route('propertyUpdate')}}" method='post' enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class='mb-3'>
                    <label>Property Name</label>
                    <input type="text" name='name' class='form-control' value={{$property->name}}>
                </div>
                <div class='mb-3'>
                    <label >Location</label>
                    <input type="text" name='location' class='form-control' value={{$property->location}}>
                </div>
                <div class='mb-3'>
                    <label >Price</label>
                    <input type="text" name='price' class='form-control' value={{$property->price}}>
                </div>
                <div class='mb-3'>
                    <label >State</label>
                        <select name="state" class='form-select'>
                            @foreach($state as $sta)
                                <option value="{{$sta->id}}">{{$sta->name}}</option>
                            @endforeach
                        </select>
                </div>
                <div class='mb-3'>
                    <label >Description</label>
                    <textarea name="description"  cols="3" class='form-control' rows="5">{{$property->description}}</textarea>
                </div>
                <div class='mb-3'>
                    <label >Upload property image</label>
                    <input type="file" name='image' class='form-control'>
                </div>
                <div class='mb-3'>
                    <label >Choose Status</label>
                        <select name="activity" class='form-select'>
                            @if($property->is_active =='active')
                                <option value="active" selected>active</option>
                                <option value="inactive">inactive</option>
                            @else
                                <option value="inactive" selected>inactive</option>
                                <option value="active">active</option>
                            @endif

                        </select>
                </div>
                <div class='mb-3'>
                    <input type="hidden" name='propid' value='{{$property->id}}'>
                </div>
                <p class='text-center mt-2'><button class='btn  btn-success'>update</button></p>
            </form>
        </div>
    </div>
</div>
{{-- update ends --}}
@endsection
{{-- table functionality starts --}}
<script src="/jquery-3.7.1.min.js"></script>
<script>
    $(document).ready(function(){
        let table = new DataTable('#dashtable');
    })
</script>
