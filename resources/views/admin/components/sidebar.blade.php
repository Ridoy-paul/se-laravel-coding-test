<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{ route('account.dashboard') }}">
            <span class="align-middle">Mediusware Bank</span>
        </a>

        <ul class="sidebar-nav">
            
            <li class="sidebar-item {{ isActiveRoute(['account.dashboard']) }}">
                <a class="sidebar-link" href="{{ route('account.dashboard') }}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>         

            <li class="sidebar-item {{ isActiveRoute(['transaction.all']) }}">
                <a class="sidebar-link" href="{{ route('transaction.all') }}">
                    <i class="align-middle" data-feather="activity"></i> <span class="align-middle">All Transactions</span>
                </a>
            </li>

            <li class="sidebar-header">
                Deposit
            </li>
            <li class="sidebar-item {{ isActiveRoute(['transaction.deposit.create']) }}">
                <a class="sidebar-link" href="{{ route('transaction.deposit.create') }}">
                    <i class="align-middle" data-feather="arrow-down-circle"></i> <span class="align-middle">Make Deposit</span>
                </a>
            </li>

            <li class="sidebar-item {{ isActiveRoute(['transaction.deposit.list']) }}">
                <a class="sidebar-link" href="{{ route('transaction.deposit.list') }}">
                    <i class="align-middle" data-feather="list"></i> <span class="align-middle">Deposit List</span>
                </a>
            </li>

            <li class="sidebar-header">
                Withdraw
            </li>
            <li class="sidebar-item {{ isActiveRoute(['transaction.withdraw.create']) }}">
                <a class="sidebar-link" href="{{ route('transaction.withdraw.create') }}">
                    <i class="align-middle" data-feather="arrow-up-circle"></i> <span class="align-middle">Make Withdraw</span>
                </a>
            </li>
            <li class="sidebar-item {{ isActiveRoute(['transaction.withdraw.list']) }}">
                <a class="sidebar-link" href="{{ route('transaction.withdraw.list') }}">
                    <i class="align-middle" data-feather="list"></i> <span class="align-middle">Withdraw List</span>
                </a>
            </li>
            
        </ul>
    </div>
</nav>
