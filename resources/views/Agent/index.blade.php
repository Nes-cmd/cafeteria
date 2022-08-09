@extends('layouts.oldapp')
@section('title')ዋርካ ኦንላይን ማዘዣ @endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Agents</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                
                                <th scope="col" width="25%">Name</th>
                                <th scope="col" width="25%">Phone</th>
                                <th scope="col" width="25%">User_id</th>
                                <th scope="col" width="25%">Bank Acc</th>
                                <th scope="col" width="25%">Status</th>
                                <th scope="col" class="col-md-8">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($agents as $agent)
                            <tr>
                                <td scope="row" width="25%">{{ $agent->name }}</td>
                                <td scope="row" width="25%">{{$agent->telephone}}</td>
                                <td scope="row" width="25%">{{$agent->user_id }}</td>
                                <td scope="row" width="25%">{{$agent->bank_account }}</td>
                                <td scope="row" width="25%">Paid<input type="checkbox" name="status" onclick="SwitchToggle('{{$agent->id}}', 'agent_user', 'status');" @if($agent->status) checked="true" @endif></td>
                                <td>
                                    <button class="btn btn-danger" onclick="deleteAny('{{$agent->id}}', 'agent_user');">Delete</button>
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
