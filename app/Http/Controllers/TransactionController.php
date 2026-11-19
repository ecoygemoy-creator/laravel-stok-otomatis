<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Product;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    // Menampilkan data transaksi
    public function index()
    {
        $transactions = Transaction::with('product')
            ->latest()
            ->get();

        return view('transactions.index', compact('transactions'));
    }

    // Menampilkan form tambah transaksi
    public function create()
    {
        $products = Product::all();

        return view('transactions.create', compact('products'));
    }

    // Menyimpan transaksi
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'type' => 'required|in:in,out',
            'quantity' => 'required|integer|min:1',
            'description' => 'nullable|string',
        ]);

        Transaction::create([
            'product_id' => $request->product_id,
            'type' => $request->type,
            'quantity' => $request->quantity,
            'description' => $request->description,
        ]);

        return redirect('/transactions')
            ->with('success', 'Transaksi berhasil ditambahkan!');
    }

    // Menampilkan form edit transaksi
    public function edit($id)
    {
        $transaction = Transaction::findOrFail($id);
        $products = Product::all();

        return view('transactions.edit', compact('transaction', 'products'));
    }

    // Memperbarui data transaksi
    public function update(Request $request, $id)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'type' => 'required|in:in,out',
            'quantity' => 'required|integer|min:1',
            'description' => 'nullable|string',
        ]);

        $transaction = Transaction::findOrFail($id);

        $transaction->update([
            'product_id' => $request->product_id,
            'type' => $request->type,
            'quantity' => $request->quantity,
            'description' => $request->description,
        ]);

        return redirect('/transactions')
            ->with('success', 'Data transaksi berhasil diperbarui!');
    }

    // Menghapus data transaksi
    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id);

        $transaction->delete();

        return redirect('/transactions')
            ->with('success', 'Data transaksi berhasil dihapus!');
    }
}
