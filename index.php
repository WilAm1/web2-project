<!DOCTYPE html>

<head>
  <title>Main Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">

  <!-- CSS -->
  <link rel="stylesheet" href="styles.css">


  <!-- JS and JQuery files -->
  <script src="assets/jquery-3.6.4.min.js"></script>
  <script src="assets/jquery-ui/jquery-ui.min.js"></script>
  <script src="assets/js/indexPage.js"></script>
</head>


<body>


  <nav class="navbar bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand text-light fw-bold" href="#" style="color:#5A2D91">
        <img src="images/logo.png" width="54" height="54" class="d-inline-block">
        Top Tech Companies</a>
    </div>
  </nav>



  <div class="menus container mt-5 d-flex justify-content-center ">
    <a class=" btn btn-outline-primary m-2 text-decoration-none" href="create.html">Add</a>
    <a class="btn btn-outline-primary m-2 text-decoration-none" href="update.php">Edit</a>
    <a class="btn btn-outline-danger m-2 text-decoration-none" href="delete.php">Delete</a>


    <form action="./searchProcess.php" method="GET" autocomplete="off">
      <div class="input-group m-2">

        <input class="form-control" placeholder="Search company" type="search" id="search" name="q">
        <div id="autocomplete-list"></div>

        <button class="btn btn-success" type="submit" value="Search">Search</button>
      </div>

    </form>
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