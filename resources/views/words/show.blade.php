@extends('layout')

@section('content')
<h1>Palabra</h1>
<div class="card">
    <div class="card-header">
        <h4>{{$word->word}} <span class="badge badge-success">@lang($word->type->translation)</span></h4>
    </div>
    <div class="card-body">
        <h5 class="card-title">Significado: {{$word->translation}}</h5>
        <p class="card-text">Ejemplo: {{$word->example}}</p>
        <a class="btn btn-primary" href="{{action('WordController@edit', ['id' => $word->id])}}"
            role="button">Editar</a>
    </div>
</div>
@endsection
