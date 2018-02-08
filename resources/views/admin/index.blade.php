@extends('layouts.main')
@section('content')
    <h3>Welcome to admin {{Auth::user()->name}}</h3>
    <div class="col-md-12">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>User Name</th>
                    <th>User Email</th>
                    <th>Type</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($users AS $user)
                <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        @if($user->type == 1)
                            <span class="btn btn-danger">Admin</span>
                        @else
                            <span class="btn btn-primary">Agent</span>
                        @endif
                    </td>
                    @if(Auth::user()->type == 1)
                        <td><a href="{{'users/'. $user->id}}" onclick="return confirm('sure you delete this user?')" class="btn btn-danger">erase</a><a href="{{'edit/'. $user->id}}" class="btn btn-warning">edit</a></td>
                    @else
                        <td></td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop
