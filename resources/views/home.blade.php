@extends('layouts.app')
@section('slider') 
<section class="home-slider owl-carousel" style="margin-top: 60px; height: 300px;">

  <div class="slider-item" style="height: 300px;background-image: url({{ asset('/backend/images/bg_1.jpg')}});">
  	<div class="overlay"></div>
    <div class="container">
      <div style="height: 130px;"class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
        <div class="col-md-8 col-sm-12 text-center ftco-animate">
        	<span class="subheading">Welcome</span>
          <h4 class="mb-4">The Best Ordering System</h4>   
          <p><a href="{{URL::to('cafes/adminPage')}}" class="btn btn-primary p-3 px-xl-4 py-xl-3">የርሶን ሜኑ ለማየት</a> <a href="{{ route('cafe2.adminPage.show', Auth::user()->id) }}" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">ትዕዛዞችን ለማየት</a></p>
        </div>
      </div>
    </div> 
  </div>

  <div class="slider-item" style="height: 300px;background-image: url({{ asset('/backend/images/bg_2.jpg')}});">
  	<div class="overlay"></div>
    <div class="container">
      <div style="height: 130px;"class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
        <div class="col-md-8 col-sm-12 text-center ftco-animate">
        	<span class="subheading">Welcome</span>
          <h4 class="mb-4">Amazing Taste &amp; Beautiful Place</h4>
          <p><a href="{{ url('cafes/adminPage')}}" class="btn btn-primary p-3 px-xl-4 py-xl-3">My Menu Lists</a></p>
        </div>
      </div>
    </div>
  </div>
 
  <div class="slider-item" style="height: 300px;background-image: url({{asset('/backend/image2/1605414815985.jpg')}});">
  	<div class="overlay"></div>
    <div class="container">
      <div style="height: 130px;" class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
        <div class="col-md-8 col-sm-12 text-center ftco-animate">
        	<span class="subheading">Welcome </span>
          <h4 class="mb-4"> Be Popular Within Digital Technology </h4>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection

@section('page_contents')
    
<section class="ftco-about d-md-flex">
  <div class="one-half img" style="background-image: url({{ asset('backend/images/about.jpg')}});"></div>
  <div class="one-half ftco-animate">
    <div class="overlap">
      <div class="heading-section ftco-animate ">
        <span class="subheading">የዚህ ድረ ገጽ አጠቃቀም እንዴት ነው?</span>
        <h2 class="mb-4">መመርያ</h2>
      </div>
        
      <div style="color: white">
        <p>በመጀመርያ ማንኛውም የሆቴል የካፌም ይሁን የሬስቶራንት ማናጀር ይህን በዚህ ድረ ገጽ አካውንት በመክፈት ለድርጅቱ ማዋል ይችላል።  እኝህ ድርጅቶች አንዴ ከተመዘገቡ በኋላ ለደንበኞቻቸው እጅግ ዘመናዊና ቀልጣፋ አገልግሎት መስጠት ያስችላቸዋል። 
          <ul>Quick references</ul>
          <li><a href="{{ route('customer.activation.show') }}">አካውንቱ ማስጀመር/ Activate account</a></li>
          <li><a href="{{ url('cafes/adminPage') }}">የርሶን ሜኑ ለመስራት/ Manage your menu which reaches to customer</a></li>
          <li><a href="{{route('cafe2.adminPage.show', Auth::user()->id)}}">ወደርስዎ የመጡ ትዕዛዞች ለማየት/See requests</a></li>
          <li><a href="{{ route('cafe.order.out')}}">ፈጣን /ድንገተኛ ማዘዣና ማውጫ</a></li>
        </p>
        <h2 class="mb-4" style="color: rgb(155, 12,55);">ሆቴሉ/ካፌው ምን ይጠቀማል?</h2>
        <p style="color: rgba(255,155,155,10);">
          ትንሹ እና ግልፅ የሆነው ነገር ይህን ሲስተም በመጠቀም በአስተናጋጆች ወይም በሂሳብ ሰብሳቢው አማካኝነት የሚፈጠር ማንኛውም አይነት የሂሳብ ስህተት ማስቀረቱ ነው። አንድ ተስተናጋጅ አስተናጋጆችን ለምን ቶሎ አትታዘዙም, ከኔ ባኋላ ያዘዘን አስቀዳማችሁ በሚል በተስተናጋጆችና በአስተናጋጆች መሃል የሚፈጠር ማንኛውም አይነት ቅራኔ ወይም ጭቅጭቅ ያስቀራል። 
        </p>
      </div>
    </div>
   </div>

</section>
<h4 style="color: rgb(255,43,122);">Video helps</h4>
<div >
  <iframe width="355" height="315" src="https://www.youtube.com/embed/T91acsxL0nU" frameborder="" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>   
@endsection 