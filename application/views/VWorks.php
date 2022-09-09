<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css') ?>" />
    <title>Document</title>
  </head>

  <body>

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
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto">
              <a class="nav-link" style="color: black;" aria-current="page" href="<?php echo base_url('CHome/blog') ?>"
                ><h4>Blog</h4></a
              >
              <a class="nav-link active" style="color: #FF6464;" aria-current="page" href="<?php echo base_url('CHome/works') ?>"><h4>Works</h4></a>
              <a class="nav-link" style="color: black;" href="<?php echo base_url('CHome') ?>"><h4>Contact</h4></a>
            </div>
          </div>
        </div>
      </nav>

      <h1>Work</h1>
      <br />

      <div class="d-md-flex">
        <img src="<?php echo base_url('assets/img/Rectangle 30.png') ?>" class="img-fluid" alt="">
          <div class="mt-md-0 mt-4 ps-4 pe-4">
            <a href="<?php echo base_url('CHome/workdetail') ?>" style = "color: black; text-decoration: none;"><h4 class="">Designing Dashboard</h4></a>
              <div class="d-flex">
                <span class="badge rounded-pill text-bg-dark me-3 mt-3 mb-3">2020</span>
                <h7 class="text-muted mt-3 mb-3">Dashboard</h7>
              </div>
              <p class="me-5">
                Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet
                sint. Velit officia consequat duis enim vellit mollit. Exercitation
                veniam consequat sunt nostrud amet.
              </p>
          </div>
      </div>
      <br>
      <div class="border-bottom"></div> <br>

      <div class="d-md-flex">
        <img src="<?php echo base_url('assets/img/Rectangle 32.png') ?>" class="img-fluid" alt="">
          <div class="mt-md-0 mt-4 ps-4 pe-4">
            <h4 class="">Vibrant Potraits of 2020</h4>
              <div class="d-flex">
                <span class="badge rounded-pill text-bg-dark me-3 mt-3 mb-3">2018</span>
                <h7 class="text-muted mt-3 mb-3">Illustration</h7>
              </div>
              <p class="me-5">
                Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet
                sint. Velit officia consequat duis enim vellit mollit. Exercitation
                veniam consequat sunt nostrud amet.
              </p>
          </div>
      </div>
      <br>
      <div class="border-bottom"></div> <br>

      <div class="d-md-flex">
        <img src="<?php echo base_url('assets/img/Rectangle 34.png') ?>" class="img-fluid" alt="">
          <div class="mt-md-0 mt-4 px-4">
            <h4 class="me-3">36 Days of Malayalam type</h4>
              <div class="d-flex">
                <span class="badge rounded-pill text-bg-dark me-3 mt-3 mb-3">2018</span>
                <h7 class="text-muted mt-3 mb-3">Typography</h7>
              </div>
              <p class="me-5">
                Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet
                sint. Velit officia consequat duis enim vellit mollit. Exercitation
                veniam consequat sunt nostrud amet.
              </p>
          </div>
      </div>
      <br>
      <div class="border-bottom"></div> <br>

      <div class="d-md-flex">
        <img src="<?php echo base_url('assets/img/Rectangle 40.png') ?>" class="img-fluid" alt="">
          <div class="mt-md-0 mt-4 px-4">
            <h4 class="me-3">Components</h4>
              <div class="d-flex">
                <span class="badge rounded-pill text-bg-dark me-3 mt-3 mb-3">2018</span>
                <h7 class="text-muted mt-3 mb-3">Components, Dashboard</h7>
              </div>
              <p class="me-5">
                Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet
                sint. Velit officia consequat duis enim vellit mollit. Exercitation
                veniam consequat sunt nostrud amet.
              </p>
          </div>
      </div>
      <br>
      <div class="border-bottom"></div> <br>

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
    
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
      crossorigin="anonymous"
    ></script>
    <script src="https://kit.fontawesome.com/37b001f455.js" crossorigin="anonymous"></script>
  </body>
</html>