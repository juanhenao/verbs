@extends('layout')

@section('content')
<h1>Verbo</h1>
<p>{{$word->word}}: {{$word->translation}}</p>
<a class="btn btn-primary" href="/words/{{$word->id}}/edit" role="button">Editar</a>
@endsection