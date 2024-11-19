    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tambah Buku Tamu</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container mt-5">
            <h1>Tambah Buku Tamu</h1>

            <form action="{{ route('bukutamu.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama:</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="keperluan" class="form-label">Keperluan:</label>
                    <input type="text" name="keperluan" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="telepon" class="form-label">Telepon:</label>
                    <input type="text" name="telepon" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat:</label>
                    <textarea name="alamat" class="form-control"></textarea>
                </div>
                
                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal:</label>
                    <input type="date" name="tanggal" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>

            <div class="mt-3">
                <a href="{{ route('bukutamu.index') }}" class="btn btn-secondary">Kembali ke Daftar Buku Tamu</a>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>
