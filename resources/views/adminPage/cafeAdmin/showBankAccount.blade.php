 @extends('layouts.oldapp')

@section('title') Account-Activation Process @endsection

@section('content') 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thankyou choosing us</div>

                    <div class="card-body">
                
    					<strong> እባክዎ 5,500ብር በዚ አካውንት ይላኩና በመቀጠልም ይህን ፎርም ይሙሉ!</strong><br>
    					<strong style="color: green">የኢትዮጵያ ንግድ ባንክ(CBE) {{ $data }} Nesru Sadik</strong><br>

                        <form action="{{ route('customer.activate.confirm')}}" method="POST">
                            @csrf
                            
                            <div class="form-group row">
                                <label for="name" class="col-md-2 col-form-label text-md-right">Transaction</label>

                                <div class="col-md-8">
                                    <input class="form-control @error('name') is-invalid @enderror" type="text" name="txn" value="{{ old('txn') }}" required="true">

                                    @error('txn')
                                        <p style="color: red">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        	<div class="form-group row">
                                <label for="email" class="col-md-2 col-form-label text-md-right">Sender name</label>

                                <div class="col-md-8">
                                    <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name') }}" required="true">

                                    @error('name')
                                        <p style="color: red">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-2 col-form-label text-md-right">Telephone</label>

                                <div class="col-md-8">
                                    <input class="form-control @error('name') is-invalid @enderror" type="text" name="phone" value="{{ old('phone') }}" placeholder="ይህ ቁጥር ትዕዛዝ ባኖሩበት ጊዜ ከሞሉት ጋር መመሳሰል አለበት!" required="true">

                                    @error('phone')
                                        <p style="color: red">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row text-center">
                                <input type="submit" class="btn btn-primary" name="send" value="send">
                            </div>
                           </form>
                      </div>
                  </div>
                
            </div>
        </div>
    </div>
</div>


@endsection