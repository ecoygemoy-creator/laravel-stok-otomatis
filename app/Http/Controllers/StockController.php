<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Product;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index()
    {
        $stocks = Stock::with('product')->get();

        return view('stocks.index', compact('stocks'));
    }

    public function create()
    {
        $products = Product::all();

        return view('stocks.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:0',
        ]);

        Stock::create([
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
        ]);

        return redirect('/stocks')
            ->with('success', 'Stok berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $stock = Stock::findOrFail($id);
        $products = Product::all();

        return view('stocks.edit', compact('stock', 'products'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:0',
        ]);

        $stock = Stock::findOrFail($id);

        $stock->update([
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
        ]);

        return redirect('/stocks')
            ->with('success', 'Data stok berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $stock = Stock::findOrFail($id);
        $stock->delete();

        return redirect('/stocks')
            ->with('success', 'Data stok berhasil dihapus!');
    }
}
