
<?php

$xml = new DOMDocument("1.0");
$xml->load("BSIT3EG1G4.xml");

$searchName = trim($_GET["q"]);

$companies = $xml->getElementsByTagName("techCompany");
$flag = 0;

foreach ($companies as $company) {

  $name = $company->getElementsByTagName("companyName")->item(0)->nodeValue;

  if ($name == $searchName) {
    $flag = 1;
    $name = $company->getElementsByTagName("companyName")->item(0)->nodeValue;
    $year = $company->getElementsByTagName("yearStart")->item(0)->nodeValue;
    $tagline = $company->getElementsByTagName("tagline")->item(0)->nodeValue;
    $branches = $company->getElementsByTagName("totalBranch")->item(0)->nodeValue;
    $headquarter = $company->getElementsByTagName("headquarter")->item(0)->nodeValue;


    echo '
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
  <link rel="stylesheet" href="BSIT3EG1G4.css" />

  <div class="card mb-3">
    <img src="..." class="card-img-top" alt="Placeholder Image" style="height:200px" />
    <div class="card-body">
      <h5 class="card-title">' . $name . '</h5>
      <p class="card-text">
      Tagline: ' . $tagline . ' 
      </p>
      <p class="card-text">

      Branches: ' . $branches . ' 
      </p>
      <p class="card-text">
      Headquarter: : ' . $headquarter . ' 
      </p>
    </div>
  </div>
        ';

    echo " <a class='btn btn-primary' href='index.php'>Back</a>";
    break;
  }
}
if ($flag == 0) {

  echo " 
          <link rel='stylesheet' href='bootstrap/css/bootstrap.min.css' />
          <link rel='stylesheet' href='BSIT3EG1G4.css' />
          <h1>Search has found no item '$searchName' in the XML file.</h1>
          <a class='btn btn-primary' href='index.php'>Back</a>";
}
