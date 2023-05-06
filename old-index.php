<!DOCTYPE html>
<html>

<head>
  <title>Top Tech Companies</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
  <!--  JQuery and JQueryUI  -->
  <script src="assets/jquery-3.6.4.min.js"></script>
  <script src="assets/jquery-ui/jquery-ui.min.js"></script>
  <!-- Own JS  -->
  <script src="assets/js/indexScript.js"></script>
  <script src="assets/js/searchScript.js"></script>
  <script src="assets/js/startEffects.js"></script>
  <!-- Own CSS -->
  <link rel="stylesheet" href="assets/styles.css"> <!-- bootstrap  -->

</head>

<body>
  <nav>
    <div class="menus mt-5 d-flex justify-content-center nav-box">
      <a class="nav-link active m-2 text-decoration-none" href="index.php">Home</a>
      <a class="nav-link  m-2 text-decoration-none" href="create.html">Add</a>
      <a class=" nav-link m-2 text-decoration-none" href="update.php">Edit</a>
      <a class=" nav-link m-2 text-decoration-none" href="delete.php">Delete</a>


      <form action="./searchProcess.php" method="GET" autocomplete="off" class="search-form">
        <div class="search-box">
          <label for="search" class="col-form-label">Search:</label>
          <div class="input-group m-2">
            <input class="form-control" placeholder="Company" type="search" id="search" name="q">
            <div id="autocomplete-list"></div>
          </div>
        </div>

      </form>
    </div>
  </nav>

  <div class="container-xl my-5">
    <div class="row">
      <div class="col-md-6 heading-box">
        <h1 class="heading-text blind-up">Find the job that <span class="text-gradient">suits</span> you</h1>
        <p>
          Finding the right company can be a challenging task when you consider your skills and interests.
          Identify the company that suits you best and pave the way for your professional success.
        </p>
      </div>
      <div class="col-md-6 heading-box">

        <img class="w-75" src="assets/images/boxes.png" alt="">
      </div>
    </div>

  </div>



  <h2 class="gradient-heading-2">Top Tech Companies in the Philippines</h2>


  <div class="instruction">Click one item in the list to see more details</div>
  <div class="accordion">

    <!-- handles the list of companies. -->
    <?php
    $xml = new DOMDocument("1.0");
    $xml->load("./BSIT3EG1G4.xml");

    $companies = $xml->getElementsByTagName("techCompany");

    foreach ($companies as $company) {
      $name = $company->getElementsByTagName("companyName")->item(0)->nodeValue;
      $year = $company->getElementsByTagName("yearStart")->item(0)->nodeValue;
      $tagline = $company->getElementsByTagName("tagline")->item(0)->nodeValue;
      $branches = $company->getElementsByTagName("totalBranch")->item(0)->nodeValue;
      $headquarter = $company->getElementsByTagName("headquarter")->item(0)->nodeValue;


      echo '
    <div class="accordion-header ">
      <p class="companyName">' . $name . ' </a> <i class="caret"></i></p>
      <p class="date-founded">Founded in <span>' . $year . '</span></p>
    </div>

    <div class="accordion-content">
      <div class="detail-box">

        <p>Tagline: <span class="detail">' . $tagline . ' </span> </p>
        <p>Total Branch: <span class="detail">' . $branches . '</span> </p>
        <p>Headquarter: <span class="detail">' . $headquarter . '</span> </p>
      </div>

        <div class="accordion-btn-group">
  
            <a class="btn btn-primary" href="/searchProcess.php?q=' . $name . '">View in Seperate Page</a>
        <div class="dropdown">
          <a class="btn btn-primary dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Action
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/update.php">Update</a></li>
            <li class="dropdown-item delete-company" data-bs-toggle="modal" data-bs-target="#theModal" data-companyName="' . $name . '">Delete</li>
  
          </ul>
        </div>
      </div>
    </div>
    ';
    }
    ?>
  </div>


  <!-- Modal -->
  <div class="modal fade" id="theModal" tabindex="-1" aria-labelledby="theModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <p class="modal-title fs-5" id="theModalLabel">Confirm Deletion?</p>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>You cannot undo this change.</p>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
          <form action="/deleteProcess.php" method="post">
            <input id="deleteCompanyInput" type="hidden" name="name" value="">

            <button type="submit" class="btn btn-danger">Confirm Delete</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- end modal -->


</body>

</html> -->