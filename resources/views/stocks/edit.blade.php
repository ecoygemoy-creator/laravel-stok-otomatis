
@extends('layout')

@section('content')
<div class="container">
    <h1>Edit Data Stok</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ url('/stocks/' . $stock->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Produk</label>

            <select name="product_id" class="form-control" required>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}"
                        {{ old('product_id', $stock->product_id) == $product->id ? 'selected' : '' }}>
                        {{ $product->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Jumlah Stok</label>
            <input type="number"
                   name="quantity"
                   class="form-control"
                   min="0"
                   value="{{ old('quantity', $stock->quantity) }}"
                   required>
        </div>

        <button type="submit" class="btn btn-success">
            Simpan Perubahan
        </button>

        <a href="{{ url('/stocks') }}" class="btn btn-secondary">
            Kembali
        </a>
    </form>
</div>
@endsection
