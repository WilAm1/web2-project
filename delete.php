<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Corinthia&family=Dancing+Script:wght@500&family=Exo+2:wght@700&family=Fasthand&family=Freehand&family=Montserrat:ital,wght@0,400;0,700;1,400;1,600;1,700;1,800&family=Poppins:ital,wght@0,400;0,700;1,400&family=Roboto:wght@300;400;500&family=Source+Sans+Pro:ital@1&display=swap" rel="stylesheet" />
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- fontawesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--  JQuery and JQueryUI  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>

    <!-- own jquery -->

    <link rel="stylesheet" href="./css/style.css" />
    <script src="./js/deleteScript.js"></script>
    <script src="./js/cardSliderEffect.js"></script>

    <script src="./js/searchScript.js"></script>
    <title>Delete Company</title>
</head>

<body>
    <!-- robot image -->
    <img class="position-absolute bottom-0 end-0" id="robot" src="images/robot.png" alt="" srcset="" />
    <!-- globe gif -->
    <div class="digital-world position-absolute start-0"></div>



    <nav class="navbar navbar-expand-lg border-bottom p-3 position-relative">
        <!-- <div class="collapse navbar-collapse" id="navbarText"> -->
        <ul class="navbar-nav mb-2 mb-lg-0 text-white">
            <li class="nav-item">
                <a class="nav-link" href="./index.php">Home</a>
                <div class="active-box"></div>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="./create.php">Create</a>
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
            <form id="search-form" class="search-form position-relative w-100" method="GET" autocomplete="off">
                <div class="input-group m-2">
                    <i class="fa fa-search icon"></i>
                    <input placeholder="Search" aria-label="Search" class="form-control" placeholder="Search Company" type="search" id="search" name="q">
                    <div id="autocomplete-list"></div>
                </div>

            </form>
        </div>
    </nav>
    <div class="container heading-container">

        <div class="container mt-5">
            <h1 class="crud-heading text-accent text-left">
                Delete a Company
            </h1>
            <div class="cards">

                <?php
                $xml = new DOMDocument("1.0");
                $xml->load("./BSIT3EG1G4.xml");
                $companies = $xml->getElementsByTagName("techCompany");
                $count = 0;
                foreach ($companies as $company) {
                    $name = $company->getElementsByTagName("companyName")->item(0)->nodeValue;
                    $year = $company->getElementsByTagName("yearStart")->item(0)->nodeValue;
                    $tagline = $company->getElementsByTagName("tagline")->item(0)->nodeValue;
                    $branches = $company->getElementsByTagName("totalBranch")->item(0)->nodeValue;
                    $headquarter = $company->getElementsByTagName("headquarter")->item(0)->nodeValue;
                    $picture = $company->getElementsByTagName("picture")->item(0)->nodeValue;
                    $count++;

                ?>
                    <div class="draggable-card card-item" data-animation-delay=" <?= $count ?>" data-company-name=" <?= $name ?>">
                        <div class="grip-box">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-grip-horizontal" width="36" height="36" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M5 9m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                <path d="M5 15m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                <path d="M12 9m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                <path d="M12 15m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                <path d="M19 9m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                <path d="M19 15m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                            </svg>
                        </div>
                        <!-- card shown -->
                        <div class="card-showed">
                            <div class="card-image">
                                <img src="data:image;base64,<?= $picture ?>" alt="">
                            </div>
                            <div class="card-content">
                                <p class="company-name">
                                    <?= $name ?>
                                </p>

                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>

        </div>

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



    <!-- Droppable Modal -->

    <div class=" edit-company-content hidden">
        <div id="drop-company">
            <div class="centered">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="72" height="72" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M4 7l16 0" />
                    <path d="M10 11l0 6" />
                    <path d="M14 11l0 6" />
                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                </svg>
                <p>Drag Here to Delete Company</p>
            </div>
        </div>
    </div>
    <!-- end modal -->







    <!-- Delete Modal -->
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
                    <form action="/process/deleteProcess.php" method="post">
                        <input id="deleteCompanyInput" type="hidden" name="name" value="<?= $name ?>">

                        <button type="submit" class="btn btn-danger">Confirm Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- end modal -->

    <!-- Repeatable Code -->
    <?php include('./php/searchModal.php') ?>
    <?php include('./php/loading.php') ?>
    <?php include("./php/toast.php") ?>


</body>

</html>