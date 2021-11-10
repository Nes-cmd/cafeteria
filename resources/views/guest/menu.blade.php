@extends('layouts.myapp')
 
@section('title') ሜኑ-የምርቶች ሙሉ ዝርዝር@endsection
 
@section('page_contents')  
<section class="ftco-section">
    <div class="container">
    	<div class="row justify-content-center mb-5">
          <div class="col-md-7 heading-section text-center ftco-animate">
          	<span class="subheading">{{Session::get('org_name') ?? ''}}</span>
            <h2 class="mb-4" style="color:  rgb(242,122,223)">ሜኑ Our Menu</h2>
            <p style="color: white">ውድ ደንበኛችን ወደማዘዣው ጨመሩ ማለት አዘዙ ማለት አይደለም። ወደማዣ ያስገቡትን ምርት አንድ ላይ <a href="{{URL::to('customer/cart')}}">ለማዘዝ</a> የሚለውን በመንካትና አድራሻዎን በማስገባት ማዘዝ ይኖርቦታል!!!</p>
          
          
           <form action="{{ route('customer.choose.cafe',session('cafe_id'))}}" method="get">
           	@csrf 
	           <p><input type="submit" class="outline btn-primary py-3 px-4"  value="ስፔሻል/Our Specials"></p>
           </form>
          </div>
        </div>
 
        	@if(sizeOf($products['other']))
        	<div class="col-md-6 mb-5 pb-3">
        		<h3 style="color: rgb(54,33,255);" class="mb-5 heading-pricing ftco-animate">ለጅማሮ/Starter</h3>
                @foreach($products['other'] as $product)
        		<div class="pricing-entry d-flex ftco-animate">
        			<div class="img" style="background-image: url({{asset('/mystorage/'.$product->photo)}});"></div>
        			<div class="desc pl-3">
	        			<div class="d-flex text align-items-center">
	        				<h3><span>{{$product->item_name}}</span></h3>
	        				<span class="price">{{$product->pivot->price}}ብር </span>
	        				
 							<form class="d-flex align-items-center"> 								
								<input class="text-center" class="form-control"  id="{{$product->id}}" type="number" name="quant" min="1" max="10" step="1" value="1" placeholder="ብዛት">	
								<input type="hidden" name="pid" value="{{$product->pivot->id}}">
								<input type="hidden" name="item" value="{{$product->item_name}}">
								<input type="hidden" name="price" value="{{$product->pivot->price}}">
								<input type="hidden" name="photo" value="{{$product->photo}}">
								@if($product->pivot->status)
									<button class="btn btn-success btn-submit" type="button" >ወደ ማዘዣ ጨምር</button>
								@else
									<button class="btn btn-danger" type="button" >ይህ ምርት አልቋል</button>
								@endif 
                                      	                        
 							</form>
 						
	        			</div>
	        			<div class="d-block">
	        				<p>{{$product->descreption}}</p>
	        			</div>
        			</div>
        		</div>
        		@endforeach
        	</div>
            @endif

            @if(sizeOf($products['kurs']))
        	<div class="col-md-6 mb-5 pb-3">
        		<h3 style="color: rgb(54,100,255);" class="mb-5 heading-pricing ftco-animate">ቁርስ/Breakfast</h3>
        		@foreach($products['kurs'] as $product)
        		<div class="pricing-entry d-flex ftco-animate">
        			<div class="img" style="background-image: url({{asset('/mystorage/'.$product->photo)}});"></div>
        			<div class="desc pl-3">
	        			<div class="d-flex text align-items-center">
	        				<h3><span>{{$product->item_name}}</span></h3>
	        				<span class="price">{{$product->pivot->price}}ብር </span>
	        				
 							<form class="d-flex align-items-center"> 								
								<input class="text-center" class="form-control"  id="{{$product->id}}" type="number" name="quant" min="1" max="10" step="1" value="1" placeholder="ብዛት">	
								<input type="hidden" name="pid" value="{{$product->pivot->id}}">
								<input type="hidden" name="item" value="{{$product->item_name}}">
								<input type="hidden" name="price" value="{{$product->pivot->price}}">
								<input type="hidden" name="photo" value="{{$product->photo}}">
                                @if($product->pivot->status)
									<button class="btn btn-success btn-submit" type="button" >ወደ ማዘዣ ጨምር</button>
								@else
									<button class="btn btn-danger" type="button" >ይህ ምርት አልቋል</button>
								@endif           	                        
 							</form>
 						
	        			</div>
	        			<div class="d-block">
	        				<p>{{$product->descreption}}</p>
	        			</div>
	        		</div>
        		</div>
        		@endforeach
        	</div>

        	 @endif

            @if(sizeOf($products['msa']))

        	<div class="col-md-6">
        		<h3 style="color: rgb(54,100,255);" class="mb-5 heading-pricing ftco-animate">ምሳ/Launch</h3>
        		@foreach($products['msa'] as $product)
        		<div class="pricing-entry d-flex ftco-animate">
        			<div class="img" style="background-image: url({{asset('/mystorage/'.$product->photo)}});"></div>
        			<div class="desc pl-3">
	        			<div class="d-flex text align-items-center">
	        				<h3><span>{{$product->item_name}}</span></h3>
	        				<span class="price">{{$product->pivot->price}}ብር </span>
	        				
 							<form class="d-flex align-items-center"> 								
								<input class="text-center" class="form-control"  id="{{$product->id}}" type="number" name="quant" min="1" max="10" step="1" value="1" placeholder="ብዛት">	
								<input type="hidden" name="pid" value="{{$product->pivot->id}}">
								<input type="hidden" name="item" value="{{$product->item_name}}">
								<input type="hidden" name="price" value="{{$product->pivot->price}}">
								<input type="hidden" name="photo" value="{{$product->photo}}">
                                @if($product->pivot->status)
									<button class="btn btn-success btn-submit" type="button" >ወደ ማዘዣ ጨምር</button>
								@else
									<button class="btn btn-danger" type="button" >ይህ ምርት አልቋል</button>
								@endif           	                        
 							</form>
 						
	        			</div>
	        			<div class="d-block">
	        				<p>{{$product->descreption}}</p>
	        			</div>
	        		</div>
        		</div>
        		@endforeach
        		
        	</div>
        	 @endif

            @if(sizeOf($products['erat']))


        	<div class="col-md-6">
        		<h3 style="color: rgb(54,100,255);" class="mb-5 heading-pricing ftco-animate">እራት/Dinner</h3>
        		@foreach($products['erat'] as $product)
        		<div class="pricing-entry d-flex ftco-animate">
        			<div class="img" style="background-image: url({{asset('/mystorage/'.$product->photo)}});"></div>
        			<div class="desc pl-3">
	        			<div class="d-flex text align-items-center">
	        				<h3><span>{{$product->item_name}}</span></h3>
	        				<span class="price">{{$product->pivot->price}}ብር</span>
	        				
 							<form class="d-flex align-items-center"> 								
								<input class="text-center" class="form-control"  id="{{$product->id}}" type="number" name="quant" min="1" max="10" step="1" value="1" placeholder="ብዛት">	
								<input type="hidden" name="pid" value="{{$product->pivot->id}}">
								<input type="hidden" name="item" value="{{$product->item_name}}">
								<input type="hidden" name="price" value="{{$product->pivot->price}}">
								<input type="hidden" name="photo" value="{{$product->photo}}">
                                @if($product->pivot->status)
									<button class="btn btn-success btn-submit" type="button" >ወደ ማዘዣ ጨምር</button>
								@else
									<button class="btn btn-danger" type="button" >ይህ ምርት አልቋል</button>
								@endif           	                        
 							</form>
 						
	        			</div>
	        			<div class="d-block">
	        				<p>{{$product->descreption}}</p>
	        			</div>
	        		</div>
        		</div>
        		@endforeach
        		
        	</div>
        	 @endif

            @if(sizeOf($products['drink']))
            
        	<div class="col-md-6">
        		<h3 style="color: rgb(54,100,255);" class="mb-5 heading-pricing ftco-animate">  መጠጦች ለስላሳና ወሃ/Drinks</h3>
        		@foreach($products['drink'] as $product)
        		<div class="pricing-entry d-flex ftco-animate">
        			<div class="img" style="background-image: url({{asset('/mystorage/'.$product->photo)}});"></div>
        			<div class="desc pl-3">
	        			<div class="d-flex text align-items-center">
	        				<h3><span>{{$product->item_name}}</span></h3>
	        				<span class="price">{{$product->pivot->price}}ብር</span>
	        				
 							<form class="d-flex align-items-center"> 								
								<input class="text-center" class="form-control"  id="{{$product->id}}" type="number" name="quant" min="1" max="10" step="1" value="1" placeholder="ብዛት">	
								<input type="hidden" name="pid" value="{{$product->pivot->id}}">
								<input type="hidden" name="item" value="{{$product->item_name}}">
								<input type="hidden" name="price" value="{{$product->pivot->price}}">
								<input type="hidden" name="photo" value="{{$product->photo}}">
                                @if($product->pivot->status)
									<button class="btn btn-success btn-submit" type="button" >ወደ ማዘዣ ጨምር</button>
								@else
									<button class="btn btn-danger" type="button" >ይህ ምርት አልቋል</button>
								@endif          	                        
 							</form>
 						
	        			</div>
	        			<div class="d-block">
	        				<p>{{$product->descreption}}</p>
	        			</div>
	        		</div>
        		</div>
        		@endforeach
        	</div>
        	 @endif
           <div id="loader" style="position: fixed; top:50%; left: 50%; display: none; margin: -50px 0px 0px -150px">
              <img src="{{ asset('/backend/loader/wait.gif')}}" width="300" height="100">
           </div>
          
        </div>
        <p style="color: rgb(255,0,0);" class="text-center">የመረጡትን ወደ መረጡት ካፌ ለመላክ
        	<a href="{{URL::to('customer/cart')}}"><button  class="btn-primary text-center"> ይህን መጫን አለቦት!</button></a>
        	ወይም ከላይ ያለውን <strong>ለማዘዝ የሚለውን ይጫኑ</strong>
        </p>
    </div>
</section> 
<!-- @push('customjs')
	<script type="text/javascript">
		function insert(id,itemName,photo,total){																	
			quant = document.getElementById(id).value;
			if (window.XMLHttpRequest) {
				xmlhttp = new XMLHttpRequest();
			}else{
				xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
			}
			xmlhttp.onreadystatechange = function(){
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById(id).innerHTML = xmlhttp.responseText;}
			    }
			xmlhttp.open('GET','/backend/helper.php?order='+id+'&quant='+quant+'&item='+itemName+'&photo='+photo+'&price='+total,true);
		    xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
			xmlhttp.send();
			swal({
				title: 'success',
				text: quant +' '+ itemName +' ወደ ማዘዣው ገብቶዋል።',
				type: 'success',
				timer: 3000,
				showConfirmButton:false
			});	
		}	
	</script>
@endpush -->
@endsection 


