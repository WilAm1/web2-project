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


    <link rel="stylesheet" href="/css/style.css" />
    <!-- Project Scripts -->
    <script src="/js/searchScript.js"></script>
    <script src="/js/startEffects.js"></script>
    <script src="/js/updateFormValidation.js"></script>
    <script src="/js/updateScript.js"></script>
    <script src="/js/cardSliderEffect.js"></script>

    <title>Update Company</title>
</head>

<body>
    <!-- robot image -->
    <img class="position-absolute bottom-0 end-0" id="robot" src="/images/robot.png" alt="" srcset="" />
    <!-- globe gif -->
    <div class="digital-world position-absolute start-0"></div>



    <!-- Navigation Links -->
    <nav class="navbar navbar-expand-lg border-bottom p-3 position-relative">
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
        <!-- Search Bar -->
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
    <div class="container  heading-container">
        <h1 class="crud-heading text-accent text-left slide-up">
            Update Company Information
        </h1>
        <!-- Cards List -->
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
                <!-- Individual Draggable Card -->
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

    <!-- Droppable Modal -->

    <div class=" edit-company-content hidden">
        <div id="drop-company">
            <div class="centered">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="72" height="72" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                    <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                    <path d="M16 5l3 3" />
                </svg>
                <p> Drag Here to Edit Company</p>
            </div>
        </div>
    </div>
    <!-- end modal -->

    <!-- Edit Modal -->
    <div class="modal  fade company-detail-modal" id="theModal" tabindex="-1" aria-labelledby="theModalLabel" aria-hidden="true">
        <div class="modal-dialog">


            <div class="modal-content">
                <div class="modal-body" id="edit-modal">
                    <form id="updateForm" class="col needs-validation  container-md" action="/process/updateProcess.php" method="POST" autocomplete="off" enctype="multipart/form-data">

                        <input id="old-picture" type="hidden" name="old-picture" value="">
                        <div class="formContainer two-container fade-in ">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <h2 class=" mb-3 w-75 mx-auto crud-heading text-accent ">
                                Update Company
                            </h2>

                            <!-- picture -->
                            <div class="mb-3 w-75 mx-auto">
                                <label class="form-label fw-bold" for="picture">Company Logo</label>

                                <div class="file-drop-area">
                                    <div class="preview-img-box">
                                        <img class="preview-file-drop-picture" src="" alt="">
                                    </div>
                                    <span class="fake-btn">Choose files</span>
                                    <span class="file-msg">or drag and drop files here</span>
                                    <input class="file-input" id="picture" type="file" name="picture">

                                    <div class="invalid-feedback picture-feedback">
                                        Please pick an image file.
                                    </div>

                                </div>
                            </div>
                            <!-- company name in dropdown -->
                            <div class=" mb-5 w-75 mx-auto">
                                <label class="form-label label-text fw-bold" for="name">Company Name</label>
                                <select class="form-select" name="name" id="name" disabled>
                                    <option id="update-company-disabled" value="" selected></option>
                                </select>
                            </div>
                            <!-- year started -->
                            <div class="mb-3 w-75 mx-auto">
                                <label class="form-label fw-bold" for="yearStarted">Year Started:
                                </label>
                                <select class="form-select form-select-year" required name="year" id="yearStarted">
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
                            <div class="modal-footer">
                                <div class="flex-btn-end">
                                    <input class="btn btn-primary" id="submit" type="submit" value="Update Company" />
                                    <button type="button" class="btn btn-outline-back" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
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