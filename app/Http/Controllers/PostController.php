<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    // READ ALL POSTS WITH SEARCH AND PAGINATION
    public function index()
    {
        $search = request('search');

        $posts = Post::query()
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('title', 'like', '%' . $search . '%')
                      ->orWhere('body', 'like', '%' . $search . '%')
                      ->orWhere('author', 'like', '%' . $search . '%')
                      ->orWhere('category', 'like', '%' . $search . '%');
                });
            })
            ->latest()
            ->paginate(8)
            ->withQueryString();

        $totalPosts = Post::count();

        return view('posts.index', compact('posts', 'totalPosts'));
    }

    // SHOW CREATE FORM
    public function create()
    {
        return view('posts.create');
    }

    // STORE NEW POST
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'author' => 'required|string|max:255',
            'category' => 'required|string|max:255',
        ]);

        Post::create($validated);

        return redirect()->route('posts.index')
            ->with('success', 'Post created successfully.');
    }

    // SHOW SINGLE POST
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    // SHOW EDIT FORM
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    // UPDATE EXISTING POST
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'author' => 'required|string|max:255',
            'category' => 'required|string|max:255',
        ]);

        $post->update($validated);

        return redirect()->route('posts.index')
            ->with('success', 'Post updated successfully.');
    }

    // DELETE POST
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')
            ->with('success', 'Post deleted successfully.');
    }
}
