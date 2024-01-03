<?= $this->extend('./layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Alumni</p>
                                <h5 class="font-weight-bolder mb-0">
                                    <?= $countAlumni; ?>
                                    <!-- <span class="text-success text-sm font-weight-bolder">+55%</span> -->
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Need Approve</p>
                                <h5 class="font-weight-bolder mb-0">
                                    <?= $countNeedApprove; ?>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Administrator</p>
                                <h5 class="font-weight-bolder mb-0">
                                    <?= $countAdmin; ?>
                                    <!-- <span class="text-danger text-sm font-weight-bolder">-2%</span> -->
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">General User</p>
                                <h5 class="font-weight-bolder mb-0">
                                    <?= $countUser; ?>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-lg-7 mb-lg-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="d-flex flex-column h-100">
                                <p class="mb-1 pt-2 text-bold">Built by developers</p>
                                <h5 class="font-weight-bolder">Sistem Informasi Alumni</h5>
                                <p class="mb-5">Website ini merupakan platform sistem informasi alumni yang mempermudah interaksi dan pertukaran informasi antara alumni. Tujuannya adalah memperkuat ikatan komunitas, menyediakan update terkini, dan mendukung pengembangan profesional.</p>
                                <a class="text-body text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="#">
                                    Read More
                                    <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-5 ms-auto text-center mt-5 mt-lg-0">
                            <div class="bg-gradient-primary border-radius-lg h-100">
                                <img src="<?= base_url(); ?>../assets/img/shapes/waves-white.svg" class="position-absolute h-100 w-50 top-0 d-lg-block d-none" alt="waves">
                                <div class="position-relative d-flex align-items-center justify-content-center h-100">
                                    <img class="w-100 position-relative z-index-2 pt-4" src="<?= base_url(); ?>../assets/img/logopoltek.png" alt="rocket">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="card h-100 p-3">
                <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100" style="background-image: url('<?= base_url(); ?>../assets/img/ivancik.jpg');">
                    <span class="mask bg-gradient-dark"></span>
                    <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
                        <h5 class="text-white font-weight-bolder mb-4 pt-2">Sejarah Poltek GT</h5>
                        <p class="text-white">
                            Pada 7 April 1981, PT Gajah Tunggal Group meresmikan PATIGAT sebagai respons terhadap LOLAPIL yang diinisiasi oleh Menteri Perindustrian. PATIGAT berkembang dengan membuka berbagai jurusan dan bekerjasama dengan ITB. Pada 1995, dengan izin Yayasan Bina Dharma Nurharapan Indonesia, PATIGAT berubah menjadi Politeknik Gajah Tunggal...</p>
                        <a class="text-white text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="#">
                            Read More
                            <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('content'); ?>