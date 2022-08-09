 @extends('layouts.app')

@section('title') ማዘዣና ማውጫ| Order and Out  @endsection

@section('page_contents')

<section class="ftco-section">
    <div class="container"> 
    	<div class="row justify-content-center mb-5">
          <div class="col-md-7 heading-section text-center ftco-animate">
          	<span class="subheading">ፈጣን ማዘዣና ማውጫ</span>
          </div>
        </div>	 
        	<div class="col-md-6 mb-5 pb-3">
  
                @foreach($products as $product)
        		<div class="pricing-entry d-flex ftco-animate">
        			<div class="img" style="background-image: url({{asset('/mystorage/'.$product->photo)}});"></div>
        			<div class="desc pl-3">
	        			<div class="d-flex text align-items-center">
	        				<h3><span>{{$product->item_name}}</span></h3>
	        				<span class="price">{{$product->pivot->price}}ብር</span>
 							<form class="d-flex align-items-center"> 								
								<input class="text-center" class="form-control"  id="{{$product->id}}" type="number" name="quant" min="1" max="10" step="1" value="1" placeholder="ብዛት">	
								<input type="hidden" name="pid" value="{{$product->pivot->id}}">
								<input type="hidden" name="name" value="{{$product->item_name}}">
								<input type="hidden" name="price" value="{{$product->pivot->price}}">
                                <button class="btn btn-fast btn-primary" type="button" >ታዞ ይውጣ</button>
 							</form>
	        			</div>
	        			<div class="d-block">
	        				<p>{{$product->pivot->descreption}}</p>
	        			</div>
        			</div>
        		</div>
        		@endforeach
                
        	</div>
            <div id="loader" style="position: fixed; top:50%; left: 50%; display: none; margin: -50px 0px 0px -150px">
                <img src="{{ asset('/backend/loader/wait.gif')}}" width="300" height="100">
            </div>
        </div>
    </div>
</section>
@endsection

