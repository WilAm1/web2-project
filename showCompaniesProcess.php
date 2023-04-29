<?php

$xml = new DOMDocument("1.0");
$xml->load("BSIT3EG1G4.xml");
$searchName = trim($_REQUEST["q"]);

$companies = $xml->getElementsByTagName("techCompany");
$result = "";
foreach ($companies as $company) {
    $companyName = $company->getElementsByTagName("companyName")->item(0)->nodeValue;

    $searchName = strtolower($searchName);
    $lowercaseCompanyName = strtolower($companyName);
    if ($searchName == substr($lowercaseCompanyName, 0, strlen($searchName))) {

        $result .= "
        <a href=' /searchProcess.php?q=" .   $companyName  . "'" . " class='autocomplete-item' >
                     $companyName
        </a>
        ";
    }
}
echo  $result;
