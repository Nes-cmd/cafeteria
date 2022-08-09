@extends('layouts.oldapp')
 
@section('title') Setting @endsection

@section('content')

<div class="container">
  <button type="button" class="btn btn-primary col-md-4" data-toggle="collapse" data-target="#open-setting">Opening Time Settings</button>
	  <div id="open-setting" class="collapse">
	    <div class="row justify-content-center">
	        <div class="col-md-8">
	            <div class="card">
	                <div class="card-header">የመክፈቻና መዝጊያ ሰዐት መሙያ</div>
	                
	                <div class="card-body">
	                    <form method="POST" action="{{ route('setting.open-close.save') }}">
	                        @csrf
	                        <div class="form-group row">
	                            <label for="name" class="col-md-4 col-form-label text-md-right">የመክፈቻ ሰዐት/Opening time</label>

	                            <div class="col-md-6">
	                                <input id="open" type="time" class="form-control @error('open') is-invalid @enderror" name="open" value="{{ $data[0]->open_at??'' }}" required autocomplete="name" autofocus>
	                                
	                                @error('open')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
	                                @enderror
	                            </div>
	                        </div>
	                        <div class="form-group row">
	                            <label for="close" class="col-md-4 col-form-label text-md-right">መዝጊያ ሰዐት/Closing time</label>
	                            <div class="col-md-6">
	                                <input id="close" type="time" class="form-control @error('close') is-invalid @enderror" name="close" value="{{ $data[0]->close_at??'' }}" required autocomplete="close" autofocus>

	                                @error('close')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
	                                @enderror
	                            </div>
	                        </div>
	                        <input type="submit" class="btn-primary" name="save" value="save changes">
	                    </form>
	                </div>
	            </div>
	            <div>
	            	<p>ከላይ ከተጠቀሰው ሳት ውጪ እዚህ ድርጅትዎን መክፈትና መዝጋት ይችላሉ።</p>
	            	<p>Manually open and close your organization.
	            	<label class="switch"><input type="checkbox" id="{{$data[0]->id }}" name="availables" onclick="SwitchToggle('{{$data[0]->id }}','open_close_times');" @if($data[0]->status)checked @endif ><span class="slider round"></span></label></p>
	            </div>
	            
	        </div>
	    </div>
		
    </div>
</div>
		
<br>

<div class="container">
  <button type="button" class="btn btn-primary col-md-4" data-toggle="collapse" data-target="#printer">Printer Settings</button>
	<div id="printer" class="collapse">
	  <div class="row justify-content-center">
	        <div class="col-md-8">
	            <div class="card">
	                <div class="card-header">Receit printers setting</div>
	                
	                <div class="card-body">
						<table class="table">
							<thead>
								<tr>
									<th scope="col">Printer_Name</th>
									<th scope="col">Operator_Name</th>
									<th scope="col">Purpose</th>
									<th scope="col">Status</th>
									<th scope="col" class="col-md-8">Actions</th>
								</tr>
							</thead>
							<tbody>
								@foreach($printers as $printer)
								<tr>
									<td scope="row" >{{$printer->name}}</td>
									<td scope="row" >{{$printer->operator}}</td>
									<td scope="row" >{{$printer->purpose}}</td>
									<td scope="row" ><input type="checkbox" value="on" name="printer" onclick="SwitchToggle('{{$printer->id }}','printers');"  @if( $printer->status )checked @endif ></td>
									<td scope="row" ><button class="btn btn-danger" onclick="deleteAny('{{$printer->id}}', 'printers')">Delete</button></td>
								</tr>
								@endforeach
							</tbody>
						</table>
						<button class="btn-btn secondary">@if( sizeOf( auth()->user()->printers()->get() ) < 3)<a href="{{ url('setting/addPrinter/show')}}">  @endif Add new Printer</a></button> Only lessthan 3 printer allowed
	                </div>
	            </div>
	        </div>
	    </div>
    </div>
</div>
<br>
<div class="container">
  <button type="button" class="btn btn-primary col-md-4" data-toggle="collapse" data-target="#demo">Other Settings</button>
	  <div id="demo" class="collapse">
		<ul>
			<form method="post" action="{{ route('setting.change') }}">
				@csrf
				<table>
					<thead class="thead-primary">
						<tr class="text-center">
							<th height="30" class="float-left" width="150">Name</th>
							<th height="30" width="">Descreption</th>
							<th height="30" width="">State</th>
						</tr>
					</thead>
					@foreach($settings as $setting)
					<tr>
						<td height="30" width="150">{{ $setting->name }}</td>
						<td height="30" width="">{{ $setting->descreption }}</td>
						<td height="30" width=""><label class="switch"><input id="{{ $setting->id }}" type="checkbox" name="settings[]" value="{{ $setting->id }}" @if(auth()->user()->settings->pluck('id')->contains($setting->id))checked @endif><span class="slider round"></span></label></td>
					</tr>
					@endforeach
			    </table>
				<p width="200"><input type="submit" name="submit" class="btn-primary" value="እድሳቱን ይመዝግቡ"></p>
		    </form>
		</ul>
    </div>
@endsection