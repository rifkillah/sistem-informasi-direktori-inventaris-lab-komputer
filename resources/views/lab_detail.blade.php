<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Laboratorium - {{ $lab['nama_lab'] }}</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f4f6f9; padding: 40px; color: #333; }
        .card { max-width: 650px; margin: auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); }
        h2 { color: #2c3e50; margin-top: 0; border-bottom: 2px solid #eee; padding-bottom: 10px; }
        .row { margin-bottom: 14px; line-height: 1.6; font-size: 14px; }
        .label { font-weight: bold; width: 170px; display: inline-block; color: #555; }
        .fasilitas-box { background: #f8f9fa; padding: 15px; border-radius: 6px; border: 1px solid #e9ecef; margin-top: 15px; line-height: 1.6; font-size: 14px; }
        .btn-kembali { display: inline-block; margin-top: 25px; background: #2c3e50; color: white; padding: 8px 16px; text-decoration: none; border-radius: 5px; font-size: 13px; }
        .btn-kembali:hover { background: #1a252f; }
    </style>
</head>
<body>
<div class="card">
    <h2>Detail Informasi Laboratorium</h2>
    
    <div class="row"><span class="label">Kode Lab</span>: <b>{{ $lab['kode_lab'] }}</b></div>
    <div class="row"><span class="label">Nama Laboratorium</span>: {{ $lab['nama_lab'] }}</div>
    <div class="row"><span class="label">Penanggung Jawab</span>: {{ $lab['penanggung_jawab'] }}</div>
    <div class="row"><span class="label">Kapasitas Komputer</span>: {{ $lab['kapasitas_pc'] }} Unit PC</div>
    <div class="row"><span class="label">Status Operasional</span>: 
        <b style="color: {{ ($lab['status'] === 'Tersedia') ? '#27ae60' : '#c0392b' }}">{{ $lab['status'] }}</b>
    </div>

    <div class="fasilitas-box">
        <b>Fasilitas & Spesifikasi Ruangan:</b><br>
        {{ $lab['fasilitas'] }}
    </div>

    <a href="{{ url('/laboratorium') }}" class="btn-kembali">&laquo; Kembali ke Direktori Laboratorium</a>
</div>
</body>
</html>