<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Blog</title>
    @vite('resources/css/app.css')
    <style>
        body {
            font-family: 'Georgia', serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 28px;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
            text-align: left;
        }

        .button {
            font-size: 16px;
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            text-decoration: none;
        }

        .button:hover {
            background-color: #45a049;
        }

        .logout-button {
            background-color: #f44336;
        }

        .logout-button:hover {
            background-color: #e53935;
        }

        .blog-card {
            display: block;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 15px;
            transition: all 0.3s ease;
            margin-bottom: 20px;
        }

        .blog-card:hover {
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        .blog-card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 8px;
        }

        .blog-card h2 {
            font-size: 22px;
            font-weight: bold;
            color: #333;
            margin: 15px 0;
        }

        .blog-card p {
            font-size: 14px;
            color: #555;
            margin-bottom: 10px;
        }

        .blog-card .author {
            font-size: 12px;
            color: #777;
        }

        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }
    </style>
</head>

<body>

    <div class="container">
        @if (session('success'))
        <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
        @endif

        <div class="flex justify-between items-center mb-6">
            <h1>Daftar Blog</h1>
            <div class="flex gap-4">
                <a href="/tambah" class="button">Tambah Blog</a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="button logout-button">Logout</button>
                </form>
            </div>
        </div>

        <div class="grid-container">
            @foreach($blogs as $blog)
            <a href="/blogs/{{ $blog->id }}" class="blog-card">
                <img src="{{ asset('storage/' . $blog->gambar) }}" alt="Gambar Blog">
                <h2>{{ $blog->judul }}</h2>
                <p class="text-gray-700 truncate">{{ $blog->isi }}</p>
                <p class="author">Author: {{ $blog->pembuat }}</p>
            </a>
            @endforeach
        </div>
    </div>

</body>

</html>
