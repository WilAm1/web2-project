<?php

$xml = new DOMDocument('1.0');
$xml->load("BSIT3EG1G4.xml");

$xml->formatOutput = true;
$xml->preserveWhiteSpace = false;

$name = $_POST['name'];
$year = $_POST['year'];
$tagline = $_POST['tagline'];
$branches = $_POST['branches'];
$headquarter = $_POST['headquarter'];


$newCompany = $xml->createElement("techCompany");

$nameElem = $xml->createElement("companyName", $name);
$yearElem = $xml->createElement("yearStart", $year);
$taglineElem = $xml->createElement("tagline", $tagline);
$branchElem = $xml->createElement("totalBranch", $branches);
$headquarterElem = $xml->createElement("headquarter",$headquarter);


$newCompany->appendChild($nameElem);
$newCompany->appendChild($yearElem);
$newCompany->appendChild($taglineElem);
$newCompany->appendChild($branchElem);
$newCompany->appendChild($headquarterElem);

$xml->getElementsByTagName('techCompanies')->item(0)->appendChild($newCompany);
$xml->save("BSIT3EG1G4.xml");
echo "Details updated." . "<a href='index.php'>Back</a>";
