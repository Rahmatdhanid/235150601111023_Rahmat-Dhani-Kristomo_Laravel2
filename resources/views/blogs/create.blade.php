<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Blog</title>
    @vite('resources/css/app.css')
    <style>
        body {
            font-family: 'Georgia', serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .form-container {
            width: 100%;
            max-width: 600px;
            margin: 50px auto;
            background-color: #ffffff;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-container h1 {
            text-align: center;
            font-size: 28px;
            font-weight: bold;
            color: #333;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            color: #555;
            margin-bottom: 8px;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 6px;
            background-color: #f9f9f9;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #999;
        }

        .submit-btn {
            width: 100%;
            padding: 14px;
            font-size: 16px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-family: 'Georgia', serif;
        }

        .submit-btn:hover {
            background-color: #555;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h1>Tambah Blog</h1>
        <form action="/tambah" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" name="judul" id="judul" placeholder="Masukkan judul blog" required>
            </div>

            <div class="form-group">
                <label for="isi">Isi</label>
                <textarea name="isi" id="isi" rows="5" placeholder="Tulis isi blog Anda..." required></textarea>
            </div>

            <div class="form-group">
                <label for="gambar">Gambar</label>
                <input type="file" name="gambar" id="gambar">
            </div>

            <div>
                <button type="submit" class="submit-btn">Tambah Blog</button>
            </div>
        </form>
    </div>
</body>

</html>
