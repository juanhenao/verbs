@extends('layout')

@section('content')
<h1>@lang('Edit Collection')</h1>
@if ($errors->any())
<div class="alert alert-danger" role="alert">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
<form method="POST" action="{{ action('CollectionController@update', ['id' => $collection->id])}}">
    @csrf
    @method('PATCH')
    <div class="form-group  ">
        <label for="name">@lang('Name')</label>
        <input type="text" class="form-control  {{ $errors->has('name') ? 'is-invalid' : ''}}" name="name" id="name"
            value="{{$collection->name}}" required>
    </div>
    <button type="submit" class="btn btn-primary">@lang('Update Collection')</button>
</form>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#deleteModal">
    @lang('Delete')
</button>

@component('modals.delete', ['action'=>'CollectionController@destroy', 'id'=>$collection->id])
    @lang('Are you sure that you want to delete the collection', ['name'=>$collection->name])
@endcomponent

@endsection
