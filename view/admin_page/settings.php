<?php
require_once '../../src/php/db.php';
?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!-- My CSS -->
  <link rel="stylesheet" href="assets/stylesheet/settings.css">

  <title>Seetings</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Admin Page</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-item nav-link" href="mail.php">Email<span class="sr-only">(current)</span></a>
        <a class="nav-item nav-link active" href="settings.php">Settings</a>
        <a class="nav-item nav-link" href="products.php">Products</a>
      </div>
    </div>
  </nav>

  <div class="container m-5 p-5 mx-auto rounded border" style="background-color: whitesmoke;">
    <h1 class="text-center">Settings</h1>
    <form action="../../src/php/update.php" method="post" enctype="multipart/form-data">

      <div class="umkm-profile">
        <h4 class="mt-5">UMKM</h4>
        <div class="row">
          <div class="form-group col">
            <input type="text" class="form-control" id="exampleFormControlInput1" name="nama_umkm" placeholder="Nama UMKM" value="<?php echo getValue('nama_umkm') ?>">
          </div>
          <div class="form-group col">
            <input type="text" class="form-control" id="exampleFormControlInput1" name="tagline_umkm" placeholder="Tagline UMKM" value="<?php echo getValue('tagline_umkm') ?>">
          </div>
        </div>
      </div>

      <div class="images">
        <div class="fluid-images">
          <h4 class="mt-4">Images</h4>
          <div class="custom-file mt-1">
            <input type="file" class="custom-file-input" id="jumbotron_image" name="jumbotron_image" value="<?php echo getValue('jumbotron_image') ?>" accept=".jpg,.jpeg,.png">
            <label class="custom-file-label" for="jumbotron_image">Jumbotron Image</label>
          </div>
          <h4 class="mt-4">Menu Rekomendasi</h4>
          <div class="row">
            <div class="col-lg-4 col-md-6 mb-3">
              <div class="custom-file">
                <input type="file" name="img_rekomendasi_1" class="custom-file-input" id="img_rekomendasi_1" value="<?php echo getValue('img_rekomendasi_1') ?>">
                <label class="custom-file-label" for="img_rekomendasi_1">Rekomendasi 1</label>
                <input type="text" class="form-control" name="nama_rekomendasi_1" placeholder="Nama menu rekomendasi 1" value="<?php echo getValue('nama_rekomendasi_1') ?>">
              </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-3">
              <div class="custom-file">
                <input type="file" name="img_rekomendasi_2" class="custom-file-input" id="img_rekomendasi_2" value="<?php echo getValue('img_rekomendasi_2') ?>">
                <label class="custom-file-label" for="img_rekomendasi_2">Rekomendasi 2</label>
                <input type="text" class="form-control" name="nama_rekomendasi_2" placeholder="Nama menu rekomendasi 2" value="<?php echo getValue('nama_rekomendasi_2') ?>">
              </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-3">
              <div class="custom-file">
                <input type="file" name="img_rekomendasi_3" class="custom-file-input" id="img_rekomendasi_3" value="<?php echo getValue('img_rekomendasi_3') ?>">
                <label class="custom-file-label" for="img_rekomendasi_3">Rekomendasi 3</label>
                <input type="text" class="form-control" name="nama_rekomendasi_3" placeholder="Nama menu rekomendasi 3" value="<?php echo getValue('nama_rekomendasi_3') ?>">
              </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-3">
              <div class="custom-file">
                <input type="file" name="img_rekomendasi_4" class="custom-file-input" id="img_rekomendasi_4" value="<?php echo getValue('img_rekomendasi_4') ?>">
                <label class="custom-file-label" for="img_rekomendasi_4">Rekomendasi 4</label>
                <input type="text" class="form-control" name="nama_rekomendasi_4" placeholder="Nama menu rekomendasi 4" value="<?php echo getValue('nama_rekomendasi_4') ?>">
              </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-3">
              <div class="custom-file">
                <input type="file" name="img_rekomendasi_5" class="custom-file-input" id="img_rekomendasi_5" value="<?php echo getValue('img_rekomendasi_5') ?>">
                <label class="custom-file-label" for="img_rekomendasi_5">Rekomendasi 5</label>
                <input type="text" class="form-control" name="nama_rekomendasi_5" placeholder="Nama menu rekomendasi 5" value="<?php echo getValue('nama_rekomendasi_5') ?>">
              </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-3">
              <div class="custom-file">
                <input type="file" name="img_rekomendasi_6" class="custom-file-input" id="img_rekomendasi_6" value="<?php echo getValue('img_rekomendasi_6') ?>">
                <label class="custom-file-label" for="img_rekomendasi_6">Gambar ke 6</label>
                <input type="text" class="form-control" name="nama_rekomendasi_6" placeholder="Gambar 6" value="<?php echo getValue('nama_rekomendasi_6') ?>">
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="about">
        <h4 class="mt-4">About UMKM</h4>
        <div class="form-group">
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" name="about_umkm" placeholder="About"><?php echo getValue('about_umkm') ?></textarea>
        </div>
      </div>

      <div class="panel">
        <h4 class="mt-2">Informasi</h4>
        <div class="row panel mt-1">
          <div class="col-md-4">
            <input type="text" class="form-control" name="lokasi" placeholder="Lokasi" value="<?php echo getValue('lokasi') ?>">
          </div>
          <div class="col-md-4">
            <input type="text" class="form-control" name="lokasi_link" placeholder="Link lokasi" value="<?php echo getValue('lokasi_link') ?>">
          </div>
          <div class="col-md-4">
            <input type="text" class="form-control" name="jam_buka" placeholder="Jam buka" value="<?php echo getValue('jam_buka') ?>">
          </div>
        </div>
      </div>


      <div class="social-media">
        <h4 class="mt-4">Social Media</h4>
        <div class="row panel mt-2">
          <div class="col-md-4 p-2">
            <label>Instagram</label>
            <input type="text" class="form-control" name="instagram" placeholder="Instagram" value="<?php echo getValue('instagram') ?>">
            <input type="text" class="form-control" name="instagram_profile" placeholder="Instagram link" value="<?php echo getValue('instagram_profile') ?>">
          </div>
          <div class="col-md-4 p-2">
            <label>Facebook</label>
            <input type="text" class="form-control" name="facebook" placeholder="facebook" value="<?php echo getValue('facebook') ?>">
            <input type="text" class="form-control" name="facebook_profile" placeholder="facebook link" value="<?php echo getValue('facebook_profile') ?>">
          </div>
          <div class="col-md-4 p-2">
            <label>Twitter</label>
            <input type="text" class="form-control" name="twitter" placeholder="twitter" value="<?php echo getValue('twitter') ?>">
            <input type="text" class="form-control" name="twitter_profile" placeholder="twitter link" value="<?php echo getValue('twitter_profile') ?>">
          </div>
          <div class="col-md-4 p-2">
            <label>LinkedIn</label>
            <input type="text" class="form-control" name="linkedin" placeholder="lingkedin" value="<?php echo getValue('linkedin') ?>">
            <input type="text" class="form-control" name="linkedin_profile" placeholder="lingkedin link" value="<?php echo getValue('linkedin_profile') ?>">
          </div>
          <div class="col-md-4 p-2">
            <label>Whatsapp</label>
            <input type="text" class="form-control" name="whatsapp" placeholder="Whatsapp" value="<?php echo getValue('whatsapp') ?>">
          </div>
          <div class="col-md-4 p-2">
            <label for="">Email</label>
            <input type="text" class="form-control" name="envelope" placeholder="Gmail" value="<?php echo getValue('envelope') ?>">
          </div>
        </div>
      </div>

      <div class="form-btn mt-5 d-flex justify-content-between">
        <button type="reset" class="btn btn-warning">Reset</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>

    </form>
  </div>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>