<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Kelas</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<!-- 🔵 NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">SMKN 1 KAWALI</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('siswa.index') }}">
                        Data Siswa
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active fw-semibold" href="{{ route('kelas.index') }}">
                        Data Kelas
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- 🔵 CONTENT -->
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Data Kelas</h5>
        </div>

        <div class="card-body">

            <a href="{{ route('kelas.create') }}" class="btn btn-primary mb-3">
                + Tambah Kelas
            </a>

            <table class="table table-bordered table-striped align-middle">
                <thead class="table-primary text-center">
                    <tr>
                        <th width="60">No</th>
                        <th>Nama Kelas</th>
                        <th>Jurusan</th>
                        <th width="160">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($data as $dt)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $dt->nama_kelas }}</td>
                        <td>{{ $dt->jurusan }}</td>

                        <!-- AKSI KELAS -->
                        <td class="text-center">
                            <a href="{{ route('kelas.edit', $dt->id) }}"
                               class="btn btn-outline-primary btn-sm">
                                Edit
                            </a>

                            <form action="{{ route('kelas.destroy', $dt->id) }}"
                                  method="POST"
                                  class="d-inline"
                                  onsubmit="return confirm('Yakin mau hapus kelas ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
