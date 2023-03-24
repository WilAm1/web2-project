<?php
$xml = new DOMDocument('1.0');
$xml->load("BSIT3EG1G4.xml");

$xml->formatOutput = true;
$xml->preserveWhiteSpace = false;

                
$searchName = $_POST['name'];
$year = $_POST['year'];
$tagline = $_POST['tagline'];
$branches = $_POST['branches'];
$headquarter = $_POST['headquarter'];

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
        $headquarterElem = $xml->createElement("headquarter",$headquarter);


        $newNode->appendChild($nameElem);
        $newNode->appendChild($yearElem);
        $newNode->appendChild($taglineElem);
        $newNode->appendChild($branchElem);
        $newNode->appendChild($headquarterElem);

        $xml->getElementsByTagName('techCompanies')->item(0)->replaceChild($newNode, $company);
        $xml->save("BSIT3EG1G4.xml");


        echo '
            <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
            <link rel="stylesheet" href="BSIT3EG1G4.css" />

            <div class="modalContainer p-4">
                <div class="modalContent rounded bg-light p-3 mx-auto">
                    <h2 class="text-success">Update Successful</h2>
                    <hr>
                    <p><span class="fw-bold">'.$name.'</span>is successfully updated!</p>

                    <button class="d-block ms-auto btn btn-secondary">
                        <a class="text-decoration-none" href="index.php">Close</a>
                    </button>
                </div>
            </div>
        ';
        break;
    }
}
if ($flag == 0) {
    echo "Modification failed." . "<a href='index.php'>Back</a>";
}
