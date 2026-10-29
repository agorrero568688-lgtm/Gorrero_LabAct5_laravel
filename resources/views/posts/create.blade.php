
@extends('layouts.app')

@section('title', 'Create Post')

@section('content')
    <div class="page-header">
        <div>
            <h1>Create New Post</h1>
            <p class="muted">Share a new story or idea with your readers.</p>
        </div>

        <a href="{{ route('posts.index') }}" class="btn btn-gray">
            Back to Posts
        </a>
    </div>

    <div class="card">
        <form action="{{ route('posts.store') }}" method="POST">
            @csrf

            <label for="title">Post Title</label>
            <input type="text" id="title" name="title"
                   value="{{ old('title') }}"
                   placeholder="Enter your post title" required>

            <label for="author">Author</label>
            <input type="text" id="author" name="author"
                   value="{{ old('author') }}"
                   placeholder="Enter the author's name" required>

            <label for="category">Category</label>
            <input type="text" id="category" name="category"
                   value="{{ old('category') }}"
                   placeholder="e.g. Technology, Education, Personal" required>

            <label for="body">Post Content</label>
            <textarea id="body" name="body"
                      placeholder="Write your blog post here..."
                      required>{{ old('body') }}</textarea>

            <div class="actions">
                <button type="submit" class="btn">Publish Post</button>

                <a href="{{ route('posts.index') }}"
                   class="btn btn-gray">Cancel</a>
            </div>
        </form>
    </div>
@endsection
