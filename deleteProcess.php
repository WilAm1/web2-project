<?php
session_start();

$xml = new DOMDocument('1.0');
$xml->load("BSIT3EG1G4.xml");

$xml->formatOutput = true;
$xml->preserveWhiteSpace = false;

$searchName;
if (isset($_POST['name'])) {
    $searchName = $_POST['name'];
} else {
    $searchName = null;
}


$companies = $xml->getElementsByTagName("techCompany");
$flag = 0;

foreach ($companies as $company) {

    $name = $company->getElementsByTagName("companyName")->item(0)->nodeValue;

    if ($name == $searchName) {
        $flag = 1;
        $xml->getElementsByTagName('techCompanies')->item(0)->removeChild($company);
        $xml->save("BSIT3EG1G4.xml");
        $_SESSION['message'] = 'Company Deleted';
        $_SESSION['message_body'] =  $name . ' is successfully deleted.';
        echo "<script>window.location = './delete.php'</script>";


        break;
    }
}
if ($flag == 0) {
    $_SESSION['message'] = 'Delete Unsuccessful';
    $_SESSION['message_body'] =  $name . ' is not deleted.';
    echo "<script>window.location = './delete.php'</script>";
}
