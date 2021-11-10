@extends('layouts.oldapp')
@section('title')ዋርካ ኦንላይን ማዘዣ @endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Available dowloads</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" width="5%">Name</th>
                                <th scope="col">Details</th>
                                <th scope="col">Size</th>
                                <th scope="col" class="col-md-8">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($downloads as $download)
                            <tr>
                                <td scope="row" width="5%">{{$download->name}}</td>
                                <td scope="row">{{$download->detail}}</td>
                                <td scope="row">{{ number_format($download->size / (1024*1024), 2).'MB' }}</td>
                                <td><a class="btn btn-primary" href="{{'/mystorage/'.$download->url}}" download="{{$download->name}}">Download now</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
</div>
@endsection
