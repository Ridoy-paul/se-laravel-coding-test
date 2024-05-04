@extends('admin.layouts.master')

@section('title')
Dashboard
@endsection

@section('content')
<div class="container-fluid p-0">
    <h1 class="h3 mb-3"><strong>Analytics</strong> Dashboard</h1>
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ date('M Y') }} Withdrawals</h5>
                            <h1 class="mt-1 mb-3">TK {{ number_format($withdrawalsThisMonth->sum('amount'), 2) }}</h1>
                            <h3><b>Fee: </b>TK {{ number_format($withdrawalsThisMonth->sum('fee'), 2) }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ date('M Y') }} Deposits</h5>
                            <h1 class="mt-1 mb-3">TK {{ number_format($depositsThisMonth, 2) }}</h1>
                        </div>
                    </div>
                </div>
        
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Total Withdrawals</h5>
                            <h1 class="mt-1 mb-3">TK {{ number_format($totalWithdrawals->sum('amount'), 2) }}</h1>
                            <h3><b>Fee: </b>TK {{ number_format($totalWithdrawals->sum('fee'), 2) }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Total Deposits</h5>
                            <h1 class="mt-1 mb-3">TK {{ number_format($totalDeposits, 2) }}</h1>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="shadow rounded m-1 border p-2 mb-3">
                        <x-current-balance-component />
                    </div>
                </div>
            </div>
        
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Last 20 Transactions</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover my-0">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Type</th>
                                        <th>Amount</th>
                                        <th>Fee</th>
                                        <th>Created At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($transactions as $transaction)
                                    <tr>
                                        <td>{{ $transaction->date }}</td>
                                        <td>{{ ucfirst($transaction->transaction_type) }}</td>
                                        <td>{{ $transaction->amount }}</td>
                                        <td>{{ $transaction->fee }}</td>
                                        <td>{{ $transaction->created_at }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
</div>
@endsection


