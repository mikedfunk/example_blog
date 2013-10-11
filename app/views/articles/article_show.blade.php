@extends('templates.master')
@section('main_content')
<p><a href="{{ route('articles.index') }}" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span> Back to Articles</a></p>
<h2>{{ $article->title }}</h2>
<p>{{ $article->content }}</p>
<hr>
<h3>Comments</h3>

@if($errors->any())
<div class="alert alert-warning"><strong>{{ $errors->first() }}</strong></div>
@endif

@if($article->comments)
@foreach($article->comments as $comment)
<p>{{ $comment->content }}</p>
<p><em>by {{ $comment->email }}</em></p>
<hr>
@endforeach
@endif

{{ Form::open(['route' => 'comments.store']) }}
{{ Form::hidden('article_id', $article->id) }}
<p>
{{ Form::label('content', 'Content') }}<br>
{{ Form::textarea('content') }}
</p>
<p>
{{ Form::label('email', 'Email') }}<br>
{{ Form::text('email') }}
</p>
<p>
{{ Form::submit() }}
</p>
{{ Form::close() }}
@stop
