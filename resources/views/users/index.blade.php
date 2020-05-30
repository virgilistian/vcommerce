@extends("layouts.global")

@section("title") Create New User @endsection

@section("content")
@if(session('success'))
<div class="alert alert-success">
    {{session('success')}}
</div>
@endif
<div class="row">
    <div class="col-md-6">
        <form action="/users">
            <div class="input-group mb-3">
                <input value="{{Request::get('keyword')}}" name="keyword" class="form-control col-md-10" type="text"
                    placeholder="Filter berdasarkan email" />

                <div class="input-group-append">
                    <input type="submit" value="Filter" class="btn btn-primary">
                </div>
            </div>
        </form>
    </div>
</div>
<a href="{{ route('users.create') }}" class="btn btn-outline-primary">Add New</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th><b>Name</b></th>
            <th><b>Username</b></th>
            <th><b>Email</b></th>
            <th><b>Avatar</b></th>
            <th><b>Action</b></th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->username}}</td>
            <td>{{$user->email}}</td>
            <td>
                @if($user->avatar)
                <img src="{{asset('storage/'.$user->avatar)}}" width="70px" />
                @else
                N/A
                @endif

            </td>
            <td>
                <a href="/users/{{ $user->id }}" class="btn btn-info">View</a>
                <a href="/users/{{ $user->id }}/edit" class="btn btn-primary">Edit</a>
                <form action="/users/{{ $user->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"
                        onclick="return confirm('Delete this user permanently?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection