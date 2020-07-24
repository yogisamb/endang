<section class="content">
  <div class="container-fluid">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Tambah Data Layanan WO</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form action="<?= base_url('datawo/tambahlayananwo/' . $wo['id_wo']); ?>" method="post">
        <div class="card-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Nama WO</label>
            <input type="text" class="form-control" id="exampleInputEmail1" id="nama" name="nama" value="<?= $wo['nama_wo'] ?>" readonly>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Nama Layanan WO</label>
            <input type="text" class="form-control" id="exampleInputEmail1" id="layaan" name="layanan" placeholder="Nama Layanan WO">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Detail Layanan WO</label>
            <textarea rows="4" type="text" class="form-control" id="exampleInputPassword1" id="detail" name="detail" placeholder="Detail Layanan WO"></textarea>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Harga Layanan WO</label>
            <input type="number" class="form-control" id="exampleInputPassword1" id="harga" name="harga" placeholder="Harga Layanan WO">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Kapasitas Layanan WO</label>
            <input type="number" class="form-control" id="exampleInputPassword1" id="kapasitas" name="kapasitas" placeholder="Kapasitas Layanan WO">
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