@extends('layouts.main')
@section('main-section')
     
@push('title')
    <title>Home</title>
@endpush
<body  style="background-image: url({{asset('/images/19873.jpg')}}); background-repeat:none; background-size:cover;">
  
  <div class="container my-5"  >
    <h1 class="display-5 fw-bold text-center">Welcome to Job Seeker!</h1>
    <p class="lead text-center">Start your job search today and find the perfect opportunity.</p>
    <div class="row justify-content-center">
    </div>
    <div class="text-center mt-8" >
      <p>Not registered yet? <a href="/register">Create an account</a> to get job alerts.</p>
      
    </div>
  </div>
  

    @if(Session::has('success'))
    <div class="alert alert-success text-center">
      {{ Session::get('success') }}
    </div>
    @endif
  
  
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.bundle.min.js"></script>
  
</body>
  @endsection