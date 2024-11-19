<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku Tamu</title>
</head>
<body>

    <h1>Tambah Buku Tamu</h1>

    <form action="{{ route('btamu.store') }}" method="POST">
        @csrf
        <label for="nama">Nama:</label><br>
        <input type="text" id="nama" name="nama" required><br>

        <label for="keperluan">Keperluan:</label><br>
        <input type="text" id="keperluan" name="keperluan" required><br>

        <label for="telepon">Telepon:</label><br>
        <input type="text" id="telepon" name="telepon" required><br>

        <label for="alamat">Alamat:</label><br>
        <input type="text" id="alamat" name="alamat" required><br>

        <label for="tanggal">Tanggal:</label><br>
        <input type="date" id="tanggal" name="tanggal" required><br>

        <button type="submit">Simpan</button>
    </form>

</body>
</html>
