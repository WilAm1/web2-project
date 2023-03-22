<!DOCTYPE html>

<head>

    <title>Update </title>
</head>

<body>
    <h1>Update a Company</h1>
    <form action="updateProcess.php" method="post">
        <div>
            Name:
            <select name="name">
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
        <div>
            Year:
            <input type="number" name="year" required>
        </div>
        <div>
            Tagline:
            <input type="text" name="tagline" required>
        </div>
        <div>
            Branches:
            <input type="number" name="branches" required>
        </div>
        <div>
            Headquarter:
            <input type="text" name="headquarter" required>
        </div>


        <button>
            <a href="index.php">
                Back</a>
        </button>

        <button>Save</button>
    </form>



</body>

</html>