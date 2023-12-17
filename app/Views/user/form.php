<?= $this->extend('./layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid py-4">
    <?php if ($isRejected) : ?>
        <?= $this->include('/layout/component/alertCardUser'); ?>
    <?php elseif (!$status && $alumni) : ?>
        <?= $this->include('/layout/component/alertCardUser'); ?>
    <?php else : ?>
        <div class="row d-flex">
            <div class="container mt-2">
                <div class="d-flex justify-content-center">
                    <div class="stepwizard col-md-offset-3">
                        <div class="stepwizard-row setup-panel">
                            <div class="stepwizard-step">
                                <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                                <p>Personal</p>
                            </div>
                            <div class="stepwizard-step">
                                <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                                <p>Education</p>
                            </div>
                            <div class="stepwizard-step">
                                <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                                <p>Profession</p>
                            </div>
                        </div>
                    </div>
                </div>
                <form role="form" action="/user/save" method="post">
                    <?= csrf_field(); ?>

                    <!-- page1 -->
                    <div class="form-row">
                        <div class="row setup-content" id="step-1">
                            <div class="col-xs-6 col-md-offset-3">
                                <div class="col-md-12">
                                    <h3 class="mb-4">Personal</h3>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="control-label">Nama</label>
                                            <input name="nama" type="text" required class="form-control" placeholder="Nama Lengkap">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="control-label">Telepon</label>
                                            <input name="telepon" type="number" required class="form-control" placeholder="No. Telepon">
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="control-label">Tanggal Lahir</label>
                                            <input name="tanggal_lahir" type="date" required class="form-control" placeholder="Tanggal Lahir">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="control-label">Tempat Lahir</label>
                                            <input name="tempat_lahir" type="text" required class="form-control" placeholder="Tempat Lahir">
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button class="btn bg-gradient-primary nextBtn btn-lg pull-right" type="button">Next</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- page 2 -->
                        <div class="row setup-content" id="step-2">
                            <div class="col-xs-6 col-md-offset-3">
                                <div class="col-md-12">
                                    <h3 class="mb-4"> Education</h3>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="control-label">NIM</label>
                                            <input name="nim" type="number" required class="form-control" placeholder="NIM">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="control-label">IPK</label>
                                            <input name="ipk" type="number" required step="any" class="form-control" placeholder="IPK">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="control-label">Program Studi</label>
                                            <input name="prodi" type="text" required class="form-control" placeholder="Program Studi">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="control-label">Pendidikan</label>
                                            <input name="pendidikan" type="text" required class="form-control" placeholder="Pendidikan Terakhir">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="control-label">Angkatan</label>
                                            <input name="angkatan" type="number" required class="form-control" placeholder="Angkatan Keberapa">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="control-label">Tahun Lulus</label>
                                            <input name="tahun_lulus" type="number" required class="form-control" placeholder="Tahun Lulus">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label class="control-label">Prestasi</label>
                                            <textarea name="prestasi" class="form-control" placeholder="Prestasi"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <button class="btn bg-gradient-primary prevBtn btn-lg pull-left" type="button">Previous</button>
                                    <button class="btn bg-gradient-primary nextBtn btn-lg pull-right" type="button">Next</button>
                                </div>
                            </div>
                        </div>

                        <!-- page 3 -->
                        <div class="row setup-content" id="step-3">
                            <div class="col-xs-6 col-md-offset-3">
                                <div class="col-md-12">
                                    <h3 class="mb-4"> Profession</h3>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="control-label">Pekerjaan</label>
                                            <input name="perkerjaan" type="text" class="form-control" placeholder="Pekerjaan">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="control-label">Posisi</label>
                                            <input name="posisi_pekerjaan" type="text" class="form-control" placeholder="Posisi atau Jabatan">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label class="control-label">Pencapaian Karir</label>
                                            <textarea name="pencapaian_karir" class="form-control" placeholder="Pencapaian Karir"></textarea>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <button class="btn bg-gradient-primary prevBtn btn-lg pull-left" type="button">Previous</button>
                                        <button class="btn bg-gradient-success btn-lg pull-right" type="submit">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        <?php endif; ?>
        </div>
</div>
<?= $this->endSection('content'); ?>