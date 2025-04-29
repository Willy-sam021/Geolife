@extends('userdashboard/dash_layout')

@section('table')

<div class="container-fluid pt-4 px-4" style='min-height:500px'>

    <div class="row mt-md-4" >
        <div class="col-md-7 bg-dark shadow rounded-5 offset-md-2">
            <h4 class='text-center m-3 text-light'>Last Message</h4>
            @if(session('editsuccess'))
            <p class='alert alert-success'>{{session('editsuccess')}}</p>
            @endif
            @if(session('editerror'))
            <p class='alert alert-danger'>{{session('editerror')}}</p>
            @endif
            {{-- edit reply section --}}
            <form action="{{route('usereditReply')}}" method='post'>
                @method('put')
                @csrf

                <div>
                    <div class='mb-2'>
                        <textarea name="editreply" id="" cols="3" class='form-control' rows="5">{{$user->message}}</textarea>
                     </div>
                    <input type="hidden" value='{{$user->id}}' name="messageid">
                    <input type="hidden" value='{{$user->property->id}}' name="propid">

                    @error('editreply')
                    <p class='text-danger'>{{$message}}</p>
                    @enderror

                </div>
                <div>
                    <p class='text-end'><button class='btn btn-success'>Edit</button></p>
                </div>
            </form>
            {{-- section ends --}}
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
