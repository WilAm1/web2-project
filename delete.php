<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="BSIT3EG1G4.css" />
    <title>Delete </title>
    <!-- bootstrap  -->
    <script src="/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css" />
    <!--  JQuery and JQueryUI  -->
    <script src="assets/jquery-3.6.4.min.js"></script>
    <script src="assets/jquery-ui/jquery-ui.min.js"></script>
    <link href="assets/jquery-ui.css" rel="stylesheet" type="text/css" />
    <!-- Own JS  -->
    <script src="assets/js/createScript.js"></script>
    <!-- Own CSS -->
    <link rel="stylesheet" href="assets/styles.css" />


</head>

<body>
    <nav>
        <div class="menus mt-5 d-flex justify-content-center nav-box">
            <a class="nav-link m-2 text-decoration-none" href="index.php">Home</a>
            <a class="nav-link active m-2 text-decoration-none" href="create.html">Add</a>
            <a class="nav-link m-2 text-decoration-none" href="update.php">Edit</a>
            <a class="nav-link m-2 text-decoration-none" href="delete.php">Delete</a>
        </div>
    </nav>
    <div class="container mt-5 ">
        <h1 class="text-accent text-center">Delete a Company</h1>
        <div class="formContainer">
            <!-- company names in dropdown -->
            <div class=" mx-auto">
                <label class=" fw-bold text-accent" for="name">Name of Company:</label>
                <select class="form-select" name="name" id="name">
                    <?php
                    $xml = new DOMDocument("1.0");
                    $xml->load("BSIT3EG1G4.xml");
                    $companies = $xml->getElementsByTagName("techCompany");

                    foreach ($companies as $com) {
                        $name = $com->getElementsByTagName("companyName")->item(0)->nodeValue;
                        echo "<option value='$name' > $name</option>";
                    }
                    ?>
                </select>
            </div>


            <div class="d-flex justify-content-end mt-2">
                <button class="btn btn-outline-secondary m-2">
                    <a class="text-decoration-none text-secondary" href="index.php">Back</a>
                </button>

                <button class="btn btn-danger m-2" data-bs-toggle="modal" data-bs-target="#theModal">Delete</button>
            </div>

        </div>


    </div>
    <!-- Modal -->
    <div class="modal fade" id="theModal" tabindex="-1" aria-labelledby="theModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title fs-5" id="theModalLabel">Confirm Deletion?</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>You cannot undo this change.</p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <form action="/deleteProcess.php" method="post">
                        <input id="deleteCompanyInput" type="hidden" name="name" value="<?= $name ?>">

                        <button type="submit" class="btn btn-primary">Confirm Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- end modal -->



</body>

</html>