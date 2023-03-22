
<?php

$xml = new DOMDocument("1.0");
$xml->load("BSIT3EG1G4.xml");

$searchName = $_REQUEST["search"];

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



        echo "Name: " . $name . "</br>";
        echo "Year Started: " . $year . "</br>";
        echo "Tagline: " . $tagline . "</br>";
        echo "Branches: " . $branches . "</br>";
        echo "Headquarters: " . $headquarter . "</br>";
        echo "</br>";
        echo "Company is Found. <a href='index.php'>Back</a>";
        break;
    }
}
if ($flag == 0) {
    echo "Search has found no item. <a href='index.php'>Back</a>";
}
