<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="BSIT3EG1G4.css" />
    <title>Update </title>
    <!-- bootstrap  -->
    <script src="/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css" />
    <!--  JQuery and JQueryUI  -->
    <script src="assets/jquery-3.6.4.min.js"></script>
    <script src="assets/jquery-ui/jquery-ui.min.js"></script>
    <link href="assets/jquery-ui.css" rel="stylesheet" type="text/css" />
    <!-- Own JS  -->
    <script src="assets/js/updateScript.js"></script>
    <!-- Own CSS -->
    <link rel="stylesheet" href="assets/styles.css" />




</head>

<body>
    <nav>
        <div class="menus mt-5 d-flex justify-content-center nav-box">
            <a class="nav-link m-2 text-decoration-none" href="index.php">Home</a>
            <a class="nav-link  m-2 text-decoration-none" href="create.html">Add</a>
            <a class="nav-link active m-2 text-decoration-none" href="update.php">Edit</a>
            <a class="nav-link m-2 text-decoration-none" href="delete.php">Delete</a>


        </div>
    </nav>


    <div class="container ">
        <h1 class="text-accent mt-5 text-center">Update a Company</h1>
        <form action="updateProcess.php" method="post">

            <div class="formContainer">

                <!-- company name in dropdown -->
                <div class="input-group mb-2 w-75 mx-auto">
                    <label class="input-group-text fw-bold" for="name">Name</label>
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

                <!-- year -->
                <div class="input-group mb-2 w-75 mx-auto">
                    <label class="input-group-text fw-bold" for="year">Year</label>
                    <input class="form-control" type="number" name="year" id="year" required>
                </div>

                <!-- tagline -->
                <div class="input-group mb-2 w-75 mx-auto">
                    <label class="input-group-text fw-bold" for="tagline">Tagline</label>
                    <input class="form-control" type="text" name="tagline" id="tagline" required>
                </div>

                <!-- branches -->
                <div class="input-group mb-2 w-75 mx-auto">
                    <label class="input-group-text fw-bold" for="branches">Branches</label>
                    <input class="form-control" type="number" name="branches" id="branches" required>
                </div>

                <div class="input-group mb-2 w-75 mx-auto">
                    <label class="input-group-text fw-bold" for="headquarter">Headquarter</label>
                    <input class="form-control" type="text" name="headquarter" id="headquarter" required>
                </div>


                <button class="btn btn-outline-primary">
                    <a href="index.php">Back</a>
                </button>

                <button class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>



</body>

</html>