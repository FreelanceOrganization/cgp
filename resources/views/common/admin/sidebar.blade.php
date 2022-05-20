<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-profile">
        <a href="#" class="nav-link">
          <div class="nav-profile-text d-flex flex-column">
            <span class="font-weight-bold mb-2 capitalize">{{ $user->firstname }} {{ $user->lastname }}</span>
            <span class="text-secondary text-small">Administrator</span>
          </div>
          <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
        </a>
      </li>
      <li class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
          <span class="menu-title">Dashboard</span>
          <i class="mdi mdi-home menu-icon"></i>
        </a>
      </li>
      <li class="nav-item {{ request()->routeIs('admin.customer.*') ? 'active' : '' }}">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-customers" aria-expanded="false" aria-controls="ui-basic">
          <span class="menu-title">Customers</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-account-multiple menu-icon"></i>
        </a>
        <div class="collapse" id="ui-customers">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('admin.customer.savings') }}">Savings</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('admin.customer.credits') }}">Credits</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item {{ request()->routeIs('admin.transactions.history.*') ? 'active' : '' }}">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-transaction" aria-expanded="false" aria-controls="ui-basic">
        <span class="menu-title">Transaction's History</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-history menu-icon"></i>
        </a>
        <div class="collapse" id="ui-transaction">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('admin.transactions.savings') }}">Savings</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('admin.transactions.credits') }}">Credits</a></li>
          </ul>
        </div>
      </li>
    </ul>
  </nav>
