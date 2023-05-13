<?php
session_start();
?>


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

  <!-- typed js -->
  <script src="https://unpkg.com/typed.js@2.0.16/dist/typed.umd.js"></script>

  <!--  JQuery and JQueryUI  -->
  <script src="assets/jquery-3.6.4.min.js"></script>
  <script src="assets/jquery-ui/jquery-ui.min.js"></script>
  <script src="./typing-script.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

  <!-- Own Script -->

  <script src="./assets/js/searchScript.js"></script>
  <script src="./assets/js/indexScript.js"></script>
  <script src="./assets/js/cardSliderEffect.js"></script>

  <link rel="stylesheet" href="style.css" />
  <title>Top Tech Companies</title>
</head>

<body>


  <!-- robot image -->
  <img class="position-fixed bottom-0 end-0" id="robot" src="/assets/robot.png" alt="" srcset="" />
  <!-- globe gif -->
  <div class="digital-world position-absolute start-0"></div>




  <nav class="navbar navbar-expand-lg border-bottom p-3 position-relative">
    <!-- <div class="collapse navbar-collapse" id="navbarText"> -->
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
          Identify here the company that suits you and pave the way for your professional success.</p>

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

    <!-- Individual Cards -->
    <section class=" tech-list-section">
      <div class="container space-x">
        <h2 id="top-tech">Our Top Tech List</h2>
        <!-- card -->
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
            <div class="card-item" data-animation-delay=" <?= $count ?>" style="--animation-delay: <?= $count ?>">
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
                <button data-company-name="<?= $name ?>" data-bs-toggle="modal" data-bs-target="#searchModal" class="card-btn btn">View Detail</button>
              </div>
            </div>
          <?php } ?>
        </div>
    </section>
  </main>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!-- typing script -->
  <!-- <script src="./assets/js/typing.js"></script> -->





  <!-- Search Modal -->
  <div class="modal fade company-detail-modal" id="searchModal" tabindex="-1" aria-labelledby="theModalLabel" aria-hidden="true">
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