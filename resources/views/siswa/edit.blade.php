<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Siswa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-4">
    <h3>Edit Siswa</h3>

    <form action="{{ route('siswa.update', $siswa->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- NIS -->
        <div class="mb-3">
            <label class="form-label">NIS</label>
            <input type="text"
                   name="nis"
                   class="form-control"
                   value="{{ old('nis', $siswa->nis) }}"
                   required>
        </div>

        <!-- NAMA -->
        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text"
                   name="nama"
                   class="form-control"
                   value="{{ old('nama', $siswa->nama) }}"
                   required>
        </div>

        <!-- JENIS KELAMIN -->
        <div class="mb-3">
            <label class="form-label d-block">Jenis Kelamin</label>

            <div class="form-check form-check-inline">
                <input class="form-check-input"
                       type="radio"
                       name="jenis_kelamin"
                       value="L"
                       {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'L' ? 'checked' : '' }}>
                <label class="form-check-label">Laki-laki</label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input"
                       type="radio"
                       name="jenis_kelamin"
                       value="P"
                       {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'P' ? 'checked' : '' }}>
                <label class="form-check-label">Perempuan</label>
            </div>
        </div>

        <!-- KELAS -->
        <div class="mb-3">
            <label class="form-label">Kelas</label>
            <select name="kelas_id" class="form-control" required>
                <option value="">-- Pilih Kelas --</option>
                @foreach ($kelas as $k)
                    <option value="{{ $k->id }}"
                        {{ old('kelas_id', $siswa->kelas_id) == $k->id ? 'selected' : '' }}>
                        {{ $k->nama_kelas }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- NO TELP -->
        <div class="mb-3">
            <label class="form-label">No Telepon</label>
            <input type="text"
                   name="no_telp"
                   class="form-control"
                   value="{{ old('no_telp', $siswa->no_telp) }}"
                   required>
        </div>

        <!-- ALAMAT -->
        <div class="mb-3">
            <label class="form-label">Alamat</label>
            <textarea name="alamat"
                      class="form-control"
                      rows="3"
                      required>{{ old('alamat', $siswa->alamat) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
