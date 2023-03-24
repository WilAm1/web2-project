<?php

$xml = new DOMDocument('1.0');

$xml->formatOutput = true;
$xml->preserveWhiteSpace = false;

$xml->load("BSIT3EG1G4.xml");
$searchName = $_POST['name'];

$companies = $xml->getElementsByTagName("techCompany");
$flag = 0;

foreach ($companies as $company) {

    $name = $company->getElementsByTagName("companyName")->item(0)->nodeValue;

    if ($name == $searchName) {
        $flag = 1;
        $xml->getElementsByTagName('techCompanies')->item(0)->removeChild($company);
        $xml->save("BSIT3EG1G4.xml");
        echo "Company Deleted. <a href='index.php'>Back</a>";
        break;
    }
}
if ($flag == 0) {
    echo "Company Deletion has been failed." . "<a href='index.php'>Back</a>";
}
