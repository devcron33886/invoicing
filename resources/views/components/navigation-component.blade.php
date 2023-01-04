<div class="navbar-expand-md">
    <div class="collapse navbar-collapse" id="navbar-menu">
        <div class="navbar navbar-light">
            <div class="container-xl">
                <ul class="navbar-nav">
                    <li class="nav-item  {{ request()->is('home') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('home') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                   class="icon icon-tabler icon-tabler-dashboard" width="24" height="24"
                                   viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                   stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <circle cx="12" cy="13" r="2"></circle>
                                        <line x1="13.45" y1="11.55" x2="15.5" y2="9.5"></line>
                                    <path d="M6.4 20a9 9 0 1 1 11.2 0z"></path>
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Dashboard
                            </span>
                        </a>
                    </li>
                    <li class="nav-item {{ request()->is('dashboard/products') || request()->is('dashboard/products/*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('products.index') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-package" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                   <polyline points="12 3 20 7.5 20 16.5 12 21 4 16.5 4 7.5 12 3"></polyline>
                                   <line x1="12" y1="12" x2="20" y2="7.5"></line>
                                   <line x1="12" y1="12" x2="12" y2="21"></line>
                                   <line x1="12" y1="12" x2="4" y2="7.5"></line>
                                   <line x1="16" y1="5.25" x2="8" y2="9.75"></line>
                                </svg>

                            </span>
                            <span class="nav-link-title">
                                Products
                            </span>
                        </a>
                    </li>
                    <li class="nav-item {{ request()->is('dashboard/customers') || request()->is('dashboard/customers/*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('customers.index')}}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users"
                                   width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                   stroke="currentColor" fill="none" stroke-linecap="round"
                                   stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                    <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Customers
                            </span>
                        </a>
                    </li>
                    <li class="nav-item {{ request()->is('dashboard/invoices') || request()->is('dashboard/invoices/*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('invoices.index') }}">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                           class="icon icon-tabler icon-tabler-file-dollar" width="24" height="24"
                                           viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                           stroke-linecap="round" stroke-linejoin="round">
                                           <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                           <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                           <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                                           <path d="M14 11h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3h-2.5"></path>
                                           <path d="M12 17v1m0 -8v1"></path>
                                        </svg>
                                    </span>
                            <span class="nav-link-title">
                                Invoices
                            </span>
                        </a>
                    </li>
                </ul>
                <div class="my-2 my-md-0 flex-grow-1 flex-md-grow-0 order-first order-md-last">
                    <form action="" method="get" autocomplete="off" novalidate>
                        <div class="input-icon">
                            <span class="input-icon-addon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <circle cx="10"cy="10"r="7"/>
                                    <line x1="21" y1="21" x2="15" y2="15"/>
                                </svg>
                            </span>
                            <input type="text" value="" class="form-control" placeholder="Search…" aria-label="Search in website">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
