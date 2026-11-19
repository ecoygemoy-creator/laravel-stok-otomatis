
@extends('layout')

@section('content')
<div class="container">
    <h1>Tambah Produk</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ url('/products') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nama Produk</label>
            <input type="text"
                   name="name"
                   class="form-control"
                   value="{{ old('name') }}"
                   required>
        </div>

        <div class="mb-3">
            <label>Deskripsi Produk</label>
            <textarea name="description"
                      class="form-control">{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <label>Harga Produk</label>
            <input type="number"
                   name="price"
                   class="form-control"
                   min="0"
                   step="0.01"
                   value="{{ old('price') }}"
                   required>
        </div>

        <div class="mb-3">
            <label>Jumlah Stok Awal</label>
            <input type="number"
                   name="stock"
                   class="form-control"
                   min="0"
                   value="{{ old('stock', 0) }}"
                   required>
        </div>

        <button type="submit" class="btn btn-success">
            Simpan Produk
        </button>

        <a href="{{ url('/products') }}"
           class="btn btn-secondary">
            Kembali
        </a>
    </form>
</div>
@endsection
