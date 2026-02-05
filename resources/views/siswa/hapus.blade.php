<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-4">
    <h3>Hapus Siswa</h3>

    <div class="alert alert-danger">
        Apakah anda yakin ingin menghapus siswa 
        <strong>{{ $siswa->nama }}</strong> 
        dengan NIS <strong>{{ $siswa->nis }}</strong>?
    </div>

    <form action="{{ route('siswa.destroy', $siswa->id) }}" method="POST">
        @csrf
        @method('DELETE')

        <button type="submit" class="btn btn-danger">
            Ya, Hapus
        </button>

        <a href="{{ route('siswa.index') }}" class="btn btn-secondary">
            Batal
        </a>
    </form>
</div>

</body>
</html>
