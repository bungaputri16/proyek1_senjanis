<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function index()
    {
        // Ambil informasi nomor rekening dan konfirmasi pesanan
        $nomorRekening = '1234 5678 9012';
        $konfirmasiPesanan = 'Terima kasih atas pesanan Anda. Kami akan segera mengirimkan pesanan Anda.';

        // Render halaman pesanan berhasil dengan mengirimkan data ke view
        return view('frontend.pesanan.berhasil', compact('nomorRekening', 'konfirmasiPesanan'));
    }
}
