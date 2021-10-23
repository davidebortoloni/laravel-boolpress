@extends('layouts.app')

@section('title', " | $post->title")

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6">
                <img class="img-fluid" src="{{ $post->image ?? 'https://lh3.googleusercontent.com/proxy/cawBjQTAvtlMDqCchnpr-1CV61nLdVquDWSpvNP4MgxKOamoWre924YoIJNBGEnCAYpWJxXnpL60n_7IwFtX_x047nVxqIK_02MDgn9k5CQRGKW9aFZbTmQ2yWk33qTAIfnsAJAO_bmbK8XxoX2bbA' }}" alt="{{ $post->title }}">
            </div>
            <div class="col-6">
                <h1>{{ $post->title }}</h1>
                <p>{{ $post->content }}</p>
                <address>{{ $post->getFormattedDate('created_at','d-m-Y') }}</address>
                <div class="d-flex justify-content-end">
                    <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-warning mx-1">Edit</a>
                    <form class="mx-1 delete-form" action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" data-title="{{ $post->title }}">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete" class="btn btn-danger">
                      </form>
                    <a class="btn btn-outline-secondary" href="{{ route('admin.posts.index') }}">Back to the list</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/delete_confirmation.js') }}"></script>
@endsection