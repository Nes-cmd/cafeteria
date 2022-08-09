@extends('layouts.myapp')
@section('title') እንኳን ደህና መጡ - ዋርካ ኦንላይን ማዘዣ @endsection
@section('page_contents')
<h2 style="color: white" class="ftco-animate appointment"> ለማዘዝ ከካፌዎቻችን ይምረጡ
  <form action="{{ route('customer.cafe.search') }}" method="get">
      {{ csrf_field() }}
      <div class="form-group">
        <div class="d-flex">
          <input type="text" name="cafe" id="cafe" required="" placeholder="ወይም ካፌ ይፈልጉ...." class="btn btn-primary btn-outline-primary float-left">
          <input type="submit" name="" value="ፈልግ" class="btn btn-primary btn-outline-primary float-left">
        </div>
        <div id="cafelist">
        </div>
      </div>
  </form> 
</h2>
<section class="ftco-section">
  <div class="container">
    <div class="row d-flex">
      @foreach($cafes as $cafe)
      
      @if(time() <= strtotime($cafe->close_at) && $cafe->status)
      <div class="col-md-4 d-flex ftco-animate">
        <div class="blog-entry align-self-stretch">
          <div style="color: white"><a href="{{ route('customer.choose.cafe',$cafe->id)}}"><h4>{{ $cafe->org}}</h4></a></div>
          <a href="{{ route('customer.choose.cafe',$cafe->id)}}">
          <img src="{{asset('/mystorage/'.$cafe->url)}}" class="block-20" style="height: 150px;width: 200px;">
          </a>
          <div class="text py-4 d-block">
            <div class="meta">
              <div style="color: white"><a href="{{ route('customer.choose.cafe',$cafe->id)}}">አድራሻ/Adress፡ {{ $cafe->work_place}}</a></div>
              <div style="color: white"><a href="tel:+251{{substr($cafe->telephone,1)}}">Tel {{ $cafe->telephone}}</a></div>
            </div>
          </div>
        </div>
      </div>
      @else
      <div class="col-md-4 d-flex ftco-animate">
        <div class="blog-entry align-self-stretch">
          <div class="btn-sorry" style="color: white"><h2>{{ $cafe->org}}</h2></div>
          <img  class="btn-sorry" src="{{asset('/mystorage/'.$cafe->url)}}" class="block-20" style="height: 150px;width: 200px;">
          
          <div class="text py-4 d-block">
            <div class="meta">
              <div class="btn-sorry" style="color: white"><a  href="#">አድራሻ/Adress፡ {{ $cafe->work_place}}</a></div>
              <div class="btn-sorry" style="color: white"><a href="tel://+251{{substr($cafe->telephone,1)}}">Tel {{ $cafe->telephone}}</a></div>
              <p style="color: red">ይቅርታ ለአሁኑ ዝግ ነው። </p>
            </div>
          </div>
        </div>
      </div>
      @endif
      @endforeach
    </div> 
  </div>
</section>

<section class="ftco-about d-md-flex">
  <div class="one-half img"></div>
  <div class="one-half ftco-animate">
    <div class="overlap">
      <div class="heading-section ftco-animate appointment">
        <span class="subheading">እንዴት ልዘዝ?</span>
        <h2 class="mb-4">መመርያ</h2>
      </div>
      <h2 style="color: white">በመጀመርያ እዚህ ገጽ ላይ የሚፈልጉትን ካፌ ወይም ሆቴል ይምረጡ</h2>
        
      <div style="color: white">
        <p>ሰዎች በስልካቸው አማካኝነት ካሉበት ቦታ ሆነው ይህን ዌብሳይት(የስልክ መተግበርያ) በመክፈት ካፌውን ይመርጣሉ። በመቀጠልም ሲስተሙ በመረጡት ካፌ ውስጥ <a href="{{route('welcomee')}}">ያሉ ነገሮችን ዝርዝር ከነ ሂሳቡ ያሳያቸዋል</a> ። የፈለጉትን በመምረጥ ማዘዣው ላይ ያጠራቅማሉ። በመቀጠልም  ወደ ካፌው <a href="{{URL::to('customer/cart')}}"> ትዕዛዝ ላክ</a> የሚለውን በመንካትና ያሉበትን ቦታ አድራሻ በመሙላት ወደ ካፌው ትዕዛዝ ላክ የሚለውን በመጫን ትዕዛዛቸውን ይልካሉ።ያሉበት ቦታ አድራሻ ሲባል ካፌ ውስጥ ከሆኑ የተቀመጡበት ወንበር ቁጥር እና ኮድ ሲሆን ሱቅ,ቤሮ ወይም ሌላ ቦታ ከሆኑ ደግሞ ሲመዘገቡ የሚያስገቡት አድራሻቸውንና የሚመርጡት ኮድ ነው። ይህ ጥያቄ ወይም የደንበኞች ትእዛዝ(request) ወደ ተላከው ካፌ ይመጣል። ካፌው ውስጥ እነዚህን ትዕዛዞች ለማስተናገድ የተቀመጠው ሰው(አድሚን) በኮምፕዩተሩ ወይም በስልኩ ትዕዛዞችን ማየት ይችላል። አንድ ትዕዛዝ በሚመጣለት ጊዜ አንድ ሰው ከየት ምን እንዳዘዘ ያስነብበዋል። በተጨማሪም ለታዘዘው ትዕዛዝ ሂሳብ ስንት እንደሆነ በማስላት ያስነብባል። ከዚያም አድሚኑ ትዕዛዙን በማሰራት ወደ ታዘዘው ቦታ በአስተናጋጆች በኩል ይልካል። በዚህ መልኩ ማንኛውም ሰው ከስራ ቦታውም ሆነ እካፌው ሆኖ በቀላሉ መስተናገድ ይችላል።</p>
      </div>
    </div>
  </div>
</section>
<h4 style="color: rgb(255,43,122);">Video helps</h4>
<div >
  <span class="float-left" style="color: white">How to order</span><br>
  <iframe width="365" height="315" src="https://www.youtube.com/embed/e6pvxLc6DKg" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>
@endsection