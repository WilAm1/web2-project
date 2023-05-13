<?php


$xml  = new DOMDocument('1.0');

$xml->load("BSIT3EG1G4.xml");

$companies = $xml->getElementsByTagName("techCompany");

$requestValue = $_REQUEST['q']; //where we will store the input


foreach ($companies as $company) {
    $name = $company->getElementsByTagName("companyName")->item(0)->nodeValue; //for every instance of the techcompany we will get the companyName to be stored in $name

    //check if the input of the user in the creation.html of company name is already existed in our xml or not
    if (strtolower($requestValue) == strtolower($name)) { //if already existed it will enter the condition
        echo "false";
        return;
        //  the script won't run the code below anymore due to return statement.
    }
}

//after checking all the data and none of them have similar company name then
// name is available.
echo "true";
