<?php
$xml = new DOMDocument('1.0');

$xml->formatOutput = true;
$xml->preserveWhiteSpace = false;
$xml->load("BSIT3EG1G4.xml");

$searchName = $_POST['name'];
$year = $_POST['year'];
$tagline = $_POST['tagline'];
$branches = $_POST['branches'];
$headquarter = $_POST['headquarter'];
$picture = $_FILES['picture']['tmp_name'];
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
        $cdata = $xml->createCDATASection(base64_encode(file_get_contents($picture)));
        $picElem->appendChild($cdata);

        $newNode->appendChild($nameElem);
        $newNode->appendChild($yearElem);
        $newNode->appendChild($taglineElem);
        $newNode->appendChild($branchElem);
        $newNode->appendChild($headquarterElem);
        $newNode->appendChild($picElem);



        $xml->getElementsByTagName('techCompanies')->item(0)->replaceChild($newNode, $company);
        $xml->save("BSIT3EG1G4.xml");


        // echo "
        //     <script src='/assets/bootstrap/js/bootstrap.bundle.min.js'></script>
        //             <link rel='stylesheet' href='/assets/bootstrap/css/bootstrap.min.css' />
        //             <link rel='stylesheet' href='/assets/styles.css' />
        //             ";
        // echo '

        //     <div class="modal fade show modal-displayed" tabindex="-1">
        //     <div class="modal-dialog">
        //         <div class="modal-content">
        //         <div class="modal-header">
        //             <h3 class="modal-title text-accent">Update Successful </h3>
        //         </div>
        //          <div class="modal-body">

        //             <p><span class="fw-bold">"' . $name . '"</span> is successfully updated!</p>
        //           </div>

        //         <div class="modal-footer">
        //             <a href="index.php"  class="btn btn-primary">Back to Home</a>
        //         </div>
        //         </div>
        //     </div>
        //     </div>


        //     ';
        echo "<script>window.location = './update.php'</script>";

        break;
    }
}
if ($flag == 0) {
    echo "Modification failed." . "<a href='index.php'>Back</a>";
}
