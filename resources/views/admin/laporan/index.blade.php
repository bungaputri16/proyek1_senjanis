@extends('layouts.admin')

@section('content')
        <div class="card">
            <div class="card-header">
                <h3>Laporan Transaksi
                    <a href="" class="btn btn-primary float-right">
                        Tambah
                    </a>
                </h3>     
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Nama</th>
                                <th>Nomor Transaksi</th>
                                <th>Total</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transaksis as $transaksi)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $transaksi->tanggal }}</td>
                                    <td>{{ $transaksi->nama }}</td>
                                    <td>{{ $transaksi->nomor_transaksi }}</td>
                                    <td>{{ $transaksi->jumlah }}</td>
                                    <td>
                                        <div class="btn-group">
                                         
                                            <a href="" class="btn btn-info">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                            <form onclick="return confirm('are you sure ?');" action="" method="post">
                                                @csrf 
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
@endsection