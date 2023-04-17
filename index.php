<?php
require_once 'db.php';
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

  <!-- my CSS -->
  <link rel="stylesheet" href="assets/stylesheet/style.css">

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
  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-2"><?php echo getValue('tagline_umkm') ?></h1>
      <a href="#menu">Find more</a>
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
        <a href="menu.html">
          <div class="card" style="background-image: url(assets/images/card-next.jpg);">
            <h4>Click here <br> to find more menu</h4>
            <img class="mx-auto mt-3" src="assets/icons/🦆 icon _arrow circle right_.png" alt="" width="40%">
        </a>
      </div>
    </div>
    </div>
  </section>

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

  <section id="contact" class="container background">
    <div class="content-header text-center pb-3">
      <h1 class="section-title display-4">Contact Us</h1>
      <hr>
    </div>
    <div class="content-body px-5">
      <form>
        <div class="row">
          <div class="col">
            <input type="text" class="form-control" placeholder="Full Name" name="full_name" required>
          </div>
          <div class="col">
            <input type="email" class="form-control" placeholder="Email" name="email" required>
          </div>
        </div>
        <div class="row mt-3">
          <div class="col">
            <input type="text" class="form-control" placeholder="Phone" name="phone" pattern="[0-9]{10,12}" required>
          </div>
          <div class="col">
            <div class="form-group">
              <select id="inputState" class="form-control" name="subject">
                <option selected>----- Subject -----</option>
                <option value="reservation">Reservation</option>
                <option value="bussiness">Bussiness</option>
                <option value="other">Other</option>
              </select>
            </div>
          </div>
        </div>
        <div class="form-group">
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" placeholder="Message" name="message" required></textarea>
        </div>
        <button type="submit" class="btn btn-dark btn-lg">Submit</button>
      </form>
    </div>
  </section>

  <footer>
    <div class="container">
      <h3><?php echo getValue('nama_umkm') ?></h3>
      <div class="row mt-3 align-items-center justify-content-between">
        <div class="col-lg-9">
          <p><?php echo getValue('about_umkm') ?></p>
        </div>
        <div class="col-lg-2">
          <a class="row" href="#">Home</a>
          <a class="row" href="#menu">Menu</a>
          <a class="row" href="#order">Order</a>
          <a class="row" href="#contact">Contact Us</a>
          <div class="row justify-content-around mt-3">
            <a href="<?php echo getValue('instagram') ?>"><img src="assets/images/contact-ig.png" alt="" width="40px"></a>
            <a href="<?php echo getValue('whatsapp') ?>"><img src="assets/images/contact-whatsapp.png" alt="" width="40px"></a>
            <a href="<?php echo getValue('gmail') ?>"><img src="assets/images/contact-gmail.png" alt="" width="40px"></a>
          </div>
        </div>
      </div>
    </div>
  </footer>







  <script src="assets/javascript/script.js"></script>

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