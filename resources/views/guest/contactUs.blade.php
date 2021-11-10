 @extends('layouts.myapp')

@section('title')እኛን ይገናኙን@endsection

@section('page_contents')
 <section class="ftco-section contact-section">
  <div class="container mt-5">
    <div class="row block-9">
				<div class="col-md-1"></div>
      <div class="col-md-6 ftco-animate">
        <form action="{{ route('customer.contact') }}" method="post" class="contact-form">
          @csrf
        	<div class="row">
        		<div class="col-md-6">
                <div class="form-group">
                  <input type="text" name="name" class="form-control" placeholder="ስምዎ (Opitional)">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                  <input type="text" name="phone" class="form-control" placeholder="ስልክ (Opitional)">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                  <input type="email" name="email" required="" class="form-control" placeholder="ኢ ሜይልዎ">
                </div>
                </div>
          </div>
          <div class="form-group">
            <input type="text" name="subject" required="" class="form-control" placeholder="ርዕስ">
          </div>
          <div class="form-group">
            <textarea name="body" id="" cols="30" rows="7" class="form-control" placeholder="መልዕክትዎ እዚህጋ ይጻፉ"></textarea>
          </div>
          <div class="form-group">
            <input type="submit" value="መልዕክቱ ላክ" name="send" class="btn btn-primary py-3 px-5">
          </div>
        </form>
      </div>
    </div>
    <div class="col-md-4 contact-info ftco-animate">
          <div class="row">
            <div class="col-md-12 mb-4">
              <h2 class="h4">Contact Information</h2>
            </div>
            <div class="col-md-12 mb-3">
              <p><span>አድራሻ:</span> አጠና ተራ X ህንጻ 4ኛ ፎቅ ቢሮ 4323</p>
            </div>
            <div class="col-md-12 mb-3">
              <p><span>ስልክ:</span> <a href="tel://1234567920">+ 251 939 67 67 14</a></p>
            </div>
            <div class="col-md-12 mb-3">
              <p><span>ኢ ሜይል:</span> <a href="nesren@warkaorder.com">nesren@warkaorder.com</a></p>
            </div>
            <div class="col-md-12 mb-3">
              <p><span>ድረገጽ:</span> <a href="https://www.warkaorder.com">www.warkaorder.com</a></p>
            </div>
          </div>
        </div>
  </div>
</section>
@endsection