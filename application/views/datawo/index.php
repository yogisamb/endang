<section class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title" style="font-size: 20px;">Data Wedding Organizer</h3>
        <a href="<?= base_url('datawo/tambahwo') ?>" class="btn btn-primary btn-rg" style="float: right; ; display: block;">
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
              <th scope="col">Aalamat WO</th>
              <th scope="col">Telp WO</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($weddingorganizer as $wo) : ?>
              <tr>
                <th scope="row"><?= $i ?></th>
                <td><?= $wo['nama_wo']; ?></td>
                <td><?= $wo['alamat_wo']; ?></td>
                <td><?= $wo['telp_wo']; ?></td>
                <td>
                  <a href="<?= base_url('datawo/layananwo/'); ?><?= $wo['id_wo'] ?>" class="btn btn-success">Layanan WO</a>
                  <a href="<?= base_url('datawo/editwo/'); ?><?= $wo['id_wo'] ?>" class="btn btn-primary">Edit WO</a>
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