<?php

namespace App\Utilities;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Transactions;
use Illuminate\Support\Facades\Auth;

class TransactionUtility
{
    public static function UpdateUserBalance($userId, $type, $amount) {
        $user = User::where('id', $userId)->first(['id', 'balance']);

        if (!$user || !in_array($type, ['deposit', 'withdraw'])) {
            return false;
        }

        if ($type === 'deposit') {
            $user->balance += $amount;
        } 
        elseif ($amount <= $user->balance) {
            $user->balance -= $amount;
        } 
        else {
            return false;
        }

        $user->save();
        return true;
    }

    public static function totalWithdrawal($userId)
    {
        $totalWithdrawalAmount = Transactions::where('user_id', $userId)->where('transaction_type', 'withdrawal')->sum('amount');
        return $totalWithdrawalAmount;
    }

    public static function calculateWithdrawalFee($userId, $amount)
    {
        $user = User::where('id', $userId)->first(['id', 'balance', 'account_type']);
        $individualAccountWithdrawalRate = 0.015;
        $businessAccountWithdrawalRate = 0.025;
        $withdrawalRate = 0;

        if (!$user) {
            return ['success' => false, 'message' => 'User not found!'];
        }

        if($user->account_type == 'individual') {
            $isFriday = Carbon::now()->dayOfWeek === Carbon::FRIDAY;
            $isFirst1KWithdrawal = $amount <= 1000;

            $isFirst5KWithdrawalOfMonth = Transactions::where('user_id', $userId)
                                        ->where('transaction_type', 'withdrawal')
                                        ->whereMonth('created_at', Carbon::now()->month)
                                        ->sum('amount') + $amount <= 5000;

            if ($isFriday || $isFirst1KWithdrawal || $isFirst5KWithdrawalOfMonth) {
                $withdrawalRate = 0;
            } 
            else {
                $withdrawalRate = $individualAccountWithdrawalRate;
            }

        }
        else if($user->account_type == 'business') {
            if (self::totalWithdrawal($userId) >= 50000) {
                $withdrawalRate = 0.015;
            } 
            else {
                $withdrawalRate = $businessAccountWithdrawalRate;
            }
        }


        $withdrawalFee = $amount * $withdrawalRate;
        $totalAmount = ($amount + $withdrawalFee);

        if ($amount <= 0 || $totalAmount > $user->balance) {
            return ['success' => false, 'withdrawalFee' => $withdrawalFee, 'totalAmount' => $totalAmount, 'message' => 'withdrawal amount is Greater than Balance! Need total Balance: '.$totalAmount];
        }

        return ['success' => true, 'withdrawalFee' => $withdrawalFee, 'totalAmount' => $totalAmount];
    }



}
