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
<form method="POST" action="{{ action('WordController@update', ['id' => $word->id])}}">
    @csrf
    @method('PATCH')
    <div class="form-group  ">
        <label for="word">Verbo</label>
        <input type="text" class="form-control  {{ $errors->has('word') ? 'is-invalid' : ''}}" name="word" id="word"
            value="{{$word->word}}" placeholder="Ingrese verbo en portugués" required>
    </div>
    <div class="form-group">
        <label for="translation">Traducción</label>
        <input type="text" class="form-control  {{ $errors->has('translation') ? 'is-invalid' : ''}}" name="translation"
            id="translation" value="{{$word->translation}}" placeholder="Ingrese la traducción en español" required>
    </div>
    <div class="form-group">
        <label for="type">Tipo de palabra</label>
        <select class="form-control" name='type_id' id="type_id">
            @foreach ($types as $type)
            <option value="{{$type->id}}" {{$type->id==$word->type_id?'selected':''}}>
                @lang($type->translation)
            </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="collection_id">Colección</label>
        <select class="form-control" name='collection_id' id="collection_id">
            @foreach ($collections as $collection)
            <option value="{{$collection->id}}" {{$collection->id==$word->collection_id?'selected':''}}>
                @lang($collection->name)
            </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="example">Ejemplo</label>
        <textarea class="form-control  {{ $errors->has('example') ? 'is-invalid' : ''}}" name="example" id="example"
            placeholder="Aquí puede ingresar un ejemplo" rows="3">{{$word->example}}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Actualizar verbo</button>
</form>
<form method="POST" action="{{action('WordController@destroy', ['id' => $word->id])}}">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-primary">Eliminar</button>
</form>
@endsection
