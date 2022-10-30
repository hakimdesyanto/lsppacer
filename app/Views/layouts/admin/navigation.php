<ul class="metismenu" id="menu">

    <li class="active">
        <a href="<?= base_url(); ?>/beranda">
            <div class="parent-icon"><i class='bx bx-home-circle'></i>
            </div>
            <div class="menu-title">Dashboard</div>
        </a>
    </li>
    <li>
        <a href="/user/index">
            <div class="parent-icon"><i class="bx bx-cube-alt"></i></div>
            <div class="menu-title">Users</div>
        </a>
    </li>
    <!-- <li class="menu-label">Settings</li> -->
    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class='bx bx-cart'></i></div>
            <div class="menu-title">Setting</div>
        </a>
        <ul>
            <li> <a href="/MenuSetup/main"><i class="bx bx-right-arrow-alt"></i>Menu Setup</a> </li>

            <li> <a href="/RoleSetup/main"><i class="bx bx-right-arrow-alt"></i>Role Setup</a></li>
        </ul>
    </li>
</ul>

<script>
    $('html').attr('class', 'color-sidebar sidebarcolor3');
    $("html").addClass("color-header headercolor4"), $("html").removeClass("headercolor1 headercolor2 headercolor3 headercolor5 headercolor6 headercolor7 headercolor8")
</script>