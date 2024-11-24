<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Blog</title>
    @vite('resources/css/app.css')
    <style>
        body {
            font-family: 'Georgia', serif;
            background-color: #f4f4f4;
            padding: 20px;
            margin: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 32px;
            font-weight: bold;
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            font-size: 14px;
            font-weight: bold;
            color: #333;
        }

        input, textarea {
            font-size: 16px;
            padding: 12px;
            width: 100%;
            margin-top: 8px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #fafafa;
        }

        input:focus, textarea:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        .img-preview {
            width: 100px;
            height: 100px;
            border-radius: 8px;
            object-fit: cover;
            margin-top: 10px;
        }

        button {
            font-size: 16px;
            padding: 12px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
            margin-top: 20px;
        }

        button:hover {
            background-color: #45a049;
        }

        .cancel-btn {
            font-size: 14px;
            color: #007bff;
            text-decoration: none;
            margin-top: 15px;
            display: inline-block;
            text-align: center;
        }

        .cancel-btn:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Edit Blog</h1>
        <form action="/blogs/{{ $blog->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Input Judul -->
            <div>
                <label for="judul">Judul</label>
                <input type="text" name="judul" id="judul" value="{{ $blog->judul }}" placeholder="Masukkan judul blog" required>
            </div>

            <!-- Input Isi -->
            <div>
                <label for="isi">Isi</label>
                <textarea name="isi" id="isi" rows="5" placeholder="Tulis isi blog Anda..." required>{{ $blog->isi }}</textarea>
            </div>

            <!-- Input Gambar -->
            <div>
                <label for="gambar">Gambar</label>
                <input type="file" name="gambar" id="gambar">
                @if ($blog->gambar)
                <img src="{{ asset('storage/' . $blog->gambar) }}" alt="Gambar Blog" class="img-preview">
                @endif
            </div>

            <!-- Tombol Submit -->
            <div>
                <button type="submit">Simpan Perubahan</button>
            </div>

            <a href="/blogs" class="cancel-btn">Kembali ke Daftar Blog</a>
        </form>
    </div>
</body>

</html>
