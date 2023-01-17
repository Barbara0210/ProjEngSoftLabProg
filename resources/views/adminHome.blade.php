@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">


<body>
  <h5>       Es um Admin
</h5> 
<div class="card-body">
                     <a   href="{{url('/users')}}" class="btn btn-secondary">{{ __('Gerir Utilizadores') }}</a>
                     
                      
                     <a   href="{{url('/comentarios')}}" class="btn btn-secondary">{{ __('Gerir Comentarios') }}</a>
                   
                    <a href="generate-pdf" class="btn btn-secondary" > Gerar PDF com lista de Utilizadores</a>
               
                <br> </br>
</div>
  



<div class="card-body">
                    @if ($message = Session::get('status'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                    @endif
               <!--   @include('partials.upload') -->
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

 
