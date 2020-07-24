<section class="content">
  <div class="container-fluid">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Edit Data Layanan WO</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form action="<?= base_url('datawo/editlayananwo/' . $lwo['id_layanan_wo']); ?>" method="post">
        <div class="card-body">
          <?php
          $wo = $this->db->where('id_wo =', $lwo['id_wo']);
          $wo = $this->db->get('data_wo')->row_array();
          ?>
          <div class="form-group">
            <label for="exampleInputEmail1">Nama WO</label>
            <input type="text" class="form-control" id="exampleInputEmail1" id="nama" name="nama" value="<?= $wo['nama_wo'] ?>" readonly>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Nama Layanan WO</label>
            <input type="text" class="form-control" id="exampleInputEmail1" id="layaan" name="layanan" value="<?= $lwo['layanan']; ?>">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Detail Layanan WO</label>
            <textarea rows="4" type="text" class="form-control" id="exampleInputPassword1" id="detail" name="detail"><?= $lwo['detail']; ?></textarea>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Harga Layanan WO</label>
            <input type="number" class="form-control" id="exampleInputPassword1" id="harga" name="harga" value="<?= $lwo['harga']; ?>">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Kapasitas layanan WO</label>
            <input type="number" class="form-control" id="exampleInputPassword1" id="kapasitas" name="kapasitas" value="<?= $lwo['kapasitas']; ?>">
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
  <!-- /.content-header -->
</section>