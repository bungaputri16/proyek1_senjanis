@extends('layouts.admin')

@section('content')
        <div class="card">
            <div class="card-header">
                <h3>Tambah Customer 
                    <a href="{{ route('admins.index') }}" class="btn btn-primary float-right">
                        Kembali 
                    </a>
                </h3>     
            </div>
            <div class="card-body">
                <form action="{{ route('admins.store') }}" method="post">
                    @csrf 
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" name="nama" value="{{ old('nama') }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="price">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="hp">Nomer Hp</label>
                        <input type="hp" name="hp" value="{{ old('hp') }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="weight">Alamat</label>
                        <input type="text" name="alamat" value="{{ old('alamat') }}" class="form-control">
                    </div>
                 
                 
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
@endsection


