@extends('layout')

@section('content')
<h1>@lang('My Collections')</h1>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col" colspan="2">@lang('Collection')</th>
        </tr>
    </thead>
    <tbody>
        @foreach($collections as $collection)
        <tr>
            <td>
                <a href="{{action('CollectionController@show', ['id' => $collection->id])}}">{{ $collection->name }}</a>
            </td>
            <td>
                <a class="btn btn-primary" href="{{action('CollectionController@edit', ['id' => $collection->id])}}"
                    role="button">@lang('Edit')</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<a class="btn btn-primary" href="{{action('CollectionController@create')}}" role="button">@lang('Add Collection')</a>
@endsection
