<?php

$xml = new DOMDocument('1.0');

$xml->formatOutput = true;
$xml->preserveWhiteSpace = false;

$xml->load("BSIT3EG1G4.xml");


$companies = $xml->getElementsByTagName("techCompany");
$flag = 0;
foreach ($companies as $company) {
    $name = $company->getElementsByTagName("companyName")->item(0)->nodeValue;

    if ($name == $searchName) {
        $flag = 1;
        $newNode = $xml->createElement("techCompany");

        $nameElem = $xml->createElement("companyName", $name);
        $yearElem = $xml->createElement("yearStart", $year);
        $taglineElem = $xml->createElement("tagline", $tagline);
        $branchElem = $xml->createElement("totalBranch", $branches);
        $headquarterElem = $xml->createElement("headquarter", $headquarter);


        $newNode->appendChild($nameElem);
        $newNode->appendChild($yearElem);
        $newNode->appendChild($taglineElem);
        $newNode->appendChild($branchElem);
        $newNode->appendChild($headquarterElem);

        $xml->getElementsByTagName('techCompanies')->item(0)->replaceChild($newNode, $company);
        $xml->save("BSIT3EG1G4.xml");

        echo "Details updated." . "<a href='index.php'>Back</a>";
        break;
    }
}
if ($flag == 0) {
    echo "Modification failed." . "<a href='index.php'>Back</a>";
}
