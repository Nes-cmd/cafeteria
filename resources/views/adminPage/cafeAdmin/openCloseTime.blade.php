@extends('layouts.oldapp')

@section('title') የመክፈቻና መዝጊያ ሰዐት መሙያ @endsection

@section('content') 
 
<div class="container"> 
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

@endsection