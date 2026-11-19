<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class PostController extends Controller
{
    public function index()
    {
        // Tampilkan post terbaru lebih dahulu pada halaman daftar.
        $posts = Post::latest()->get();

        return Inertia::render('Post/Index', [
            'posts' => $posts
        ]);
    }

    public function dashboard()
    {
        return Inertia::render('Post/Dashboard', [
            'userName' => Auth::user()?->name,
        ]);
    }

    public function create()
    {
        return Inertia::render('Post/Create');
    }

    public function store(Request $request)
    {
        // Validasi seluruh input sebelum menyimpan data baru.
        $validated = $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        Post::create($validated);

        return redirect()->route('posts.index')->with('success', 'Post berhasil ditambahkan.');
    }

    public function edit(Post $post)
    {
        return Inertia::render('Post/Edit', [
            'post' => $post
        ]);
    }

    public function update(Request $request, Post $post)
    {
        // Gunakan validasi yang sama sebelum memperbarui post terpilih.
        $validated = $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $post->update($validated);

        return redirect()->route('posts.index')->with('success', 'Post berhasil diperbarui.');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post berhasil dihapus.');
    }
}