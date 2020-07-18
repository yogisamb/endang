<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3></h3>

            <p>Total Admin</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3></h3>

            <p>Total WO</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3></h3>

            <p>Total Layanan</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="" class=" small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <!-- ./col -->
    </div>
  </div>
  <div class="card">
    <div class="card-header">
      <h3 class="card-title" style="font-size: 30px;">Data Administrator</h3>
      <a href="<?= base_url('dashboardadmin/tambahadmin') ?>" class="btn btn-primary btn-rg" style="float: right; ; display: block;">
        <span class="fas fa-plus-square"></span> &nbsp; &nbsp; &nbsp;Tambah Data Baru
      </a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Active?</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          <?php foreach ($admin as $a) : ?>
            <tr>
              <th scope="row"><?= $i ?></th>
              <td><?= $a['username']; ?></td>
              <td><?= $a['email']; ?></td>
              <?php if ($a['is_active'] == 1) : ?>
                <td>Aktif</td>
              <?php else : ?>
                <td>Nonaktif</td>
              <?php endif; ?>
              <td>
                <?php if ($a['is_active'] == 1) : ?>
                  <?php if ($a['id'] == $user['id']) : ?>
                    <a href="#" class="btn btn-danger" onclick="return confirm('Kamu tidak bisa mematikan akses usermu sendiri!')">Turn Off User Access</a>
                  <?php else : ?>
                    <a href="<?= base_url(); ?>dashboardadmin/turnoff/<?= $a['id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure to turn off this user?')">Turn Off User Access</a>
                  <?php endif; ?>
                <?php else : ?>
                  <a href="<?= base_url(); ?>dashboardadmin/turnon/<?= $a['id'] ?>" class="btn btn-success" onclick="return confirm('Are you sure to turn on this user?')">Turn On User Access</a>
                <?php endif; ?>
              </td>
            </tr>
            <?php $i++; ?>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Change Password</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form role="form" action="<?= base_url('dashboardadmin/changepassword') ?>" method="POST">
      <div class="card-body">
        <div class="form-group">
          <label for="currentpassword">Current password</label>
          <input type="password" class="form-control" id="currentpassword" name="currentpassword">
          <?= form_error('currentpassword', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
          <label for="newpassword1">New password</label>
          <input type="password" class="form-control" id="newpassword1" name="newpassword1">
          <?= form_error('newpassword1', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
          <label for="newpassword2">Repeat new password</label>
          <input type="password" class="form-control" id="newpassword2" name="newpassword2">
          <?= form_error('newpassword2', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
  <!-- /.card -->
</section>