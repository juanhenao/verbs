@extends('layout')

@section('content')
<h1>Lista de verbos</h1>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Verbo</th>
            <th scope="col" colspan="2">Traducción</th>
        </tr>
    </thead>
    <tbody>
        @foreach($words as $word)
        <tr>
            <td>
                <a href="{{action('WordController@show', ['id' => $word->id])}}">{{ $word->word }}</a>
            </td>
            <td>
                {{ $word->translation }}
            </td>
            <td>
                <a class="btn btn-primary" href="{{action('WordController@edit', ['id' => $word->id])}}"
                    role="button">Editar</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection