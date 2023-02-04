<?php

namespace App\Http\Controllers\Global;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppController extends Controller
{
    public function __construct(Product $product_item, Transaction $transaction_item)
    {
        $this->products = $product_item;
        $this->transactions = $transaction_item;
    }

    public function home()
    {
        $data = [
            'title' => 'Home',
            'id_page' => 1,
        ];

        return view('pages.home', $data);
    }

    public function show_product()
    {
        $data = [
            'title' => 'Show Product',
            'id_page' => 2,
            'products' => $this->products->paginate(3),
            'count_product' => $this->products->count(),
        ];

        return view('pages.show_product', $data);
    }

    public function view_item()
    {
        $data = [
            'title' => 'View Item',
            'id_page' => 3,
            'products' => $this->products->get(),
            'count_product' => $this->products->count(),
        ];

        return view('pages.admin.view_item', $data);
    }

    public function add_item()
    {
        $data = [
            'title' => 'Add Item',
            'id_page' => 4,
        ];

        return view('pages.admin.add_item', $data);
    }

    public function detail_product($id)
    {
        $data = [
            'title' => 'Detail Product',
            'id_page' => null,
            'product' => Product::find($id),
        ];
        return view('pages.detail_product', $data);
    }

    public function edit_profile()
    {
        $data = [
            'title' => 'Edit Profile',
            'id_page' => 5,
        ];

        return view('pages.edit_profile', $data);
    }

    public function change_password()
    {
        $data = [
            'title' => 'Change Password',
            'id_page' => 6,
        ];

        return view('pages.change_password', $data);
    }

    public function transaction_history()
    {
        $data = [
            'title' => 'Transaction History',
            'id_page' => 7,
            'count_transaction' => $this->transactions->where('status', '=', 'checkout')->where('user_id', '=', auth()->user()->email)->count(),
            'transactions' => $this->transactions->where('status', '=', 'checkout')->where('user_id', '=', auth()->user()->email)->join('products', 'transactions.item_id', '=', 'products.item_id')->get(),
            'quantity_total' => $this->transactions->where('status', '=', 'checkout')->where('user_id', '=', auth()->user()->email)->sum('quantity'),
            'price_total' => $this->transactions->where('status', '=', 'checkout')->where('user_id', '=', auth()->user()->email)->join('products', 'transactions.item_id', '=', 'products.item_id')->pluck('products.price'),
        ];

        return view('pages.customers.transaction', $data);
    }

    public function my_cart()
    {
        $data = [
            'title' => 'My Cart',
            'id_page' => 8,
            'count_transaction' => $this->transactions->where('status', '=', 'non-checkout')->where('user_id', '=', auth()->user()->email)->count(),
            'transactions' => $this->transactions->where('status', '=', 'non-checkout')->where('user_id', '=', auth()->user()->email)->join('products', 'transactions.item_id', '=', 'products.item_id')->get(),
            'quantity_total' => $this->transactions->where('status', '=', 'non-checkout')->where('user_id', '=', auth()->user()->email)->sum('quantity'),
            'price_total' => $this->transactions->where('status', '=', 'non-checkout')->where('user_id', '=', auth()->user()->email)->join('products', 'transactions.item_id', '=', 'products.item_id')->pluck('products.price'),
        ];

        return view('pages.customers.my_cart', $data);
    }

    public function search(Request $request)
    {
        $keyword = $request->search;
        $data = [
            'title' => 'Search Product',
            'id_page' => null,
            'products' => Product::where('name', 'like', "%" . $keyword . "%")->paginate(),
            'count_product' => $this->products->count(),
        ];

        return view('pages.show_product', $data);
    }
}
