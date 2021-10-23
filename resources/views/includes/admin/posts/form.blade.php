@if ($post->exists)
        <form method="POST" action="{{ route('admin.posts.update', $post->id) }}">
            @method('PATCH')
      @else        
        <form method="POST" action="{{ route('admin.posts.store', $post->id) }}">
      @endif
        @csrf
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $post->title) }}">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @else
                        <div id="title-help" class="form-text">Enter the title of the post</div>
                    @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="text" class="form-control @error('image') is-invalid @enderror" id="image" name="image" value="{{ old('image', $post->image) }}">
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @else
                        <div id="image-help" class="form-text">Enter the image URL of the post</div>
                    @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="8">{{ old('content', $post->content) }}</textarea>
                    @error('content')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @else
                        <div id="content-help" class="form-text">Enter the content of the post</div>
                    @enderror
                    </div>
                </div>
                <div class="col 12 mt-2">
                    <input class="btn btn-outline-secondary" type="reset" value="Reset">
                    <input class="btn btn-success" type="submit" value="Confirm">
                </div>
            </div>
        </form>