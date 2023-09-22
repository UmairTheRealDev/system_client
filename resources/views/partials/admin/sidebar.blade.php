<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{ route('admin.dashboard') }}">
            <span class="align-middle">Pakbees {{ Auth::user()->type }} Panel</span>
        </a>

        <ul class="sidebar-nav">
            {{-- <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.dashboard') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li> --}}

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.surveys') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Surveys</span>
                </a>
            </li>

            @if (Auth::user()->type == 'Admin')
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('admin.brands') }}">
                        <i class="align-middle" data-feather="book"></i> <span class="align-middle">Brands</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('admin.device_models') }}">
                        <i class="align-middle" data-feather="book"></i> <span class="align-middle">Models</span>
                    </a>
                </li>


                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('admin.users') }}">
                        <i class="align-middle" data-feather="book"></i> <span class="align-middle">Users</span>
                    </a>
                </li>


                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('admin.customers') }}">
                        <i class="align-middle" data-feather="book"></i> <span class="align-middle">Customers</span>
                    </a>
                </li>
            @endif

        </ul>
    </div>
</nav>
