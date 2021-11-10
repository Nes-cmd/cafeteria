@extends('layouts.oldapp')
@section('title') Setting @endsection
@section('content')

<div class="container">
    <div class="row justify-content-center">
	    <div class="col-md-8">
	        <div class="card">
	            <div class="card-header">Customize Card on your seat here</div>
	                <div class="card-body">
						<form method="POST" action="{{ route('generate.table.download') }}">
							@csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">How may table do you have</label>

                                <div class="col-md-6">
                                    <input id="number_of_table" type="number" class="form-control @error('number_of_table') is-invalid @enderror" name="number_of_table" value="{{ old('number_of_table')}}" required autocomplete="number_of_table" placeholder="በአጠቃላይ ስንት ጠረጴዛ(table) አለዎት?">
                                    @error('number_of_table')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Language</label>
                                <div class="col-md-6">
                                    <select id="language"  class="form-control" name="language" value="{{ old('language')}}" required autocomplete="language" autofocus>
                                        <option value="amharic">አማርኛ</option>
                                        <option value="english">English</option>
                                        <option value="oromiya">Afaan Oromo</option>
                                    </select>
                                </div>
                            </div>		
                            
                            <div class="form-group row mb-0">
                                <div class="col-md-10 offset-md-5">
                                    <input type="submit" name="submit" class="btn-primary" value="Generate Now">
                                </div>
                            </div>
                        </form>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection