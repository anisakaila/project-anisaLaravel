<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>

    <style>
        body{
            margin:0;
            font-family: Arial, sans-serif;
            background:#eaf6ff;
            display:flex;
        }

        .sidebar{
            width:220px;
            height:100vh;
            background: linear-gradient(180deg,#0d6efd,#1e90ff);
            color:white;
            padding:20px;
            position:fixed;
        }

        .sidebar h2{
            margin-bottom:30px;
            font-weight:bold;
        }

        .sidebar a,
        .logout-btn{
            display:block;
            margin:12px 0;
            padding:10px;
            border-radius:8px;
            text-decoration:none;
            color:white;
            font-weight:bold;
            background:rgba(255,255,255,0.1);
            transition:0.3s;
        }

        .sidebar a:hover,
        .logout-btn:hover{
            background:rgba(255,255,255,0.25);
            transform: translateY(-5px);
        }

        .main{
            margin-left:240px;
            padding:30px;
            width:100%;
        }

        .grid{
            display:grid;
            grid-template-columns:repeat(3,1fr);
            gap:25px;
        }

        .card{
            min-height:260px;
            border-radius:18px;
            color:white;
            padding:25px;
            box-shadow:0 10px 25px rgba(0,0,0,0.15);
            transition:0.3s;

            display:flex;
            flex-direction:column;
            justify-content:space-between;
        }

        .card:hover{
            transform:translateY(-6px);
        }

        .siswa{ background: linear-gradient(135deg,#0d6efd,#1e90ff); }
        .kelas{ background: linear-gradient(135deg,#1e90ff,#0b5ed7); }
        .jurusan{ background: linear-gradient(135deg,#0d6efd,#1e90ff); }

        .jumlah{
            font-size:48px;
            font-weight:bold;
        }

        /* 🔥 BUTTON KECIL & RAPI */
        .btn{
            padding:6px 14px;
            border-radius:10px;
            background:#f1f5f9;
            color:#0d6efd;
            text-decoration:none;
            font-weight:600;
            font-size:14px;
            display:inline-block;
            margin-top:15px;
            transition:0.3s;
        }

        .btn:hover{
            background:#e2e8f0;
            transform:translateY(-2px);
        }

        .btn-wrapper{
            text-align:center;
        }

        .jurusan ul li{
            transition:0.3s;
        }

        .jurusan ul li:hover{
            transform:translateX(8px);
            color:#e0f3ff;
        }

        @media(max-width:768px){
            .sidebar{
                position:relative;
                width:100%;
                height:auto;
            }

            .main{
                margin-left:0;
            }

            .grid{
                grid-template-columns:1fr;
            }
        }
    </style>
</head>

<body>

<div class="sidebar">
    <h2>Dashboard</h2>

    <p>👤 <b>{{ auth()->user()->name }}</b></p>

    <a href="{{ route('siswa.index') }}">👨‍🎓 Data Siswa</a>
    <a href="{{ route('kelas.index') }}">📚 Data Kelas</a>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button class="logout-btn">Logout</button>
    </form>
</div>

<div class="main">
    <h2>Dashboard</h2>
    <p>Selamat datang di sistem sekolah</p>

    <div class="grid">

        <!-- SISWA -->
        <div class="card siswa">
            <div>
                <h3>👨‍🎓 Data Siswa</h3>
                <p>Kelola data siswa</p>
                <h2 class="jumlah">{{ $jumlahSiswa ?? 0 }}</h2>
            </div>

            <div class="btn-wrapper">
                @if(auth()->user()->role->role_name === 'Admin')
                    <a href="{{ route('siswa.create') }}" class="btn">+ Tambah</a>
                @endif
            </div>
        </div>

        <!-- KELAS -->
        <div class="card kelas">
            <div>
                <h3>📚 Data Kelas</h3>
                <p>Kelola data kelas</p>
                <h2 class="jumlah">{{ $jumlahKelas ?? 0 }}</h2>
            </div>

            <div class="btn-wrapper">
                @if(auth()->user()->role->role_name === 'Admin')
                    <a href="{{ route('kelas.create') }}" class="btn">+ Tambah</a>
                @endif
            </div>
        </div>

        <!-- JURUSAN -->
        <div class="card jurusan">
            <div>
                <h3>🏫 Jurusan Sekolah</h3>
                <p>Daftar jurusan tersedia</p>

                <ul style="padding-left:18px; line-height:1.9;">
                    <li>💻 PPLG (Pengembangan Perangkat Lunak & Gim)</li>
                    <li>🌐 TKJT (Teknik Jaringan Komputer & Telekomunikasi)</li>
                    <li>🚗 TKR (Teknik Kendaraan Ringan)</li>
                    <li>🏢 MPLB (Manajemen Perkantoran)</li>
                    <li>💰 AKL (Akuntansi)</li>
                    <li>🎭 SP (Seni Pertunjukan)</li>
                    <li>🏗️ DPIB (Desain Bangunan)</li>
                </ul>
            </div>
        </div>

    </div>
</div>

</body>
</html>