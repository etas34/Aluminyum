
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('admin.dashboard')}}" class="brand-link">
        <img src="{{asset('public/images/AdminLTELogo.png')}}"
             alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Aluminyum</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route('admin.dashboard')}}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Anasayfa
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Kategori
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.kategori.indexUst')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Üst Kategoriler</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.kategori.indexAlt')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Alt Kategoriler</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.gorusme.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-check-square"></i>
                        <p>
                            Gorüşme Talepleri
                        </p>
                    </a>

                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Bülten
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.bulten.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Yeni Ekle</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.bulten.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Bültenler</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Firmalar
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.user.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Firma Listesi</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.adminurun.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Firma Ürün Listesi</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.about.edit')}}" class="nav-link">
                        <i class="nav-icon fas fa-info-circle"></i>
                        <p>
                            Hakkımızda
                        </p>
                    </a>

                </li>
                <li class="nav-item">
                    <a href="{{route('admin.howitworks.edit')}}" class="nav-link">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Nasıl Çalışır
                        </p>
                    </a>

                </li>
                <li class="nav-item">
                    <a href="{{route('admin.privacy.edit')}}" class="nav-link">
                        <i class="nav-icon fas fa-lock"></i>
                        <p>
                            Gizlilik
                        </p>
                    </a>

                </li>
                <li class="nav-item">
                    <a href="{{route('admin.faq.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-question-circle"></i>
                        <p>
                            SSS

                        </p>
                    </a>

                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
