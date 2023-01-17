
@extends('layouts.app')

@section('content')



<div class="container">
    <div class="row justify-content-center">
       


<body>
<h5>       Es um cliente
</h5> 
<div class="card-body">
              <!-- @include('partials.list') -->
                </div>
               
                <div class="card-body">

                    <a href="{{url('/anuncios')}}" class="btn btn-secondary">Ver lista de anuncios</a>
                </div>
                <br> </br>

                  <div class="card-body">

                    <a href="{{url('/comentarios')}}" class="btn btn-secondary">Ver lista de comentarios ao site</a>
                    <br> </br>
                    <p align="center"> 
                                <img src="{{asset('storage/images/marketplace.png')}}"  alt="" name="image "width="auto" height="auto"> <!-- //asset forma automatica de ir ao stoarge -->
                    </p>
                </div>
              
  <!-- Vendor JS Files -->
  <script src="{{ asset('import/assets/vendor/aos/aos.js')}}"></script>
  <script src="{{ asset('import/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('import/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{ asset('import/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{ asset('import/assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('import/assets/js/main.js')}}"></script>

</body>
    </div>
</div>
@endsection

 

  
