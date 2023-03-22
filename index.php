<!DOCTYPE html>

<head>
  <title>Main Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

  <style>
    /*the container must be positioned relative:*/
    .autocomplete {
      position: relative;
      display: inline-block;
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
  </style>

</head>


<body>

  <div>
    <button>
      <a href="create.html">Add</a>
    </button>
    <button><a href="update.php">Edit</a></button>
    <button><a href="delete.php">Delete</a></button>


    <div class="autocomplete" style="width:300px">
      <input list="suggestions" type="search" id="search">
      <!-- the dropdown . Stays 0 height if there is no children. -->
      <div id="autocomplete-list" class="autocomplete-items">
      </div>
    </div>
    <span id="msg"></span>
  </div>
  </div>

  <script>
    const input = document.getElementById("search");

    input.addEventListener("input", handleInput);

    const divList = document.getElementById("autocomplete-list")

    function closeAllList(notClosedElem) {
      var elems = document.getElementsByClassName("autocomplete-item");
      // converts node list to proper array in order to loop properly.
      elems = Array.from(elems);
      for (const e of elems) {
        e.parentNode.removeChild(e);
      }
    }
    document.addEventListener("click", (e) => {
      closeAllList(e.target);
    })

    function handleInput(event) {

      // remove the elements first.
      divList.innerHTML = '';
      var value = event.target.value;
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
            divList.innerHTML = suggestionArray;
          }
        }
        xhr.open("GET", "search.php?q=" + value, true);
        xhr.send();
      }
    }

    // handles individual dropdown clicks
    function handleDropdownClick(form) {
      form.submit();

    }
  </script>
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


    echo "Name:" . $name . "</br>";
    echo "Year Started:" . $year . "</br>";
    echo "Tagline:" . $tagline . "</br>";
    echo "Branches:" . $branches . "</br>";
    echo "Headquarters:" . $headquarter . "</br>";
    echo "</br>";
  }
  ?>


</body>

</html>