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

            <div class="modalContainer p-4">
                <div class="modalContent rounded p-3 mx-auto">
                    <h2 class="text-accent">Company deleted!</h2>
                    <hr>
                    <p><span class="fw-bold text-primary">' . $name . '</span>
                    successfully deleted
                    </p>

                    <div class="d-flex justify-content-center">
                        <button class= "btn btn-accent">
                            <a class=" text-decoration-none text-light" href="index.php">Home</a>
                        </button>
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
