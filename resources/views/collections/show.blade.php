@extends('layout')

@section('content')
<h1>{{$collection->name}}</h1>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">@lang('Word')</th>
            <th scope="col">@lang('Translation')</th>
            <th scope="col">@lang('Type')</th>
            <th scope="col" colspan="2">@lang('Example')</th>
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
                @lang($word->type->translation)
            </td>
            <td>
                {{ $word->example }}
            </td>
            <td>
                <a class="btn btn-primary" href="{{action('WordController@edit', ['id' => $word->id])}}"
                    role="button">@lang('Edit')</a>
            </td>
        </tr>
        @endforeach
        <form method="POST" action="{{action('WordController@store')}}">
            @csrf
            <input type="hidden" name="collection_id" id="collection_id" value="{{$collection->id}}">
            <tr>
                <td>
                    <input type="text" class="form-control  {{ $errors->has('word') ? 'is-invalid' : ''}}" name="word"
                        id="word" placeholder="@lang('Word')" value="{{old('word')}}" required>
                </td>
                <td>
                    <input type="text" class="form-control  {{ $errors->has('translation') ? 'is-invalid' : ''}}"
                        name="translation" id="translation" placeholder="@lang('Translation')"
                        value="{{old('translation')}}" required>
                </td>
                <td>
                    <select class="form-control" name='type_id' id="type_id">
                        @foreach ($types as $type)
                        <option value="{{$type->id}}">
                            @lang($type->translation)
                        </option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <textarea class="form-control  {{ $errors->has('example') ? 'is-invalid' : ''}}" name="example"
                        id="example" placeholder="@lang('Example')" rows="3">{{old('example')}}</textarea>
                </td>
                <td>
                    <button type="submit" class="btn btn-primary">@lang('Add')</button>
                </td>
            </tr>
        </form>
    </tbody>
</table>
@if ($errors->any())
<div class="alert alert-danger" role="alert">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
@endsection
