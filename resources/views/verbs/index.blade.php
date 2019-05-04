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
            @foreach($verbs as $verb)
                <tr>
                    <td>
                        <a href="/verbs/{{$verb->id}}">{{ $verb->verb }}</a>
                    </td>
                    <td>
                        {{ $verb->translation }}
                    </td>
                    <td>
                        <a class="btn btn-primary" href="/verbs/{{$verb->id}}/edit" role="button">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
