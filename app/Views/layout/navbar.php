<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl position-sticky blur shadow-blur mt-4 left-auto top-1 z-index-sticky" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-3">

        <?= $this->include('layout/breadcrumb'); ?>

        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <?php if ($breadcrumb == 'Alumni') : ?>
                    <form action="/alumni" method="get">
                        <div class="input-group">
                            <a href="javascript:void(0);" onclick="document.getElementById('searchForm').submit();" class="input-group-text text-body">
                                <i class="fas fa-search" aria-hidden="true"></i>
                            </a>
                            <input type="search" value="<?= isset($search) ? $search : '' ?>" name="search" class="form-control" placeholder="Type here for search">
                        </div>
                    </form>
                <?php endif; ?>
            </div>
            <ul class="navbar-nav justify-content-end">
                <li class="nav-item dropdown pe-2 d-flex align-items-center">
                    <a href="#" class="nav-link text-body font-weight-bold px-0" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-user me-sm-1"></i>
                        <span class="d-sm-inline d-none">Profile</span>
                    </a>
                    <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                        <!-- <li class="mb-2"> -->
                        <li class="">
                            <a class="dropdown-item border-radius-md" href="<?= base_url('/profile'); ?>">
                                <div class="d-flex py-1">
                                    <div class="my-auto">
                                        <img src="<?= base_url(); ?>../assets/img/user_image/<?= user()->user_image; ?>" class="avatar avatar-sm  me-3 ">
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="text-sm font-weight-normal mb-1">
                                            <span class="font-weight-bold"><?= user()->username; ?></span>
                                        </h6>
                                        <p class="text-xs text-secondary mb-0 ">
                                            <i class="fa fa-clock me-1"></i>
                                            <?= user()->email; ?>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </a>
                </li>
                <li class="nav-item px-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0">
                        <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>