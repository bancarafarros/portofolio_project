<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/244c1245b5.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.google.com/specimen/Big+Shoulders+Display">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style3.css') ?>">
    <title>Works Detail</title>
</head>

<body>
  <!-- Navbar -->
  <div class="container-fluid ps-5">
  <nav class="navbar navbar-expand-lg bg-light ms-5">
    <br><br>
    <div class="container">
      <button
        class="navbar-toggler ms-5 border-0"
        type="button"
        style="position: absolute; right: 0;"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup"
        aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ms-auto">
          <a class="nav-link" aria-current="page" style="color: black;" href="<?php echo base_url('CDashboard/blog') ?>"><h4>Blog</h4></a>
          <a class="nav-link active" style="color: #FF6464;" aria-current="page" href="<?php echo base_url('CDashboard/works') ?>"><h4>Works</h4></a>
          <a class="nav-link" style="color: black;" href="<?php echo base_url('CDashboard') ?>"><h4>Contact</h4></a>
        </div>
      </div>
    </div>
  </nav>
</div>

      <!-- Portofolio -->
      <section class="section site-Portofolio">
        <div class="container p-5 me-5">
                <h2><div class="fw-bold-md"> Designing Dashboards with usability in mind</div></h2><br>
                    <span class="badge rounded-pill" style="background-color:#FF7C7C">2020</span>
                        <span class="m-3" style="font-size: 20px"> Dashboard, User Experience Design</span>
                        <br>
                        <br>
                    <div class="float-start">Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia
                        consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.</div>
                            <img class="img-fluid" src="<?php echo base_url('assets/img/1.png') ?>" alt="">
                <div class="h1">
                        <h1>Heading 1</h1>
                </div>
                <div class="h2">
                        <h2>Heading 2</h2>
                </div>
                <div class="">Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia
                    consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.</div>
                    <img class="img-fluid" src="<?php echo base_url('assets/img/2.png') ?>" alt="">
                    <img class="img-fluid" src="<?php echo base_url('assets/img/3.png') ?>" alt="">
                </section>
                <footer class="container mt-5 py-5 text-center">
                    <div class="d-flex gap-4 justify-content-center">
                    <img class="img-fluid" src="<?php echo base_url('assets/img/fb.png') ?>" alt="Facebook" />
                    <img class="img-fluid" src="<?php echo base_url('assets/img/insta.png') ?>" alt="Instagram" />
                    <img class="img-fluid" src="<?php echo base_url('assets/img/twt.png') ?>" alt="Twitter" />
                    <img class="img-fluid" src="<?php echo base_url('assets/img/link.png') ?>" alt="Linkeldn" />
                    </div>
                    <br>
                        <p>Copyright ©2020 All rights reserved </p>
                    </footer>
                  </div>
            
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>