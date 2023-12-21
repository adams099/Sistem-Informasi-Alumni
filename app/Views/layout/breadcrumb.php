<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="<?= base_url('/'); ?>">Pages</a></li>
        <?php if (!empty($breadcrumb2)) : ?>
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="<?= base_url($route); ?>"><?= $breadcrumb; ?></a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page"><?= $breadcrumb2; ?></li>
        <?php else : ?>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page"><?= $breadcrumb; ?></li>
        <?php endif; ?>
    </ol>
    <h6 class="font-weight-bolder mb-0"><?= $breadcrumb; ?></h6>
</nav>