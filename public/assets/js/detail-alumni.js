$(document).ready(function() {
    var navListItems = $("div.setup-panel div a"),
    allWells = $(".setup-content");
  allWells.hide();
  navListItems.click(function (e) {
    e.preventDefault();
    var $target = $($(this).attr("href")),
      $item = $(this);
    if (!$item.hasClass("disabled")) {
      navListItems.removeClass("btn-primary").addClass("btn-default");
      $item.addClass("btn-primary");
      allWells.hide();
      $target.show();
      $target.find("input:eq(0)").focus();
    }
  });

  $("div.setup-panel div a.btn-primary").trigger("click");
  
    // get Detail Biodata
    $('.btn-edit').on('click', function() {
        // get data from button edit
        const user_id = $(this).data('user_id');
        const email = $(this).data('email');
        const telepon = $(this).data('telepon');
        const nama = $(this).data('nama');
        const tanggal_lahir = $(this).data('tanggal_lahir');
        const nim = $(this).data('nim');
        const tahun_lulus = $(this).data('tahun_lulus');
        const prodi = $(this).data('prodi');
        const ipk = $(this).data('ipk');
        const angkatan = $(this).data('angkatan');
        const pendidikan = $(this).data('pendidikan');
        const prestasi = $(this).data('prestasi');
        const perkerjaan = $(this).data('perkerjaan');
        const posisi_pekerjaan = $(this).data('posisi_pekerjaan');
        const pencapaian_karir = $(this).data('pencapaian_karir');
        
        const user_image = $(this).data('user_image');
        const currentSrc = '../assets/img/user_image/';
        const newSrc = currentSrc + user_image;
        
        // Set data to Form Edit
        $('.user_id').val(user_id);
        $('.email').val(email);
        $('.telepon').val(telepon);
        $('.nama').val(nama);
        $('.tanggal_lahir').val(tanggal_lahir);
        $('.nim').val(nim);
        $('.tahun_lulus').val(tahun_lulus);
        $('.prodi').val(prodi);
        $('.ipk').val(ipk);
        $('.angkatan').val(angkatan);
        $('.pendidikan').val(pendidikan);
        $('.prestasi').val(prestasi);
        $('.perkerjaan').val(perkerjaan);
        $('.posisi_pekerjaan').val(posisi_pekerjaan);
        $('.pencapaian_karir').val(pencapaian_karir);
        $('.user_image').attr('src', newSrc);

        // Call Modal Edit
        $('#editModal').modal('show');
    });

    $('.close-modal').on('click', function() {
        $('#editModal').modal('hide');
    });
});