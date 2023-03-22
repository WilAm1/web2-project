<?php

$xml = new DOMDocument("1.0");
$xml->load("BSIT3EG1G4.xml");
$searchName = ucwords($_REQUEST["q"]);

$companies = $xml->getElementsByTagName("techCompany");
$result = "";
$isFirst = true;
foreach ($companies as $company) {

    $name = $company->getElementsByTagName("companyName")->item(0)->nodeValue;

    if ($searchName == substr($name, 0, strlen($searchName))) {

        $result .= "
        <div class='autocomplete-item' >
        <form onClick='handleDropdownClick(this)' method='GET' action='./searchProcess.php'>
                     $name
             <input type='hidden' name='search' value='$name'/>
        </form>
        </div>
        ";


        // if ($isFirst === true) {

        //     $result .= "$name ";
        //     $isFirst = false;
        // } else {
        //     $result .= ", $name ";
        // }
    }
}
echo  $result;
