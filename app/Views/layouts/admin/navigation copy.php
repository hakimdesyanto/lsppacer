<ul class="metismenu" id="menu">
    <li class="active">
        <a href="<?= base_url(); ?>/beranda">
            <div class="parent-icon"><i class='bx bx-home-circle'></i>
            </div>
            <div class="menu-title">Dashboard</div>
        </a>
    </li>
    <li>
        <a href="<?= base_url(); ?>/klien">
            <div class="parent-icon"><i class='bx bx-user-pin'></i>
            </div>
            <div class="menu-title">Data Klien</div>
        </a>
    </li>

    <li>
        <a href="<?= base_url(); ?>/pelamar">
            <div class="parent-icon"><i class='bx bx-user-pin'></i>
            </div>
            <div class="menu-title">Data Pelamar</div>
        </a>
    </li>
    <li class="menu-label">Rekrutmen</li>
    <li>
        <a href="/posisi">
            <div class="parent-icon"><i class='bx bx-cube-alt'></i>
            </div>
            <div class="menu-title">Posisi Pekerjaan</div>
        </a>
    </li>
    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class='bx bx-task'></i>
            </div>
            <div class="menu-title">Testing</div>
        </a>
        <ul>
            <li> <a href="/jadwaltest"><i class="bx bx-right-arrow-alt"></i>Penjadwalan</a>
            </li>
            <li> <a href="/soal"><i class="bx bx-right-arrow-alt"></i>Soal</a>
            </li>
        </ul>
    </li>
    <li class="menu-label">Laporan</li>
    <li>
        <a href="/pelamar/report">
            <div class="parent-icon"><i class='bx bx-cube-alt'></i>
            </div>
            <div class="menu-title">Pelamar</div>
        </a>
    </li>
    <li class="menu-label">Pengelolaan User</li>
    <li>
        <a href="/user">
            <div class="parent-icon"><i class="bx bx-user-circle"></i>
            </div>
            <div class="menu-title">Users</div>
        </a>
    </li>
    <li class="menu-label">Settings</li>
    <li>
        <a href="/user">
            <div class="parent-icon"><i class="bx bx-user-circle"></i>
            </div>
            <div class="menu-title">Menu Setup</div>
        </a>
    </li>
    <li>
        <a href="/user">
            <div class="parent-icon"><i class="bx bx-user-circle"></i>
            </div>
            <div class="menu-title">Role Setup Setup</div>
        </a>
    </li>
</ul>

<script>
    $('html').attr('class', 'color-sidebar sidebarcolor3');
    $("html").addClass("color-header headercolor4"), $("html").removeClass("headercolor1 headercolor2 headercolor3 headercolor5 headercolor6 headercolor7 headercolor8")
</script>