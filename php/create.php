<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Corinthia&family=Dancing+Script:wght@500&family=Exo+2:wght@700&family=Fasthand&family=Freehand&family=Montserrat:ital,wght@0,400;0,700;1,400;1,600;1,700;1,800&family=Poppins:ital,wght@0,400;0,700;1,400&family=Roboto:wght@300;400;500&family=Source+Sans+Pro:ital@1&display=swap" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

  <!-- font awesome icon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- bootstrap  -->
  <script src="/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css" />
  <!--  JQuery and JQueryUI  -->
  <script src="assets/jquery-3.6.4.min.js"></script>
  <script src="assets/jquery-ui/jquery-ui.min.js"></script>
  <link href="assets/jquery-ui.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="style.css" />
  <!-- own jquery -->
  <script src="./assets/js/formValidation.js"></script>
  <script src="./assets/js/startEffects.js"></script>

  <script src="./assets/js/searchScript.js"></script>
  <title>Add New Company</title>
</head>

<body>
  <!-- robot image -->
  <img class="position-absolute bottom-0 end-0" id="robot" src="/assets/robot.png" alt="" srcset="" />
  <!-- globe gif -->
  <div class="digital-world position-absolute start-0"></div>

  <script>
    $(document).ready(function() {
      $(".active+.active-box").css("visibility", "visible");
    });
  </script>

  <nav class="navbar navbar-expand-lg border-bottom p-3 position-relative">
    <!-- <div class="collapse navbar-collapse" id="navbarText"> -->
    <ul class="navbar-nav mb-2 mb-lg-0 text-white">
      <li class="nav-item">
        <a class="nav-link" href="./index.php">Home</a>
        <div class="active-box"></div>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="./create.php">Create</a>
        <div class="active-box"></div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./update.php">Update</a>
        <div class="active-box"></div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./delete.php">Delete</a>
        <div class="active-box"></div>
      </li>
    </ul>
    <div class="relative-right">
      <form id="search-form" class="search-form position-relative w-100" method="GET" autocomplete="off">
        <div class="input-group m-2">
          <i class="fa fa-search icon"></i>
          <input placeholder="Search" aria-label="Search" class="form-control" placeholder="Search Company" type="search" id="search" name="q">
          <div id="autocomplete-list"></div>
        </div>

      </form>
    </div>
  </nav>
  <div class="container mt-5">

    <div class="container-md row d-flex ">
      <form class="col-6 needs-validation  container-md " action="createProcess.php" method="POST" autocomplete="off" enctype="multipart/form-data">


        <div class="formContainer two-container fade-in ">
          <h1 class=" mb-3 w-75 mx-auto crud-heading text-accent ">
            Create New Company
          </h1>
          <!-- picture -->
          <div class="mb-3 w-75 mx-auto">
            <label class="form-label fw-bold" for="picture">Company Logo</label>

            <div class="file-drop-area">
              <div class="preview-img-box">
                <img class="preview-file-drop-picture" src="" alt="">
              </div>
              <span class="fake-btn">Choose Logo</span>
              <span class="file-msg">or drag and drop image here</span>
              <input class="file-input" id="picture" type="file" name="picture" required>
              <div class="invalid-feedback picture-feedback">
                Please pick an image file.
              </div>

            </div>
          </div>
          <!-- company name -->
          <label class="form-label w-75 mx-auto fw-bold" for="companyName">Company Name:</label>
          <div class="form-text w-75 mx-auto">
            Company name must have 3 minimum characters
          </div>
          <div class="input-group mb-3 w-75 mx-auto">
            <input class="form-control" id="companyName" type="text" name="name" minlength="3" required placeholder="ex: BulSU Company" />
            <span id="message" class="valid-feedback">That company is available!</span>
            <span id="err" class="invalid-feedback"></span>
          </div>
          <!-- year started -->
          <div class="mb-3 w-75 mx-auto">
            <label class="form-label fw-bold" for="yearStarted">Year Started:
            </label>
            <select class="form-select" required name="year" id="yearStarted">
            </select>
          </div>
          <!-- tagline -->
          <div class="mb-3 w-75 mx-auto">
            <label class="form-label fw-bold" for="tagLine">Tagline:</label>
            <input class="form-control" id="tagLine" type="text" name="tagline" placeholder="ex: We stay connected even offline" required />
            <div class="invalid-feedback">
              Please provide a tagline.
            </div>
          </div>
          <!-- total branch -->
          <div class="mb-3 w-75 mx-auto">
            <label class="form-label fw-bold" for="branches">Total Branch:</label>
            <input class="form-control" id="branches" type="number" name="branches" placeholder="ex: 106" required />
            <div class="invalid-feedback">
              Please provide and use numbers for the branches.
            </div>
          </div>
          <!-- total headquarter -->
          <div class="mb-3 w-75 mx-auto">
            <label class="form-label fw-bold" for="headquarter">Headquarter:</label>
            <input class="form-control" id="headquarter" type="text" name="headquarter" placeholder="ex: Makati" required />
            <div class="invalid-feedback">
              Please provide the location of the headquarter.
            </div>
          </div>
          <div class="mb-3 w-75 mx-auto below-btn-grp">
            <button type="button" class="toggle-preview btn btn-acc">Toggle Preview</button>
            <div>

              <input disabled class="btn btn-secondary" id="submit" type="submit" value="Save Company" />
            </div>
          </div>
        </div>

      </form>

      <!-- Preview Section -->
      <div class="preview-company-section show fade company-detail-modal create-display col" id="theModal" tabindex="-1" aria-labelledby="theModalLabel" aria-hidden="true">
        <div class="modal-dialog">


          <div class="modal-content company-modal">

            <div class="modal-body">
              <h2 class=" mb-3 mx-auto crud-heading text-accent ">
                Preview of the Company
              </h2>
              <p class="preview-heading"></p>

              <div class="logo-box"><img class="modal-picture preview-picture" src="" alt=""></div>

              <p class="modal-name preview-companyName"></br></p>

              <div class="modal-headquarter-box">
                <p class="headquarter-wrapper">Headquarter at <span class="modal-headquarter preview-headquarter"></span></p>
              </div>


              <div class="cards-row">
                <div class="modal-card">
                  <div class="modal-card-content w-100 h-100">
                    <p class="modal-year preview-yearStarted">2023</p>
                    <p class="modal-card-label">Year Started</p>
                  </div>
                </div>
                <div class="modal-card">
                  <div class="modal-card-content w-100 h-100">
                    <p class="modal-branches preview-branches"></p>
                    <p class="modal-card-label">Branches</p>
                  </div>
                </div>
              </div>
              <div class="modal-card card-xl">
                <div class="modal-card-content w-100 h-auto">
                  <p class="modal-quotemark">“</p>
                  <p class="preview-tagLine modal-tagline"></br></p>
                  <p class="modal-card-label">Tagline</p>
                </div>
              </div>
            </div>



          </div>
        </div>
      </div>
    </div>

    <!-- end modal -->
  </div>


  <!-- Search Modal -->
  <div class="modal fade company-detail-modal" id="searchModal" tabindex="-1" aria-labelledby="theModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content company-modal">
        <div class="modal-header">

          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <div class="logo-box"><img class="modal-picture" src="" alt="Company Picture"></div>

          <p class="modal-name"></p>

          <div class="modal-headquarter-box">
            <p class="">Headquarter at <span class="modal-headquarter"></span></p>
          </div>


          <div class="cards-row">
            <div class="modal-card">
              <div class="modal-card-content w-100 h-100">
                <p class="modal-year"></p>
                <p class="modal-card-label">Year Started</p>
              </div>
            </div>
            <div class="modal-card">
              <div class="modal-card-content w-100 h-100">
                <p class="modal-branches"></p>
                <p class="modal-card-label">Branches</p>
              </div>
            </div>
          </div>
          <div class="modal-card card-xl">
            <div class="modal-card-content w-100 h-auto">
              <p class="modal-quotemark">“</p>
              <p class="modal-tagline"></p>
              <p class="modal-card-label">Tagline</p>
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-outline-back" data-bs-dismiss="modal">Close</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- end modal -->


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <?php include('./loading.php') ?>
</body>

</html>