<!-- ========== Left Sidebar Start ========== -->
<div class="sidebar-left">

    <div data-simplebar class="h-100">

        <!--- Sidebar-menu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="left-menu list-unstyled" id="side-menu">
                <li>
                    <a href="{{ url('profil') }}" class="">
                        <i class="fas fa-user"></i>
                        <span>Profil</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow ">
                        <i class="fa fa-file-alt"></i>
                        <span>Manajemen Web</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        @can('user-config')
                        <li><a href="{{ url('admin/pengguna') }}"><i
                                    class="mdi mdi-checkbox-blank-circle align-middle"></i>Pengguna</a></li>
                        @endcan
                        @can('berita-config')
                        <li><a href="{{ url('admin/berita') }}"><i
                                    class="mdi mdi-checkbox-blank-circle align-middle"></i>Berita</a></li>
                        @endcan
                        @can('galery-config')
                        <li><a href="{{ url('admin/galery') }}"><i
                                    class="mdi mdi-checkbox-blank-circle align-middle"></i>Galery</a></li>
                        @endcan
                    </ul>
                </li>

                <li class="menu-title">Layanan</li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow ">
                        <i class="fa fa-file-alt"></i>
                        <span>Permohonan</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ url('sk-kelahiran') }}"><i
                                    class="mdi mdi-checkbox-blank-circle align-middle"></i>SK Kelahiran</a></li>
                        <li><a href="{{ url('sk-kematian') }}"><i
                                    class="mdi mdi-checkbox-blank-circle align-middle"></i>SK Kematian</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ url('admin/pengaduan') }}" class="">
                        <i class="fas fa-comments"></i>
                        <span>Pengaduan</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
