@extends('layouts.app')

@section('title')አዲስ ምርት መመዝገቢያ@endsection

@section('page_contents')

    <section class="ftco-section">
      <div class="container">
        <div class="row">
          <div class="col-xl-8 ftco-animate">
				<form method="post" action="{{ route('cafe.adminPage.store')}}" enctype="multipart/form-data" class="billing-form ftco-bg-dark p-3 p-md-5">
					{{ csrf_field() }}
					<input type="hidden" name="user_id" value="{{ Auth::user()->id}}" class="form-control" required="true">
					<h3 class="mb-4 billing-heading">ስለ ምርትዎ(ምግብዎ) ሙሉ መረጃ</h3>
	          	    <div class="row align-items-end">

	          		<div class="col-md-6">
		                <div class="form-group">
		                    <label for="firstname">የምርቱ(የምግቡ) ስም</label>
		                    <input type="text" name="item" class="form-control" value="{{ old('item') }}" required="true"  
		                    placeholder="">
		                    @error('item')
                               <p style="color: red">
			                       <strong>{{ $message }}</strong>
			                   </p>
                            @enderror
		                </div>
	                </div> 
	                <div class="col-md-6">
	                    <div class="form-group">
	                		<label for="lastname">የምርቱ(የምግቡ) ዋጋ</label>
	                    	<input type="text" name="total" class="form-control" value="{{ old('total') }}" required="true" placeholder="ዋጋው">
	                    	@error('total')
                                <p style="color: red">
		                           <strong>{{ $message }}</strong>
		                        </p>
                            @enderror
	                    </div>
                     </div>

		            <div class="w-100"></div>
		            <div class="col-md-6">
		            	<div class="form-group">
	                	<label for="streetaddress">ቀረጥ በፐርሰንት(በ%)</label>
	                  <input type="number" name="vat" class="form-control" required="true" value="15">
	                  @error('vat')
	                      <p style="color: red">
	                         <strong>{{ $message }}</strong>
	                      </p>
	                  @enderror
	                </div>
		            </div>
		            <div class="col-md-6">
		            	<div class="form-group">
		            	<label for="streetaddress">ስለ ምርትዎ ትጨማሪ የሚሉት ነገር ካለ</label>
	                  <input type="text" name="descreption" class="form-control" value="{{ old('descreption') }}" placeholder="ይህ ምግብ የተሰራው ከውጭ ባስመጣነው ...">
	                  @error('descreption')
	                  <p style="color: red">
                         <strong>{{ $message }}</strong>
                      </p>
                       @enderror
	                </div>
		            </div>
		            
                    <div class="w-100"></div>
		            <div class="col-md-6">
		            	<div class="form-group">
		            		<label for="country">የምርቱ አይነት</label>
		                  <select style="color : rgb (255,0,0);" name="type_id" id="chid" required="true" class="form-control"> <option value="">እባክዎ ይምረጡ</option>
		                  	@foreach($types as $type)
		                  	    <option value="{{$type->name}}">{{$type->name}}</option>
		                  	@endforeach
		                   
		                  </select>
		                  @error('type')
	                        <p style="color: red">
			                    <strong>{{ $message }}</strong>
			                </p>
                      	 @enderror
		               </div>
		             </div>	
		            	            
		            <div class="col-md-6">
		            	<div class="form-group">
		            		<label for="postcodezip">የምርቱ ፎቶ</label>
	                  <input type="file" name="file" class="form-control" required="true">
	                  @error('file')
                        <p style="color: red">
			                <strong>{{ $message }}</strong>
			             </p>
                       @enderror
	                </div>
		            </div>
		            <div class="w-100"></div>
		            <div class="col-md-12">
		            	<div class="form-group">
		            	  <input class="col-md-12" type="submit" value="ምርቱን ይመዝግቡ">
	                     </div>
		            </div>
	            </div>
	          </form><!-- END --> 
          </div> <!-- .col-md-8 -->
      </div>
  </div>
</section>

            
@endsection