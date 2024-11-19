<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Buku Tamu</title>

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
    
    <!-- Add Custom background -->
    <style>
        body {
            background: linear-gradient(180deg, rgba(12, 56, 77, 1) 0%, rgba(25, 118, 210, 1) 100%);
        }
    </style>

    <style>
        /* Custom styles for the search box and pagination */
        .dataTables_wrapper .dataTables_filter {
            float: right;
            text-align: right;
        }

        .dataTables_filter input {
            border: 2px solid #4e73df;
            border-radius: 4px;
            padding: 6px 12px;
            font-size: 14px;
            width: 250px;
        }

        .dataTables_length select {
            border: 2px solid #4e73df;
            border-radius: 4px;
            padding: 6px 12px;
            font-size: 14px;
        }

        .dataTables_paginate .paginate_button {
            padding: 8px 12px;
            margin: 0 4px;
            background-color: #4e73df;
            border: none;
            border-radius: 4px;
            color: white;
            cursor: pointer;
            font-size: 14px;
        }

        .dataTables_paginate .paginate_button:hover {
            background-color: #2e59d9;
        }

        .dataTables_paginate .paginate_button:active {
            background-color: #1c3d79;
        }

        .dataTables_info {
            font-size: 14px;
            color: #5a5c69;
        }

        /* Styling the table header */
        .thead-light th {
            background-color: #4e73df;
            color: white;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="head text-center">
        <h7 class="text-white"><br></h7>
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/46/KPU_Logo.svg/800px-KPU_Logo.svg.png" alt="KPU Logo" width="90">
            <h2 class="text-white">BUKU TAMU JAGAT SAKSANA <br>KPU Provinsi Kepulauan Riau</h2>
        </div>

        <div class="row mt-5">
            <!-- Form untuk tambah data -->
            <div class="col-lg-7 mb-10">
                <div class="card shadow bg-gradient-light">
                    <div class="card-body">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">IDENTITAS TAMU</h1>
                            </div>
                            <!-- Form untuk tambah data -->
                            <form action="{{ route('btamu.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="nama" class="form-control form-control-user" placeholder="Nama Lengkap" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="keperluan" class="form-control form-control-user" placeholder="Keperluan" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="telepon" class="form-control form-control-user" placeholder="Telepon" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="alamat" class="form-control form-control-user" placeholder="Alamat" required>
                                </div>
                                <div class="form-group">
                                <input type="text" name="tanggal" id="tanggal" class="form-control form-control-user" required readonly>
                                </div>
                                <script>
                                document.addEventListener("DOMContentLoaded", function() {
                                var today = new Date().toISOString().split('T')[0];  // Get today's date in YYYY-MM-DD format
                                document.getElementById('tanggal').value = today;  // Set today's date as the value
                             });
                                </script>

                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Tambah Data
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Statistik pengunjung -->
            <div class="col-lg-5 mb-3">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">STATISTIK PENGUNJUNG</h1>
                        </div>
                        <table class="table table-bordered">
                            <tr>
                                <td>Hari Ini</td>
                                <td>: {{ $todayVisitors }}</td>
                            </tr>
                            <tr>
                                <td>Kemarin</td>
                                <td>: {{ $yesterdayVisitors }}</td>
                            </tr>
                            <tr>
                                <td>Bulan Ini</td>
                                <td>: {{ $monthVisitors }}</td>
                            </tr>
                            <tr>
                                <td>Keseluruhan</td>
                                <td>: {{ $totalVisitors }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabel data tamu -->
        <div class="card shadow mt-5">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3">
                    <h1 class="h3 text-gray-900 mb-4">TABEL DATA TAMU</h1>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Nama Lengkap</th>
                                <th>Keperluan</th>
                                <th>Telepon</th>
                                <th>Alamat</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($btamus as $index => $btamu)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $btamu->nama }}</td>
                                    <td>{{ $btamu->keperluan }}</td>
                                    <td>{{ $btamu->telepon }}</td>
                                    <td>{{ $btamu->alamat }}</td>
                                    <td>{{ $btamu->tanggal }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <!-- Include jQuery, DataTables, and FileSaver.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                "paging": true,
                "lengthChange": true, // Enable row per page option
                "pageLength": 10,  // Default show 10 rows per page
                "searching": true,    // Enable search box
                "ordering": true,     // Enable column sorting
                "info": true,         // Show table info (number of entries)
                "language": {
                    "search": "Cari: ",
                    "paginate": {
                        "previous": "Sebelumnya",
                        "next": "Selanjutnya"
                    }
                }
            });
        });
    </script>

</body>

</html>
