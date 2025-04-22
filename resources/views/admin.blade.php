@extends('adminfile/adminlayout')
@section ('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4" style='min-height:500px'>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-line fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2"></p>
                    <h6 class="mb-0"></h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-bar fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2"></p>
                    <h6 class="mb-0"></h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-area fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2"></p>
                    <h6 class="mb-0"></h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-pie fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2"></p>
                    <h6 class="mb-0"></h6>
                </div>
            </div>
        </div>
        {{-- view all users table --}}
        <div class="col">
            <h4>All Users</h4>
            @if(session('deletesuccess'))
            <p class='alert alert-success'>{{session('deletesuccess')}}</p>
            @endif
            @if(session('deleteerror'))
            <p class='alert alert-danger'>{{session('deleteerror')}}</p>
            @endif
            <div>
                <table class='table' id='dashtable'>
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($allusers as $user)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$user->firstname}}</td>
                            <td>{{$user->lastname}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone}}</td>
                            <td>{{$user->address}}</td>
                            <td>
                                @if($user->is_deleted == 0 )
                                <p>Active</p>
                                @else
                                <p>Not active</p>
                                @endif
                            </td>
                            <td>
                                @if($user->is_deleted ==false)
                                    <form action="{{route('deletebuyer')}}"  method='post'>
                                        @csrf
                                        @method('put')
                                    <input type="hidden" name= "userid" value="{{$user->id}}">
                                    <input type="hidden" name= "status" value="1">
                                   <button class='btn btn-danger'>deactivate </button>
                                </form>
                                @else
                                <form action="{{route('deletebuyer')}}" method='post'>
                                    @csrf
                                    @method('put')
                                <input type="hidden" name= "userid" value="{{$user->id}}">
                                <input type="hidden" name= "status" value="0">
                               <button class='btn btn-success'>activate </button>
                            </form>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- table ends --}}

</div>
@endsection

{{-- table functionality --}}
<script src="/jquery-3.7.1.min.js"></script>
<script>
    $(document).ready(function(){
        let table = new DataTable('#dashtable');
    })
</script>
