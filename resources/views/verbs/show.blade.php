@extends('layout')

@section('content')
<h1>Verbo</h1>
<p>{{$verb->verb}}: {{$verb->translation}}</p>
<a class="btn btn-primary" href="/verbs/{{$verb->id}}/edit" role="button">Editar</a>
@endsection