@extends('layouts.main')

@section('content')
<h2>Create new Agent</h2>
<form method="POST" action="{{route('create-agent')}}">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name"  placeholder="Enter Name">
    </div>  
    <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" id="email" name="email"  placeholder="Enter email">
    </div>
        <div class="form-group">
        <label for="telephone">Phone</label>
        <input type="text" class="form-control" id="phone" name="phone"  placeholder="Enter phone">
    </div>  
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
    </div>
    <div class="form-group">
        <label for="password_confirmation">Password confirmation</label>
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@stop
