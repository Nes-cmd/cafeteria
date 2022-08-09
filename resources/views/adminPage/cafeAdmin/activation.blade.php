 @extends('layouts.app')

@section('title') Account-Activation Process @endsection

@section('page_contents')
 <section class="ftco-section">
      <div class="container">
        <div class="row">
          <div class="col-xl-8 ftco-animate">
           <h3> ይህንን ለማስጀመር እባክዎ ክፍያውን ይፈፅሙ </h3>
        <form action="{{ route('customer.account.activation') }}" method="post" class="billing-form ftco-bg-dark p-3 p-md-5">
          @csrf
        	<div >
            <p style="color: rgba(155, 155, 200);">አካውንትዎ እንዲሰራ ለማድረግ ለመጀመርያ ጊዜ 5,500ብር ከዛም በየ አመቱ 3,500ብር ይከፍላሉ። ለመጀመርያ ጊዜ ሳይከፍሉ መሞከር ከፈለጉ<strong style="color: blue"> setting->free-trial mode </strong>  የሚለውን በማብራት አካውንትዎ እንዲሰራ ማድረግ ይችላሉ።</p>
           
              <label class="btn-primary col-md-6"><input type="radio" required value="cbe" name="bank"> የኢትዮጵያ ንግድ ባንክ(CBE) </label>
              <label class="btn-primary col-md-6"><input type="radio" required value="dashen" name="bank"> ዳሽን ባንክ (Dashen) </label>
              <label class="btn-primary col-md-6"><input type="radio" required value="other" name="bank"> ሌላ ባንክ (Other) </label>
               
            
            </div>
            <div class="form-group row">
                <label for="email" class="col-md-2 col-form-label text-md-right">Name</label>
                <div class="col-md-6">
                     <input type="text" name="name" required="" class="form-control" value="{{ $data != null?$data->name:old('name') }}" placeholder="ስምዎ">
                    @error('name')
                        <p style="color: red">
                            <strong>{{ $message }}</strong>
                        </p>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-md-2 col-form-label text-md-right">Phone</label>
                <div class="col-md-6">
                     <input type="text" name="phone" required="" class="form-control" value="{{ $data != null?$data->phone:old('phone') }}" placeholder="ስልክ">
                    @error('phone')
                        <p style="color: red">
                            <strong>{{ $message }}</strong>
                        </p>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-md-2 col-form-label text-md-right">Email</label>
                <div class="col-md-6">
                      <input type="email" name="email" required="" class="form-control" value="{{ $data != null?$data->email:old('email') }}" placeholder="ኢ ሜይልዎ">
                    @error('email')
                        <p style="color: red">
                            <strong>{{ $message }}</strong>
                        </p>
                    @enderror
                </div>
            </div>
          <div class="form-group row">
          <label for="country" class="col-md-2 col-form-label text-md-right"> ምክኒያት/Request for</label>
            <div class="col-md-6">
                <select  name="target" required="true" class="form-control"> 
                  <option value="{{$data != null?$data->target:''}}">እባክዎ ይምረጡ</option>
                  <option value="cafe">ካፌ/ሆቴል ለማስተዳደር For Cafe/Hotel</option>
                </select>
              </div>
          </div>
          <p  style="color: rgb(200,98,123);padding: 15px">If you are registered with help of agent,fill these</p>
          <div class="form-group row">
                <label for="email" class="col-md-2 col-form-label text-md-right">Agent Name</label>
                <div class="col-md-6">
                     <input type="text" name="agent_name"  class="form-control" value="{{ old('agent_name') }}" placeholder="Agent name">
                    @error('agent_name')
                        <p style="color: red">
                            <strong>{{ $message }}</strong>
                        </p>
                    @enderror
                </div>
            </div>
          <div class="form-group row">
                <label for="email" class="col-md-2 col-form-label text-md-right">Agent Phone</label>
                <div class="col-md-6">
                     <input type="text" name="agent_phone"  class="form-control" value="{{ old('agent_phone') }}" placeholder="Agent phone">
                    @error('agent_phone')
                        <p style="color: red">
                            <strong>{{ $message }}</strong>
                        </p>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
              <div class="col-md-6 text-center">
                <input type="submit" value="ትዕዛዝ አኑር" name="send" class="btn btn-primary py-3 px-5">
              </div>
        </div>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection