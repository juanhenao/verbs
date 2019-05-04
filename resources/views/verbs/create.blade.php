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
<form method="POST" action="/verbs">
  @csrf
  <div class="form-group">
    <label for="verb">Verbo</label>
    <input type="text" class="form-control  {{ $errors->has('verb') ? 'is-danger' : ''}}" name="verb" id="verb"
      placeholder="Ingrese verbo en portugués" value="{{old('verb')}}" required>
  </div>
  <div class="form-group">
    <label for="translation">Traducción</label>
    <input type="text" class="form-control  {{ $errors->has('translation') ? 'is-danger' : ''}}" name="translation"
      id="translation" placeholder="Ingrese la traducción en español" value="{{old('translation')}}" required>
  </div>
  <button type="submit" class="btn btn-primary">Agregar verbo</button>
</form>
@endsection