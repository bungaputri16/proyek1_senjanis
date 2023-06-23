<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class Pesananadmin extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('admin.pesanan.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::findOrFail($id);
        return view('admin.pesanan.show', compact('order'));
    }

    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->status = $request->input('status');
        $order->save();

        return redirect()->route('admin.pesanan.show', $order->id)
            ->with('success', 'Status pesanan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('admin.pesanan.index')
            ->with('success', 'Pesanan berhasil dihapus.');
    }
}
