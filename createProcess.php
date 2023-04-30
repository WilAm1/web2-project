<?php

$xml = new DOMDocument('1.0');

$xml->formatOutput = true;
$xml->preserveWhiteSpace = false;
$xml->load("BSIT3EG1G4.xml");



$name = ucwords(trim($_POST['name']));
$year = $_POST['year'];
$tagline = $_POST['tagline'];
$branches = $_POST['branches'];
$headquarter = $_POST['headquarter'];


$newCompany = $xml->createElement("techCompany");

$nameElem = $xml->createElement("companyName", $name);
$yearElem = $xml->createElement("yearStart", $year);
$taglineElem = $xml->createElement("tagline", $tagline);
$branchElem = $xml->createElement("totalBranch", $branches);
$headquarterElem = $xml->createElement("headquarter", $headquarter);


$newCompany->appendChild(($nameElem));
$newCompany->appendChild($yearElem);
$newCompany->appendChild($taglineElem);
$newCompany->appendChild($branchElem);
$newCompany->appendChild($headquarterElem);

$xml->getElementsByTagName('techCompanies')->item(0)->appendChild($newCompany);
$xml->save("BSIT3EG1G4.xml");

echo "
  <script src='/assets/bootstrap/js/bootstrap.bundle.min.js'></script>
          <link rel='stylesheet' href='/assets/bootstrap/css/bootstrap.min.css' />
          <link rel='stylesheet' href='/assets/styles.css' />
          ";
echo '

<div class="modal fade show modal-displayed" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-accent">"' . $name . '" company is added to the XML file. </h3>
      </div>
      <div class="modal-footer">
        <a href="index.php"  class="btn btn-primary">Back to Home</a>
      </div>
    </div>
  </div>
</div>


';
