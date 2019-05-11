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
    <input type="text" class="form-control  {{ $errors->has('word') ? 'is-invalid' : ''}}" name="word" id="word"
      placeholder="Ingrese verbo en portugués" value="{{old('word')}}" required>
  </div>
  <div class="form-group">
    <label for="translation">Traducción</label>
    <input type="text" class="form-control  {{ $errors->has('translation') ? 'is-invalid' : ''}}" name="translation"
      id="translation" placeholder="Ingrese la traducción en español" value="{{old('translation')}}" required>
  </div>
  <div class="form-group">
    <label for="type">Traducción</label>
    <select class="form-control" name='type_id' id="type_id">
      @foreach ($types as $type)
      <option value="{{$type->id}}">
        @lang($type->translation)
      </option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="example">Ejemplo</label>
    <textarea class="form-control  {{ $errors->has('example') ? 'is-invalid' : ''}}" name="example" id="example"
      placeholder="Aquí puede ingresar un ejemplo" rows="3">{{old('example')}}</textarea>
  </div>
  <button type="submit" class="btn btn-primary">Agregar verbo</button>
</form>
@endsection