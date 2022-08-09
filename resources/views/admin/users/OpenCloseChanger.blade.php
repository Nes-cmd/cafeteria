{{ header("refresh:60") }}
@extends('layouts.oldapp')

@section('title') የመክፈቻና መዝጊያ ሰዐት @endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Users</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Cafe Id</th>
                                <th scope="col">Open at</th>
                                <th scope="col">Close at</th>   
                                <th scope="col">Remaining for next</th>                          
                            </tr>
                        </thead>
                        <tbody>
                        	<script type="text/javascript">
                        		var from = [0];
								var x = [0];
								var to = [0];
								var distance = [0];
								var days = [0];
								var hours = [0];
								var minutes = [0];
								var seconds = [0];

                        	</script>
                            @for($i = 0; $i < sizeOf($times); $i++)

                            <tr>
                                <td scope="row">{{ $times[$i]->user_id }}</td>
                                <td scope="row">{{ $times[$i]->open_at }}</td>
                                <td scope="row">{{ $times[$i]->close_at }}</td>
                                <td  id="{{'demo'.$i}}" scope="row">{{ $times[$i]->close_at }}</td>
                            </tr>
                           <script>
								  // Set the date we're counting down to
								  if ('{{ $times[$i]->status}}' == 0) {
								  	 
								     from['{{$i}}'] = ['{{ strtotime($times[$i]->open_at) - time() + 24*60*60 }}'];
                                    }
                                  else{
                                  	 
                                  	from['{{$i}}'] = ['{{ strtotime($times[$i]->close_at) - time() + 24*60*60 }}'];
                                  }
									x['{{$i}}'] = setInterval(function() {

									  
									  from['{{$i}}']--;
									  distance['{{$i}}'] = from['{{$i}}'];
									    
									  // Time calculations for days, hours, minutes and seconds
									  
									  hours['{{$i}}'] = Math.floor(( from['{{$i}}'] % (1 * 60 * 60 * 24)) / (1 * 60 * 60));
									  
									  minutes['{{$i}}'] = Math.floor(( from['{{$i}}'] % (1 * 60 * 60)) / (1 * 60));
									  
									  seconds['{{$i}}'] = Math.floor(( from['{{$i}}'] %  60) );
									    
									  // Output the result in an element with id="demo"
									  document.getElementById("{{'demo'.$i}}").innerHTML = hours['{{$i}}'] + "h " + minutes['{{$i}}'] + "m " + seconds['{{$i}}'] + "s" ;

									  // If the count down is over, write some text 
									 
									  if ( seconds['{{$i}}'] == 0 && minutes['{{$i}}'] == 0 && hours['{{$i}}'] == 0 ) {
									  	
			                            if (window.XMLHttpRequest) {
												xmlhttp = new XMLHttpRequest();
											}else{
												xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
										}
										xmlhttp.onreadystatechange = function(){
											if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
												document.getElementById("{{'demo'.$i}}").innerHTML = xmlhttp.responseText;
											}
										}
                                        xmlhttp.open('GET','/open-close/times/toggle/{{ $times[$i]->id }}',true);
                                        xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
                                        xmlhttp.send();
									    clearInterval(x['{{$i}}']);
									    
									  }
									  
									}, 1000);
							</script>
							@endfor
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
</div>
</div>

</body>
</html>

@endsection
