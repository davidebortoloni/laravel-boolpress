@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>My Posts</h1>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Title</th>
                <th scope="col">Written on</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
                @forelse ($posts as $post)
                <tr>
                  <td>{{ $post->title }}</td>
                  <td>{{ $post->getFormattedDate('created_at','d-m-Y') }}</td>
                  <td><a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-primary">Details</a></td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center">No posts found</td>
                </tr>
                @endforelse
            </tbody>
          </table>
    </div>
@endsection