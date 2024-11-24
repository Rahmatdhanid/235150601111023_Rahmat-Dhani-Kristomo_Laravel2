<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function showBlogs()
    {
        $blogs = Blog::all();
        return view('blogs.list', compact('blogs'));
    }

    public function tambahBlog()
    {
        return view('blogs.create');
    }

    public function createBlog(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $gambarPath = $request->file('gambar') 
            ? $request->file('gambar')->store('blogs', 'public') 
            : null;

        Blog::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'pembuat' => Auth::user()->name,
            'gambar' => $gambarPath,
        ]);

        return redirect('/blogs')->with('success', 'Blog berhasil ditambahkan!');
    }

    public function editBlog($id)
    {
        $blog = Blog::findOrFail($id);

        abort_unless(Auth::user()->name === $blog->pembuat, 403, 'Anda tidak memiliki akses untuk mengedit blog ini.');

        return view('blogs.edit', compact('blog'));
    }

    public function updateBlog(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $blog = Blog::findOrFail($id);

        abort_unless(Auth::user()->name === $blog->pembuat, 403, 'Anda tidak memiliki akses untuk mengupdate blog ini.');

       
        if ($request->hasFile('gambar')) {
            if ($blog->gambar) {
                Storage::disk('public')->delete($blog->gambar);
            }
            $blog->gambar = $request->file('gambar')->store('blogs', 'public');
        }

      
        $blog->update([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'gambar' => $blog->gambar,
        ]);

        return redirect('/blogs')->with('success', 'Blog berhasil diperbarui!');
    }

    public function deleteBlog($id)
    {
        $blog = Blog::findOrFail($id);

        abort_unless(Auth::user()->name === $blog->pembuat, 403, 'Anda tidak memiliki akses untuk menghapus blog ini.');

        if ($blog->gambar) {
            Storage::disk('public')->delete($blog->gambar);
        }

        $blog->delete();

        return redirect('/blogs')->with('success', 'Blog berhasil dihapus!');
    }

    public function detailBlog($id)
    {
        $blog = Blog::findOrFail($id);

        return view('blogs.detail', compact('blog'));
    }
}
