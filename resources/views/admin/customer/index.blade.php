@extends('layouts.admin')

@section('content')
        <div class="card">
            <div class="card-header">
                <h3>Data Customer
                    <a href="{{ route('customer.create') }}" class="btn btn-primary float-right">
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
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Nomor HP</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->nama }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td>{{ $row ->hp }}</td>
                                    <td>{{ $row ->alamat }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="" class="btn btn-warning">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="{{ route('customer.edit',$row->id ) }}" class="btn btn-info">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                            <form onclick="return confirm('are you sure ?');" action="{{ route('customer.destroy', $row->id) }}" method="post">
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