@extends('layouts.main')

@section('content')
<h2>Edit user <span style="color:red;">{{$user->name }}</span></h2>
<form method="post" action="{{route('update-agent')}}">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}" placeholder="Enter Name">
    </div>
    <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}" placeholder="Enter email">
    </div>
        <div class="form-group">
        <label for="telephone">Phone</label>
        <input type="text" class="form-control" id="phone" name="phone"  value="{{$user->phone}}" placeholder="Enter phone">
    </div>
    <div class="form-group">
        <select class=""  name="type">
            <option value="1">Admin</option>
            <option value="2">Agent</option>
        </select>
    </div>
    <input type="hidden" name="id" value="{{$user->id}}">
    <button type="submit" class="btn btn-primary">Edit </button>
</form>
@stop
