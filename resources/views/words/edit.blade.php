@extends('layout')

@section('content')
<h1>Editar verbo</h1>
@if ($errors->any())
<div class="alert alert-danger" role="alert">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
  </ul>
</div>
@endif
<form method="POST" action="/words/{{$word->id}}">
  @csrf
  @method('PATCH')
  <div class="form-group  ">
    <label for="word">Verbo</label>
    <input type="text" class="form-control {{ $errors->has('word') ? 'is-danger' : ''}}" name="word" id="word"
      value="{{$word->word}}" placeholder="Ingrese verbo en portugués" required>
  </div>
  <div class="form-group">
    <label for="translation">Traducción</label>
    <input type="text" class="form-control {{ $errors->has('translation') ? 'is-danger' : ''}}" name="translation"
      id="translation" value="{{$word->translation}}" placeholder="Ingrese la traducción en español" required>
  </div>
  <button type="submit" class="btn btn-primary">Actualizar wordo</button>
</form>
<form method="POST" action="/words/{{$word->id}}">
  @csrf
  @method('DELETE')
  <button type="submit" class="btn btn-primary">Eliminar</button>
</form>
@endsection