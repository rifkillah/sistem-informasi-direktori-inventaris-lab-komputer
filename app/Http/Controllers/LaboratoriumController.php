<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laboratorium; // <-- TAMBAHKAN BARIS INI

class LaboratoriumController extends Controller
{
    public function index()
    {
        $data_lab = Laboratorium::ambilSemuaLab();
        // ... (lanjutan kode berikutnya)
        
        $total_pc = 0;
        foreach ($data_lab as $lab) {
            $total_pc += $lab['kapasitas_pc'];
        }

        return view('lab_index', [
            'judul' => 'Direktori & Inventaris Laboratorium Komputer',
            'data_lab' => $data_lab,
            'total_pc' => $total_pc,
            'filter_aktif' => 'Semua'
        ]);
    }

    // Menampilkan detail informasi satu laboratorium
    public function detail($kode)
    {
        $lab = Laboratorium::cariKodeLab($kode);

        if (!$lab) {
            abort(404, 'Data Laboratorium dengan kode tersebut tidak ditemukan.');
        }

        return view('lab_detail', [
            'lab' => $lab
        ]);
    }

    // Memfilter laboratorium berdasarkan status dari URL
    public function statusLab($status = 'Tersedia')
    {
        // Ubah format parameter URL jika bernilai 'Maintenance' agar sesuai
        $param_status = ($status === 'Maintenance') ? 'Sedang Maintenance' : $status;
        
        $data_lab = Laboratorium::filterBerdasarkanStatus($param_status);

        $total_pc = 0;
        foreach ($data_lab as $lab) {
            $total_pc += $lab['kapasitas_pc'];
        }

        return view('lab_index', [
            'judul' => 'Direktori & Inventaris Laboratorium Komputer (Filter: ' . $param_status . ')',
            'data_lab' => $data_lab,
            'total_pc' => $total_pc,
            'filter_aktif' => $param_status
        ]);
    }
}