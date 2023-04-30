<?php

$xml = new DOMDocument('1.0');
$xml->load("BSIT3EG1G4.xml");

$xml->formatOutput = true;
$xml->preserveWhiteSpace = false;

$searchName = $_POST['name'];

$companies = $xml->getElementsByTagName("techCompany");
$flag = 0;

foreach ($companies as $company) {

    $name = $company->getElementsByTagName("companyName")->item(0)->nodeValue;

    if ($name == $searchName) {
        $flag = 1;
        $xml->getElementsByTagName('techCompanies')->item(0)->removeChild($company);
        $xml->save("BSIT3EG1G4.xml");
        echo '

            <script src="/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
            <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css" />
            <script src="assets/jquery-3.6.4.min.js"></script>
            <script src="assets/jquery-ui/jquery-ui.min.js"></script>
            <link href="assets/jquery-ui.css" rel="stylesheet" type="text/css" />
            <link rel="stylesheet" href="assets/styles.css" />
            <div class="modal fade show modal-displayed" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-accent">Delete Successful </h3>
                </div>
                 <div class="modal-body">

                    <p><span class="fw-bold">"' . $name . '"</span> is successfully deleted!</p>
                  </div>

                <div class="modal-footer">
                    <a href="index.php"  class="btn btn-primary">Back to Home</a>
                </div>
                </div>
            </div>
            </div>


            ';
        break;
    }
}
if ($flag == 0) {
    echo "Company Deletion has been failed." . "<a href='index.php'>Back</a>";
}
