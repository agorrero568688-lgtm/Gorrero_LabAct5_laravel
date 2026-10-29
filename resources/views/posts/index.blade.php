
@extends('layouts.app')

@section('title', 'All Posts')

@section('content')
    <div class="page-header">
        <div>
            <h1>Manage Your Blog</h1>
            <p class="muted">Create and manage all your blog posts in one place.</p>
        </div>

        <a href="{{ route('posts.create') }}" class="btn">
            + Create New Post
        </a>
    </div>

    @if($posts->isEmpty())
        <div class="card" style="text-align: center;">
            <h2>No posts yet</h2>
            <p class="muted">Start by creating your first blog post.</p>
            <a href="{{ route('posts.create') }}" class="btn">
                Create Your First Post
            </a>
        </div>
    @else
        <p class="muted">
            Total Posts: <strong>{{ $posts->count() }}</strong>
        </p>

        @foreach($posts as $post)
            <div class="card">
                <span class="tag">{{ $post->category }}</span>

                <h2>{{ $post->title }}</h2>

                <p class="muted">
                    Written by {{ $post->author }}
                    &middot;
                    {{ $post->created_at->format('M d, Y') }}
                </p>

                <p class="post-body">
                    {{ \Illuminate\Support\Str::limit($post->body, 180) }}
                </p>

                <div class="actions">
                    <a href="{{ route('posts.show', $post) }}"
                       class="btn">View</a>

                    <a href="{{ route('posts.edit', $post) }}"
                       class="btn btn-green">Edit</a>

                    <form class="inline"
                          action="{{ route('posts.destroy', $post) }}"
                          method="POST"
                          onsubmit="return confirm('Are you sure you want to delete this post?')">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-red">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    @endif
@endsection
