<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>@yield('title')</title>

    <!--  -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
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
    <!-- my css -->
    <link rel="stylesheet" href="{{ asset ('css/mycss.css')}}">

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
    
    @stack('customjs')
  </head> 
  <body>
  	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <button class="navbar-toggler navbar-brand" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span>
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav" >
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item {{ request()->path() == 'home'?' active':'' }}"><a href="{{URL::to('home')}}" class="nav-link">Home</a></li>
	          <li class="nav-item {{ Route::currentRouteName() == 'cafe2.adminPage.index'?' active':'' }}"><a href="{{route('cafe2.adminPage.index')}}" class="nav-link">ሜኑ ለማደስ </a></li>
            <li class="nav-item {{ Route::currentRouteName() == 'cafe2.adminPage.show'?' active':'' }}"><a href="{{route('cafe2.adminPage.show', Auth::user()->id)}}" class="nav-link">ትዕዛኦች<sup>{{Session::has('order')?Session::get('order'):''}}</sup></a></li>
            <li class="nav-item {{ Route::currentRouteName() == 'cafe.order.out'?' active':'' }}"><a href="{{ route('cafe.order.out')}}" class="nav-link">ማዘዝና ማውጣት</a></li>
	          <li class="nav-item dropdown">
              <p  class="nav-link dropdown-toggle"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">አገልግሎቶቻችን</p>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
              	<a class="dropdown-item" href="{{ route('cafe.adminPage.index') }}">የወጡ ትዕዛዞች ዝርዝር</a>
                <a class="dropdown-item" href="{{ route('cafe.adminPage.create') }}">አዲስ ምርት(ምግብ) ለመመዝገብ</a>
                <a class="dropdown-item" href="{{ route('cafe2.adminPage.create') }}">ደንበኞችን ለመመዝገብ</a>
                <a class="dropdown-item" href="{{ route('download.list') }}">Downloads</a>
                <a class="dropdown-item" href="{{ route('generate.seat') }}">Generate Seat Number</a>
              </div>
            </li>
             @if(Auth::user()->hasRole(['app_admin']))
              <li class="nav-item {{Route::currentRouteName() == 'admin.users.create'?' active':'' }}"><a href="{{ route('admin.users.create') }}" class="nav-link">መልዕክቶች</a></li>
             @else
              <li class="nav-item {{Route::currentRouteName() == 'customer.contact.us'?' active':'' }}"><a href="{{ route('customer.contact.us')}}" class="nav-link">እኛን ይገናኙ</a></li>
             @endif
	          <!--  -->
	          	@guest
	          	 <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
                 @else
               
                    <li class="nav-item dropdown">
                             <div class="media align-items-center">
                                <span class="avatar avatar rounded-circle">
                                    <img alt="Profile pic" src="{{ asset('/mystorage/'.\App\MyClasses\Cheker::getUserProfile())}}" style="width: 75px; height: 75px;float: right;border-radius: 60%;margin-right: 25px">
                                </span>
                                <span class="mb-0 text-sm  font-weight-bold">
                                  
                                  <p  class="nav-link dropdown-toggle" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ auth()->user()->Fname }}</p>
                                </span>
                                
                            </div>
                        <div class="dropdown-menu" aria-labelledby="dropdown04">
                          <a href="{{ url('/') }}">
                            <div class=" dropdown-header noti-title dropdown-item">
                                <h6 class="text-overflow m-0">{{ __('Welcome Page!') }}</h6>
                            </div>
                          </a>
                            <a href="{{route('profile.edit')}}" class="dropdown-item">
                                <i class="ni ni-single-02"></i>
                                <span>{{ __('My profile') }}</span>
                            </a>
                            <a href="{{ route('setting') }}" class="dropdown-item">
                                <i class="ni ni-settings-gear-65"></i>
                                <span>{{ __('Settings') }}</span>
                            </a>
                        
                            @if(!(Auth::user()->hasAnyRoles(['cafe_admin','app_admin','bloger'])))
                              <a href="{{ route('customer.activation.show') }}" class="dropdown-item">
                                  <i class="ni ni-calendar-grid-58"></i>
                                  <span> Activate my account </span>
                              </a>
                            @endif
                            @can('delete-users')
                              <a class="dropdown-item" href="{{ route('admin.users.index') }}">
                                  Users Management
                              </a>
                            @endcan
                            <div class="dropdown-divider"></div>

                            
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                           
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                      </li>
                    @endguest
                 @include('sweetalert::alert')
                 @yield('logincontent')
          </ul>
	      </div>
		  </div>
	  </nav>
    <!-- END nav -->

    @yield('slider')

    @yield('page_contents') 

