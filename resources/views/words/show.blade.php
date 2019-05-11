@extends('layout')

@section('content')
<h1>Verbo</h1>
<p>{{$word->word}}: {{$word->translation}}</p>
<p>{{$word->example}}</p>
<p>@lang($word->type->translation)</p>
<a class="btn btn-primary" href="{{action('WordController@edit', ['id' => $word->id])}}" role="button">Editar</a>
@endsection