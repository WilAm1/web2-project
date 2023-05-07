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

  <!-- bootstrap  -->
  <script src="/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css" />
  <!--  JQuery and JQueryUI  -->
  <script src="assets/jquery-3.6.4.min.js"></script>
  <script src="assets/jquery-ui/jquery-ui.min.js"></script>
  <link href="assets/jquery-ui.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="style.css" />
  <!-- own jquery -->
  <script src="./assets/js/createScript.js"></script>
  <script src="./assets/js/startEffects.js"></script>
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
      <form class="position-relative w-100" role="search">
        <input class="form-control bg-transparent d-inline text-white-50" type="search" placeholder="Search" aria-label="Search" />
        <img class="search position-absolute end-0" src="/assets/search.png" />
      </form>
    </div>
    <!-- </div> -->
  </nav>
  <div class="container mt-5">
    <h1 class="crud-heading text-accent text-left slide-up">
      Create New Company
    </h1>
    <form action="createProcess.php" method="POST" autocomplete="off" enctype="multipart/form-data">
      <div class="formContainer fade-in">
        <!-- company name -->

        <label class="form-label w-75 mx-auto fw-bold" for="companyName">Company Name:</label>
        <div class="form-text w-75 mx-auto">
          Company name must have 3 minimum characters
        </div>
        <div class="input-group mb-5 w-75 mx-auto">
          <input class="form-control" id="companyName" type="text" name="name" minlength="3" required placeholder="ex: BulSU Company" />

          <span id="message" class="valid-feedback">That company is available!</span>
          <span id="err" class="invalid-feedback"></span>
        </div>

        <!-- year started -->
        <div class="mb-5 w-75 mx-auto">
          <label class="form-label fw-bold" for="yearStarted">Year Started:
          </label>
          <select class="form-select" required name="year" id="yearStarted"></select>
        </div>

        <!-- tagline -->
        <div class="mb-5 w-75 mx-auto">
          <label class="form-label fw-bold" for="tagLine">Tagline:</label>
          <input class="form-control" id="tagLine" type="text" name="tagline" placeholder="ex: We stay connected even offline" required />
        </div>

        <!-- total branch -->
        <div class="mb-5 w-75 mx-auto">
          <label class="form-label fw-bold" for="branches">Total Branch:</label>
          <input class="form-control" id="branches" type="number" name="branches" placeholder="ex: 106" required />
        </div>

        <!-- total headquarter -->
        <div class="mb-5 w-75 mx-auto">
          <label class="form-label fw-bold" for="headquarter">Headquarter:</label>
          <input class="form-control" id="headquarter" type="text" name="headquarter" placeholder="ex: Makati" required />
        </div>

        <!-- picture -->
        <div class="mb-5 w-75 mx-auto">
          <label class="form-label fw-bold" for="picture">Company Logo</label>
          <input class="form-control" id="picture" type="file" name="picture" required />
        </div>

        <div class="flex-btn-end">
          <a class="btn btn-outline-back" href="index.php">Back</a>
          <input disabled class="btn btn-secondary" id="submit" type="submit" value="Save Company" />
        </div>
      </div>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <?php include('./loading.php') ?>
</body>

</html>