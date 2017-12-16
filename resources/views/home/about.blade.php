@extends('layouts.app')

@section('title', 'About - '.config('app.name'))

@section('content')
    @component('particals.jumbotron')
        <h3 class="post-title">About Me</h3>
    @endcomponent

    <div class="article container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <parse content="{{ setting('about', lang('No About Me')) }}"></parse>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        hljs.initHighlightingOnLoad();
    </script>
@endsection
