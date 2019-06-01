@extends('layout')

@section('content')
<h1>{{$collection->name}}</h1>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Palabra</th>
            <th scope="col" colspan="2">Traducción</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($collection->words()->get() as $word)
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
