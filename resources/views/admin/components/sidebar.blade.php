<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{ route('account.dashboard') }}">
            <span class="align-middle">Mediusware Bank</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Pages
            </li>

            <li class="sidebar-item {{ isActiveRoute(['account.dashboard']) }}">
                <a class="sidebar-link" href="{{ route('account.dashboard') }}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>         

            

            <li class="sidebar-item {{ isActiveRoute(['transaction.all']) }}">
                <a class="sidebar-link" href="{{ route('transaction.all') }}">
                    <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">All Transactions</span>
                </a>
            </li>
            
            <li class="sidebar-item {{ isActiveRoute(['transaction.deposit.create']) }}">
                <a class="sidebar-link" href="{{ route('transaction.deposit.create') }}">
                    <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Make Deposit</span>
                </a>
            </li>
            

            <li class="sidebar-item">
                <a class="sidebar-link" href="pages-sign-up.html">
                    <i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">Sign Up</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="pages-blank.html">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Blank</span>
                </a>
            </li>

            <li class="sidebar-header">
                Tools & Components
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="ui-buttons.html">
                    <i class="align-middle" data-feather="square"></i> <span class="align-middle">Buttons</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="ui-forms.html">
                    <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Forms</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="ui-cards.html">
                    <i class="align-middle" data-feather="grid"></i> <span class="align-middle">Cards</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="ui-typography.html">
                    <i class="align-middle" data-feather="align-left"></i> <span class="align-middle">Typography</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="icons-feather.html">
                    <i class="align-middle" data-feather="coffee"></i> <span class="align-middle">Icons</span>
                </a>
            </li>

            <li class="sidebar-header">
                Plugins & Addons
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="charts-chartjs.html">
                    <i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Charts</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="maps-google.html">
                    <i class="align-middle" data-feather="map"></i> <span class="align-middle">Maps</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
