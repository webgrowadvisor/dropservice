<?php

namespace App\Http\Controllers\Drop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use App\Models\Transaction;
use Auth;

class DropPaymentController extends Controller
{
    
    public function showForm()
    {
        return view('drop.payment.form');
    }

    public function createOrder(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
            'remark' => 'required|string|max:255',
        ]);

        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        $order = $api->order->create([
            'receipt'         => uniqid(),
            'amount'          => $request->amount * 100, // in paise
            'currency'        => 'INR',
        ]);

        // Store transaction
        $transaction = Transaction::create([
            'dropservice_id' => Auth::guard('dropservice')->id(),
            'amount'         => $request->amount,
            'remark'         => $request->remark,
            'status'         => 'pending',
        ]);

        return view('drop.payment.razorpay_checkout', [
            'order_id'     => $order['id'],
            'amount'       => $request->amount,
            'key'          => env('RAZORPAY_KEY'),
            'transaction'  => $transaction,
        ]);
    }

    public function paymentCallback(Request $request)
    {
        $transaction = Transaction::find($request->transaction_id);

        if (!$transaction) {
            return redirect()->route('drop.payment.form')->with('error_msg', 'Transaction not found.');
        }

        $transaction->update([
            'payment_id' => $request->razorpay_payment_id,
            'status'     => 'paid',
        ]);

        return redirect()->route('drop.payment.form')->with('success_msg', 'Payment successful!');
    }

    public function transactionHistory()
    {
        $transactions = Transaction::where('dropservice_id', auth('dropservice')->id())->latest()->paginate('10');
        return view('drop.payment.history', compact('transactions'));
    }

}
