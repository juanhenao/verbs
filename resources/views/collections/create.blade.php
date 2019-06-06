@extends('layout')

@section('content')
<h1>@lang('New Collection')</h1>
@if ($errors->any())
<div class="alert alert-danger" role="alert">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
<form method="POST" action="{{action('CollectionController@store')}}">
    @csrf
    <div class="form-group">
        <label for="name">@lang('Name')</label>
        <input type="text" class="form-control  {{ $errors->has('name') ? 'is-invalid' : ''}}" name="name" id="name"
            placeholder="@lang('Collection name')" value="{{old('name')}}" required>
    </div>
    <button type="submit" class="btn btn-primary">@lang('Add Collection')</button>
</form>
@endsection
