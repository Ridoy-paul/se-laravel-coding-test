<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transactions;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
       
    }

    public function dashboard()
    {
        try {
            $userId = Auth::user()->id;
            $currentMonth = Carbon::now()->format('Y-m');
            $withdrawalsThisMonth = Transactions::where('user_id', $userId)->where('transaction_type', 'withdraw')
                ->whereYear('date', Carbon::now()->year)
                ->whereMonth('date', Carbon::now()->month)
                ->get(['amount', 'fee']);
            
            $depositsThisMonth = Transactions::where('user_id', $userId)->where('transaction_type', 'deposit')
                ->whereYear('date', Carbon::now()->year)
                ->whereMonth('date', Carbon::now()->month)
                ->sum('amount');

            $totalWithdrawals = Transactions::where('user_id', $userId)->where('transaction_type', 'withdraw')->get(['amount', 'fee']);
            $totalDeposits = Transactions::where('user_id', $userId)->where('transaction_type', 'deposit')->sum('amount');

            $transactions = Transactions::where('user_id', $userId)->latest()->limit(20)->get();

            return view('admin.pages.dashboard.home', compact('withdrawalsThisMonth', 'depositsThisMonth', 'totalWithdrawals', 'totalDeposits', 'transactions'));
        } 
        catch (\Exception $e) {
            return back()->withError($e->getMessage());
        }
    }
}
