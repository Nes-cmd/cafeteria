@extends('layouts.app')

@section('title') የወጡ ምርቶች@endsection

@section('page_contents')
<section class="ftco-section" style="color:white">
  <div class="container">
  	<h3 class="text-center">በአጠቃላይ የወጡ ትዕዛዞች ዝርዝር</h3>
    <div class="row"> 
       <div class="col-md-12 ftco-animate">
          <div style="color: rgb(200, 200, 200);" class="cart-list">
          	<table border = "5" >
                <thead > 
          			<tr>
          				<th height="30" width="8%">የእቃው ስም</th>
          				<th height="30" width="8%">የሄደበት ቦታ</th>
                  <th height="30" width="8%">ብዛት</th>
                  <th height="30" width="8%">ቀን</th>
          				<th class="text-right" height="30" width="8%">የእቃው ጠቅላላ ዋጋ</th>
          			</tr>
          		</thead>
              @php($next = 1)
              @php($flag = sizeOf($incomes))
              @while($flag)
             
            		<tbody>
                  @php($tot = 0)
            			@for($i = $next;$i <= sizeOf($incomes); $i++)
              			<tr>
    	          			<td height="30" width="8%">{{ $incomes[$i-1]->item_name }}</td>
    	          			<td height="30" width="8%">{{ $incomes[$i-1]->exact_location }}</td>
                      <td height="30" width="8%">{{ $incomes[$i-1]->quantity }}</td>
                      <td height="30" width="8%">{{ $incomes[$i-1]->created_at }}</td>
    	          			<td class="text-right" height="30" width="8%">{{ $incomes[$i-1]->total }}</td>
              		  </tr>
                    @php($flag = $flag - 1)
                    @php($tot = $tot + $incomes[$i-1]->total)
                    @if(($i < sizeOf($incomes))&&(substr($incomes[$i-1]->created_at, 8, -9) != substr($incomes[$i]->created_at, 8, -9))) @php($next = $i+1) @php($date = $incomes[$i-1]->created_at)@break @endif
                    @if($i == sizeOf($incomes)) @php($date = $incomes[$i-1]->created_at) @endif
            			@endfor
        
            		</tbody>
                  <td  style="color: green" height="30"  width="8%" colspan="4">ጠቅላላ ዋጋ {{ 'የ '.substr($date, 0, 10)}}</td>
                  <td style="color: green" class="text-right" >{{ $tot }}</td>
              @endwhile
          	</table>
		  </div>
		</div>	
	 </div>
	</div>
</section>
            
@endsection