<!-- Footer -->
@include('layouts.parcials.footer')
<!--  -->
 
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
    $(".btn-add").click(function(e){
        e.preventDefault();
        var values = {};
        $.each($(this).closest("form").serializeArray(),function(i,field){
          values[field.name] = field.value;
        });

        $.ajax({
           type:'POST',
           url:"{{ route('cafe.product.make') }}",
           data:{pid:values['product_id'], type:values['type'], price:values['price'], desc:values['descreption']},
           beforeSend: function(){
              // Show image container
              $("#loader").show();
             },
           success:function(data){
              if (data.success) {
              swal({
                title: 'ተሳክቶዋል!',
                text:  'የመረጡት ምርት ወደ እርሶ ገብቶዋል።',
                type: 'success',
                timer: 3000,
                showConfirmButton:false
            });
          }
        },
        complete:function(data){
          // Hide image container
          $("#loader").hide();
         },
      });
    });
</script>
<script type="text/javascript"> 
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(".btn-fast").click(function(e){
       e.preventDefault();
        var values = {};
        $.each($(this).closest("form").serializeArray(),function(i,field){
          values[field.name] = field.value;
        });
        swal({ 
            title: "እርግጠኛ ነዎት?",
            text: "ካዘዙ ይህ ምርት እንደተሸጠ ነው።",
            type: "warning", 
            showCancelButton: !0,
            confirmButtonText: "አዎ, ተሽጥዋል",
            cancelButtonText: "አይ, ይቅር!",
            reverseButtons: !0
        }).then(function (e) {
        if(e.value === true){
            swal({ 
              title: "ደረሰኝ ይቆረጥን?",
              text: "ደረሰኝ ከተቆረጠ እንደተሸጠ ነው።",
              type: "warning", 
              showCancelButton: !0,
              confirmButtonText: "አዎ, ይቆረጥ",
              cancelButtonText: "አይ, ይቅር!",
              reverseButtons: !0
            }).then(function (e) {
            if(e.value === true){


              $.ajax({
                    
                    type:'POST',
                    url:"{{ route('cafe.finish.fast') }}",
                    data:{pid:values['pid'], quant:values['quant'], name:values['name'], price:values['price'], receit:true},
                    beforeSend: function(){
                      $("#loader").show();
                    },
                    success:function(data){
                    if (data.success == 1) {
                    swal({
                      title: 'ተሳክቶዋል!',
                      text:  'የመረጡት ምርት ታዞዋልም ወጥቶዋም።',
                      type: 'success',
                      timer: 3000,
                      showConfirmButton:true
                  });
                }
                else {
                    swal({
                      title: 'Error!',
                      text:  data.success,
                      type: 'error',
                      timer: 5000,
                      showConfirmButton:true
                  });
                }
              },
              complete:function(data){
                // Hide image container
                $("#loader").hide();
              },
            });
      

            //   alert(e.value);
            //   swal({
            //     title: 'ደረሰኝ መቁረጥ አልተቻለም!',
            //     text:  'Please check the setup of your printer',
            //     type: 'warning',
            //     timer: 4000,
            //     showConfirmButton:true
            // });
            
      }else{
        $.ajax({
               
               type:'POST',
               url:"{{ route('cafe.finish.fast') }}",
               data:{pid:values['pid'], quant:values['quant'], price:values['price']},
               beforeSend: function(){
                $("#loader").show();
               },
               success:function(data){
              if (data.success) {
              swal({
                title: 'ተሳክቶዋል!',
                text:  'የመረጡት ምርት ታዞዋልም ወጥቶዋም።',
                type: 'success',
                timer: 3000,
                showConfirmButton:true
            });
          }
          else {
              swal({
                title: 'Error!',
                text:  data.success + ' የመረጡት ምርት አልታዘዘም',
                type: 'error',
                timer: 3000,
                showConfirmButton:true
            });
          }
        },
        complete:function(data){
          // Hide image container
          $("#loader").hide();
         },
      });
      }
    });}

      else{
        e.dismiss;
      }
      }, function (dismiss) {

            return false;
        });
    });
