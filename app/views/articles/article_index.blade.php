@extends('templates.master')
@section('main_content')
@if($articles)
<ul>
@foreach($articles as $article)
<li><a href="{{ route('articles.show', $article->id) }}">{{ $article->title }}</a></li>
@endforeach
</ul>
{{ $articles->links() }}
@endif
@stop
