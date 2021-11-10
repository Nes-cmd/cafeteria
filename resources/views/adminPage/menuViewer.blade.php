@extends('layouts.app')
@section('title') ሜኑ ማሳያ ገጽ@endsection
@section('page_contents')
	
<section class="ftco-section ftco-cart">
	<h3 class="text-center">ሜኑ ክፍል</h3>
	<div class="container">
		<div class="row">
		<div class="col-md-12 ftco-animate"> 
			<div class="cart-list">
				
				<table class="table">
				    <thead class="thead-primary">
				      <tr class="text-center">
				        <th>ፎቶ</th>
				        <th>የእቃው ስም</th>
				        <th>የእቃው አይነት</th>
				        <th>ዋጋ (ብር)</th>
				        <th>ቀረጥ(15%)</th> 
				        <th >Action</th>
				        <th >አልቋል/አለ</th>
				      </tr>
				    </thead>
				    <tbody> 
				    	@foreach($products as $products)
				      <tr class="text-center">
						@if(auth()->user()->hasRole('app_admin'))
				        
                        <td class="image-prod"><a href="{{route('cafe.adminPage.edit',$products['id'])}}"><div class="img" style="background-image:url({{asset('/mystorage/'.$products['photo'])}});"></div></a></td>
                        @else
				        <td class="image-prod"><div class="img" style="background-image:url({{asset('/mystorage/'.$products['photo'])}});"></div></td>
				       
                        @endif
				        <td class="product-name">
				        	<h3>{{$products['item_name']}}</h3>
				        	<p>{{$products->pivot->descreption}}</p>
				        </td>
				        <td class="price">{{$products->pivot->type}}</td>
				        <td class="price">{{$products->pivot->price}}</td>
				        <td class="quantity">{{$products->pivot->vat}}</td>  
				   
				        <td class="product-remove"><a class="float-left btn btn-primary px-3 py-3" href="{{route('cafe2.adminPage.edit',$products->pivot->id)}}" >Edit</a>
				         <button class="float-left outline btn-danger px-2 py-3" onclick="deleteAny('{{ $products->pivot->id }}', 'product_user');"> Delete</button>
				        </td>
				        <td>አለ<input type="checkbox" id="{{$products->pivot->id}}" name="availables" onclick="SwitchToggle('{{$products->pivot->id }}','product_user');" @if($products->pivot->status)checked @endif ></td>
				      </tr>
				      <!-- END TR-->
                       @endforeach
				    
				    
                  </tbody>
				  </table> 
				  <div id="loader" style="position: fixed; top:50%; left: 50%; display: none; margin: -50px 0px 0px -150px">
                      <img src="{{ asset('/backend/loader/wait.gif')}}" width="300" height="100">
                  </div>
		
			  </div>
		</div>
	</div>
	
	</div>
</section>

@endsection