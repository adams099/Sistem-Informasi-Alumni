<div class="alert <?= $isRejected ? 'alert-danger' : 'alert-success'; ?> danger mb-5 mt-3" role="alert">
    <h4 class="alert-heading text-white"><?= $isRejected ? 'Rejected' : 'On Progress'; ?></h4>
    <p class="text-white"><?= $isRejected ? 'Pengajuan biodata anda ditolak' : 'Data sedang ditinjau'; ?></p>
    <hr>
    <p class="text-white"><?= $isRejected ? 'Hubungi admin untuk informasi lebih lanju.' : 'Hubungi admin untuk mempercepat peninjauan.'; ?></p>
</div>