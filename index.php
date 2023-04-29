<!DOCTYPE html>
<html>

<head>
  <title>Top Tech Companies</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">

  <!-- CSS -->
  <link rel="stylesheet" href="assets/styles.css">

  <!-- JS and JQuery files -->
  <script src="assets/jquery-3.6.4.min.js"></script>
  <script src="assets/jquery-ui/jquery-ui.min.js"></script>
  <!-- Own JS File -->
  <script src="assets/js/indexPage.js"></script>
</head>

<body>
  <nav class="">
    <div class="menus mt-5 d-flex justify-content-center nav-box">
      <a class="nav-link active m-2 text-decoration-none" href="create.html">Add</a>
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
        <h2 class="heading-text ">Find the job that <span class="text-gradient">suits</span> you</h2>
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





  <!-- handles the list of companies. -->
  <?php
  $xml = new DOMDocument("1.0");
  $xml->load("./BSIT3EG1G4.xml");

  $companies = $xml->getElementsByTagName("techCompany");


  echo '<table class="table w-75 ms-auto me-auto mt-5 table-dark table-striped ">';
  echo '<tr class="bg-primary text-light"><th>Name</th>
              <th>Year Started:</th>
              <th>Tagline:</th>
              <th>Branches:</th>
              <th>Headquarters:</th>
          </tr>';
  foreach ($companies as $company) {
    $name = $company->getElementsByTagName("companyName")->item(0)->nodeValue;
    $year = $company->getElementsByTagName("yearStart")->item(0)->nodeValue;
    $tagline = $company->getElementsByTagName("tagline")->item(0)->nodeValue;
    $branches = $company->getElementsByTagName("totalBranch")->item(0)->nodeValue;
    $headquarter = $company->getElementsByTagName("headquarter")->item(0)->nodeValue;

    echo '<tr>';
    echo "<td>" . $name . "</td> ";
    echo "<td>" . $year . "</td>";
    echo "<td>" . $tagline . "</td>";
    echo "<td>" . $branches . "</td>";
    echo "<td>" . $headquarter . "</td>";
    echo "</tr>";
  }

  echo '</table>';
  ?>



</body>

</html>