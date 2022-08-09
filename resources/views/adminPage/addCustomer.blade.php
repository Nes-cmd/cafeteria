 @extends('layouts.app')

@section('title') የደንበኞች መመዝገቢያ@endsection

@section('page_contents')
 <section class="ftco-section contact-section">
  <div class="container mt-5">
    <div class="row block-9">
      <div class="col-md-6 ftco-animate">
        <form action="{{route('cafe2.adminPage.store')}}" method="post" class="contact-form">
        	@csrf
        	<div class="row">
        		<div class="col-md-6">
                <div class="form-group">
                  <input type="text" name="exact_location" required="" value="{{ old('exact_location') }}" class="form-control" placeholder="የደንበኛው የሚታወቅ እድራሻ/known adress">
                  @error('exact_location')
                    <p style="color: red">{{ $message }}</p>
                   @enderror
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                  <input type="phone" name="telephone" value="{{ old('telephone') }}" class="form-control" placeholder="ስልክ ቁጥር/phone">
                   @error('telephone')
                    <p style="color: red">{{ $message }}</p>
                   @enderror
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <label>ኮድ: ባዶ ከተዉት የስልክ ቁጥሩ የመጨረሻ 4 ቁጥሮች ይሆናሉ</label>
                <div class="form-group">
                  <input type="text" name="code" class="form-control" placeholder="ኮድ/code">
                  @error('code')
                    <p style="color: red">{{ $message }}</p>
                   @enderror
                </div>
            </div>
          </div>
          <div class="form-group">
            <input type="submit" value="ደብኛን ይመዝግቡ" class="btn btn-primary py-3 px-5">
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<section class="ftco-section" style="color: white">
  <div class="container">
    <h3 class="text-center" style="color: green">በርስዎ ድርጅት የሚታወቁ ደንበኞች ዝርዝር</h3>
    <div class="row"> 
       <div class="col-md-12 ftco-animate">
          <div class="cart-list">
            <table >
                <thead >
                <tr >
                  <th height="30" width="8%">የደንበኛው መገኛ ቦታ</th>
                  <th height="30" width="8%">ስልክ ቁጥር</th>
                  <th height="30" width="8%">ኮድ</th>
                </tr>
              </thead>
              <tbody>
                @foreach($customers as $customer)
                <tr >
                  <td height="30" width="8%">{{ $customer->exact_location }}</td>
                  <td height="30" width="8%">{{ $customer->telephone }}</td>
                  <td height="30" width="8%">{{ $customer->code }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
      </div>
    </div>  
   </div>
  </div>
</section>
@endsection