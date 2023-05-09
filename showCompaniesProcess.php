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
        <div class='autocomplete-item link' data-company-name='$companyName' data-bs-toggle='modal' data-bs-target='#theModal' >
                     $companyName
        </div>
        ";
    }
}
echo  $result;
