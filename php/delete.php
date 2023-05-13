<?php session_start() ?>
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
    <!-- font awesome icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- bootstrap  -->
    <script src="/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css" />
    <!--  JQuery and JQueryUI  -->
    <script src="assets/jquery-3.6.4.min.js"></script>
    <script src="assets/jquery-ui/jquery-ui.min.js"></script>
    <link href="assets/jquery-ui.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="style.css" />
    <!-- own jquery -->

    <script src="assets/js/deleteScript.js"></script>
    <script src="assets/js/cardSliderEffect.js"></script>

    <script src="./assets/js/searchScript.js"></script>
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
        <h1 class="crud-heading text-accent text-left slide-up">
            Delete Company
        </h1>
        <div class="container mt-5">
            <h1 class="crud-heading text-accent text-left slide-up" style="display: block;">
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
    <!-- Modal -->

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


    <!-- Search Modal -->
    <div class="modal fade company-detail-modal" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content company-modal">
                <div class="modal-header">

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="logo-box"><img class="modal-picture" src="" alt=""></div>

                    <p class="modal-name"></p>

                    <div class="modal-headquarter-box">
                        <p class="">Headquarter at <span class="modal-headquarter"></span></p>
                    </div>


                    <div class="cards-row">
                        <div class="modal-card">
                            <div class="modal-card-content w-100 h-100">
                                <p class="modal-year"></p>
                                <p class="modal-card-label">Year Started</p>
                            </div>
                        </div>
                        <div class="modal-card">
                            <div class="modal-card-content w-100 h-100">
                                <p class="modal-branches"></p>
                                <p class="modal-card-label">Branches</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-card card-xl">
                        <div class="modal-card-content w-100 h-auto">
                            <p class="modal-quotemark">“</p>
                            <p class="modal-tagline"></p>
                            <p class="modal-card-label">Tagline</p>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-back" data-bs-dismiss="modal">Close</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- end modal -->




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


    <?php include('./loading.php') ?>

    <?php if (isset($_SESSION['message']) && isset($_SESSION['message_body'])) : ?>
        <div id="liveToast" class="toast showing position-fixed top-0 end-0 p-3" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <div class="rounded me-2"></div>
                <strong class="me-auto"><?= $_SESSION['message'] ?></strong>
                <button id="toast-close" type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <?= $_SESSION['message_body'] ?>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                const toast = new bootstrap.Toast($('#liveToast').get(0))
                toast.show()
            });
        </script>
    <?php session_unset();
    endif; ?>
</body>

</html>