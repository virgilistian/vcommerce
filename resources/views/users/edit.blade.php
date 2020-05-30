@extends('layouts.global')

@section('title')
Edit User
@endsection

@section('content')
<div class="col-md-8">

    <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="/users/{{ $user->id }}" method="POST">

        @csrf
        @method('PUT')

        <label for="name">Name</label>
        <input class="form-control" placeholder="Full Name" type="text" name="name" id="name"
            value="{{ $user->name }}" />
        <br>

        <label for="username">Username</label>
        <input class="form-control" placeholder="username" type="text" name="username" id="username"
            value="{{ $user->username }}" readonly />
        <br>

        <label for="">Roles</label>
        <br>
        <input type="checkbox" name="roles[]" id="ADMIN" value="ADMIN"
            {{ in_array('ADMIN', json_decode($user->roles)) ? 'checked' : '' }}>
        <label for="ADMIN">Administrator</label>

        <input type="checkbox" name="roles[]" id="STAFF" value="STAFF"
            {{ in_array('STAFF', json_decode($user->roles)) ? 'checked' : '' }}>
        <label for="STAFF">Staff</label>

        <input type="checkbox" name="roles[]" id="CUSTOMER" value="CUSTOMER"
            {{ in_array('CUSTOMER', json_decode($user->roles)) ? 'checked' : '' }}>
        <label for="CUSTOMER">Customer</label>
        <br>

        <br>
        <label for="phone">Phone number</label>
        <br>
        <input type="text" name="phone" class="form-control" value="{{ $user->phone }}">

        <br>
        <label for="address">Address</label>
        <textarea name="address" id="address" class="form-control">{{ $user->address }}</textarea>

        <br>

        <label for="avatar">Avatar image</label>
        <br>
        Current avatar: <br>
        @if($user->avatar)
        <img src="{{asset('storage/'.$user->avatar)}}" width="120px" />
        <br>
        @else
        No avatar
        @endif
        <br>
        <label for="avatar">Avatar image</label>
        <br>
        <input id="avatar" name="avatar" type="file" class="form-control">
        <small class="text-muted">Kosongkan jika tidak ingin mengubah avatar</small>
        <hr class="my-3">

        <label for="email">Email</label>
        <input class="form-control" placeholder="user@mail.com" type="text" name="email" id="email"
            value="{{ $user->email }}" readonly />
        <br>
        <label for="">Status</label>
        <br />
        <input {{$user->status == "ACTIVE" ? "checked" : ""}} value="ACTIVE" type="radio" class="form-control"
            id="active" name="status">
        <label for="active">Active</label>

        <input {{$user->status == "INACTIVE" ? "checked" : ""}} value="INACTIVE" type="radio" class="form-control"
            id="inactive" name="status">
        <label for="inactive">Inactive</label>
        <br><br>

        <input class="btn btn-primary" type="submit" value="Save" />
    </form>
</div>
@endsection