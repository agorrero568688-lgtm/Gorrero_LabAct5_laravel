
@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <div class="page-header">
        <h1>Blog Post Details</h1>

        <a href="{{ route('posts.index') }}" class="btn btn-gray">
            Back to Posts
        </a>
    </div>

    <article class="card">
        <span class="tag">{{ $post->category }}</span>

        <h1 style="margin-top: 18px;">{{ $post->title }}</h1>

        <p class="muted">
            Written by <strong>{{ $post->author }}</strong>
        </p>

        <p class="muted">
            Published on {{ $post->created_at->format('F d, Y') }}
        </p>

        <hr style="border: 0; border-top: 1px solid #e2e8f0;">

        <div class="post-body">
            {{ $post->body }}
        </div>

        <div class="actions">
            <a href="{{ route('posts.edit', $post) }}"
               class="btn btn-green">Edit Post</a>

            <a href="{{ route('posts.index') }}"
               class="btn btn-gray">Back</a>
        </div>
    </article>
@endsection
