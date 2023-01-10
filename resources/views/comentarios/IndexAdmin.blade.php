@extends('layouts.app')
@section('content')

    @forelse($comentarios as $comentario )
   
    

      <div class="container">

   

<body>  
      <h5>{{$comentario->id}} - {{$comentario->descricao}} - {{ $comentario->user->name }}
  </h5>
        <form action="{{ url('comentarios/destroy/'.$comentario->id) }}" method="POST">
            <a class="btn btn-info" href="{{ url('comentarios/show',$comentario->id) }}">Show</a>
            <a class="btn btn-primary" href="{{ url('comentarios/edit',$comentario->id) }}">Edit</a>
            @csrf
            <button type="submit" class="btn btn-danger">Delete</button>
            
        </form>
          
        
            
           
      

       
    </div>

    
    
    </body>


    @empty
    <h5 class="text-center">No Comments Found!</h5>
    @endforelse

                 
  <!-- Vendor JS Files -->
  <script src="{{ asset('import/assets/vendor/aos/aos.js')}}"></script>
  <script src="{{ asset('import/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('import/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{ asset('import/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{ asset('import/assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('import/assets/js/main.js')}}"></script>

@endsection