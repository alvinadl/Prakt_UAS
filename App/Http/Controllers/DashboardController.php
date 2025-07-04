<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'totalOrders' => Order::count(),
            'completedOrders' => Order::where('status', 'selesai')->count(),
            'processingOrders' => Order::where('status', 'proses')->count(),
        ]);
    }
}
