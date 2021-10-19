@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $post->title }}</h1>
        <p>{{ $post->content }}</p>
        <address>{{ $post->getFormattedDate('created_at','d-m-Y') }}</address>
        <div class="d-flex justify-content-end">
            <a class="btn btn-outline-secondary" href="{{ route('admin.posts.index') }}">Back to the list</a>
        </div>
    </div>
@endsection