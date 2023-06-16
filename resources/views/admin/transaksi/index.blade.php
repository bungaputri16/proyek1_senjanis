@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Laporan Penjualan
               
            </h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form action="{{ route('transaksi.search') }}" method="GET" class="mb-3">
                    <div class="input-group">
                        <input type="text" name="keyword" class="form-control" placeholder="Cari berdasarkan nomor transaksi atau nama">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">Cari</button>
                        </div>
                    </div>
                </form>
                <table class="table table-bordered">
                    <!-- ... bagian head table ... -->
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Nama</th>
                            <th>Nomor Transaksi</th>
                            <th>Total</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $transaksi)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $transaksi->tanggal }}</td>
                                <td>{{ $transaksi->nama }}</td>
                                <td>{{ $transaksi->nomor_transaksi }}</td>
                                <td>{{ $transaksi->jumlah }}</td>
                               
                               
                               
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">Tidak ada data transaksi yang ditemukan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
