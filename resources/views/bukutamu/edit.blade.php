<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Tamu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Edit Data Tamu</h1>

        <form action="{{ route('bukutamu.update', $bukutamu->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" name="nama" class="form-control" value="{{ $bukutamu->nama }}" required>
            </div>

            <div class="mb-3">
                <label for="keperluan" class="form-label">Keperluan:</label>
                <input type="text" name="keperluan" class="form-control" value="{{ $bukutamu->keperluan }}">
            </div>

            <div class="mb-3">
                <label for="telepon" class="form-label">Telepon:</label>
                <input type="text" name="telepon" class="form-control" value="{{ $bukutamu->telepon }}">
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat:</label>
                <textarea name="alamat" class="form-control">{{ $bukutamu->alamat }}</textarea>
            </div>

            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal:</label>
                <input type="date" name="tanggal" class="form-control" value="{{ $bukutamu->tanggal }}" required>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-lg">Update</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
