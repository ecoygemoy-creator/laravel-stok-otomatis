
@extends('layout')

@section('content')
<div class="container">
    <h1>Tambah Transaksi</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ url('/transactions') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nama Produk</label>
            <select name="product_id" class="form-control" required>
                <option value="">-- Pilih Produk --</option>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}">
                        {{ $product->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Jenis Transaksi</label>
            <select name="type" class="form-control" required>
                <option value="">-- Pilih Jenis Transaksi --</option>
                <option value="in">Barang Masuk</option>
                <option value="out">Barang Keluar</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Jumlah Barang</label>
            <input type="number" name="quantity"
                   class="form-control" min="1" required>
        </div>

        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="description"
                      class="form-control" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-success">
            Simpan Transaksi
        </button>

        <a href="{{ url('/transactions') }}"
           class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
