<?php


$xml  = new DOMDocument('1.0');

$xml->load("BSIT3EG1G4.xml");

$companies = $xml->getElementsByTagName("techCompany");

$requestValue = $_REQUEST['q'];


foreach ($companies as $company) {
    $name = $company->getElementsByTagName("companyName")->item(0)->nodeValue;

    if (strtolower($requestValue) == strtolower($name)) {
        echo "false";
        return;
        //  the script won't run the code below anymore due to return statement.
    }
}

// name is available.
echo "true";
