<?php

namespace App\Http\Controllers\Function;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function add_cart_handle(Request $request)
    {
        $this->validate($request, [
            'quantity' => 'required|numeric|min:1'
        ]);

        $transaction = new Transaction();

        $transaction->user_id = auth()->user()->email;
        $transaction->item_id = $request->item_id;
        $transaction->quantity = $request->quantity;
        $transaction->status = 'non-checkout';
        $transaction->date_checkout = null;

        $transaction->save();

        return redirect()->route('my_cart')->with('success', 'Successfully added to cart');
    }

    public function checkout(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $today = date('Y-m-d', strtotime('now'));

        DB::table('transactions')->where('user_id', '=', auth()->user()->email)->where('status', '=', 'non-checkout')->where('date_checkout', '=', null)->where('receiver_name', '=', null)->where('receiver_address', '=', null)->update(array('status' => 'checkout', 'receiver_name' => $request->receiver_name, 'receiver_address' => $request->receiver_address, 'date_checkout' => $today));

        return redirect()->route('transaction_history')->with('success', 'Successfully to checkout!');
    }

    public function delete_item($id_transaction)
    {
        $transaction = Transaction::find($id_transaction);
        $transaction->delete();

        return redirect()->back()->with('warning', 'Successfully to deleted one item product');
    }
}
