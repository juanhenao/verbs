@extends('layout')

@section('content')
<h1>@lang('Edit Word')</h1>
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
        <label for="word">@lang('Word')</label>
        <input type="text" class="form-control  {{ $errors->has('word') ? 'is-invalid' : ''}}" name="word" id="word"
            value="{{$word->word}}" placeholder="@lang('Word')" required>
    </div>
    <div class="form-group">
        <label for="translation">@lang('Translation')</label>
        <input type="text" class="form-control  {{ $errors->has('translation') ? 'is-invalid' : ''}}" name="translation"
            id="translation" value="{{$word->translation}}" placeholder="@lang('Translation')" required>
    </div>
    <div class="form-group">
        <label for="type">@lang('Type')</label>
        <select class="form-control" name='type_id' id="type_id">
            @foreach ($types as $type)
            <option value="{{$type->id}}" {{$type->id==$word->type_id?'selected':''}}>
                @lang($type->translation)
            </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="collection_id">@lang('Collection')</label>
        <select class="form-control" name='collection_id' id="collection_id">
            @foreach ($collections as $collection)
            <option value="{{$collection->id}}" {{$collection->id==$word->collection_id?'selected':''}}>
                @lang($collection->name)
            </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="example">@lang('Example')</label>
        <textarea class="form-control  {{ $errors->has('example') ? 'is-invalid' : ''}}" name="example" id="example"
            placeholder="@lang('Example')" rows="3">{{$word->example}}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">@lang('Update')</button>
</form>
<form method="POST" action="{{action('WordController@destroy', ['id' => $word->id])}}">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-primary">@lang('Delete')</button>
</form>
@endsection
