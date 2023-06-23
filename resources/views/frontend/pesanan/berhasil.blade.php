<!-- resources/views/pesanan/berhasil.blade.php -->
@extends('layouts.checkout')

@section('content')
<section class="mb-5">
    <div class="container">
        <div class="center">
            <h1>Pesanan Berhasil</h1>
            
            <p>Silakan lakukan pembayaran ke nomor rekening berikut:</p>
            <h4 class="active">Nomor Rekening: {{ $nomorRekening }}</h4>
            
            <p>{{ $konfirmasiPesanan }}</p>
            
            <p>Silahkan untuk melakukan konfirmasi pembayaran dan pesanan, hubungi kami melalui WhatsApp.</p>
            
            <button class="primary-btn"><a href="https://wa.me/088971743542">Kirim Pesan WhatsApp</a></button>
        </div>
</section>
</div>




@endsection


