<?= $this->extend('./layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid py-4">
    <div class="row">
        <div class="d-flex justify-content-center">
            <?= $pager->links('user', 'custom_pager') ?>
        </div>
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>User table</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">User</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Created at</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Updated at</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Role</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($userData as $users) : ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <img src="<?= base_url(); ?>../assets/img/user_image/<?= $users['user_image']; ?>" class="avatar avatar-sm me-3" alt="imageUser">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm"><?= $users['username']; ?></h6>
                                                    <p class="text-xs text-secondary mb-0"><?= $users['email']; ?></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0"><?= $users['created_at']; ?></p>
                                            <!-- <p class="text-xs text-secondary mb-0">Organization</p> -->
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold"><?= $users['updated_at']; ?></span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <?php if ($users['role'] == 1) : ?>
                                                <span class="badge badge-sm bg-gradient-success">Admin</span>
                                            <?php elseif ($users['role'] == 2) : ?>
                                                <span class="badge badge-sm bg-gradient-primary">Alumni</span>
                                            <?php else : ?>
                                                <span class="badge badge-sm bg-gradient-secondary">Mahasiswa</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="align-middle">
                                            <a href="#" class="btn-edit text-secondary font-weight-bold text-xs" data-id="<?= $users['id']; ?>" data-group_id="<?= $users['role']; ?>">
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

<!-- Modal Edit Role-->
<form action="/admin/users/update" method="post">
    <?= csrf_field(); ?>

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Change User Role</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Role</label>
                        <select name="auth_group" class="form-control auth_group">
                            <option disabled>-Select-</option>
                            <?php foreach ($group as $row) : ?>
                                <option value="<?= $row->id; ?>"><?= $row->description; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <input type="hidden" name="user_id" class="user_id">
                    <button type="button" class="btn btn-secondary close-modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Modal Edit Product-->
<?= $this->endSection('content'); ?>