<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus Kelas</title>
</head>
<body>
    <div class="container mt-4">
        <h3>Hapus Kelas</h3>

        <div class="alert alert-danger">
            Aapakah anda yakin ingin menghaous kelas <strong>{{ $kelas->nama_kelas }}</strong> dengan jurusan <strong> {{ $kelas->jurusan}}</strong>?
        </div>

        <form action="{{ route('kelas.destroy', $kelas->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Ya, Hapus</button>
            <a href="{{ route('kelas.index') }}" class="btn btn-secondary>">Batal</a>
        </form>
    </div>
</body>
</html> 