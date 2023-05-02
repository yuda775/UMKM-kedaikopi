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
  <div class="jumbotron jumbotron-fluid" style="background-image: url('<?php echo 'assets/images/jumbotron/' . getValue('jumbotron_image'); ?>');">
    <div class="container">
      <h1 class="display-2"><?php echo getValue('tagline_umkm') ?></h1>
    </div>
  </div>

  <!-- panel -->
  <div class="panel row justify-content-between align-items-center">
    <div class="col-lg-4 text-center list-panel">
      <img src="assets/images/icon-calendar.png" alt="">
      <p><?php echo getValue('panel_1') ?></p>
    </div>
    <div class="col-lg-4 text-center list-panel">
      <img src="assets/images/icon-price.png" alt="">
      <p><?php echo getValue('panel_2') ?></p>
    </div>
    <div class="col-lg-4 text-center list-panel">
      <img src="assets/images/icon-map.png" alt="">
      <p><?php echo getValue('panel_3') ?></p>
    </div>
  </div>

  <!-- Menu -->
  <section id="menu" class="container text-center">
    <div class="content-header">
      <h1 class="section-title display-4">Menu</h1>
      <hr>
      <h3>Rekomendasi Menu Spesial Kami.</h3>
    </div>
    <div class="content-body row mt-5">
      <div class="col-lg-4">
        <div class="card" style="background-image: url(assets/images/card-coffe.jpg);">
          <h3>All kinds of <br> coffe drinks</h3>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="card" style="background-image: url(assets/images/card-pasta.jpg);">
          <h3>Pasta</h3>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="card" style="background-image: url(assets/images/card-bread.jpg);">
          <h3>Bread</h3>
        </div>
      </div>
    </div>
    <div class="content-body row mt-3">
      <div class="col-lg-4">
        <div class="card" style="background-image: url(assets/images/card-pastry.jpg);">
          <h3>Pastry</h3>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="card" style="background-image: url(assets/images/card-pie.jpg);">
          <h3>Pie</h3>
        </div>
      </div>
      <div class="col-lg-4">
        <a href="view/menu.php">
          <div class="card" style="background-image: url(assets/images/card-next.jpg);">
            <h4>Click here <br> to find more menu</h4>
            <img class="mx-auto mt-3" src="assets/icons/🦆 icon _arrow circle right_.png" alt="" width="40%">
        </a>
      </div>
    </div>
    </div>
  </section>

  <!-- Order -->
  <section id="order" class="container text-center">
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
  </section>


  <!-- Contact -->
  <section id="contact">
    <h1 class="section-title display-4 text-center">Contact Us</h1>
    <hr>
    <form class="container py-5 px-5">
      <div class="form-group">
        <label for="namaLengkap">Nama Lengkap</label>
        <input type="text" class="form-control" id="namaLengkap" placeholder="Masukkan nama lengkap anda" />
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" placeholder="Masukkan email anda" />
      </div>
      <div class="form-group">
        <label for="noTelepon">No Telepon</label>
        <input type="tel" class="form-control" id="noTelepon" placeholder="Masukkan no telepon anda" />
      </div>
      <div class="form-group">
        <label>Jenis Kelamin</label>
        <div class="inline-radio-button">
          <div class="custom-control custom-radio">
            <input checked type="radio" id="radioLaki" name="jenisKelamin" class="custom-control-input" value="laki-laki" />
            <span class="custom-control-label" for="radioLaki">Laki-laki</span>
          </div>
          <div class="custom-control custom-radio">
            <input type="radio" id="radioPerempuan" name="jenisKelamin" class="custom-control-input" value="perempuan" />
            <span class="custom-control-label" for="radioPerempuan">Perempuan</span>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="subjek">Subjek</label>
        <select class="form-control" id="subjek">
          <option value="">Pilih subjek</option>
          <option value="pertanyaan">Pertanyaan</option>
          <option value="saran">Saran</option>
          <option value="keluhan">Keluhan</option>
        </select>
      </div>
      <div class="form-group">
        <label for="pesan">Pesan</label>
        <textarea class="form-control" id="pesan" rows="4"></textarea>
      </div>
      <div class="button-group">
        <button type="submit" class="btn button-reset" id="kirimButton">
          Reset
        </button>
        <button type="submit" class="btn button-submit" id="kirimButton">
          Kirim
        </button>
      </div>
    </form>
  </section>

  <footer>
    <div class="container pt-5 pb-3">
      <div class="row">
        <div class="col-lg-9 col-md-6 col-sm-12">
          <div class="heading">
            <h3><?php echo getValue('nama_umkm') ?></h3>
          </div>
          <div class="lead ml-1">
            <p><?php echo getValue('about_umkm') ?></p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12">
          <h3>Our Social Media</h3>
          <?php
          include_once 'src/php/db.php';

          $query = "SELECT * FROM settings WHERE name IN ('whatsapp', 'facebook', 'instagram', 'twitter', 'envelope', 'linkedin')";
          $result = mysqli_query($conn, $query);

          //jika terdapat data yang dipilih
          if (mysqli_num_rows($result) > 0) {
            //tampilkan sosial media perusahaan
            while ($row = mysqli_fetch_assoc($result)) {
              echo "<div class='social-media-group'>";
              echo "<i class='fa fa-" . $row['name'] . "' aria-hidden='true'></i>";
              echo "<a href='" . getValue($row['name'] . '_profile') . "'>" . $row['value'] . "</a>";
              echo "</div>";
            }
          }
          ?>
        </div>
      </div>
      <div class="footer-bottom">
        <div class="row">
          <div class="col-md-12 text-center mt-4">
            <small style="display: inline">
              &copy; 2023 Company Name. All rights reserved.
            </small>
          </div>
        </div>
      </div>
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