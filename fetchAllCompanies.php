<?php

$xml = new DOMDocument('1.0');
$xml->load("BSIT3EG1G4.xml");

$xml->formatOutput = true;
$xml->preserveWhiteSpace = false;


$companies = $xml->getElementsByTagName("techCompany");


// display the data in a table
echo '

  <table class="table w-75 ms-auto me-auto mt-5 table-dark table-striped ">
    <tr class="bg-primary text-light">
      <th>Name</th>
      <th>Year Started:</th>
      <th>Tagline:</th>
      <th>Branches:</th>
      <th>Headquarters:</th>
    </tr>;

';

// retrieve all the data of each companies in the xml and then display it on the table
foreach ($companies as $company) {

    $name = $company->getElementsByTagName("companyName")->item(0)->nodeValue;

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


echo '
  </table>

';
