<section class="content">
  <div class="container-fluid">
    <div class="card">
      <!-- general form elements -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Tambah Data WO</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <?= form_open_multipart('datawo/tambahwo'); ?>
        <div class="card-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Logo WO</label>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="image" name="image">
              <label class="custom-file-label" for="image">Choose file</label>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Nama WO</label>
            <input type="text" class="form-control" id="exampleInputEmail1" id="nama" name="nama" placeholder="Nama WO">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Alamat WO</label>
            <textarea rows="4" type="text" class="form-control" id="exampleInputPassword1" id="alamat" name="alamat" placeholder="Alamat WO"></textarea>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Nomor Telp WO</label>
            <input type="number" class="form-control" id="exampleInputPassword1" id="telp" name="telp" placeholder="Nomer Telp WO">
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