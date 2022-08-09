@extends('layouts.myapp')
@section('title') ስፔሻል ሜኑ-የምርቶች ሙሉ ዝርዝር@endsection
@section('page_contents')  

<section class="ftco-menu mb-2 pb-5">
    <div class="container"> 
    	<div class="row justify-content-center mb-5">
          <div class="col-md-7 heading-section text-center ftco-animate">
          	<span class="subheading">{{Session::get('org_name') ?? ''}}</span>
            <h2 class="mb-4" style="color: rgb(242,122,223);">ስፔሻል ምግቦቻችንን ይቅመሱ/Get our specials!</h2>
             <p style="color: white">ውድ ደንበኛችን ወደማዘዣው ጨመሩ ማለት አዘዙ ማለት አይደለም። ወደማዘዣ ያስገቡትን ምርት አንድ ላይ <a href="{{URL::to('customer/cart')}}">ለማዘዝ(Cart)</a> የሚለውን በመንካትና አድራሻዎን በማስገባት ማዘዝ ይኖርቦታል!!!</p>
            <form  action="{{ route('customer.menu.specials') }}" method="get">
           		@csrf 
	        	   <p><input type="submit" class="outline btn-primary py-3 px-4"  value="ሙሉ ሜኑ/Our Full Menu"></p>
            </form>
          </div>

        </div>

		<div class="row d-md-flex">
    		<div class="col-lg-12 ftco-animate p-md-5">
	    		<div class="row">
	          <div class="col-md-12 nav-link-wrap mb-5">
	            <div class="nav ftco-animate nav-pills justify-content-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
	              <a class="nav-link active" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">ዋና ማዕዶች</a>

	              <a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">የተመረጡ መጠጦች</a>
	            </div>
	          </div>
	          <!-- Foods -->
	          <div class="col-md-12 d-flex align-items-center">
	            <div class="tab-content ftco-animate" id="v-pills-tabContent">
	              <div class="tab-pane show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-1-tab">
	              	<div class="row">
	              	   @foreach($products['spDish'] as $product)
	              		<div class="col-md-4 text-center">
	              			<div class="menu-wrap">
	              				<a href="#" class="menu-img img mb-4" style="background-image: url({{asset('mystorage/'.$product->photo)}});"></a>
	              				<div  class="text">
	              					<h3><a href="#">{{$product->item_name}}</a></h3>
	              					<p style="color: white"> {{$product->descreption}}</p>
	              					<p class="price" style="color: white"> {{$product->price}} ብር </p>	              					
		 							<form class="d-flex align-items-center"> 
		 							@csrf								
										<input class="text-center" class="form-control" type="number" name="quant" min="1" max="10" step="1" value="1" placeholder="ብዛት">	
										<input type="hidden" name="item" value="{{$product->item_name}}">
										<input type="hidden" name="pid" value="{{$product->product_user_id}}">
										<input type="hidden" name="price" value="{{$product->price}}">
										<input type="hidden" name="photo" value="{{$product->photo}}">
		                                @if($product->status)
											<button class="btn btn-success btn-submit icon icon-shopping_cart" type="button" >Add to Cart</button>
										@else
											<button class="btn btn-danger" type="button" >Sorry! it's finished</button>
										@endif          	                        
		 							</form>							                           
	               				</div>		              				
	              			</div>
	              		</div>
	              	 @endforeach
	              	 </div>
	               </div>
                 <!-- soft drink  -->
	              <div class="tab-pane" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-2-tab">
	                <div class="row">	                	@foreach($products['spOther'] as $kurs)
	              		<div class="col-md-4 text-center">
	              			<div class="menu-wrap">
	              				<a href="#" class="menu-img img mb-4" style="background-image: url({{ asset('mystorage/'.$kurs->photo)}});"></a>
	              				<div class="text">
	              					<h3><a href="#">{{$kurs->item_name}}</a></h3>
	              					<p style="color: white">{{$kurs->descreption}}</p>
	              					<p style="color: white" class="price"><span>{{$kurs->price}}</span></p>
	              					<form class="d-flex align-items-center text-center" > 								
										<input class="text-center" class="form-control"  id="{{$kurs->id}}" type="number" name="quant" min="1" max="10" step="1" value="1" placeholder="ብዛት">	
										<input type="hidden" name="pid" value="{{$product->product_user_id}}">
										<input type="hidden" name="item" value="{{$kurs->item_name}}">
										<input type="hidden" name="price" value="{{$kurs->price}}">
										<input type="hidden" name="photo" value="{{$kurs->photo}}">
		                                @if($product->status)
											<button class="btn btn-success btn-submit icon icon-shopping_cart" type="button" > Add to Cart/button>
										@else
											<button class="btn btn-danger" type="button" >Finished for now</button>
										@endif
		 							</form>
	              				</div>
	              			</div>
	              		</div>
	              		@endforeach
	              	</div>
	              </div>
	            </div>
	          </div>
            </div>
        </div>
    </div>
	</div>
</section>
<div id="loader" style="position: fixed; top:50%; left: 50%; display: none; margin: -50px 0px 0px -150px">
      <img src="{{ asset('/backend/loader/wait.gif')}}" width="300" height="100">
 </div>
<p style="color: red" class="text-center"> የመረጡትን ወደ መረጡት ካፌ ለመላክ<a href="{{URL::to('customer/cart')}}">
    <button class="btn-primary text-center"> ይህን መጫን አለቦት!</button></a>
       ወይም ከላይ ያለውን <strong>ለማዘዝ የሚለውን ይጫኑ።</strong>
</p>
@endsection