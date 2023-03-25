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


    .autocomplete-items div {
      padding: 10px;
      cursor: pointer;
      background-color: #fff;
      border-bottom: 1px solid #d4d4d4;
    }

    /*when hovering an item:*/
    .autocomplete-items div:hover {
      background-color: #e9e9e9;
      color: #1B5EE2;
    }

    /*when navigating through the items using the arrow keys:*/
    .autocomplete-active {
      background-color: DodgerBlue !important;
      color: #ffffff;
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
    <button class="btn btn-outline-primary m-2">
      <a class="text-decoration-none" href="create.html">Add</a>
    </button>
    <button class="btn btn-outline-primary m-2">
      <a class="text-decoration-none" href="update.php">Edit</a>
    </button>
    <button class="btn btn-outline-primary m-2">
      <a class="text-decoration-none" href="delete.php">Delete</a>
    </button>


    <form action="./searchProcess.php" method="GET" autocomplete="off">
      <div class="input-group m-2">

        <!-- <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2"> -->
        <input class="form-control" placeholder="Search company" type="search" id="search" name="search" onkeyup="handleInput(this.value)">
        <!-- the dropdown . Stays 0 height if there is no children. -->
        <div id="autocomplete-list" class="autocomplete-items"></div>

        <button class="btn btn-success" type="submit" value="Search">Search</button>
      </div>

    </form>
    <span id="msg"></span>
  </div>
  </div>

  <script>
    var input = document.getElementById("search");


    var optionsContainerElem = document.getElementById("autocomplete-list");

    function closeAllList(notClosedElem) {
      var elems = document.getElementsByClassName("autocomplete-item");
      elems = Array.from(elems); // converts node list to proper array in order to loop properly. May use elems.forEach as an alternative
      for (var e of elems) {
        e.parentNode.removeChild(e);
      }
    }


    // if the user clicks anywhere in the page not in the optionsContainerElement, the container will get closed.
    document.addEventListener("click", (e) => {
      closeAllList(e.target);
    })

    function handleInput(value) {

      // remove the elements first.
      optionsContainerElem.innerHTML = '';
      var suggestions = document.getElementById("suggestions");
      var msg = document.getElementById("msg");

      if (value.trim().length === 0) {
        msg.innerHTML = "";
      } else {

        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {

          if (xhr.readyState === 4 && xhr.status === 200) {

            console.log(xhr.responseText);
            var suggestionArray = xhr.responseText;
            optionsContainerElem.innerHTML = suggestionArray;
          }
        }
        xhr.open("GET", "search.php?q=" + value, true);
        xhr.send();
      }
    }

    // handles individual dropdown clicks.
    // 
    function handleDropdownClick(value) {
      console.log(value);
      window.location.href = "/searchProcess.php?search=" + value;

    }
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