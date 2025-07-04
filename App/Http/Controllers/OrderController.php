<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        $orders=Order::all();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        return view('orders.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pelanggan' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'berat' => 'required|numeric|min:0.1',
            'jenis_layanan' => 'required|in:Cuci Lipat,Cuci Setrika'
        ]);

        $hargaPerKg = $request->jenis_layanan === 'Cuci Setrika' ? 8000 : 5000;
        $total = $request->berat * $hargaPerKg;

        Order::create([
            'nama_pelanggan' => $request->nama_pelanggan,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'berat' => $request->berat,
            'jenis_layanan' => $request->jenis_layanan,
            'total_harga' => $total,
            'status' => 'proses' // default status baru
        ]);

        return redirect()->route('orders.index')->with('success', 'Order ditambahkan!');
    }

    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        return view('orders.edit', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'nama_pelanggan' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'berat' => 'required|numeric|min:0.1',
            'jenis_layanan' => 'required|in:Cuci Lipat,Cuci Setrika',
            'status' => 'required|in:proses,selesai'
        ]);

        $hargaPerKg = $request->jenis_layanan === 'Cuci Setrika' ? 8000 : 5000;
        $total = $request->berat * $hargaPerKg;

        $order->update([
            'nama_pelanggan' => $request->nama_pelanggan,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'berat' => $request->berat,
            'jenis_layanan' => $request->jenis_layanan,
            'total_harga' => $total,
            'status' => $request->status
        ]);

        return redirect()->route('orders.index')->with('success', 'Order berhasil diperbarui!');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Order berhasil');
    }
}
