<section class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title" style="font-size: 20px;">Data Layanan Wedding Organizer</h3>
        <a href="<?= base_url('datawo/tambahlayananwo/' . $wo['id_wo']) ?>" class="btn btn-primary btn-rg" style="float: right; ; display: block;">
          <span class="fas fa-plus-square"></span> &nbsp; &nbsp; &nbsp;Tambah Data Baru
        </a>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nama WO</th>
              <th scope="col">Layanan WO</th>
              <th scope="col">Detail Layanan WO</th>
              <th scope="col">Harga</th>
              <th scope="col">Kapasitas</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($layananwo as $lwo) : ?>
              <tr>
                <th scope="row"><?= $i ?></th>
                <td><?= $wo['nama_wo']; ?></td>
                <td><?= $lwo['layanan']; ?></td>
                <td><?= $lwo['detail']; ?></td>
                <td>Rp <?= number_format($lwo['harga'], 0, ',', '.'); ?></td>
                <td><?= $lwo['kapasitas']; ?></td>
                <td>
                  <a href="<?= base_url('datawo/hapuslayananwo/'); ?><?= $lwo['id_layanan_wo'] ?>" class="btn btn-danger">Hapus Layanan WO</a>
                  <a href="<?= base_url('datawo/editlayananwo/'); ?><?= $lwo['id_layanan_wo'] ?>" class="btn btn-success">Edit Layanan WO</a>
                </td>
              </tr>
              <?php $i++; ?>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
</section>