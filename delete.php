<!DOCTYPE html>

<head>

    <title>Delete </title>
</head>

<body>
    <h1>Delete a Company</h1>
    <form action="/deleteProcess.php" method="post">
        <div>
            <label for="name">
                Name of Company:
                <select name="name" id="name">
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
            </label>
        </div>
        <button>
            <a href="index.php">Back</a>
        </button>

        <button>Delete</button>
    </form>



</body>

</html>