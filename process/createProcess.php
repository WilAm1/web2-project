<?php
session_start();

$xml = new DOMDocument('1.0');

$xml->formatOutput = true;
$xml->preserveWhiteSpace = false;
$xml->load("../BSIT3EG1G4.xml");



$name = ucwords(trim($_POST['name']));
$year = $_POST['year'];
$tagline = $_POST['tagline'];
$branches = $_POST['branches'];
$headquarter = $_POST['headquarter'];
$picture = $_FILES['picture']['tmp_name'];


$newCompany = $xml->createElement("techCompany");

$nameElem = $xml->createElement("companyName", $name);
$yearElem = $xml->createElement("yearStart", $year);
$taglineElem = $xml->createElement("tagline", $tagline);
$branchElem = $xml->createElement("totalBranch", $branches);
$headquarterElem = $xml->createElement("headquarter", $headquarter);

$picElem = $xml->createElement('picture');
$cdata = $xml->createCDATASection(base64_encode(file_get_contents($picture)));
$picElem->appendChild($cdata);


$newCompany->appendChild(($nameElem));
$newCompany->appendChild($yearElem);
$newCompany->appendChild($taglineElem);
$newCompany->appendChild($branchElem);
$newCompany->appendChild($headquarterElem);
$newCompany->appendChild($picElem);

$xml->getElementsByTagName('techCompanies')->item(0)->appendChild($newCompany);
$xml->save("../BSIT3EG1G4.xml");


$_SESSION['message'] = 'New Company Added';
$_SESSION['message_body'] =  $name . ' is successfully added.';
echo "<script>window.location = '/index.php'</script>";
