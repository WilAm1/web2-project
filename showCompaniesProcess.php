<?php

$xml = new DOMDocument("1.0");
$xml->load("BSIT3EG1G4.xml");
$searchName = ucwords(trim($_REQUEST["q"]));

$companies = $xml->getElementsByTagName("techCompany");
$result = "";
foreach ($companies as $company) {
    $name = $company->getElementsByTagName("companyName")->item(0)->nodeValue;

    if ($searchName == substr($name, 0, strlen($searchName))) {

        $result .= "
        <div onClick='handleDropdownClick(" . '"' . $name . '"' . ")' class='autocomplete-item' >
                     $name
        </div>
        ";
    }
}
echo  $result;
