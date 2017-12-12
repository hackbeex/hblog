@extends('layouts.app')

@section('content')
    @component('particals.jumbotron')
        <h3><span>{{ config('blog.article.title') }}</span></h3>
        <h6><span>{{ config('blog.article.description') }}</span></h6>
    @endcomponent

    @include('widgets.article')

    {{ $articles->links('pagination.default') }}

@endsection