<!DOCTYPE html> 
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title></title>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css')}}">
</head>
<body>
  <div class="container">
    <div class="row" id="app">
      <h1 class="text-center">Chat room</h1><br>
        <ul class="list-group offset-4 col-4">
          <h1>Chat room</h1>
          <input type="text" class="form-control" name="text" placeholder="type here" v-model='message' @keyup.enter='send'>
        </ul>
    </div>
  </div>
  <script src="{{ asset('js/app.js')}}"></script>
</body>
</html> 