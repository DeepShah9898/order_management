<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user')->get();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $users = User::all();
        return view('orders.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'products' => 'required|array',
            'products.*.name' => 'required|string',
            'products.*.qty' => 'required|integer|min:1',
            'products.*.amount' => 'required|numeric|min:1',
        ]);

        $order = Order::create([
            'user_id' => $request->user_id,
            'grand_total' => collect($request->products)->sum(fn($p) => $p['qty'] * $p['amount']),
        ]);

        foreach ($request->products as $product) {
            Product::create([
                'order_id' => $order->id,
                'name' => $product['name'],
                'qty' => $product['qty'],
                'amount' => $product['amount'],
                'total' => $product['qty'] * $product['amount'],
            ]);
        }

        return redirect()->route('orders.index')->with('success', 'Order created successfully!');
    }

    public function show($id)
    {
        $order = Order::with('user', 'products')->findOrFail($id);
        return view('orders.show', compact('order'));
    }
    
}
