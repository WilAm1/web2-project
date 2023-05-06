<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Corinthia&family=Dancing+Script:wght@500&family=Exo+2:wght@700&family=Fasthand&family=Freehand&family=Montserrat:ital,wght@0,400;0,700;1,400;1,600;1,700;1,800&family=Poppins:ital,wght@0,400;0,700;1,400&family=Roboto:wght@300;400;500&family=Source+Sans+Pro:ital@1&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

    <!-- bootstrap  -->
    <script src="/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css" />
    <!--  JQuery and JQueryUI  -->
    <script src="assets/jquery-3.6.4.min.js"></script>
    <script src="assets/jquery-ui/jquery-ui.min.js"></script>
    <link href="assets/jquery-ui.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="style.css" />
    <!-- own jquery -->
    <script src="./assets/js/createScript.js"></script>
    <title>Delete Company</title>
</head>

<body>
    <!-- robot image -->
    <img class="position-absolute bottom-0 end-0" id="robot" src="/assets/robot.png" alt="" srcset="" />
    <!-- globe gif -->
    <div class="digital-world position-absolute start-0"></div>

    <script>
        $(document).ready(function() {
            $(".active+.active-box").css("visibility", "visible");
        });
    </script>

    <nav class="navbar navbar-expand-lg border-bottom p-3 position-relative">
        <!-- <div class="collapse navbar-collapse" id="navbarText"> -->
        <ul class="navbar-nav mb-2 mb-lg-0 text-white">
            <li class="nav-item">
                <a class="nav-link" href="./index.php">Home</a>
                <div class="active-box"></div>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="./create.html">Create</a>
                <div class="active-box"></div>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="./update.php">Update</a>
                <div class="active-box"></div>
            </li>
            <li class="nav-item">
                <a class="nav-link  active " href="./delete.php">Delete</a>
                <div class="active-box"></div>
            </li>
        </ul>
        <div class="relative-right">
            <form class="position-relative w-100" role="search">
                <input class="form-control bg-transparent d-inline text-white-50" type="search" placeholder="Search" aria-label="Search" />
                <img class="search position-absolute end-0" src="/assets/search.png" />
            </form>
        </div>
        <!-- </div> -->
    </nav>
    <div class="container mt-5">
        <h1 class="crud-heading text-accent text-left slide-up">
            Delete Company
        </h1>
        <div class="formContainer fade-in">
            <!-- company names in dropdown -->
            <div class="mb-2 w-75  mx-auto">
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
                <a class=" btn btn-outline-back m-2 text-decoration-none " href="index.php">Back</a>

                <button class="btn btn-danger m-2" data-bs-toggle="modal" data-bs-target="#theModal">Delete Company</button>
            </div>

        </div>


    </div>
    <!-- Modal -->
    <div class="modal fade" id="theModal" tabindex="-1" aria-labelledby="theModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title fs-5" id="theModalLabel">Delete Company</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Deleting a company will cannot be undone. Do you really want to proceed? </p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-back" data-bs-dismiss="modal">Close</button>
                    <form action="/deleteProcess.php" method="post">
                        <input id="deleteCompanyInput" type="hidden" name="name" value="<?= $name ?>">

                        <button type="submit" class="btn btn-danger">Confirm Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- end modal -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>