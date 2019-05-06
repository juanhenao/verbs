@extends('layout')

@section('content')
<h1>Agregar verbo</h1>
@if ($errors->any())
<div class="alert alert-danger" role="alert">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
  </ul>
</div>
@endif
<form method="POST" action="/words">
  @csrf
  <div class="form-group">
    <label for="word">Verbo</label>
    <input type="text" class="form-control  {{ $errors->has('word') ? 'is-danger' : ''}}" name="word" id="word"
      placeholder="Ingrese verbo en portugués" value="{{old('word')}}" required>
  </div>
  <div class="form-group">
    <label for="translation">Traducción</label>
    <input type="text" class="form-control  {{ $errors->has('translation') ? 'is-danger' : ''}}" name="translation"
      id="translation" placeholder="Ingrese la traducción en español" value="{{old('translation')}}" required>
  </div>
  <button type="submit" class="btn btn-primary">Agregar verbo</button>
</form>
@endsection