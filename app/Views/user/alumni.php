<?= $this->extend('./layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid py-4">
    <div class="row">
        <div class="row mt-4">
            <?php foreach ($alumniData as $key) : ?>
                <div class="col-lg-6 mb-lg-0 mb-4 mt-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-lg-7">
                                    <div class="d-flex flex-column h-100">
                                        <p class="mb-1 pt-2 text-bold"><?= $key['nim']; ?></p>
                                        <h5 class="font-weight-bolder"><?= $key['nama']; ?></h5>
                                        <p class="mb-0 mt-0"><?= $key['prodi']; ?></p>
                                        <?php if (empty($key['perkerjaan'])) : ?>
                                            <p class="mb-0 mt-0"><i>Occupation Information Withheld</i></p>
                                        <?php endif; ?>
                                        <p class="mb-0 mt-0"><?= $key['perkerjaan']; ?></p>
                                        <p class="mb-5 mt-1">Tahun Lulus : <b><?= $key['tahun_lulus']; ?></b></p>
                                        <a class="text-body text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="#">
                                            Read More
                                            <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-4 ms-auto text-center mt-5 mt-lg-0">
                                    <div class="bg-gradient-primary border-radius-lg h-100">
                                        <img src="<?= base_url(); ?>../assets/img/shapes/waves-white.svg" class="position-absolute h-100 w-50 top-0 d-lg-block d-none" alt="waves">
                                        <div class="position-relative d-flex align-items-center justify-content-center h-100">
                                            <img class="w-100 position-relative z-index-2 pt-4" src="<?= base_url(); ?>../assets/img/illustrations/rocket-white.png" alt="rocket">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?= $this->endSection('content'); ?>