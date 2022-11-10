<header>
    <div class="topbar d-flex align-items-center">
        <nav class="navbar navbar-expand">
            <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
            </div>
            <div class="top-menu ms-auto">

            </div>

            <div class="user-box dropdown">
                <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="<?= base_url() ?>/assets/admin/images/avatars/man.png" class="user-img" alt="user avatar">
                    <div class="user-info ps-3">

                        <p class="user-name mb-0"><?= ucfirst(session()->get('user_logged')); ?></p>
                        <!-- <p class="designattion mb-0">Administrator</p> -->
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <!-- <li><a class="dropdown-item" href="javascript:;"><i class="bx bx-user"></i><span>Profil</span></a>
                    </li>
                    <li><a class="dropdown-item" href="javascript:;"><i class="bx bx-key"></i><span>Ganti Password</span></a>
                    </li>
                    <li><a class="dropdown-item" href="javascript:;"><i class="bx bx-cog"></i><span>Pengaturan</span></a>
                    </li>
                    <li>
                        <div class="dropdown-divider mb-0"></div>
                    </li> -->
                    <li><a class="dropdown-item" href="/user/unauthen"><i class='bx bx-log-out-circle'></i><span>Logout</span></a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>

<script>
    $('html').attr('class', 'color-sidebar sidebarcolor3');
    $("html").addClass("color-header headercolor4"), $("html").removeClass("headercolor1 headercolor2 headercolor3 headercolor5 headercolor6 headercolor7 headercolor8")
</script>