<!-- resources/views/admin/orders/show.blade.php -->

@extends('layouts.admin')

@section('content')
    <h1>Detail Pesanan {{ $order->id }}</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h3>Status: {{ $order->status }}</h3>

    <form action="{{ route('admin.orders.update-status', $order->id) }}" method="POST" class="mb-3">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="status">Ubah Status:</label>
            <select name="status" id="status" class="form-control">
                <option value="PENDING" @if ($order->status === 'PENDING') selected @endif>Tertunda</option>
                <option value="PROCESSING" @if ($order->status === 'PROCESSING') selected @endif>Proses</option>
                <option value="SHIPPED" @if ($order->status === 'SHIPPED') selected @endif>Dikirim</option>
                <option value="COMPLETED" @if ($order->status === 'COMPLETED') selected @endif>Selesai</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>

    <a href="{{ route('admin.pesanan.index') }}" class="btn btn-secondary">Kembali</a>
@endsection
