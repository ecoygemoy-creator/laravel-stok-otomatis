
@extends('layout')

@section('content')
<div class="container">
    <h1>Data Stok</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ url('/stocks/create') }}"
       class="btn btn-primary mb-3">
        + Tambah Stok
    </a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Jumlah Stok</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($stocks as $stock)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $stock->product->name ?? '-' }}</td>
                    <td>{{ $stock->quantity }}</td>
                    <td>
                        {{ $stock->quantity > 0 ? 'Tersedia' : 'Habis' }}
                    </td>
                    <td>
                        <a href="{{ url('/stocks/' . $stock->id . '/edit') }}"
                           class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="{{ url('/stocks/' . $stock->id) }}"
                              method="POST"
                              style="display:inline;"
                              onsubmit="return confirm('Yakin ingin menghapus stok ini?')">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="btn btn-danger btn-sm">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Belum ada data stok.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
