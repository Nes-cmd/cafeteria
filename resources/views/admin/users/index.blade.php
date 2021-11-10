@extends('layouts.oldapp')
@section('title')ዋርካ ኦንላይን ማዘዣ @endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Users</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Last name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Roles</th>
                                <th scope="col" class="col-md-8">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td scope="row">{{$user->id}}</td>
                                <td scope="row">{{$user->Fname}}</td>
                                <td scope="row">{{$user->Lname}}</td>
                                <td scope="row">{{$user->email}}</td>
                                <td scope="row">{{implode(', ', $user->roles()->get()->pluck('name')->toArray())}}</td>
                                <td>
                                    <a href="{{ route('admin.users.edit', $user->id)}}"><button type="button" class="btn btn-primary float-left">Edit</button></a>
                                    @can('delete-users')
                                        <button class="btn btn-danger" onclick="deleteAny('{{$user->id}}', 'users')">Delete</button>
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
</div>
@endsection
