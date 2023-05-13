<?php
session_start();

$xml = new DOMDocument('1.0');

$xml->formatOutput = true;
$xml->preserveWhiteSpace = false;
$xml->load("../BSIT3EG1G4.xml");

$searchName =  ucwords(trim($_POST['name']));

$year = $_POST['year'];
$tagline = $_POST['tagline'];
$branches = $_POST['branches'];
$headquarter = $_POST['headquarter'];
$picture = $_FILES['picture']['tmp_name'] ?? null;
$oldPicture = $_POST['old-picture'];
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




        $picElem = $xml->createElement('picture');
        $cdata;
        if ($picture == null) {
            $cdata = $xml->createCDATASection($oldPicture);
        } else {

            $cdata = $xml->createCDATASection(base64_encode(file_get_contents($picture)));
        }
        $picElem->appendChild($cdata);

        $newNode->appendChild($nameElem);
        $newNode->appendChild($yearElem);
        $newNode->appendChild($taglineElem);
        $newNode->appendChild($branchElem);
        $newNode->appendChild($headquarterElem);
        $newNode->appendChild($picElem);



        $xml->getElementsByTagName('techCompanies')->item(0)->replaceChild($newNode, $company);
        $xml->save("../BSIT3EG1G4.xml");

        $_SESSION['message'] = 'Update Successful';
        $_SESSION['message_body'] =  $name . ' is successfully updated.';
        echo "<script>window.location = '/index.php'</script>";
        break;
    }
}
if ($flag == 0) {
    $_SESSION['message'] = 'Update Unsuccessful';
    $_SESSION['message_body'] =   'Update was unsucessful.';
    echo "<script>window.location = '/update.php'</script>";
}
