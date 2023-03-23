<?php


$xml  = new DOMDocument('1.0');

$xml->load("BSIT3EG1G4.xml");

$list = $xml->getElementsByTagName("companyName");

$requestValue = $_REQUEST['checkName'];


foreach ($lists as $list) {
    $name = $list->nodeValue;

    if (strtolower($requestValue) == $name) {
        echo "Username " . $requestValue . " already exist.";
        break;
    }
}

// name is available.
echo "Username " . $requestValue . " already exist.";
