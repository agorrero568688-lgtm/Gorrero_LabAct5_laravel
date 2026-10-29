
@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
    <div class="page-header">
        <div>
            <h1>Edit Post</h1>
            <p class="muted">Update the information for your blog post.</p>
        </div>

        <a href="{{ route('posts.index') }}" class="btn btn-gray">
            Back to Posts
        </a>
    </div>

    <div class="card">
        <form action="{{ route('posts.update', $post) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="title">Post Title</label>
            <input type="text" id="title" name="title"
                   value="{{ old('title', $post->title) }}" required>

            <label for="author">Author</label>
            <input type="text" id="author" name="author"
                   value="{{ old('author', $post->author) }}" required>

            <label for="category">Category</label>
            <input type="text" id="category" name="category"
                   value="{{ old('category', $post->category) }}" required>

            <label for="body">Post Content</label>
            <textarea id="body" name="body"
                      required>{{ old('body', $post->body) }}</textarea>

            <div class="actions">
                <button type="submit" class="btn btn-green">
                    Save Changes
                </button>

                <a href="{{ route('posts.index') }}"
                   class="btn btn-gray">Cancel</a>
            </div>
        </form>
    </div>
@endsection
