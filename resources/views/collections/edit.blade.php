@extends('layout')

@section('content')
<h1>Editar colección</h1>
@if ($errors->any())
<div class="alert alert-danger" role="alert">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
<form method="POST" action="{{ action('CollectionController@update', ['id' => $collection->id])}}">
    @csrf
    @method('PATCH')
    <div class="form-group  ">
        <label for="name">Nombre</label>
        <input type="text" class="form-control  {{ $errors->has('name') ? 'is-invalid' : ''}}" name="name" id="name"
            value="{{$collection->name}}" required>
    </div>
    <button type="submit" class="btn btn-primary">Actualizar colección</button>
</form>
<form method="POST" action="{{action('CollectionController@destroy', ['id' => $collection->id])}}">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-primary">Eliminar</button>
</form>
@endsection
