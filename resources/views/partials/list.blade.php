@foreach ($pictures as $picture)
<img src="{{asset('storage/images/'.$picture->path)}}" alt="{{$picture->name}}" width="200" height="auto"> <!-- //asset forma automatica de ir ao stoarge -->
@endforeach         