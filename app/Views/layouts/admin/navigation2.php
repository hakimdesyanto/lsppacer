<ul class="metismenu" id="menu">
    <li>
        <a href="<?= base_url(); ?>/pelamar/pelamardetail/<?= $pelamar['no_daftar'] ?>">
            <div class="parent-icon"><i class='bx bx-user-pin'></i>
            </div>
            <div class="menu-title">Profile</div>
        </a>
    </li>
    <li>
        <a href="/pelamar/testonline/<?= $pelamar['no_daftar'] ?>">
            <div class="parent-icon"><i class='bx bx-task'></i>
            </div>
            <div class="menu-title">Test Online</div>
        </a>
    </li>
    <li>
        <a href="/pelamar/hasiltest/<?= $pelamar['no_daftar'] ?>">
            <div class="parent-icon"><i class='bx bx-cube-alt'></i>
            </div>
            <div class="menu-title">Hasil Test</div>
        </a>
    </li>
</ul>