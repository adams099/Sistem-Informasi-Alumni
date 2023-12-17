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
                                        <p class="mb-1 pt-2 text-bold"><?= $key->nim; ?></p>
                                        <h5 class="font-weight-bolder"><?= $key->nama; ?></h5>
                                        <p class="mb-0 mt-0"><?= $key->prodi; ?></p>
                                        <?php if (empty($key->perkerjaan)) : ?>
                                            <p class="mb-0 mt-0"><i>Occupation Information Withheld</i></p>
                                        <?php endif; ?>
                                        <p class="mb-0 mt-0"><?= $key->perkerjaan; ?></p>
                                        <p class="mb-5 mt-1">Tahun Lulus : <b><?= $key->tahun_lulus; ?></b></p>
                                        <a class="btn-edit text-body text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="#" data-user_id="<?= $key->id; ?>" data-email="<?= $key->email; ?>" data-telepon="<?= $key->telepon; ?>" data-nama="<?= $key->nama; ?>" data-tanggal_lahir="<?= $key->tanggal_lahir; ?>" data-nim="<?= $key->nim; ?>" data-tahun_lulus="<?= $key->tahun_lulus; ?>" data-prodi="<?= $key->prodi; ?>" data-ipk="<?= $key->ipk; ?>" data-angkatan="<?= $key->angkatan; ?>" data-pendidikan="<?= $key->pendidikan; ?>" data-prestasi="<?= $key->prestasi; ?>" data-perkerjaan="<?= $key->perkerjaan; ?>" data-posisi_pekerjaan="<?= $key->posisi_pekerjaan; ?>" data-pencapaian_karir="<?= $key->pencapaian_karir; ?>">
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

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-center mt-1">
                <div class="stepwizard col-md-offset-2">
                    <div class="stepwizard-row setup-panel">
                        <div class="stepwizard-step px-3">
                            <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                            <p style="margin-bottom: 0;">Personal</p>
                        </div>
                        <div class="stepwizard-step px-3">
                            <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                            <p style="margin-bottom: 0;">Education</p>
                        </div>
                        <div class="stepwizard-step px-3">
                            <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                            <p style="margin-bottom: 0;">Profession</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-body mt-0">
                <form role="form" action="#">

                    <!-- page1 -->
                    <div class="form-row">
                        <div class="row setup-content" id="step-1">
                            <div class="col-xs-6 col-md-offset-3">
                                <div class="col-md-12">
                                    <div class="d-flex">
                                        <div class="col">
                                            <div class="form-group col-md-11">
                                                <div class="bg-gradient-primary border-radius-lg h-100">
                                                    <img src="<?= base_url(); ?>../assets/img/shapes/waves-white.svg" class="position-absolute h-100 w-50 top-0 d-lg-block d-none" alt="waves">
                                                    <div class="position-relative d-flex align-items-center justify-content-center h-100">
                                                        <img class="w-100 position-relative z-index-2 pt-4" src="<?= base_url(); ?>../assets/img/illustrations/rocket-white.png" alt="rocket">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group col-md-12">
                                                <label class="control-label">Email</label>
                                                <input readonly type="text" class="email form-control">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label class="control-label">Telepon</label>
                                                <input readonly type="text" class="telepon form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label class="control-label">Nama</label>
                                            <input readonly type="text" class="nama form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-5">
                                            <label class="control-label">Tanggal Lahir</label>
                                            <input readonly type="text" class="tanggal_lahir form-control">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="control-label">NIM</label>
                                            <input readonly type="text" class="nim form-control">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="control-label">Lulusan Tahun</label>
                                            <input readonly type="text" class="tahun_lulus form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- page 2 -->
                        <div class="row setup-content" id="step-2">
                            <div class="col-xs-6 col-md-offset-3">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="control-label">Program Studi</label>
                                            <input readonly type="text" class="prodi form-control">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="control-label">IPK</label>
                                            <input readonly type="text" step="any" class="ipk form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="control-label">Angkatan</label>
                                            <input readonly type="number" class="angkatan form-control">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="control-label">Pendidikan</label>
                                            <input readonly type="text" class="pendidikan form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label class="control-label">Prestasi</label>
                                            <textarea readonly class="prestasi form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- page 3 -->
                        <div class="row setup-content" id="step-3">
                            <div class="col-xs-6 col-md-offset-3">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="control-label">Pekerjaan</label>
                                            <input readonly type="text" class="perkerjaan form-control" placeholder="Perkerjaan">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="control-label">Posisi</label>
                                            <input readonly type="text" class="posisi_pekerjaan form-control" placeholder="Posisi atau Jabatan">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label class="control-label">Pencapaian Karir</label>
                                            <textarea readonly class="pencapaian_karir form-control" placeholder="Pencapaian Karir"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <form role="form" action="/alumni/delete" method="post">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="user_id" class="user_id">
                    <?php if (in_groups('admin')) : ?>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    <?php endif; ?>
                    <button type="button" class="btn btn-secondary close-modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('content'); ?>