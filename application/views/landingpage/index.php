<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <!-- my Font -->
  <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">

  <!-- css -->
  <link rel="stylesheet" href="<?= base_url('assets/landingpage/'); ?>style.css">

  <title>Hello, world!</title>
</head>

<body>
  <!-- awal Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
      <a class="navbar-brand" href="#">Weding Organizer</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
          <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
          <a class="nav-item tombol btn btn-primary" href="<?= base_url('auth') ?>">Login</a>
        </div>
      </div>
    </div>
  </nav>
  <!-- Akhir Navbar -->

  <!-- sticy notes social media -->

  <div class="sticky-container">
    <ul class="sticky">
      <li>
        <img src="<?= base_url('assets/landingpage/'); ?>ikon/facebook-circle.png" width="32" height="32">
        <p><a href="">Sukai kami di<br>Facebook</a></p>
      </li>
      <li>
        <img src="<?= base_url('assets/landingpage/'); ?>ikon/twitter-circle.png" width="32" height="32">
        <p><a href="">Ikuti kami di<br>Twitter</a></p>
      </li>
      <li>
        <img src="<?= base_url('assets/landingpage/'); ?>ikon/gplus-circle.png" width="32" height="32">
        <p><a href="">Ikuti kami di<br>Google+</a></p>
      </li>
      <li>
        <img src="<?= base_url('assets/landingpage/'); ?>ikon/linkedin-circle.png" width="32" height="32">
        <p><a href="">Ikuti kami di<br>LinkedIn</a></p>
      </li>
      <li>
        <img src="<?= base_url('assets/landingpage/'); ?>ikon/youtube-circle.png" width="32" height="32">
        <p><a href="">Berlangganan di kanal<br>YouTube kami</a></p>
      </li>
      <li>
        <img src="<?= base_url('assets/landingpage/'); ?>ikon/pin-circle.png" width="32" height="32">
        <p><a href="">Ikuti kami di<br>Pinterest</a></p>
      </li>
    </ul>
  </div>


  <!-- Jumbotron -->
  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-4">Masukkan Filter<span> WO</span></h1>
      <form action="<?= base_url('landingpage'); ?>" method="POST">
        <div class="form-group">
          <select class="form-control" id="harga" name="harga">
            <?php
            $datawo = $this->db->get('filterwo')->result_array();
            ?>
            <option value="a">Pilih Opsi</option>
            <?php foreach ($datawo as $d) : ?>
              <option value="<?= $d['id_filter']; ?>"><?= $d['nama_filter']; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="form-group">
          <select class="form-control" id="kapasitas" name="kapasitas">
            <?php
            $datawo_2 = $this->db->get('filter_2')->result_array();
            ?>
            <option value="a">Pilih Opsi</option>
            <?php foreach ($datawo_2 as $d2) : ?>
              <option value="<?= $d2['id_filter']; ?>"><?= $d2['nama_filter']; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <button type="submit" class="btn btn-primary tombol">Get Started</button>
      </form>
    </div>
  </div>
  <!-- Akhir Jumbotron -->

  <!-- container -->
  <div class="container">
    <!-- Info Panel -->
    <div class="row justify-content-center">
      <div class="col-10 info-panel">
        <div class="row">
          <div class="col-lg">
            <img src="<?= base_url('assets/landingpage/'); ?>image/sneakers.png" alt="sneakers" class="float-left">
            <h4>Senakers</h4>
            <p>Rajanya Sneakers. Dapatkan penawaran menarik hanya di C2Rima</p>
          </div>
          <div class="col-lg">
            <img src="<?= base_url('assets/landingpage/'); ?>image/shirt.png" alt="shirt" class="float-left">
            <h4>Kaos Oblong</h4>
            <p>Rajanya Kaos Oblong. Dapatkan penawaran menarik hanya di C2Rima</p>
          </div>
          <div class="col-lg">
            <img src="<?= base_url('assets/landingpage/'); ?>image/kemeja.png" alt="kemeja" class="float-left">
            <h4>Kemeja</h4>
            <p>Rajanya Kemeja Kekinian. Dapatkan penawaran menarik hanya di C2Rima</p>
          </div>
        </div>
      </div>
    </div>
    <!-- Akhir Info Panel -->

    <!-- barang -->
    <div class="barang">
      <h3>
        <center>Filter : <?= $filter ?> dan <?= $filter2 ?></center>
      </h3>
      <div class="row">
        <?php foreach ($layanan as $l) : ?>
          <?php
          $wo = $this->db->where('id_wo =', $l['id_wo']);
          $wo = $this->db->get('data_wo')->row_array();
          ?>
          <div class="col-lg-3">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title"><?= $wo['nama_wo'] ?></h5>
              </div>
              <div class="image-card">
                <img src="<?= base_url('assets/image/wo_profile/') . $wo['image'] ?>" class="card-img-top" alt="...">
              </div>
              <div class="card-body">
                <p class="card-text"><?= $l['layanan']; ?></p>
                <p><?= $l['detail']; ?></p>
                <p><?= $l['harga']; ?></p>
                <a href="http://wa.me/<?= $wo['telp_wo']; ?>" class="btn btn-primary tombol" style="width: 100%;" target="_blank">Lihat Detail</a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

  </div>
  <!-- akhir Container -->

  <!-- footer -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <h1>Social Media Kami</h1>
        <hr>
        <a href="#">
          <img class="image" border="0" title="#" src="<?= base_url('assets/landingpage/'); ?>ikon/facebook-circle.png" width="40px" height="40px">
        </a>
        <a href="#">
          <img class="image" border="0" title="#" src="<?= base_url('assets/landingpage/'); ?>ikon/gplus-circle.png" width="40px" height="40px">
        </a>
        <a href="#">
          <img class="image" border="0" title="#" src="<?= base_url('assets/landingpage/'); ?>ikon/linkedin-circle.png" width="40px" height="40px"></a>
        <a href="#">
          <img class="image" border="0" title="#" src="<?= base_url('assets/landingpage/'); ?>ikon/pin-circle.png" width="40px" height="40px">
        </a>
        <a href="#">
          <img class="image" border="0" title="#" src="<?= base_url('assets/landingpage/'); ?>ikon/twitter-circle.png" width="40px" height="40px">
        </a>
        <a href="#">
          <img class="image" border="0" title="#" src="<?= base_url('assets/landingpage/'); ?>ikon/youtube-circle.png" width="40px" height="40px">
        </a>
        <hr>
        Copyright &copy; 2020</p>
      </div>
    </div>
  </div>
  <!-- akhir footer -->


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
  </script>
</body>

</html>