<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Blog</title>
    @vite('resources/css/app.css')
    <style>
        body {
            font-family: 'Georgia', serif;
            background-color: #f9f9f9;
            padding: 20px;
            margin: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .back-link {
            font-size: 14px;
            color: #0066cc;
            text-decoration: none;
            margin-bottom: 20px;
            display: inline-block;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        .blog-image {
            width: 100%;
            height: 400px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .blog-title {
            font-size: 32px;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }

        .author {
            font-size: 14px;
            color: #777;
            margin-bottom: 30px;
        }

        .blog-content {
            font-size: 16px;
            line-height: 1.6;
            color: #555;
            margin-bottom: 30px;
        }

        .action-buttons a,
        .action-buttons button {
            font-size: 14px;
            padding: 10px 15px;
            border-radius: 6px;
            text-decoration: none;
            cursor: pointer;
        }

        .action-buttons a {
            background-color: #007bff;
            color: white;
            margin-right: 10px;
        }

        .action-buttons a:hover {
            background-color: #0056b3;
        }

        .action-buttons button {
            background-color: #e74c3c;
            color: white;
        }

        .action-buttons button:hover {
            background-color: #c0392b;
        }
    </style>
</head>

<body>
    <div class="container">
        <a href="/blogs" class="back-link">Kembali ke Daftar Blog</a>

        <div>
            <img src="{{ asset('storage/' . $blog->gambar) }}" alt="Gambar Blog" class="blog-image">
            <h1 class="blog-title">{{ $blog->judul }}</h1>
            <p class="author">Author: {{ $blog->pembuat }}</p>
            <p class="blog-content">{{ $blog->isi }}</p>
        </div>

        @if (Auth::check() && Auth::user()->name === $blog->pembuat)
        <div class="action-buttons">
            <!-- Edit Button -->
            <a href="/blogs/{{ $blog->id }}/edit">Edit</a>

            <!-- Delete Form -->
            <form action="/blogs/{{ $blog->id }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </div>
        @endif
    </div>
</body>

</html>
