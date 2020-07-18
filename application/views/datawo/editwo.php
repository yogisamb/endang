<section class="content">
  <div class="container-fluid">
    <div class="card">
      <!-- general form elements -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Edit Data WO</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <?= form_open_multipart('datawo/editwo/' . $wo['id_wo']); ?>
        <div class="card-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Logo WO</label>
            <div class="row">
              <div class="col-sm-2">
                <img src="<?= base_url('assets/image/wo_profile/') . $wo['image']; ?>" class="img-thumbnail">
              </div>
              <div class="col-sm-10">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="image" name="image">
                  <label class="custom-file-label" for="image">Choose file</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Nama WO</label>
            <input type="text" class="form-control" id="exampleInputEmail1" id="nama" name="nama" value="<?= $wo['nama_wo']; ?>">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Alamat WO</label>
            <textarea rows="4" type="text" class="form-control" id="exampleInputPassword1" id="alamat" name="alamat"><?= $wo['alamat_wo']; ?></textarea>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Nomor Telp WO</label>
            <input type="number" class="form-control" id="exampleInputPassword1" id="telp" name="telp" value="<?= $wo['telp_wo']; ?>">
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <!-- /.content-header -->
</section>