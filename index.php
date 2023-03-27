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
    <a class=" btn btn-outline-primary m-2 text-decoration-none" href="create.html">Add</a>
    <a class="btn btn-outline-primary m-2 text-decoration-none" href="update.php">Edit</a>
    <a class="btn btn-outline-danger m-2 text-decoration-none" href="delete.php">Delete</a>


    <form action="./searchProcess.php" method="GET" autocomplete="off">
      <div class="input-group m-2">

        <input class="form-control" placeholder="Search company" type="search" id="search" name="search" onkeyup="handleInput(this.value)">
        <!-- the dropdown . Stays 0 height if there is no children. -->
        <div id="autocomplete-list" class="autocomplete-items"></div>

        <button class="btn btn-success" type="submit" value="Search">Search</button>
      </div>

    </form>
  </div>

  <script>
    var input = document.getElementById("search");


    var optionsContainerElem = document.getElementById("autocomplete-list");

    function closeAllList() {
      var elems = document.getElementsByClassName("autocomplete-item");
      elems = Array.from(elems); // converts node list to proper array in order to loop properly. May use elems.forEach as an alternative
      for (var e of elems) {
        e.parentNode.removeChild(e);
      }
    }


    // if the user clicks anywhere in the page , the container will get closed.
    document.addEventListener("click", () => {
      closeAllList();
    })

    function handleInput(value) {

      // remove the elements first.
      optionsContainerElem.innerHTML = '';

      var http = new XMLHttpRequest();
      http.onreadystatechange = function() {

        if (http.readyState === 4 && http.status === 200) {

          console.log(http.responseText);
          var suggestionArray = http.responseText;
          optionsContainerElem.innerHTML = suggestionArray;
        }
      }
      http.open("GET", "showCompaniesProcess.php?q=" + value, true);
      http.send();
    }

    // if dropdown is clicked, redirect to this url.
    function handleDropdownClick(value) {
      window.location.href = "/searchProcess.php?q=" + value;
    }
  </script>

  <!-- show the data in table   -->
  <div id="table-container"></div>
  <script>
    // handles fetching of data
    var tableContainer = document.getElementById("table-container");

//  Function that will perform ajax to fetch data in the xml   
    function fetchData() {
      var http = new XMLHttpRequest();
      http.onreadystatechange = function() {

        if (http.readyState === 4 && http.status === 200) {

          tableContainer.innerHTML = http.responseText;
          console.log("The table is refreshed.");
        }
      }
      http.open("GET", 'fetchAllCompanies.php', true); //where we will request the data
      http.send();
    }

    fetchData();
    //refresh the table every 3 seconds
    setInterval(fetchData, 3000);
  </script>
</body>

</html>
