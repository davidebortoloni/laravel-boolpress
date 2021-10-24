@extends('layouts.app')

@section('title', ' | My Posts')

@section('content')
    <div class="container">
      @if (session('alert-message'))
        <div class="alert alert-{{ session('alert-type') }}">
          {{ session('alert-message') }}
        </div>
      @endif
        <header class="mt-5 mb-3 d-flex justify-content-between align-items-center">
          <h1>My Posts</h1>
          <a href="{{ route('admin.posts.create') }}" class="btn btn-success">New Post</a>
        </header>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Title</th>
                <th scope="col">Category</th>
                <th scope="col">Written on</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
                @forelse ($posts as $post)
                <tr>
                  <td>{{ $post->title }}</td>
                  <td>
                    @if ($post->category)
                      {{ $post->category['name'] }}
                    @else
                      ----
                    @endif
                  </td>
                  <td>{{ $post->getFormattedDate('created_at','d-m-Y') }}</td>
                  <td class="d-flex justify-content-end">
                    <a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-primary mx-1">Details</a>
                    <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-warning mx-1">Edit</a>
                    <form class="mx-1 delete-form" action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" data-title="{{ $post->title }}">
                      @csrf
                      @method('DELETE')
                      <input type="submit" value="Delete" class="btn btn-danger">
                    </form>
                  </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center">No posts found</td>
                </tr>
                @endforelse
            </tbody>
          </table>
          <footer class="d-flex justify-content-center">
            {{ $posts->links() }}
          </footer>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/delete_confirmation.js') }}"></script>
@endsection