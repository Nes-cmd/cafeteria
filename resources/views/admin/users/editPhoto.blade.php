@extends('layouts.app')
@section('title') Edit Users @endsection
@section('page_contents')
   
<section class="ftco-section">
      <div class="container">
        <div class="text-center">
          <div class="text-center">
            <h2 class="mb-4">Profile መቀየሪያ ገፅ</h2>
          </div>
        </div>
        <div class="row d-flex">
        
          @foreach($user as $user)
          <div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry align-self-stretch">
              <div class="text-left">
              <form method="post" action="{{URL::to('updateProfile')}}" enctype="multipart/form-data">
                @csrf
            	  <label >የመጀመርያ ስም
                 <input class="btn btn-primary btn-outline-primary col-md-12 text-left" required="true" type="text" name="Fname" value="{{$user->Fname}}">
                 @error('Fname')
                    <p style="color: red">
                       <strong>{{ $message }}</strong>
                    </p>
                  @enderror
                 </label><br>

                 <label >ሁላተኛ ስም
                 <input class="btn btn-primary btn-outline-primary col-md-12 text-left" required="true" type="text" name="Lname" value="{{$user->Lname}}">
                 @error('Lname')
                    <p style="color: red">
                       <strong>{{ $message }}</strong>
                    </p>
                  @enderror
                 </label><br>

                 <label >ኢ-ሜይል
                 <input class="btn btn-primary btn-outline-primary col-md-12 text-left" required="true" type="email" name="email" value="{{$user->email}}">
                 @error('email')
                    <p style="color: red">
                       <strong>{{ $message }}</strong>
                    </p>
                  @enderror
                 </label><br>

                 <label >የስራ ቦታዎ አድራሻ
                 <input class="btn btn-primary btn-outline-primary col-md-12 text-left" required="true" type="text" name="work_place" value="{{$user->work_place}}">
                 </label><br>

                 <label >የድርጅትዎ ሙሉ ስም
                 <input class="btn btn-primary btn-outline-primary col-md-12 text-left" required="true" type="text" name="org" value="{{$user->org}}">
                 @error('org')
                    <p style="color: red">
                       <strong>{{ $message }}</strong>
                    </p>
                  @enderror
                 </label><br>

                 <label >ስልክ ቁጥር
                 <input class="btn btn-primary btn-outline-primary col-md-12 text-left" required="true" type="text" name="telephone" value="{{$user->telephone}}">
                 @error('telephone')
                    <p style="color: red">
                       <strong>{{ $message }}</strong>
                    </p>
                  @enderror
                 </label><br>
                 <label  class="block-20" >ፎቶ<br>
                   <img src="{{asset('/mystorage/'.$user->url)}}" alt="የድርጅትዎ ፎቶ ወይም ሎጎ" style="height: 350px;width: 370px">
                 </label>
                
                 
            	      <input type="hidden" name="id" value="{{$user->id}}">
                	  <input type="file"  name="file">
                    @error('file')
                      <p style="color: red">
                         <strong>{{ $message }}</strong>
                      </p>
                    @enderror
                	  <input class="btn btn-primary btn-outline-primary col-md-12" type="submit" value="ፕሮፋይል ቀይር">
                	 </form>
                </div>
              </form>
            </div>
          </div>
         @endforeach
         
        </div>
      </div>
  <div class="container">
    <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#demo">Change Password Here</button>
      <div id="demo" class="collapse">
        <div class="col-md-4 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <div class="text-left">
              <form method="post" action="{{ route('cafe.change.password') }}" >
                @csrf
                <label >የአሁኑ ማለፊያ ቃል/Current Password
                 <input class="btn btn-primary btn-outline-primary col-md-12 text-left" required="true" type="password" name="old_password">
                 @error('old-password')
                    <p style="color: red">
                       <strong>{{ $message }}</strong>
                    </p>
                  @enderror
                 </label><br>

                 <label > አዲስ የማለፍያ ቃል/New password
                 <input class="btn btn-primary btn-outline-primary col-md-12 text-left" required="true" type="password" name="password" >
                 @error('password')
                    <p style="color: red">
                       <strong>{{ $message }}</strong>
                    </p>
                  @enderror
                 </label><br>

                 <label >ከላይ ያስገቡትን ትድገሙ/Confirm
                 <input class="btn btn-primary btn-outline-primary col-md-12 text-left" required="true" type="password" name="password_confirmation">
                
                 </label><br><br>
                 <input class="btn btn-primary btn-outline-primary col-md-12" type="submit" value="የማለፍያ ቃል ቀይር">
               </form>
             </div>
           </div>
         </div>
      </div>
  </div> 
    </section>
@endsection 