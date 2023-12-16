<?= $this->extend('./layout/template'); ?>

<?= $this->section('content'); ?>
<div class="mt-5"></div>
<!-- print_r($approval); -->

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Biodata Approval</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Alumni</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Approved By</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Created at</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Updated at</th>
                                    <!-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Updated at</th> -->
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($approval as $key) : ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm"><?= $key->nama; ?></h6>
                                                    <p class="text-xs text-secondary mb-0"><?= $key->req_by; ?></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0"><?= $key->approved_by; ?></p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0"><?= $key->created_at; ?></p>
                                            <!-- <p class="text-xs text-secondary mb-0">Organization</p> -->
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0"><?= $key->updated_at; ?></p>
                                        </td>
                                        <!-- <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">ini center</span>
                                        </td> -->
                                        <td class="align-middle text-center text-sm">
                                            <?php if ($key->status == 'Approved') : ?>
                                                <span class="badge badge-sm bg-gradient-success">Approved</span>
                                            <?php elseif ($key->status == 'Rejected') : ?>
                                                <span class="badge badge-sm bg-gradient-danger">Rejected</span>
                                            <?php else : ?>
                                                <span class="badge badge-sm bg-gradient-secondary">Need Approve</span>
                                            <?php endif; ?>

                                        </td>
                                        <td class="align-middle">
                                            <a href="#" class="btn-edit text-secondary font-weight-bold text-xs" data-id="<?= $key->id; ?>" data-status="<?= $key->status; ?>" data-user_id="<?= $key->user_id; ?>">
                                                Edit
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Approval-->
<form action="/admin/approval/update" method="post">
    <?= csrf_field(); ?>

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Approval Update</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Status</label>
                        <select name="approval" class="form-control approval">
                            <option disabled>-Select-</option>
                            <?php foreach ($status as $row) : ?>
                                <option value="<?= $row['description']; ?>"><?= $row['description']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <input type="hidden" name="apprv_id" class="apprv_id">
                    <input type="hidden" name="user_id" class="user_id">
                    <button type="button" class="btn btn-secondary close-modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </div>
</form>
<?= $this->endSection('content'); ?>