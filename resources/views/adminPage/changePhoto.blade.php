@extends('layouts.app')
@section('title')ፎቶ መቀየሪያ@endsection
@section('page_contents')
<section class="ftco-section">
      <div class="container">
        <div class="text-center">
          <div class="text-center">
            <h2 class="mb-4">ፎቶ መቀየሪያ ገፅ</h2>
          </div>
        </div>
        <div class="row d-flex">
        
          @foreach($product as $product)
          <div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry align-self-stretch">
          	  <h3 class="heading mt-2">{{$product['item_name']}}</h3>
              <a href="blog-single.html" class="block-20" style="background-image: url({{asset('mystorage/'.$product['photo'])}});">
              </a>
              <div class="text-center">
              	<form method="post" action="{{route('cafe.adminPage.update',$product['id'])}}" enctype="multipart/form-data">
        	      @csrf
                {{ method_field('PUT')}}
                <input type="hidden" name="id" value="{{$product['id']}}">
                <div class="col-md-6">
                  <div class="form-group">
                      
                      <input type="text" name="item_name" class="form-control" value="{{$product['item_name']}}" required="true"  >
                      @error('item_name')
                           <p style="color: red">
                           <strong>{{ $message }}</strong>
                       </p>
                        @enderror
                  </div>
                    </div>                
                  <div class="col-md-6">
                    <div class="form-group">
                      
                      <input type="file" name="file" class="form-control" required="true">
                      @error('file')
                        <p style="color: red">
                        <strong>{{ $message }}</strong>
                     </p>
                       @enderror
                    </div>
                     
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input class="btn btn-primary btn-outline-primary" type="submit" value="ፎቶ ቀይር">
                    </div>
                  </div>
              	 </form>
              </div>
            </div>
          </div>
         @endforeach
        </div>
      </div>
    </section>
@endsection 