<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <!--  -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset ('css/mycss.css')}}">

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                   <h2> የዋርካ ኦንላይን ማዘዣ ዋና ገጽ</h2>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a> 
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('agent/index') }}">Agent?</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->Fname }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a href="{{ route('home') }}" class="dropdown-item">
                                          <i class="ni ni-support-16"></i>
                                      <span>To home page</span>
                                    </a>
                                    @can('delete-users')
                                    <a href="{{ route('setting.open-close.all') }}" class="dropdown-item">
                                          <i class="ni ni-support-16"></i>
                                      <span> Open Close Times </span>
                                    </a>
                                    <a href="{{ route('admin.users.create') }}" class="dropdown-item">
                                        <i class="ni ni-support-16"></i>
                                        <span> Messages </span>
                                    </a>
                                     <a href="{{ route('admin.activation.requests') }}" class="dropdown-item">
                                        <i class="ni ni-calendar-grid-58"></i>
                                        <span>Activation Requests</span>
                                     </a>
                                     <a href="{{ route('upload.show') }}" class="dropdown-item">
                                          <i class="ni ni-support-16"></i>
                                      <span>Upload</span>
                                    </a>
                                    <a href="{{ route('agent.list') }}" class="dropdown-item">
                                          <i class="ni ni-support-16"></i>
                                      <span>Agents</span>
                                    </a>
                                     <a class="dropdown-item" href="{{ route('admin.users.index') }}">
                                        Users Management
                                     </a>
                                    @endcan
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
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
            @include('sweetalert::alert')
        </main>
    </div>
    
</body>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>


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

</html>
