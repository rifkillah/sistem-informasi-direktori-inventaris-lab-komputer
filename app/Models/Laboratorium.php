<?php

namespace App\Models;

class Laboratorium
{
    private static $daftar_lab = [
        [
            'kode_lab' => 'LAB01',
            'nama_lab' => 'Lab Pemrograman Dasar',
            'penanggung_jawab' => 'Septa, S.Kom., M.Kom.',
            'kapasitas_pc' => 35,
            'status' => 'Tersedia',
            'fasilitas' => 'PC Core i7, RAM 16GB, Dual Monitor, Proyektor, AC Sentral.'
        ],
        [
            'kode_lab' => 'LAB02',
            'nama_lab' => 'Lab Jaringan Komputer & Keamanan',
            'penanggung_jawab' => 'Rina Wijaya, S.Kom., M.T.',
            'kapasitas_pc' => 30,
            'status' => 'Tersedia',
            'fasilitas' => 'Router Cisco, Switch Managed, Rack Server, PC Workstation.'
        ],
        [
            'kode_lab' => 'LAB03',
            'nama_lab' => 'Lab Multimedia & Game Dev',
            'penanggung_jawab' => 'Dr. Budi Santoso, M.Kom.',
            'kapasitas_pc' => 25,
            'status' => 'Sedang Maintenance',
            'fasilitas' => 'PC RTX 4060, Drawing Tablet, VR Headset, Soundproof Studio.'
        ],
        [
            'kode_lab' => 'LAB04',
            'nama_lab' => 'Lab Basis Data & Data Science',
            'penanggung_jawab' => 'Ahmad Dani, S.T., M.Cs.',
            'kapasitas_pc' => 40,
            'status' => 'Tersedia',
            'fasilitas' => 'Server Cluster Akses Lokal, PC High Memory, Smart Whiteboard.'
        ],
        [
            'kode_lab' => 'LAB05',
            'nama_lab' => 'Lab Internet of Things (IoT)',
            'penanggung_jawab' => 'Eko Prasetyo, S.Kom., M.Eng.',
            'kapasitas_pc' => 20,
            'status' => 'Sedang Maintenance',
            'fasilitas' => 'Microcontroller Kit, Soldering Station, Multimeter Digital, Oscilloscope.'
        ]
    ];

    // Mengembalikan seluruh data lab
    public static function ambilSemuaLab()
    {
        return self::$daftar_lab;
    }

    // Mencari satu data lab spesifik berdasarkan kode
    public static function cariKodeLab($kode)
    {
        foreach (self::$daftar_lab as $lab) {
            if (strtoupper($lab['kode_lab']) === strtoupper($kode)) {
                return $lab;
            }
        }
        return null;
    }

    // Memfilter data lab berdasarkan status
    public static function filterBerdasarkanStatus($status)
    {
        if (strtolower($status) === 'semua') {
            return self::$daftar_lab;
        }

        $hasil = [];
        foreach (self::$daftar_lab as $lab) {
            if (strtolower($lab['status']) === strtolower($status)) {
                $hasil[] = $lab;
            }
        }
        return $hasil;
    }
}