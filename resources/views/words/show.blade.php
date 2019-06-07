@extends('layout')

@section('content')
<h1>@lang('Word')</h1>
<div class="card">
    <div class="card-header">
        <h4>{{$word->word}} <span class="badge badge-success">@lang($word->type->translation)</span></h4>
    </div>
    <div class="card-body">
        <h5 class="card-title">@lang('Meaning:') {{$word->translation}}</h5>
        <p class="card-text">@lang('Example'): {{$word->example}}</p>
        <a class="btn btn-primary" href="{{action('WordController@edit', ['id' => $word->id])}}"
            role="button">@lang('Edit')</a>
    </div>
</div>
@endsection
