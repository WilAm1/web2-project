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
            <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
            <link rel="stylesheet" href="BSIT3EG1G4.css" />

            <div class="modalContainer p-4">
                <div class="modalContent rounded bg-light p-3 mx-auto">
                    <h2 class="text-success">Company deleted!</h2>
                    <hr>
                    <p><span class="fw-bold text-primary">'.$name.'</span>
                    successfully deleted
                    </p>

                    <div class="d-flex justify-content-end">
                        <button class= "btn btn-secondary">
                            <a class=" text-decoration-none text-light" href="index.php">back</a>
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
