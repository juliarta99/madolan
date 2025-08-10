<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function showTransactionPOS(Request $request) {
        $transactions = Transaction::
        with(['items', 'creator'])
        ->where('category_id', 1)
            ->when($request->search, function ($query, $search) {
                $query->where('code', 'like', '%' . $search . '%');
            })
            ->when($request->from && $request->to, function ($query) use ($request) {
                $from = Carbon::createFromFormat('d/m/Y', $request->from)->startOfDay();
                $to = Carbon::createFromFormat('d/m/Y', $request->to)->endOfDay();
                
                $query->whereBetween('created_at', [$from, $to]);
            })
            ->paginate(10)
            ->withQueryString();

            return view("dashboard.pos.riwayat-transaksi", compact('transactions'));
    }


}
