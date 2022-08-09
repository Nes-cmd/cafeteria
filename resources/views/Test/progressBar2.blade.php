<!DOCTYPE html>
<html>
<head>
    <title>Laravel 7 Progress Bar File Upload Using Tutorial</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
    <style>
        .progress { position:relative; width:100%; }
        .bar { background-color: #b5076f; width:0%; height:20px; }
        .percent { position:absolute; display:inline-block; left:50%; color: #040608;}
   </style>
</head>
<body>
  
<div class="container mt-5">
    
    <div class="card">
      <div class="card-header text-center">
        <h2>Laravel 7 Progress Bar File Upload Using Tutorial</h2>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ url('fileUploadPost2') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <input name="file" type="file" class="form-control"><br/>
            <div class="progress">
                <div class="bar"></div >
                <div class="percent">0%</div >
            </div>
            <br>
            <input type="submit"  value="Submit" class="btn btn-primary">
        </div>
    </form>
      </div>
    </div>
     
</div>
<script type="text/javascript">
    var SITEURL = "{{URL('/')}}";
    $(function() {
         $(document).ready(function()
         {
            var bar = $('.bar');
            var percent = $('.percent');
      $('form').ajaxForm({
        beforeSend: function() {
            var percentVal = '0%';
            bar.width(percentVal)
            percent.html(percentVal);
        },
        uploadProgress: function(event, position, total, percentComplete) {
            var percentVal =  percentComplete + '%';
            bar.width(percentVal)
            percent.html(percentVal);
         },
         success: function() {
            var percentVal = 'Wait, Saving';
            bar.width(percentVal)
            percent.html(percentVal);
        },
        complete: function(xhr) {
            //alert('File Has Been Uploaded Successfully');
            var percentVal = 'File Has Been Uploaded Successfully';
            bar.width(percentVal);
            percent.html(percentVal);
            // swal('File Has Been Uploaded Successfully');
            window.location.href = SITEURL +"/"+"test2";
        }
      });
   }); 
 });
</script>
</body>
</html>