<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- begin::navigation -->
    <div class="navigation">
        <div class="navigation-header">
            <span>Navigation</span>
            <a href="/admin/index">
                <i data-feather="x"></i>
            </a>
        </div>
        <div class="navigation-menu-body">
            <ul>
                <li class="{{ Request::routeIs('admin/index') ? 'active' : '' }}">
                    <a href="/dashboard">
                        <span class="nav-link-icon">
                            <i data-feather="home"></i>
                        </span>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="{{request()->is('admin/siswa') ? 'active' : ''}}">
                    <a href="/admin/siswa">
                        <span class="nav-link-icon">
                            <i data-feather="users"></i>
                        </span>
                        <span>Siswa</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="nav-link-icon">
                            <i data-feather="users"></i>
                        </span>
                        <span>Pengajuan</span>
                    </a>
                    <ul>
                        <li class="{{request()->is('admin/jenispengajuan') ? 'active' : ''}}">
                            <a href="{{route('index.jenisPengajuan')}}">Jenis Pengajuan</a>
                        </li>
                        <li class="{{request()->is('admin/pengajuan') ? 'active' : ''}}">
                            <a href="{{route('index.pengajuan')}}">Data Pengajuan</a>
                        </li>
                        <li class="{{request()->is('admin/pengajuan/pprove') ? 'active' : ''}}">
                            <a href="{{route('index.approve')}}">Data Approve</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="">
                        <span class="nav-link-icon">
                            <i data-feather="info"></i>
                        </span>
                        <span>SPK</span>
                    </a>
                    <ul>
                        <li class="{{request()->is('admin/kriteria') ? 'active' : ''}}">
                            <a href="/admin/kriteria">Kriteria</a>
                        </li>
                        <li class="{{request()->is('admin/penilaian') ? 'active' : ''}}">
                            <a href="/admin/penilaian">Crips</a>
                        </li>
                        <li class="{{request()->is('admin/nilai') ? 'active' : ''}}">
                            <a href="/admin/nilai">Alternatif</a>
                        </li>
                        <li>
                            <a href="/admin/hasil">Hasil</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!-- end::navigation -->