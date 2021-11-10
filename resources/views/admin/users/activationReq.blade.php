@extends('layouts.oldapp')
@section('title')ዋርካ ኦንላይን ማዘዣ Activation requests @endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">User reruests </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Telephone</th>
                            <th scope="col">Email</th>
                            <th scope="col">Bank</th>
                            <th scope="col">Target</th>
                            <th scope="col">TXN</th>
                            <th scope="col" class="col-md-8">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach($request as $req)
                        <tr>
                            <td scope="row">{{$req->id}}</td>
                            <td scope="row">{{$req->name}}</td>
                            <td scope="row">{{$req->phone}}</td>
                            <td scope="row">{{$req->email}}</td>
                            <td scope="row">{{$req->bank}}</td>
                            <td scope="row">{{$req->target}}</td>
                            <td scope="row">{{$req->txn}}</td>
                            <td > <a href="{{ route('admin.users.edit', $req->user_id)}}"><button type="button" class="btn btn-primary float-left">Edit</button></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
