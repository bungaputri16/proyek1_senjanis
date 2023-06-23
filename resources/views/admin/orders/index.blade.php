<!-- resources/views/admin/orders/index.blade.php -->

@extends('layouts.admin')

@section('content')
    <h1>Daftar Pesanan</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID Pesanan</th>
                <th>Tanggal Pesanan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->order_date }}</td>
                    <td>{{ $order->status }}</td>
                    <td>
                        <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-primary">Detail</a>
                        <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus pesanan ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Belum ada pesanan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