</script>

<script type="text/javascript">
  function order(data) {
    
    swal({ 
            title: "ይህ ትዕዛዝ  ይውጣን?",
            text: "ይህን ለማድረግ ሁሉ ትዕዛዞች መሰራት አለባቸው!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "አዎ, ሁሉም ተሰርተዋል",
            cancelButtonText: "አይ, ይቅር!",
            reverseButtons: !0
        }).then(function (e) {
            if (e.value === true) {
              swal({ 
              title: "ደረሰኝ ይቆረጥን?",
              text: "ደረሰኝ ከተቆረጠ እንደተሸጠ ነው።",
              type: "warning", 
              showCancelButton: !0,
              confirmButtonText: "አዎ, ይቆረጥ",
              cancelButtonText: "አይ, ይቅር!",
              reverseButtons: !0
            }).then(function (e) {
            if(e.value === true){

              var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type: 'POST',
                    url: "{{ url('cafe/adminPage/sellGroup')}}" ,
                    data: {_token: CSRF_TOKEN, receit:true, ids:data},
                    dataType: 'JSON',
                    beforeSend: function(){
                      // Show image container
                      $("#loader").show();
                     },
                    success: function (results) {
                     
                        if (results.success == 1) {
                          if(results.printer != 1){
                            swal({
                              title: 'ትዕዛዙ ወጥቶዋል፣ ነገር ግን ደረሰኝ መቁረጥ አልተቻለም!',
                              text:  results.printer,
                              type: 'warning',
                              timer: 6000,
                              showConfirmButton:true});
                              location.reload();  
                          }else{
                          location.reload();
                          swal("Done!", results.message, "success");}
                        } else {
                            swal("Error!", results.message, "error");
                        }
                    },
                    complete:function(data){
                    // Hide image container
                    $("#loader").hide();
                   },
                });
            }

              else{
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type: 'POST',
                    url: "{{ url('cafe/adminPage/sellGroup')}}",
                    data: {_token: CSRF_TOKEN , ids:data},
                    dataType: 'JSON',
                    beforeSend: function(){
                      // Show image container
                      $("#loader").show();
                     },
                    success: function (results) {
                        if (results.success == 1) {
                          if(results.printer != 1){
                            swal({
                              title: 'ይቅርታ ደረሰኝ መቁረጥ አልተቻለም!',
                              text:  results.printer,
                              type: 'warning',
                              timer: 4000,
                              showConfirmButton:true}); 
                              location.reload();  
                          }else{
                          location.reload();
                          swal("Done!", results.message, "success");}
                        } else {
                            swal("Error!", results.message, "error");
                        }
                    },
                    complete:function(data){
                    // Hide image container
                    $("#loader").hide();
                   },
                });
            }
            });
          }
             else {
                e.dismiss;
            }

        }, function (dismiss) {

            return false;
        });
  }
</script>

<script type="text/javascript">
    function deleteAny(id, table) {
        swal({
            title: "ይጥፋን?",
            text: "This will delete all related datas!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "አዎ, ማጥፋት እፈልጋለሁ!",
            cancelButtonText: "አይ, ይቅር!",
            reverseButtons: !0
        }).then(function (e) {
            if (e.value == true) {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type: 'POST',
                    url: "{{ url('delete/data/')}}",
                   data: {_token: CSRF_TOKEN, table: table, id: id},
                    dataType: 'JSON',
                    success: function (data) {

                        if (data.result == 1) {
                            location.reload();
                            swal("Done!", "Deleted successfully", "success");
                        } else {
                            swal("Error!","Sorry some error happened", "error");
                        }
                    }
                });
            } else {
                e.dismiss;
            }
        }, function (dismiss) {
            return false;
        });
    }
</script>

<script type="text/javascript">
  function SwitchToggle(id, table, column) {
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
          type: 'POST',
          url: "{{ url('/toggle/switch/')}}",
          data: {_token: CSRF_TOKEN, table:table, column:column, id:id},
          dataType: 'JSON',
      });
}
</script>

<!-- <script type="text/javascript">
  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
  $(".nav-item a").click(function(e){
    $(".nav-item").find(".active").removeClass(".active ");
    $(this).parent().addClass(".active ");
  });
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $("li.active").removeClass(".active ");
    $('a[href="' + location.pathname + '"]').closest('li').addClass(' active');
  });
</script> -->
</html>