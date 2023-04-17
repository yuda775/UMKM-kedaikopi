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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!-- My CSS -->
  <link rel="stylesheet" href="assets/stylesheet/settings.css">

  <title>Seetings</title>
</head>

<body>
  <div class="container m-5 p-5 mx-auto rounded border" style="background-color: whitesmoke;">
    <h1 class="text-center">Settings</h1>
    <form action="update.php" method="post">

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

      <div class="panel">
        <h4 class="mt-2">Panel</h4>
        <div class="row panel mt-1">
          <div class="col-md-4">
            <input type="text" class="form-control" name="panel_1" placeholder="Panel 1" value="<?php echo getValue('panel_1') ?>">
          </div>
          <div class="col-md-4">
            <input type="text" class="form-control" name="panel_2" placeholder="Panel 2" value="<?php echo getValue('panel_2') ?>">
          </div>
          <div class="col-md-4">
            <input type="text" class="form-control" name="panel_3" placeholder="Panel 3" value="<?php echo getValue('panel_3') ?>">
          </div>
        </div>
      </div>

      <div class="images">
        <div class="fluid-images">
          <h4 class="mt-4">Images</h4>
          <div class="row">
            <div class="col">
              <div class="custom-file mt-1">
                <input type="file" class="custom-file-input" id="jumbotron_image" name="jumbotron_image" accept=".jpg,.jpeg,.png">
                <label class="custom-file-label" for="jumbotron_image">Jumbotron Image</label>
              </div>
            </div>
            <div class="col">
              <div class="custom-file mt-1">
                <input type="file" class="custom-file-input" id="umkm_image" name="umkm_image" accept=".jpg,.jpeg,.png">
                <label class="custom-file-label" for="umkm_image">UMKM Image</label>
              </div>
            </div>
          </div>
        </div>

        <div class="menu-images">
          <h4 class="mt-4">Menu Images</h4>
          <span>Recomendation Menu Images</span>
          <div class="row justify-content-arround">
            <div class="col-md-3 pb-4">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="jumbotron_image" name="recomendation_menu_image_1" accept=".jpg,.jpeg,.png">
                <label class="custom-file-label" for="jumbotron_image">image 1</label>
                <input type="text" class="form-control" name="recomendation_menu_name_1" placeholder="Name of menu">
              </div>
            </div>
            <div class="col-md-3 pb-4">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="jumbotron_image" name="recomendation_menu_image_2" accept=".jpg,.jpeg,.png">
                <label class="custom-file-label" for="jumbotron_image">image 2</label>
                <input type="text" class="form-control" name="recomendation_menu_name_2" placeholder="Name of menu">
              </div>
            </div>
            <div class="col-md-3 pb-4">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="jumbotron_image" name="recomendation_menu_image_3" accept=".jpg,.jpeg,.png">
                <label class="custom-file-label" for="jumbotron_image">image 3</label>
                <input type="text" class="form-control" name="recomendation_menu_name_3" placeholder="Name of menu">
              </div>
            </div>
            <div class="col-md-3 pb-4">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="jumbotron_image" name="recomendation_menu_image_4" accept=".jpg,.jpeg,.png">
                <label class="custom-file-label" for="jumbotron_image">image 4</label>
                <input type="text" class="form-control" name="recomendation_menu_name_4" placeholder="Name of menu">
              </div>
            </div>
            <div class="col-md-3 pb-4">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="jumbotron_image" name="recomendation_menu_image_5" accept=".jpg,.jpeg,.png">
                <label class="custom-file-label" for="jumbotron_image">image 5</label>
                <input type="text" class="form-control" name="recomendation_menu_name_5" placeholder="Name of menu">
              </div>
            </div>
            <div class="col-md-3 pb-4">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="jumbotron_image" name="recomendation_menu_image_6" accept=".jpg,.jpeg,.png">
                <label class="custom-file-label" for="jumbotron_image">image 6</label>
              </div>
            </div>
          </div>

          <div class="list-menu row justify-content-between">
            <div class="coffe-menu col-lg-4 mt-3">
              <div class="heading-list d-flex justify-content-between">
                <p>Coffe Menu</p>
                <a class="text-primary add-link" onclick="addCoffeMenu()">Add</a>
              </div>
              <ul class="list-group">
                <li class="list-group-item pb-4 mb-3">
                  <div class="action-list d-flex justify-content-between">
                    <a href="">Remove</a>
                    <a href="">Edit</a>
                  </div>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="list-menu" disabled>
                    <label class="custom-file-label" for="list-menu">image</label>
                    <input type="text" class="form-control" placeholder="Name of menu">
                  </div>
                </li>
              </ul>
            </div>
            <div class="noncoffe-menu col-lg-4 mt-3">
              <div class="heading-list d-flex justify-content-between">
                <p>NonCoffe Menu</p>
                <a class="text-primary add-link" onclick="addNonCoffeMenu()">Add</a>
              </div>
              <ul class="list-group">
                <li class="list-group-item pb-4 mb-3">
                  <div class="action-list d-flex justify-content-between">
                    <a href="">Remove</a>
                    <a href="">Edit</a>
                  </div>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="list-menu" disabled>
                    <label class="custom-file-label" for="list-menu">image</label>
                    <input type="text" class="form-control" placeholder="Name of menu">
                  </div>
                </li>
              </ul>
            </div>
            <div class="food-menu col-lg-4 mt-3">
              <div class="heading-list d-flex justify-content-between">
                <p>Food Menu</p>
                <a class="text-primary add-link" onclick="addFoodMenu()">Add</a>
              </div>
              <ul class="list-group">
                <li class="list-group-item pb-4 mb-3">
                  <div class="action-list d-flex justify-content-between">
                    <a href="">Remove</a>
                    <a href="">Edit</a>
                  </div>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="list-menu" disabled>
                    <label class="custom-file-label" for="list-menu">image</label>
                    <input type="text" class="form-control" placeholder="Name of menu">
                  </div>
                </li>
              </ul>
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

      <div class="social-media">
        <h4 class="mt-4">Social Media</h4>
        <div class="row panel mt-2">
          <div class="col-md-4">
            <input type="text" class="form-control" name="instagram" placeholder="Instagram" value="<?php echo getValue('instagram') ?>">
          </div>
          <div class="col-md-4">
            <input type="text" class="form-control" name="whatsapp" placeholder="Whatsapp" value="<?php echo getValue('whatsapp') ?>">
          </div>
          <div class="col-md-4">
            <input type="text" class="form-control" name="gmail" placeholder="Gmail" value="<?php echo getValue('gmail') ?>">
          </div>
        </div>
      </div>

      <div class="form-btn mt-5 d-flex justify-content-between">
        <button type="reset" class="btn btn-warning">Reset</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>

    </form>
  </div>

  <!-- Popup List Menu Image Input -->
  <div id="addCoffeMenu" class="popup">
    <div class="popup-content rounded">
      <button type="button" class="btn btn-danger close-popup" onclick="closePopup()">&times;</button>
      <h5>Add Coffe Menu</h5>
      <form>
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="jumbotron_image" name="image_coffe_menu_list" accept=".jpg,.jpeg,.png">
          <label class="custom-file-label" for="jumbotron_image">image</label>
          <input type="text" class="form-control" placeholder="Name of menu">
        </div>
        <div class="d-flex justify-content-end">
          <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </div>
      </form>
    </div>
  </div>

  <div id="addNonCoffeMenu" class="popup addNonCoffeMenu">
    <div class="popup-content rounded">
      <button type="button" class="btn btn-danger close-popup" onclick="closePopup()">&times;</button>
      <h5>Add Non Coffe Menu</h5>
      <form>
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="jumbotron_image" name="image_non_coffe_menu_list" accept=".jpg,.jpeg,.png">
          <label class="custom-file-label" for="jumbotron_image">image</label>
          <input type="text" class="form-control" placeholder="Name of menu">
        </div>
        <div class="d-flex justify-content-end">
          <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </div>
      </form>
    </div>
  </div>

  <div id="addFoodMenu" class="popup">
    <div class="popup-content rounded">
      <button type="button" class="btn btn-danger close-popup" onclick="closePopup()">&times;</button>
      <h5>Add Food Menu</h5>
      <form>
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="jumbotron_image" name="image_food_menu_list" accept=".jpg,.jpeg,.png">
          <label class="custom-file-label" for="jumbotron_image">image</label>
          <input type="text" class="form-control" placeholder="Name of menu">
        </div>
        <div class="d-flex justify-content-end">
          <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </div>
      </form>
    </div>
  </div>

  <script src="assets/javascript/settings.js"></script>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>