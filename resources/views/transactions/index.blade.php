
@extends('layout')

@section('content')
<div class="container">
    <h1>Data Transaksi</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ url('/transactions/create') }}"
       class="btn btn-primary mb-3">
        + Tambah Transaksi
    </a>

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Jenis Transaksi</th>
                <th>Jumlah</th>
                <th>Keterangan</th>
                <th>Tanggal Transaksi</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($transactions as $transaction)
                <tr>
                    <td>{{ $loop->iteration }}</td>

                    <td>
                        {{ $transaction->product->name ?? '-' }}
                    </td>

                    <td>
                        @if ($transaction->type == 'in')
                            Barang Masuk
                        @else
                            Barang Keluar
                        @endif
                    </td>

                    <td>{{ $transaction->quantity }}</td>

                    <td>
                        {{ $transaction->description ?? '-' }}
                    </td>

                    <td>
                        {{ $transaction->created_at
                            ? $transaction->created_at->format('d-m-Y H:i')
                            : '-' }}
                    </td>

                    <td>
                        <a href="{{ url('/transactions/' . $transaction->id . '/edit') }}"
                           class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="{{ url('/transactions/' . $transaction->id) }}"
                              method="POST"
                              style="display:inline;"
                              onsubmit="return confirm('Yakin ingin menghapus transaksi ini?')">

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
                    <td colspan="7" class="text-center">
                        Belum ada data transaksi.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
