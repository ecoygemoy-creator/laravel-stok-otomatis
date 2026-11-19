
@extends('layout')

@section('content')
<div class="container">
    <h1>Edit Data Transaksi</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card mt-3">
        <div class="card-body">

            <form action="{{ url('/transactions/' . $transaction->id) }}"
                  method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Nama Produk</label>

                    <select name="product_id" class="form-control" required>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}"
                                {{ old('product_id', $transaction->product_id) == $product->id ? 'selected' : '' }}>
                                {{ $product->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label>Jenis Transaksi</label>

                    <select name="type" class="form-control" required>
                        <option value="in"
                            {{ old('type', $transaction->type) == 'in' ? 'selected' : '' }}>
                            Barang Masuk
                        </option>

                        <option value="out"
                            {{ old('type', $transaction->type) == 'out' ? 'selected' : '' }}>
                            Barang Keluar
                        </option>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Jumlah Barang</label>

                    <input type="number"
                           name="quantity"
                           class="form-control"
                           min="1"
                           value="{{ old('quantity', $transaction->quantity) }}"
                           required>
                </div>

                <div class="mb-3">
                    <label>Keterangan</label>

                    <textarea name="description"
                              class="form-control"
                              rows="3">{{ old('description', $transaction->description) }}</textarea>
                </div>

                <button type="submit" class="btn btn-success">
                    Simpan Perubahan
                </button>

                <a href="{{ url('/transactions') }}"
                   class="btn btn-secondary">
                    Kembali
                </a>

            </form>
        </div>
    </div>
</div>
@endsection
