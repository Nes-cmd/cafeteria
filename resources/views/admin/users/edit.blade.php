@extends('layouts.oldapp')
@section('title') Edit Users @endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Users</div>
                <div class="card-body">
                    <form action="{{ route('admin.users.update',$user)}}" method="POST">
                        @csrf
                        {{ method_field('PUT')}}
                        <div class="form-group row">
                            <label for="email" class="col-md-2 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="Fname" value="{{ $user->Fname}}">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-2 col-form-label text-md-right">Last Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('Lname') is-invalid @enderror" name="Lname" value="{{ $user->Lname}}">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row" style="pa">
                            <label for="email" class="col-md-2 col-form-label text-md-right">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                        <label for="roles" class="col-md-2 col-form-label text-md-right">Roles</label>
                        <div class="col-md-6">
                        @foreach($role as $role)
                            <div class="form-ckeck">
                                <input type="checkbox" name="roles[]" value="{{$role->id}}"
                                @if($user->roles->pluck('id')->contains($role->id))checked @endif>
                                <label>{{ $role->name}}</label>
                            </div>
                           
                        @endforeach
                           </div>
                       </div>
                         <button type="submit" class="btn btn-primary">Update</button>
                       
                    </form> 

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
