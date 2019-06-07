@extends('layout')

@section('content')
<h1>@lang('Add Word')</h1>
@if ($errors->any())
<div class="alert alert-danger" role="alert">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
<form method="POST" action="{{action('WordController@store')}}">
    @csrf
    <div class="form-group">
        <label for="word">@lang('Word')</label>
        <input type="text" class="form-control  {{ $errors->has('word') ? 'is-invalid' : ''}}" name="word" id="word"
            placeholder="@lang('Word')" value="{{old('word')}}" required>
    </div>
    <div class="form-group">
        <label for="translation">@lang('Translation')</label>
        <input type="text" class="form-control  {{ $errors->has('translation') ? 'is-invalid' : ''}}" name="translation"
            id="translation" placeholder="@lang('Translation')" value="{{old('translation')}}" required>
    </div>
    <div class="form-group">
        <label for="type">@lang('Type')</label>
        <select class="form-control" name='type_id' id="type_id">
            @foreach ($types as $type)
            <option value="{{$type->id}}">
                @lang($type->translation)
            </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="collection">@lang('Collection')</label>
        <select class="form-control" name='collection_id' id="collection_id">
            @foreach ($collections as $collection)
            <option value="{{$collection->id}}">
                @lang($collection->name)
            </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="example">@lang('Example')</label>
        <textarea class="form-control  {{ $errors->has('example') ? 'is-invalid' : ''}}" name="example" id="example"
            placeholder="@lang('example')" rows="3">{{old('example')}}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">@lang('Add Word')</button>
</form>
@endsection
