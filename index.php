<!DOCTYPE html>

<head>
  <title>Main Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

  <style>
    .menus a:hover {
      color: white !important;
    }

    .autocomplete-items {
      position: absolute;
      border: 1px solid #d4d4d4;
      border-bottom: none;
      border-top: none;
      z-index: 99;
      /*position the autocomplete items to be the same width as the container:*/
      top: 100%;
      left: 0;
      right: 0;
    }


    .autocomplete-item {
      padding: 10px;
      cursor: pointer;
      background-color: #fff;
      border-bottom: 1px solid #d4d4d4;
    }

    /*when hovering an item:*/
    .autocomplete-item:hover {
      background-color: #e9e9e9;
      color: #1B5EE2;
    }

    /* for shadow the table */
    table {
      box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
    }
  </style>

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

        <input class="form-control" placeholder="Search company" type="search" id="search" name="q" onkeyup="handleInput(this.value)">
        <!-- the dropdown . Stays 0 height if there is no children. -->
        <div id="autocomplete-list" class="autocomplete-items"></div>

        <button class="btn btn-success" type="submit" value="Search">Search</button>
      </div>

    </form>
  </div>

  <script>
    var input = document.getElementById("search");
    var autocompleteContainerElement = document.getElementById("autocomplete-list");

    function handleInput(value) {

      var http = new XMLHttpRequest();
      http.onreadystatechange = function() {

        if (http.readyState == 4 && http.status == 200) {

          var suggestions = http.responseText;
          autocompleteContainerElement.innerHTML = suggestions;
        }
      }
      http.open("GET", "showCompaniesProcess.php?q=" + value, true);
      http.send();
    }

    // if dropdown is clicked, redirect to this url.
    function handleDropdownClick(value) {
      window.location.href = "/searchProcess.php?q=" + value;
    }
    // if the user clicks anywhere in the page , the container will get closed.
    document.addEventListener("click", () => {
      autocompleteContainerElement.innerHTML = '';
    })
  </script>


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