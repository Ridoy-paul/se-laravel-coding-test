<?php

namespace App\Http\Controllers;

use App\Models\Transactions;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransactionsController extends Controller
{
    public function allTransactions(Request $request) {
        try {
            if ($request->ajax()) {
                $data = Transactions::where('user_id', Auth::user()->id);
    
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){
           
                                $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
          
                                return $btn;
                        })
                        ->rawColumns(['action'])
                        ->make(true);
            }

            return view('admin.pages.transaction.all');

        } 
        catch (\Exception $e) {
            return back()->withError($e->getMessage());
        }
    }

    public function createDeposit() {
        try {
            return view('admin.pages.transaction.createDeposit');

        } 
        catch (\Exception $e) {
            return back()->withError($e->getMessage());
        }
    }

    public function storeDeposit() {
        try {
            
        } 
        catch (\Exception $e) {
            DB::rollBack();
            return back()->withError($e->getMessage());
        }
    }

    

    
}
