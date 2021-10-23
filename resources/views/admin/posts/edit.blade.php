@extends('layouts.app')

@section('title', ' | Edit Post')

@section('content')
<div class="container">
    @if (session('alert-message'))
      <div class="alert alert-{{ session('alert-type') }}">
        {{ session('alert-message') }}
      </div>
    @endif
      <header class="mt-5 mb-3 d-flex justify-content-between align-items-center">
        <h1>Edit Post</h1>
        {{-- <a href="{{ route('admin.posts.create') }}" class="btn btn-success">New Post</a> --}}
      </header>
      @include('includes.admin.posts.form')
</div>
@endsection