<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" >
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Senjanis</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            {{-- <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li> --}}

            <!-- Divider -->
            <hr class="sidebar-divider">


            <!-- Nav Item - Pages Collapse Menu -->
            {{-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-tag"></i>
                    <span>Management Produk</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('admin.categories.index') }}">Kategori</a>
                        <a class="collapse-item" href="{{ route('admin.tags.index') }}">Tag</a>
                        <a class="collapse-item" href="{{ route('admin.products.index') }}">Produk</a>
                    </div>
                </div> --}}

                
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('admin.categories.index') }}">
                    <i class="fas fa-th-large"></i>
                    <span>Kategori</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('admin.tags.index') }}">
                    <i class="fas fa-th-large"></i>
                    <span>Tags Produk</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('admin.products.index') }}">
                    <i class="fas fa-th-large"></i>
                    <span>Produk</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="{{ route('customer.index') }}">
                    <i class="fas fa-th-large"></i>
                    <span>Data Customer</span></a>
            </li>

            {{-- <li class="nav-item active">
                <a class="nav-link" href="{{ route('pesanan.index') }}">
                    <i class="fas fa-th-large"></i>
                    <span>Data Pesanan</span></a>
            </li> --}}

            
{{-- 
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('laporan.index') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Laporan Penjualan</span></a>
            </li> --}}
              
            {{-- <li class="nav-item active">
                <a class="nav-link" href="{{ route('transaksi.index') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Laporan Penjualan</span></a>
            </li> --}}
            
          



        </ul>