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

  <!-- typed js -->
  <script src="https://unpkg.com/typed.js@2.0.16/dist/typed.umd.js"></script>

  <!--  JQuery and JQueryUI  -->
  <script src="assets/jquery-3.6.4.min.js"></script>
  <script src="assets/jquery-ui/jquery-ui.min.js"></script>
  <script src="./typing-script.js"></script>

  <link rel="stylesheet" href="style.css" />
  <title>Top Tech Companies</title>
</head>

<body>
  <!-- robot image -->
  <img class="position-absolute bottom-0 end-0" id="robot" src="/assets/robot.png" alt="" srcset="" />
  <!-- globe gif -->
  <div class="digital-world position-absolute start-0"></div>


  <script>
    $(document).ready(function() {
      $('.active+.active-box').css('visibility', 'visible')
    })
  </script>

  <nav class="navbar navbar-expand-lg border-bottom p-3 position-relative">
    <!-- <div class="collapse navbar-collapse" id="navbarText"> -->
    <ul class="navbar-nav mb-2 mb-lg-0 text-white">
      <li class="nav-item">
        <a class="nav-link active " href="">Home</a>
        <div class="active-box"></div>
      </li>
      <li class="nav-item ">
        <a class="nav-link  " href="">Create</a>
        <div class="active-box"></div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="">Update</a>
        <div class="active-box"></div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="">Delete</a>
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
  <main>
    <section class=" position-relative top-heading">
      <div class="view-list ms-auto text-end">
        <h1 class="text-white fw-bolder main-text">
          Top Tech Companies in the Philippines
        </h1>
        <button class="cta-btn py-3 px-xl-5 bg-transparent">
          View list
        </button>
      </div>
      <div class="subheading">
        <p>Find the job that suits you</p>
        <q>Technology is best when it brings people together.</q>
      </div>
    </section>

    <!-- Individual Cards -->
    <section class=" tech-list-section">
      <div class="container space-x">
        <h2>Our Top Tech List</h2>
        <!-- card -->
        <div class="cards">
          <?php
          $xml = new DOMDocument("1.0");
          $xml->load("./BSIT3EG1G4.xml");
          $companies = $xml->getElementsByTagName("techCompany");
          foreach ($companies as $company) {
            $name = $company->getElementsByTagName("companyName")->item(0)->nodeValue;
            $year = $company->getElementsByTagName("yearStart")->item(0)->nodeValue;
            $tagline = $company->getElementsByTagName("tagline")->item(0)->nodeValue;
            $branches = $company->getElementsByTagName("totalBranch")->item(0)->nodeValue;
            $headquarter = $company->getElementsByTagName("headquarter")->item(0)->nodeValue;
          ?>
            <div class="card-item">
              <div class="card-image">
                <img src="./assets/smart-logo.jpg" alt="">
              </div>
              <div class="card-body">
                <div class="left-card-body">
                  <p class="year-text">Founded in</p>
                  <div class="founded-year"><?= $year ?> </div>
                </div>
                <div class="right-card-body">
                  <p class="company-name">
                    <?= $name ?>
                  </p>
                  <q class="quote">
                    <?= $tagline ?>
                  </q>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>

    </section>
  </main>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!-- typing script -->
  <!-- <script src="./assets/js/typing.js"></script> -->


  <!-- <script>
    $(document).ready(function() {
      $('.cards').sortable();
      $('.card').sortable({
        grid: [3, 4]
      });

      $('.cards').disableSelection();

    })
  </script> -->


</body>

</html>