
@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>Edit Produk</h2>

    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Produk</label>
            <input type="text" name="name" class="form-control"
                value="{{ $product->name }}" required>
        </div>

        <div class="mb-3">
            <label>Harga</label>
            <input type="number" name="price" class="form-control"
                value="{{ $product->price }}" required>
        </div>

        <div class="mb-3">
            <label>Jumlah Stok</label>
            <input type="number" name="stock" class="form-control"
                value="{{ $product->stock }}" required>
        </div>

        <button type="submit" class="btn btn-primary">
            Simpan Perubahan
        </button>

        <a href="{{ route('products.index') }}" class="btn btn-secondary">
            Kembali
        </a>
    </form>
</div>
@endsection
