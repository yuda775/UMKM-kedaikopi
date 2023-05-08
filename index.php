<?php
require_once 'src/php/db.php';
?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

  <!-- my Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Elsie+Swash+Caps:wght@900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Elsie+Swash+Caps:wght@900&family=Finger+Paint&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Elsie+Swash+Caps:wght@900&family=Finger+Paint&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Elsie+Swash+Caps:wght@900&family=Finger+Paint&family=Ubuntu+Mono:ital,wght@0,400;1,700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />


  <!-- my CSS -->
  <link rel="stylesheet" href="src/stylesheet/style.css">

  <title>Homepage</title>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar fixed-top navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand" href="#"><?php echo getValue('nama_umkm') ?></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto gap-5">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#menu">Menu</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#order">Order</a>
          </li>
          <li class="nav-item">
            <a class="nav-link button" href="#contact">Contact Us</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- jumbotron -->
  <div class="jumbotron jumbotron-fluid bg-dark " style="background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('assets/images/jumbotron/<?php echo getValue('jumbotron_image') ?>'); background-size: cover;">
    <div class="container">
      <div class="row justify-content-center align-items-center">
        <div class="col-md-8 text-center">
          <h1 class="display-3"><?php echo getValue('tagline_umkm') ?></h1>
          <a href="#menu" class="btn btn-outline-light btn-lg mt-4">Lihat Menu Kami</a>
        </div>
      </div>
    </div>
  </div>



  <!-- Maps -->
  <section class="location">
    <h1 class="section-title display-4 text-center">Location</h1>
    <hr>
    <div class="container embed-responsive embed-responsive-21by9">
      <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3471.273696166021!2d-122.16962518489655!3d37.42318617983228!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808fbb6f139b7a33%3A0x7fddc9791c4d4f75!2sGolden%20Gate%20Bridge!5e0!3m2!1sen!2sus!4v1620050861213!5m2!1sen!2sus" allowfullscreen="on"></iframe>
    </div>
  </section>


  <!-- Menu -->
  <section id="menu" class="container text-center">
    <div class="content-header">
      <h1 class="section-title display-4">Menu</h1>
      <hr>
      <h3>Rekomendasi Menu Spesial Kami.</h3>
    </div>
    <div class="content-body row mt-5">
      <div class="col-lg-4">
        <div class="card" style="background-image: url('assets/images/rekomendasi/<?php echo getValue('img_rekomendasi_1') ?>');">
          <h3><?php echo getValue('nama_rekomendasi_1') ?></h3>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="card" style="background-image: url('assets/images/rekomendasi/<?php echo getValue('img_rekomendasi_2') ?>');">
          <h3><?php echo getValue('nama_rekomendasi_2') ?></h3>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="card" style="background-image: url('assets/images/rekomendasi/<?php echo getValue('img_rekomendasi_3') ?>');">
          <h3><?php echo getValue('nama_rekomendasi_3') ?></h3>
        </div>
      </div>
    </div>
    <div class="content-body row mt-3">
      <div class="col-lg-4">
        <div class="card" style="background-image: url('assets/images/rekomendasi/<?php echo getValue('img_rekomendasi_4') ?>');">
          <h3><?php echo getValue('nama_rekomendasi_4') ?></h3>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="card" style="background-image: url('assets/images/rekomendasi/<?php echo getValue('img_rekomendasi_5') ?>');">
          <h3><?php echo getValue('nama_rekomendasi_5') ?></h3>
        </div>
      </div>
      <div class="col-lg-4">
        <a href="view/menu.php">
          <div class="card" style="background-image: url('assets/images/rekomendasi/<?php echo getValue('img_rekomendasi_6') ?>');">
            <h3><?php echo getValue('nama_rekomendasi_6') ?></h3>
            <img class="mx-auto mt-3" src="assets/icons/🦆 icon _arrow circle right_.png" alt="" width="40%">
        </a>
      </div>
    </div>
    </div>
  </section>

  <!-- Order -->
  <section id="order">
    <div class="container text-center">
      <div class="content-header">
        <h1 class="section-title display-4">You can order by</h1>
        <hr>
      </div>
      <div class="row align-items-center">
        <div class="col-lg-4">
          <img src="assets/images/gofud.png" alt="" width="80%">
        </div>
        <div class="col-lg-4">
          <img src="assets/images/shopeefood.png.png" alt="" width="80%">
        </div>
        <div class="col-lg-4">
          <img src="assets/images/grabfood.png" alt="" width="80%">
        </div>
      </div>
    </div>
  </section>


  <!-- Contact -->
  <section id="contact">
    <h1 class="section-title display-4 text-center">Contact Us</h1>
    <hr>
    <form class="container py-5 px-5" method="post" action="src/php/send-email.php">
      <div class="form-group">
        <label for="namaLengkap">Nama Lengkap</label>
        <input type="text" class="form-control" name="nama-lengkap" id="namaLengkap" placeholder="Masukkan nama lengkap anda" required autocomplete="off" />
      </div>
      <div class="form-group">
        <label for="noTelepon">No Telepon</label>
        <input type="tel" class="form-control" name="no-telepon" id="noTelepon" placeholder="Masukkan no telepon anda" required autocomplete="off" maxlength="13" />
      </div>
      <div class=" form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan email anda" required autocomplete="off" />
      </div>
      <div class="form-group">
        <label for="subjek">Subjek</label>
        <select class="form-control" id="subjek" name="subjek" required>
          <option value="">Pilih subjek</option>
          <option value="pertanyaan">Pertanyaan</option>
          <option value="saran">Saran</option>
          <option value="keluhan">Keluhan</option>
          <option value="lainnya">Lainnya</option>
        </select>
      </div>
      <div class="form-group">
        <label for="pesan">Pesan</label>
        <textarea class="form-control" name="pesan" id="pesan" rows="4" required></textarea>
      </div>
      <div class="button-group mt-5">
        <button type="submit" class="btn button-reset" id="kirimButton">
          Reset
        </button>
        <button type="submit" class="btn button-submit" id="kirimButton">
          Kirim
        </button>
      </div>
    </form>
  </section>


  <footer class="pt-5 pb-3 px-5">
    <div class="row footer-content">
      <div class="col-lg-5 col-md-12 col-sm-12">
        <div class="heading">
          <h3><?php echo getValue('nama_umkm') ?></h3>
        </div>
        <div class="lead ml-1">
          <p><?php echo getValue('about_umkm') ?></p>
        </div>
      </div>
      <div class="col-lg-3 col-md-12 col-sm-12 pb-3">
        <h3>Our Social Media</h3>
        <?php
        include_once 'src/php/db.php';

        $query = "SELECT * FROM settings WHERE name IN ('whatsapp', 'facebook', 'instagram', 'twitter', 'envelope', 'linkedin')";
        $result = mysqli_query($conn, $query);

        //jika terdapat data yang dipilih
        if (mysqli_num_rows($result) > 0) {
          //tampilkan sosial media perusahaan
          while ($row = mysqli_fetch_assoc($result)) {
            if (!empty($row['value'])) {
              echo "<div class='social-media-group'>";
              echo "<i class='fa fa-" . $row['name'] . "' aria-hidden='true'></i>";
              echo "<a href='" . getValue($row['name'] . '_profile') . "'>" . $row['value'] . "</a>";
              echo "</div>";
            }
          }
        }
        ?>
      </div>
      <div class="col-lg-4 col-md-12 col-sm-12">
        <h3>Other Information</h3>
        <div class="information-group">
          <i class="fa fa-map-marker"></i>
          <span><?php echo getValue('lokasi') ?></span>
        </div>
        <div class="information-group">
          <i class="fa fa-map" aria-hidden="true"></i>
          <span><?php echo getValue('lokasi_link') ?></span>
        </div>
        <div class="information-group">
          <i class="fa fa-clock-o" aria-hidden="true"></i>
          <span><?php echo getValue('jam_buka') ?></span>
        </div>
      </div>
    </div>
    <div class="footer-bottom text-center mt-5">
      <small class="">
        &copy; 2023 Company Name. All rights reserved.
      </small>
    </div>
  </footer>



  <script src="src/javascript/script.js"></script>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
  -->
</body>

</html>