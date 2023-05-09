<?php include_once "../src/php/db.php"; ?>

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

  <link href="https://fonts.googleapis.com/css2?family=Cookie&family=Elsie+Swash+Caps:wght@900&family=Finger+Paint&family=Ubuntu+Mono:ital,wght@0,400;1,700&display=swap" rel="stylesheet">

  <!-- my CSS -->
  <link rel="stylesheet" href="../src/stylesheet/menu.css">

  <title>List Menu</title>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar fixed-top navbar-expand-lg ">
    <div class="container">
      <a class="navbar-brand" href="#">Daikohi</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto gap-5">
          <li class="nav-item active">
            <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.html#menu">Menu</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.html#order">Order</a>
          </li>
          <li class="nav-item">
            <a class="nav-link button" href="index.html#contact">Contact Us</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- jumbotron -->
  <div class="jumbotron jumbotron-fluid bg-dark " style="background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('../assets/images/jumbotron/<?php echo getValue('jumbotron_image') ?>'); background-size: cover;">
    <div class="container">
      <div class="row justify-content-center align-items-center">
        <div class="col-md-8 text-center">
        </div>
      </div>
    </div>
  </div>
  <!-- Menu panel -->
  <div class="menu-panel container">
    <div class="menu-header">
      <h1>Our Menu</h1>
      <hr>
    </div>
    <div class="menu-body">
      <?php
      include_once "../src/php/db.php";
      // Query untuk mengambil data produk
      $sql = "SELECT produk.id, produk.nama_produk, kategori_produk.kategori, produk.gambar_produk FROM produk INNER JOIN kategori_produk ON produk.id_kategori = kategori_produk.id ORDER BY kategori_produk.kategori DESC;";
      $result = mysqli_query($conn, $sql);

      // Memeriksa apakah terdapat hasil query
      if (mysqli_num_rows($result) > 0) {
        // Inisialisasi variabel kategori
        $kategori = '';
        // Menampilkan data produk
        while ($row = mysqli_fetch_assoc($result)) {
          // Jika kategori berubah, tampilkan judul kategori baru
          if ($row['kategori'] != $kategori) {
            // Menutup tag <ul> pada kategori sebelumnya
            if (!empty($kategori)) {
              echo "</ul>";
              echo "</div>";
            }
            // Membuka tag <div> baru untuk kategori baru
            echo "<div class='category'>";
            echo "<h2>" . $row['kategori'] . "</h2>";
            echo "<ul>";
            // Menyimpan kategori saat ini
            $kategori = $row['kategori'];
          }
          echo "<li>";
          echo "<img src='../assets/images/products/" . $row['gambar_produk'] . "' alt=''>";
          echo "<p>" . $row['nama_produk'] . "</p>";
          echo "</li>";
        }
        // Menutup tag </ul> dan </div> pada kategori terakhir
        echo "</ul>";
        echo "</div>";
      } else {
        echo "0 results";
      }

      // Menutup koneksi dengan database
      mysqli_close($conn);
      ?>
    </div>
  </div>

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
        $query = "SELECT * FROM settings WHERE name IN ('whatsapp', 'facebook', 'instagram', 'twitter', 'envelope', 'linkedin')";
        $result = mysqli_query($conn, $query);

        print_r(mysqli_fetch_assoc($result));

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


  <script src="../src/javascript/script.js"></script>
  <script>
    $(document).ready(function() {
      $(".navbar-item").click(function(e) {
        $("navbar-item").removeClass("active");
        $(this).addClass("active");
      });
    });
  </script>




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