@extends('layouts.oldapp')
@section('title') Setting @endsection
@section('content')

<div class="container">
    <div class="row justify-content-center">
	    <div class="col-md-8">
	        <div class="card">
	            <div class="card-header">Fill your printers information</div>
	                <div class="card-body">
						<form method="POST" action="{{ route('setting.addPrinter.store') }}">
							@csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Name of printer</label>

                                <div class="col-md-6">
                                    <input id="printer_name" type="text" class="form-control @error('printer_name') is-invalid @enderror" name="printer_name" value="{{ old('name')}}" required autocomplete="name" autofocus>
                                    @error('printer_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Name of Operator</label>
                                <div class="col-md-6">
                                    <select id="operator"  class="form-control" name="operator" value="{{ old('operator')}}" required autocomplete="name" autofocus>
                                        <option value="">Please choose</option>
                                        <option value="windows">windows</option>
                                        <option value="cups">cups</option>
                                        <option value="network">network</option>
                                    </select>
                                </div>
                            </div>		
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Purpose of Printer</label>
                                <div class="col-md-6">
                                    <select id="purpose"  class="form-control" name="purpose" value="{{ old('purpose')}}" required autocomplete="name" autofocus>
                                        <option value="">Please choose</option>
                                        <option value="real_receit">To print real receit</option>
                                        <option value="notify_orders">To notify orders</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Connector Port</label>
                                <div class="col-md-6">
                                    <input id="connector_port" type="text" class="form-control @error('connector_port') is-invalid @enderror" name="connector_port" value="{{ old('connector_port')}}" autocomplete="connector_port" autofocus placeholder="If your connector type is Network fill its port here">
                                    @error('connector_port')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-10 offset-md-5">
                                    <input type="submit" name="submit" class="btn-primary" value="Save printer">
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