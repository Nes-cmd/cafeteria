@extends('layouts.myapp') 

@section('title')ለማዘዝ የተመረጡ ምርቶች ዝርዝር@endsection

@section('page_contents')

<section class="ftco-section ftco-cart">
	<div class="container">
		<div class="row">
		<div class="col-md-12 ftco-animate">
			<form class="text-center"  action="{{ route('customer.menu.specials') }}" method="get">
           		@csrf 
	        	   <p><input type="submit" class="outline btn-primary py-3 px-4"  value="ምን ይጨመር/Add something? "></p>
            </form>
			<div class="cart-list">
				<table class="table">
				    <thead class="thead-primary">
				      <tr class="text-center">
				        <th>&nbsp;</th>
				        <th>&nbsp;</th>
				        <th>የትዕዛዙ አይነት</th>
				        <th>ዋጋ (ብር)</th>
				        <th>ብዛት</th>
				        <th>ጠቅላላ ዋጋ</th>
				      </tr>
				    </thead>
				    <tbody>
				    	@php($tot = 0)
				    	@foreach($carts as $cart)
				      <tr class="text-center">
				        <td class="product-remove"><a href="{{route('customer.cart.cancel',$cart['product_userId'])}}"><span class="icon-close"></span></a></td>
				        
				        <td class="image-prod"><div class="img" style="background-image:url({{ asset('/mystorage/'.$cart['photo'])}});"></div></td>
				        
				        <td class="product-name">
				        	<h3 style="color: white">{{$cart['item']}}</h3>
				        	<p>{{$cart['descreption'] ?? ' ' }}</p>
				        </td>
				        
				        <td class="price">{{$cart['price']}}</td>
				        
				        <td class="quantity">
				            <p class="btn btn-primary btn-outline-primary">	        	
			             	{{$cart['quantity']}}</p>          	    
			          </td>
				        
				        <td class="total">{{$cart['quantity']*$cart['price']}}</td>
				      </tr><!-- END TR-->
				      @php($tot+=$cart['quantity']*$cart['price'])
                       @endforeach
				    </tbody>
				  </table>
			  </div>
		</div>
	</div>
	<div class="row justify-content-end">
		<div class="col col-lg-3 col-md-6 mt-5 cart-wrap ftco-animate">
			<div class="cart-total mb-3">
				<h3 style="color: red">የትዕዛዝዎ ጠቅላላ ሂሳብ</h3>
				<p class="d-flex">
					<span>የማጓጓዣ</span>
					<span>0.00 ብር</span>
				</p>
				<p class="d-flex total-price">
					<span>ጠቅላላ</span>
					<span>
					{{$tot}}
					</span>
				</p>
				<form action="{{URL::to('customer/cart/orderer')}}" method="post">
					{{ csrf_field() }}
					<div class="form-group">
						<p class="d-flex">				
							<input class="btn btn-primary btn-outline-primary" required="true" type="text" name="place" id="place" placeholder="ሱቅ/ወንበር ቁጥር or seat number">
					    </p>
					 <div id="list"></div>
				    </div>
				    <div class="form-group">
						<p class="d-flex">				
							<input class="btn btn-primary btn-outline-primary" required="true" type="number" name="code" id="place" placeholder="ኮድ/code e.g 1234">
					    </p>
				    </div>
				   <p class="text-center">
				   		<input class="btn btn-primary py-3 px-4" name="sendorder" type="submit" value="ወደ ካፌው ትዕዛዝ ላክ/Place Order">
				   </p>
				  
				</form>
			</div>
			
		</div>
	</div>
	</div>
</section>
@endsection