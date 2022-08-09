@extends('layouts.app')
@section('title')አዲስ ምርት መመዝገቢያ መምረጫ@endsection
@section('page_contents')

<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center mb-5 pb-3">
      <div class="col-md-7 heading-section ftco-animate text-center">
      	<span class="subheading">Discover</span>
        <h2 class="mb-4">Best of known products</h2>
        <p>እባክዎ ከተዘረዘሩት ውስጥ የርሶን ምርት የሚወክል ካገኙ እርሱን ይምረጡ። </p>
      </div>
    </div>
    <div class="row">
    	@foreach($products as $product)
        	<div class="col-md-3">
        		<div class="menu-entry">
					<a href="#" class="img" style="background-image: url({{ asset('/mystorage/'.$product->photo)}});"></a>
					<div class="text text-center pt-4">
						<h3><a href="#">{{ $product->item_name}}</a></h3>
					</div>
    			</div>
			<form  method="post"> 
			@csrf
			<div class="col-md-12">
                <div class="form-group">
                	<input type="hidden" name="product_id" value="{{ $product->id }}">
                	<input type="text" class="form-control" name="descreption" placeholder="መግለጫ ካለዎት">
			        <select style="color : rgb (154,0,0);" name="type" id="chid" required="true" class="form-control"> <option value="">አይነቱን ይምረጡ</option>
	                  	@foreach($types as $type)
	                  	    <option value="{{$type->name}}">{{$type->name}}</option>
	                  	@endforeach
	                  </select>
			        <input type="number" required="" class="form-control" name="price" placeholder="ዋጋው">
				 <button type="submit" class="btn-add btn-primary btn-outline-primary">ምርትዎ_ያድርጉት</button>
			    </div>
		    </div>
            </form>
          </div>
    	@endforeach

    </div>
    <div id="loader" style="position: fixed; top:50%; left: 50%; display: none; margin: -50px 0px 0px -150px">
	      <img src="{{ asset('/backend/loader/wait.gif')}}" width="300" height="100">
	  </div>
	</div>
</section>
<section class="ftco-section">
      <div class="container">
        <div class="row">
          <div class="col-xl-8 ftco-animate">
				<form method="post" action="{{ route('cafe.adminPage.store')}}" enctype="multipart/form-data" class="billing-form ftco-bg-dark p-3 p-md-5">
					{{ csrf_field() }}
					<input type="hidden" name="user_id" value="{{ Auth::user()->id}}" class="form-control" required="true">
					<h3 class="mb-4 billing-heading">ከላይ ከተዛረዘሩት ውስጥ የሚፈልጉት ምርት ከሌለ</h3>
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
	                    	<input type="text" name="price" class="form-control" value="{{ old('price') }}" required="true" placeholder="ዋጋው">
	                    	@error('price')
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
	                  <input type="text" name="desc" class="form-control" value="{{ old('desc') }}" placeholder="ይህ ምግብ የተሰራው ከውጭ ባስመጣነው ...">
	                  @error('desc')
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
		                  <select style="color : rgb (255,0,0);" name="type" id="chid" required="true" class="form-control"> 
		                  	<option value="">እባክዎ ይምረጡ</option>
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