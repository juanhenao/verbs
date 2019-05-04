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
<form method="POST" action="/verbs/{{$verb->id}}">
  @csrf
  @method('PATCH')
  <div class="form-group  ">
    <label for="verb">Verbo</label>
    <input type="text" class="form-control {{ $errors->has('verb') ? 'is-danger' : ''}}" name="verb" id="verb"
      value="{{$verb->verb}}" placeholder="Ingrese verbo en portugués" required>
  </div>
  <div class="form-group">
    <label for="translation">Traducción</label>
    <input type="text" class="form-control {{ $errors->has('translation') ? 'is-danger' : ''}}" name="translation"
      id="translation" value="{{$verb->translation}}" placeholder="Ingrese la traducción en español" required>
  </div>
  <button type="submit" class="btn btn-primary">Actualizar verbo</button>
</form>
<form method="POST" action="/verbs/{{$verb->id}}">
  @csrf
  @method('DELETE')
  <button type="submit" class="btn btn-primary">Eliminar</button>
</form>
@endsection