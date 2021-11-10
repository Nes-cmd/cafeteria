@extends('layouts.oldapp')
@section('title')ዋርካ ኦንላይን ማዘዣ @endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-15">
            <div class="card">
                <div class="card-header">Messages</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Phone_Number</th>
                                <th scope="col">Email</th>
                                <th scope="col" class="col-md-12">Message</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($messages as $message)
                            <tr>
                                <td scope="row">{{$message->id}}</td>
                                <td scope="row">{{$message->name}}</td>
                                <td scope="row">{{$message->phone}}</td>
                                <td scope="row">{{$message->email}}</td>
                                <td scope="row" class="col-md-12">{{$message->body}}</td>
                                <td>
                                    <label class="btn-primary float-left"><input type="checkbox"  name="Readed">Readed</label>
                                    @can('delete-users')
                                    	<button class="btn btn-danger" onclick="deleteConfirmation()">Delete</button>
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
