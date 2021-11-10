@extends('layouts.app')

@section('title') ሜኑ ማደሻ ገጽ@endsection

@section('page_contents')
<section class="ftco-section ftco-cart">
	<h3 class="text-center">ሜኑ ማደሻ ክፍል </h3>
	<div class="container">
		<div class="row">
		<div class="col-md-12 ftco-animate">
			<div class="cart-list">
				<table class="table">
				    <thead class="thead-primary">
				      <tr class="text-center">
				      	<!-- <th>የእቃው ስም</th> -->
				        <th>የእቃው አይነት</th>
				        <th>ማብራርያ</th>
				        <th >ጠቅላላ ዋጋ(ብር)</th>
				        <th>ስፔሻል አድርግ</th>
				      </tr>
				    </thead>
				    <tbody>
				    	
				    @foreach($product as $products)
				    <form method="post" action="{{route('cafe2.adminPage.update',$products['id'])}}">
					@csrf
					{{ method_field('PUT')}}
					  <input type="hidden" name="id" value="{{$products['id']}}">
					  <input type="hidden" name="uid" value="{{$products['user_id']}}">
					 
				      <tr class="text-center">
				      	
				        <td class="product-name">
				 
                        <select name="type" id="chid" required="true" class="btn btn-primary btn-outline-primary">
		                  	<option value="{{$products['type']}}" selected="true">{{$products['type']}}</option>
		                  	<option value="ትኩስ ነገር">ትኩስ ነገር</option>
		                  	<option value="ቁርስ">ቁርስ</option>
		                    <option value="ምሳ">ምሳ</option>
		                    <option value="እራት">እራት</option>
		                    <option value="ለስላሳና ውሃ">ለስላሳና ውሃ</option>
		                    <option value="ለጅማሮ">ለጅማሮ</option>
		                    <option value="ማቆያ">ማቆያ</option>
		                    <option value="ሌላ">ሌላ</option>      
		                  </select>

				        </td>

				        <td class="price"><input class="btn btn-primary btn-outline-primary" type="text" name="descreption" value="{{$products['descreption']}}"> </td>
				        
				        
				        
				        <td class="total"><input class="btn btn-primary btn-outline-primary" required="true" type="number" name="price" value="{{$products['price']}}">
				         </td>

				         <td class="price"><input class="btn btn-primary btn-outline-primary" id="special" type="checkbox"  name="special"  value="on" @if(\App\MyClasses\Cheker::isSpecial($products["id"]))checked @endif> </td>

				       </tr><!-- END TR-->
				        
				      
                     </tbody>
				  </table>
			       <p class="text-center">
				   		<input  type="submit" value="Savechanges">
				   </p>
				   </form>
				   @break
                  @endforeach
		   
			  </div>
		</div>
	</div>
	
	</div>
</section>
            
@endsection