<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="BSIT3EG1G4.css" />
    <title>Delete </title>
</head>

<body class="bg-secondary">

    <div class="container text-center">
        <h1 class="text-light">Delete a Company</h1>
        <form action="/htdocs/deleteProcess.php" method="post">
            <div class="formContainer">
                <!-- company names in dropdown -->
                <div class="input-group mx-auto">
                    <label class="input-group-text fw-bold text-primary" for="name">Name of Company:</label>
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

                    <button class="btn btn-danger m-2">Delete</button>
                </div>
                
            </div>
            
        </form>

    </div>
    



</body>

</html>
