@extends('layouts.main')
@section('main-section')
    
@push('title')
    <title>Sign-Up</title>
@endpush


<div class="row " style="  height:92vh; margin:0;">
  
  <div class="col-md-8 mx-auto" style=" background-image: url('{{ asset('/images/Mobile-login.jpg') }}'); background-repeat: no-repeat; background-size:contain;   ">
<form action="{{url('/')}}/register" method="post" class="my-5" enctype="multipart/form-data">
{{-- for generating random token --}}
  @csrf 
  <h1  class="text-center fw-bold" style="background-color:rgb(0, 0, 0); color:white;">Sign-Up</h1>

            {{-- username --}}
            <div class="row">
              <div class="col-md-6">
                  <div class="mb-3">
                      <label for="Name" class="form-label">Name</label>
                      <input type="text" class="form-control" id="Name" name="name"
                          placeholder="Enter your Name" >
                      @error('name')
                      <div class="text-danger">{{ $message }}</div>
                      @enderror
                  </div>
              </div>

              {{-- city --}}

              <div class="col-md-6">
                  <div class="mb-3">
                      <label for="City" class="form-label">City</label>
                      <input type="text" class="form-control" id="City" name="city" placeholder="Enter your city"
                          >
                      @error('city')
                      <div class="text-danger">{{ $message }}</div>
                      @enderror
                  </div>
              </div>
          </div>

          {{-- mobile number --}}
          <div class="row">
              <div class="col-md-6 ">
                  <div class="mb-3">
                      <label for="mobileNumber" class="form-label">Mobile Number</label>
                      <input type="tel" class="form-control" id="mobileNumber" name="mobileNumber"
                          placeholder="Enter your mobile number" >
                      @error('mobileNumber')
                      <div class="text-danger">{{ $message }}</div>
                      @enderror
                  </div>
              </div>

              {{-- email --}}
              <div class="col-md-6">
                  <div class="mb-3">
                      <label for="Email" class="form-label">Email</label>
                      <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email"
                          >
                      @error('email')
                      <div class="text-danger">{{ $message }}</div>
                      @enderror
                  </div>
              </div>
          </div>

          {{-- Address --}}
          <div class="row">
              <div class="col-md-6">
                  <div class="mb-3">
                      <label for="Address" class="form-label">Address</label>
                      <input type="text" class="form-control" id="address" name="address"
                          placeholder="Enter your address" >
                      @error('address')
                      <div class="text-danger">{{ $message }}</div>
                      @enderror
                  </div>
              </div>

  {{--State--}}

  <div class="col-md-6">
    <div class="mb-3">
        <label for="State" class="form-label">State</label>
        <input type="text" class="form-control" id="State" name="state"
            >
        @error('state')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
</div>
</div>

{{-- pdf file --}}
<div class="mb-3">
  <label for="" class="form-label">Upload your resume</label>
  <input type="file" class="form-control" name="resume" >

</div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
  </div>
</div>

@endsection