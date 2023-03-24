<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="BSIT3EG1G4.css" />
    <title>Update </title>
</head>

<body class="bg-secondary">
    <div class="container text-center">
        <h1 class="text-light">Update a Company</h1>
        <form action="updateProcess.php" method="post">

            <div class="formContainer">

                <!-- company name in dropdown -->
                <div  class="input-group mb-2 w-75 mx-auto">
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
