{{ header("refresh:60") }}
@extends('layouts.app')
 
@section('title') ከደንበኞች የመጡ ትዕዛዞች@endsection

@section('page_contents')
<section class="ftco-section ftco-cart">
	<div class="container">
		<div class="row">
		<div class="text-center">
			<h2>ደንበኞች እነዚህን ከታች የተዘረዘሩትን አዘዋል</h2>
			<div class="cart-list">
				<table style="color: white;" class="table">
				    <thead class="thead-primary">
				      <tr class="text-center">
				        <th>ትዕዛዝ</th>
				        <th>ብዛት</th>
				        <th>ቦታ</th>
				        <th>ጠቅላላ ዋጋ</th>
				        <th>Action</th>
				      </tr>
				    </thead>
				    @php($prev = $orders->get(0)->exact_location??'')
				    @php($subtot = 0)
				   
				    @php($ids = array())
				    @foreach($orders as $order)
				        @php($now = $order->exact_location)
					    @if($now != $prev)<th colspan="7"><button onclick="order('{{ json_encode($ids)}}');">አንድ ላይ ለማውጣት {{$subtot}} @php($subtot = 0) @php($ids = array()) </button></th> <tbody> @endif
						      <tr >
						        <td class="product-name">
						        	<span>{{$order->item}}</span>
						        </td>
						        <td class="quantity">
						            {{$order->quantity}}         	    
					            </td>
					            <td class="quantity">
						            {{$order->exact_location}}         	    
					            </td>
					            <td class="total">{{$order->total}}</td>
						        <td class="total"><button onclick="order( '{{ '['.$order->id.']' }} ');" class="btn btn-primary btn-outline-primary"><span>ትዕዛዝ ለማውጣት</button></span></td>
						      </tr><!-- END TR-->
					     @php($subtot = $subtot + $order->total)
					     @php(array_push($ids, $order->id))
					     @php($prev = $now)
				     @endforeach
				     <th colspan="7"><button onclick="order('{{ json_encode($ids)}}');">አንድ ላይ ለማውጣት {{$subtot}} @php($subtot = 0) @php($ids = array()) </button></th> <tbody>
				     	
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