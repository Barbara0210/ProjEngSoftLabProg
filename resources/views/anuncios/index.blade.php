@extends('layouts.app')
@section('content')

    @forelse($anuncios as $anuncio )
   
    

      <div class="container">

    <div id="portfolio-grid" class="row no-gutter" data-aos="fade-up" data-aos-delay="200">
    <div class="item web col-sm-6 col-md-4 col-lg-4 mb-4">

<body>
    <h5>Titulo:  {{$anuncio->titulo}}</h5>
            <a href="{{ url('anuncios/show',$anuncio->id) }}" class="item-wrap fancybox" >
              <div class="work-info">
               
                <h3>{{$anuncio->titulo}}</h3>
                <h5>{{$anuncio->id}} - {{$anuncio->titulo}} - {{$anuncio->preco}} - {{$anuncio->estado}} - {{$anuncio->descricao}} - {{$anuncio->user->name}}</h5>
              </div>

              
              <img src="{{asset('storage/images/'.$anuncio->path)}}" alt="{{$anuncio->name}}" width="450" height="auto">
            </a>




            
           
      

          </div>
    </div>
    </div>

    
    
    </body>


    @empty
    <h5 class="text-center">No Anuncios Found!</h5>
    @endforelse

{!! $anuncios->links('pagination::bootstrap-4') !!}
                 
  <!-- Vendor JS Files -->
  <script src="{{ asset('import/assets/vendor/aos/aos.js')}}"></script>
  <script src="{{ asset('import/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('import/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{ asset('import/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{ asset('import/assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('import/assets/js/main.js')}}"></script>

@endsection