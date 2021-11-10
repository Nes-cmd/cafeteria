<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <meta charset="utf-8">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{ asset ('backend/css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset ('backend/css/animate.css')}}">
    <link rel="stylesheet" href="{{ asset ('backend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset ('backend/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{ asset ('backend/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{ asset ('backend/css/aos.css')}}">
    <link rel="stylesheet" href="{{ asset ('backend/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{ asset ('backend/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{ asset ('backend/css/jquery.timepicker.css')}}">
    <link rel="stylesheet" href="{{ asset ('backend/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{ asset ('backend/css/icomoon.css')}}">
    <link rel="stylesheet" href="{{ asset ('backend/css/style.css')}}">

    <style type="text/css">
      .icon-bar {
      position: fixed;
      top: 95%;
      left: 40%;
      -webkit-transform: translateY(-50%);
      -ms-transform: translateY(-50%);
      transform: translateY(-50%);
      background: white;
     }

      /* Style the icon bar links */
      .icon-bar a {
        display: block;
        text-align: center;
        padding: 1px;
        transition: all 0.3s ease;
        color: blue;
        font-size: 20px;
      }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js">
    </script>

    <!-- For our jquery -->

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"> </script>
    
    @stack('customjs')
  </head>
  <body>
  	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="{{URL::to('/')}}">ዋርካ<small>ኦንላይን ማዘዣ</small></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> 
	      </button>
	      <div class="collapse navbar-collapse"id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item{{' active'}}"><a href="{{URL::to('/')}}" class="nav-link">Home</a></li>
	         
	          <li class="nav-item cart"><a href="{{ route('customer.cart')}}" class="nav-link">
              <span class="icon icon-shopping_cart">ለማዘዝ(cart)</span>
                <span class="bag d-flex justify-content-center align-items-center">
                 
                  <small id="cart"> @if(Session::has('cart')){{sizeOf(Session::get('cart'))}}@endif</small>
                  
                  
              </span></a>
            </li>
	          
                <div class="nav-item" style="border: right">
                 @if (Route::has('login'))
				    @auth
				    <li class="nav-item">
				        <a class="nav-link" href="{{ url('/home') }}">Admin's Home</a>
				    </li>
				    @else
				    <li class="nav-item">
				      <a class="nav-link" href="{{ route('login') }}">Login</a>
				    </li>

				    @if (Route::has('register'))
				    <li class="nav-item">
				      <a class="nav-link" href="{{ route('register') }}">Register</a>
				    </li>
				     @endif
				  @endauth
				@endif
				</div>
	          </ul>
		      </div>
			  </div>
	  </nav>
    <!-- END nav -->

        <section class="home-slider owl-carousel" style="margin-top: 60px; height: 300px;">
      <div class="slider-item" style="height: 300px;background-image: url({{ asset('/backend/images/bg_2.jpg')}});">
        <div class="overlay"></div>
        <div class="container">
          <div style="height: 130px;"class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

            <div class="col-md-8 col-sm-12 text-center ftco-animate">
              <span class="subheading">Welcome To Warka online Order</span>
              <h4 class="mb-4">Register your organization Here! እኛጋ ሆቴልዎን/ካፌዎን ያስመዝግቡ</h4>
            
            </div>

          </div>
        </div>
      </div>

      <div class="slider-item" style="height: 300px;background-image: url({{ asset('/backend/images/image_4.jpg')}});">
        <div class="overlay"></div>
        <div class="container">
          <div style="height: 130px;"class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

            <div class="col-md-8 col-sm-12 text-center ftco-animate">
              <span class="subheading">እንኳን ወደ ዋርካ ማዘዣ በደህና መጡ!</span>
              <h4 class="mb-4">ቀልጣፋ አገልግሎት እና ዘመናዊ አሰራር</h4>
              <p><a href="{{ route('register') }}" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">ሆቴልዎን ያስመዝግቡ</a><a href="{{URL::to('customer/cart')}}" class="btn btn-primary p-3 px-xl-4 py-xl-3">የመርጡትን እዚህጋ ይዘዙ</a> </p> 
            </div>
          </div>
        </div>
      </div>

      <div class="slider-item" style="height: 300px;background-image: url({{ asset('/backend/images/bg_1.jpg')}});">
        <div class="overlay"></div>
        <div class="container">
          <div style="height: 130px;" class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
            <div class="col-md-8 col-sm-12 text-center ftco-animate">
              <span class="subheading">Wellcome</span>
              <h4 class="mb-4">Save your time so your life</h4>
              <p><a href="{{ route('register') }}" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">Register</a><a href="{{ route('home')}}" class="btn btn-primary p-3 px-xl-4 py-xl-3">Login Here</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    @include('sweetalert::alert')
    @yield('page_contents')
    <section class="ftco-counter ftco-bg-dark img" id="section-counter" style="background-image: url({{ asset('/backend/images/bg_2.jpg')}});" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
      <div class="container">
        <div class="row justify-content-center">
        	<div class="col-md-10">
        		<div class="row">
		          <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		              	<div class="icon"><span class="flaticon-coffee-cup"></span></div>
		              	<strong class="number" data-number="100">0</strong>
		              	<span>ሆቴሎችና ካፌዎች</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		              	<div class="icon"><span class="flaticon-coffee-cup"></span></div>
		              	<strong class="number" data-number="85">0</strong>
		              	<span>ሽልማቶችና ምስጋናዎች</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		              	<div class="icon"><span class="flaticon-coffee-cup"></span></div>
		              	<strong class="number" data-number="10567">0</strong>
		              	<span>ደንበኞች</span>
		              </div>
		            </div>
		          </div>
		        </div>
		      </div>
        </div>
      </div>
    </section>

    

    <section class="ftco-gallery">
    	<div class="container-wrap">
    		<div class="row no-gutters">
					<div class="col-md-3 ftco-animate">
						<a href="#" class="gallery img d-flex align-items-center" style="background-image: url({{ asset('/mystorage/public/selected/bfe.jpg')}});">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-search"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-3 ftco-animate">
						<a href="#" class="gallery img d-flex align-items-center" style="background-image: url({{ asset('/mystorage/public/selected/buna1.jpg')}});">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-search"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-3 ftco-animate">
						<a href="#" class="gallery img d-flex align-items-center" style="background-image: url({{ asset('/mystorage/public/selected/beyeaynet.jpg')}});">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-search"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-3 ftco-animate">
						<a href="#" class="gallery img d-flex align-items-center" style="background-image: url({{ asset('/mystorage/public/selected/kitfo.jpg')}});">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-search"></span>
    					</div>
						</a>
					</div>
               </div>
    	   </div>
    </section>
  
      <!-- The social media icon bar -->
    
    @if(Session::has('cart') && sizeOf(Session::get('cart')) > 0 && Route::currentRouteName() != 'customer.cart')
    <div class="icon-bar">
      <a href="{{ route('customer.cart')}}" class="icon icon-shopping_cart"><sup id="cart2">{{sizeOf(Session::get('cart'))}}</sup><i style="color: red"> ለማዘዝ ይህን ይጫኑ!</i></a>
      
    </div>
    @else
     <div class="icon-bar">
     </div>
   @endif
    <!-- Footer -->


@include('layouts.parcials.footer')

  <script src="{{ asset ('backend/js/jquery.min.js')}}"></script>
  <script src="{{ asset ('backend/js/jquery-migrate-3.0.1.min.js')}}"></script>
  <script src="{{ asset ('backend/js/popper.min.js')}}"></script>
  <script src="{{ asset ('backend/js/bootstrap.min.js')}}"></script>
  <script src="{{ asset ('backend/js/jquery.easing.1.3.js')}}"></script>
  <script src="{{ asset ('backend/js/jquery.waypoints.min.js')}}"></script>
  <script src="{{ asset ('backend/js/jquery.stellar.min.js')}}"></script>
  <script src="{{ asset ('backend/js/owl.carousel.min.js')}}"></script>
  <script src="{{ asset ('backend/js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{ asset ('backend/js/aos.js')}}"></script>
  <script src="{{ asset ('backend/js/jquery.animateNumber.min.js')}}"></script>
  <script src="{{ asset ('backend/js/bootstrap-datepicker.js')}}"></script>
  <script src="{{ asset ('backend/js/jquery.timepicker.min.js')}}"></script>
  <script src="{{ asset ('backend/js/scrollax.min.js')}}"></script>
  <script src="{{ asset ('backend/js/main.js')}}"></script>
  <!-- custom js -->
  <script src="{{ asset('js/custom.js') }}" ></script>

  </body>

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(".btn-submit").click(function(e){
        e.preventDefault();
        var values = {};
        $.each($(this).closest("form").serializeArray(),function(i,field){
          values[field.name] = field.value;
        });
        $.ajax({
           type:'POST',
           url:"{{ route('customer.toCart') }}",
           data:{item:values['item'], pid:values['pid'], quant:values['quant'], price:values['price'], photo:values['photo']},
           beforeSend: function(){
            // Show image container
            $("#loader").show();
           },
           success:function(data){
            
              swal({
                title: 'success',
                text: data.success +' ' +values['item'] +' ወደ ማዘዣው ገብቶዋል።',
                type: 'success',
                timer: 2500,
                showConfirmButton:true
            });
          document.getElementById("cart").innerHTML = data.totalCart;
          $('.icon-bar').fadeIn();
          $('.icon-bar').html('<a href="{{ route('customer.cart')}}" class="icon icon-shopping_cart"><sup id="cart2"></sup><i style="color: red"> ለማዘዝ ይህን ይጫኑ!</i></a>');
          document.getElementById("cart2").innerHTML = data.totalCart;
        },
         complete:function(data){
          // Hide image container
          $("#loader").hide();
         },
      });
    });
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#place').keyup(function(){
      var query = $(this).val();
      if (query != '') {
        var _token = $('input[name="_token"]').val();
        $.ajax({
          url:"{{ route('customer.place.search.auto') }}",
          method:"POST",
          data:{query:query,_token:_token},
          success:function(data) {
            $('#list').fadeIn();
            $('#list').html(data);
          }
        });
      }
    });
    $(document).on('click', 'li', function() {
      $('#place').val($(this).text());
      $('#list').fadeOut();
    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#cafe').keyup(function(){
      var query = $(this).val();
      if (query != '') {
        var _token = $('input[name="_token"]').val();
        $.ajax({
          url:"{{ route('customer.cafe.search.auto')}}",
          method:"POST",
          data:{query:query,_token:_token},
          success:function(data) {
            $('#cafelist').fadeIn();
            $('#cafelist').html(data);
          }
        });
      }
    });
    $(document).on('click', 'li', function() {
      $('#cafe').val($(this).text());
      $('#cafelist').fadeOut();
    });
  });
</script>

<script type="text/javascript"> 
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  $(".btn-sorry").click(function(e){
      e.preventDefault();
      swal({ 
          title: "Closed",
          text: "ይቅርታ አሁን ዝግ ስለሆነ ማዘዝ አይቻልም። እባክዎ ክፍት በሆነ ሳት ብቻ ይዘዙ!",
          type: "info",
      });
    });
</script>

<script type="text/javascript">
  function SwitchToggle(id, table, column) {
    alert('ben?');
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
          type: 'POST',
          url: "{{ url('/toggle/switch/')}}",
          data: {_token: CSRF_TOKEN, table:table, column:column, id:id},
          dataType: 'JSON',
      });
}
</script>

</html>