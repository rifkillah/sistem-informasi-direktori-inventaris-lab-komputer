<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $judul }}</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f4f6f9; padding: 30px; color: #333; }
        .container { max-width: 1000px; margin: auto; background: #fff; padding: 25px; border-radius: 10px; box-shadow: 0 4px 12px rgba(0,0,0,0.08); }
        h1 { color: #2c3e50; border-bottom: 3px solid #3498db; padding-bottom: 10px; margin-top: 0; }
        .info-box { background: #eef6ff; border-left: 4px solid #3498db; padding: 12px 15px; margin-bottom: 20px; border-radius: 4px; }
        .filter-menu { margin-bottom: 20px; }
        .filter-menu a { display: inline-block; padding: 6px 14px; margin-right: 8px; background: #ecf0f1; color: #2c3e50; text-decoration: none; border-radius: 5px; font-weight: bold; font-size: 14px; }
        .filter-menu a.active { background: #2c3e50; color: white; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { padding: 12px 15px; text-align: left; border-bottom: 1px solid #ddd; font-size: 14px; }
        th { background-color: #2c3e50; color: white; }
        tr:hover { background-color: #f9f9f9; }
        .badge { padding: 5px 10px; border-radius: 12px; font-size: 11px; font-weight: bold; color: white; display: inline-block; }
        .badge-tersedia { background-color: #27ae60; }
        .badge-maintenance { background-color: #c0392b; }
        .btn-detail { background-color: #3498db; color: white; padding: 6px 12px; text-decoration: none; border-radius: 5px; font-size: 12px; }
        .btn-detail:hover { background-color: #2980b9; }
    </style>
</head>
<body>
<div class="container">
    <h1>{{ $judul }}</h1>
    
    <!-- Menu Navigasi Filter Status -->
    <div class="filter-menu">
        <b>Filter Status:</b>
        <a href="{{ url('/laboratorium') }}" class="{{ ($filter_aktif == 'Semua') ? 'active' : '' }}">Semua Lab</a>
        <a href="{{ url('/laboratorium/status/Tersedia') }}" class="{{ ($filter_aktif == 'Tersedia') ? 'active' : '' }}">Tersedia</a>
        <a href="{{ url('/laboratorium/status/Maintenance') }}" class="{{ ($filter_aktif == 'Sedang Maintenance') ? 'active' : '' }}">Maintenance</a>
    </div>

    <div class="info-box">
        Menampilkan <b>{{ count($data_lab) }} Laboratorium</b> dengan akumulasi total kapasitas perangkat <b>{{ $total_pc }} Unit PC</b>.
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama Laboratorium</th>
                <th>Penanggung Jawab</th>
                <th>Kapasitas PC</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data_lab as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td><b>{{ $item['kode_lab'] }}</b></td>
                <td>{{ $item['nama_lab'] }}</td>
                <td>{{ $item['penanggung_jawab'] }}</td>
                <td>{{ $item['kapasitas_pc'] }} Unit</td>
                <td>
                    @if ($item['status'] === 'Tersedia')
                        <span class="badge badge-tersedia">Tersedia</span>
                    @else
                        <span class="badge badge-maintenance">Maintenance</span>
                    @endif
                </td>
                <td>
                    <a href="{{ url('/laboratorium/detail/'.$item['kode_lab']) }}" class="btn-detail">Lihat Detail</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" style="text-align: center; color: #7f8c8d; padding: 20px;">Tidak ada data laboratorium untuk status ini.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
</body>
</html>