@extends('layouts.oldapp')
@section('title')ዋርካ ኦንላይን ማዘዣ @endsection
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Upload Here</div>
                <div class="card-body">
                   <form method="post" action="{{ route('file.upload') }}" enctype="multipart/form-data">
                   	   @csrf
                   	   <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" required="" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="File name to be">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">Details</label>

                            <div class="col-md-6">
                                <input  type="text" class="form-control @error('detail') is-invalid @enderror" name="detail" placeholder="Details here">

                                @error('detail')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">File</label>

                            <div class="col-md-6">
                                <input  type="file" required="" class="form-control @error('name') is-invalid @enderror" name="file" >

                                @error('file')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <dir class="form-group">
                           
                            <dir class="col-md-6">
                                <input class="btn btn-primary" type="submit" class="form-control" name="file" value="Upload" >
                            </dir>
                        </dir>
                   </form>
                </div>
        </div>
    </div>
</div>
@endsection