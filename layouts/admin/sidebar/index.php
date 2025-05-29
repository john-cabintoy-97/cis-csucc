<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="<?= URL; ?>admin">
            <img src="<?= URL; ?>public/img/logo.png" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">CIS-CSUCC</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">

            <?php if (isset($_GET['url'])  && $_GET['url'] == 'admin/setup') : ?>
                <?php include_once 'setup/index.php'; ?>
            <?php elseif (isset($_GET['url'])  && $_GET['url'] == 'admin/reports') : ?>
                <?php include_once 'reports/index.php'; ?>
            <?php elseif (isset($_GET['url'])  && $_GET['url'] == 'admin/inventory') : ?>
                <?php include_once 'inventory/index.php'; ?>
            <?php elseif (isset($_GET['url'])  && $_GET['url'] == 'admin/users') : ?>
                <?php include_once 'users/index.php'; ?>
            <?php else : ?>
                <?php include_once 'default/index.php'; ?>
            <?php endif; ?>

        </ul>
    </div>
    <div class="sidenav-footer mt-5 mx-3">
        
        <div class="card card-background shadow-none card-background-mask-success" id="sidenavCard">
            <div class="card-body text-start p-3 w-100">

                <div class="docs-info">
                    <div id="date"></div>
                    <span class="btn btn-white btn-sm w-100 mt-3">

                        <div id="clock" class="d-flex justify-content-center ">
                            <span id="h"></span>:
                            <span id="m"></span>:
                            <span id="s"></span>
                            <span id="ampm"></span>
                        </div>
                    </span>

                </div>
            </div>
        </div>

    </div>
</aside>