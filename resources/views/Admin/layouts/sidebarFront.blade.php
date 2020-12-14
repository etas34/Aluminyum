
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-warning elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link">
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
                <li class="nav-item" style="background: #e23d30;" >
                    <a href="{{route('home')}}" class="nav-link text-white">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Anasayfa
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Ürünler
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('urun.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Yeni Ekle</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('urun.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Ürünler</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{route('gorusme.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-check-square"></i>
                        <p>
                            Gorüşme Talepleri
                        </p>
                    </a>

                </li>
                        <li class="nav-item">
                    <a href="{{route('musteri.edit')}}" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Firma Ayarları
                        </p>
                    </a>

                </li>
                <li class="nav-item">
                    <a href="{{route('kullanim.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-question-circle"></i>
                        <p>
                            Panel Kullanımı
                        </p>
                    </a>

                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
