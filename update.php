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

    <script src="./assets/js/startEffects.js"></script>
    <script src="./assets/js/formValidation.js"></script>
    <script src="./assets/js/updateScript.js"></script>
    <script src="./assets/js/cardSliderEffect.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Update Company</title>
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
                <a class="nav-link active" href="./update.php">Update</a>
                <div class="active-box"></div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./delete.php">Delete</a>
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
            Update Company Information
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
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-grip-vertical" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M9 5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                            <path d="M9 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                            <path d="M9 19m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                            <path d="M15 5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                            <path d="M15 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                            <path d="M15 19m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
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

    <!-- Modal -->

    <div class=" edit-company-content hidden">
        <div id="drop-company">
            Edit Company
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="72" height="72" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M4 7l16 0" />
                <path d="M10 11l0 6" />
                <path d="M14 11l0 6" />
                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
            </svg>
        </div>
    </div>
    <!-- end modal -->

    <!-- Modal -->
    <div class="modal  fade company-detail-modal" id="theModal" tabindex="-1" aria-labelledby="theModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content company-modal">
                <div class="modal-header">

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form class="col needs-validation  container-md " action="updateProcess.php " method="POST" autocomplete="off" enctype="multipart/form-data">
                        <div class="formContainer two-container fade-in ">
                            <!-- picture -->
                            <div class="mb-3 w-75 mx-auto">
                                <label class="form-label fw-bold" for="picture">Company Logo</label>
                                <div class="file-drop-area">
                                    <span class="fake-btn">Choose files</span>
                                    <span class="file-msg">or drag and drop files here</span>
                                    <input class="file-input" id="picture" type="file" name="picture" required>
                                    <div class="invalid-feedback picture-feedback">
                                        Please pick an image file.
                                    </div>

                                </div>
                            </div>
                            <!-- company name -->
                            <!-- company name in dropdown -->
                            <div class=" mb-5 w-75 mx-auto">
                                <label class="form-label fw-bold label-text fw-bold" for="name">Name</label>
                                <select class="form-select" name="name" id="name" disabled>
                                    <option id="update-company-disabled" value=""></option>
                                    <?php

                                    $xml = new DOMDocument("1.0");
                                    $xml->load("BSIT3EG1G4.xml");
                                    $companies = $xml->getElementsByTagName("techCompany");

                                    foreach ($companies as $company) {
                                        $name = $company->getElementsByTagName("companyName")->item(0)->nodeValue;
                                        $year = $company->getElementsByTagName("yearStart")->item(0)->nodeValue;
                                        $tagline = $company->getElementsByTagName("tagline")->item(0)->nodeValue;
                                        $branches = $company->getElementsByTagName("totalBranch")->item(0)->nodeValue;
                                        $headquarter = $company->getElementsByTagName("headquarter")->item(0)->nodeValue;


                                        echo "<option value='$name' > $name</option>";
                                    }
                                    ?>

                                </select>
                            </div>
                            <!-- year started -->
                            <div class="mb-3 w-75 mx-auto">
                                <label class="form-label fw-bold" for="yearStarted">Year Started:
                                </label>
                                <select class="form-select" required name="year" id="yearStarted">
                                    <option value="" disabled selected>Select Year</option>
                                </select>
                            </div>
                            <!-- tagline -->
                            <div class="mb-3 w-75 mx-auto">
                                <label class="form-label fw-bold" for="tagLine">Tagline:</label>
                                <input class="form-control" id="tagLine" type="text" name="tagline" placeholder="ex: We stay connected even offline" required />
                                <div class="invalid-feedback">
                                    Please provide a tagline.
                                </div>
                            </div>
                            <!-- total branch -->
                            <div class="mb-3 w-75 mx-auto">
                                <label class="form-label fw-bold" for="branches">Total Branch:</label>
                                <input class="form-control" id="branches" type="number" name="branches" placeholder="ex: 106" required />
                                <div class="invalid-feedback">
                                    Please provide valid number of branches.
                                </div>
                            </div>
                            <!-- total headquarter -->
                            <div class="mb-3 w-75 mx-auto">
                                <label class="form-label fw-bold" for="headquarter">Headquarter:</label>
                                <input class="form-control" id="headquarter" type="text" name="headquarter" placeholder="ex: Makati" required />
                                <div class="invalid-feedback">
                                    Please provide a valid headquarter
                                </div>
                            </div>
                            <div class="flex-btn-end">
                                <a class="btn btn-outline-back" href="index.php">Back</a>
                                <input disabled class="btn btn-secondary" id="submit" type="submit" value="Save Company" />
                            </div>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-back" data-bs-dismiss="modal">Close</button>
                    <form action="/deleteProcess.php" method="post">
                        <input id="deleteCompanyInput" type="hidden" name="name" value="<?= $name ?>">

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- end modal -->



    <?php include('./loading.php') ?>
</body>

</html>