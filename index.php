<?php
session_start();
?>


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



  <!-- Project Scripts -->
  <script src="./js/searchScript.js"></script>
  <script src="./js/indexScript.js"></script>
  <script src="./js/cardSliderEffect.js"></script>
  <!-- Project Style Sheets -->
  <link rel="stylesheet" href="./css/style.css" />
  <title>Top Tech Companies in the Philippines</title>
</head>

<body>

  <!-- robot image -->
  <img class="position-fixed bottom-0 end-0" id="robot" src="./assets/robot.png" alt="" srcset="" />
  <!-- globe gif -->
  <div class="digital-world position-absolute start-0"></div>

  <nav class="navbar navbar-expand-lg border-bottom p-3 position-relative">
    <ul class="navbar-nav mb-2 mb-lg-0 text-white">
      <li class="nav-item">
        <a class="nav-link active " href="./index.php">Home</a>
        <div class="active-box"></div>
      </li>
      <li class="nav-item ">
        <a class="nav-link  " href="./create.php">Create</a>
        <div class="active-box"></div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./update.php">Update</a>
        <div class="active-box"></div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./delete.php">Delete</a>
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
  <main>
    <section class=" position-relative top-heading">
      <div class="view-list ms-auto ">
        <h1 class="text-white fw-bolder main-text">
          Top Tech Companies in the Philippines
        </h1>
        <p class="heading-text">
          Browse the company that suits you and pave the way for your professional success.</p>

        <div class="d-flex justify-content-center w-100 align-items-center">
          <a href="create.php" class="btn-create ">
            Add New Company
          </a>
          <a href="#top-tech" class="btn-grad ">
            View list
          </a>
        </div>
      </div>

    </section>

    <section class=" tech-list-section">
      <div class="container space-x">
        <h2 id="top-tech">Our Top Tech List</h2>
        <!-- cards -->
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

            <!-- Individual Card -->
            <div class="card-item">
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

              <!-- card Hovered -->
              <div class="card-hovered">
                <p class="company-name"><?= $name ?></p>
                <p class="year">Founded in <span class="year-value"><?= $year ?></span></p>
                <div class="detail-struct">

                  <div>
                    <div class="detail-box">
                      <p>Branches:</p>
                      <p><?= $branches ?></p>
                    </div>
                    <div class="detail-box ">
                      <p>Headquarter</p>
                      <p><?= $headquarter ?></p>
                    </div>
                  </div>
                  <div class="detail-box right-aligned ">
                    <p class=" ">Tagline:</p>
                    <p><?= $tagline ?></p>
                  </div>
                </div>
                <!-- Button for More Details -->
                <button data-company-name="<?= $name ?>" data-bs-toggle="modal" data-bs-target="#searchModal" class="card-btn btn">View Detail</button>
              </div>
            </div>
          <?php } ?>
        </div>
    </section>
  </main>

  <!-- Repeatable Code  -->
  <?php include('./php/searchModal.php') ?>
  <?php include('./php/loading.php') ?>
  <?php include("./php/toast.php") ?>
</body>

</html>