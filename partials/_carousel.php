<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
    <style>
      .carousel_h5 {
          font-size: 50px;
          text-shadow: 2px 2px 5px gray;
          letter-spacing: 3px;
          font-family: sans-serif;
      }

      .carousel_p {
          text-shadow: 2px 2px 5px gray;
      }

      .carousel_img {
          opacity: 0.9;
          height: 400px;
          width:100%;

      }
    </style>
</head>

<body>
    <?php

    echo '<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="partials/images/1.jpeg" class="carousel_img d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
            <h5 class="carousel_h5">Code,Discuss and Learn</h5>
            <p class="carousel_p">Some representative placeholder content for the first slide.</p>
          </div>
      </div>
      <div class="carousel-item">
        <img src="partials/images/2.jpeg" class="carousel_img d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
            <h5 class="carousel_h5">Code,Discuss and Learn</h5>
            <p class="carousel_p">Some representative placeholder content for the second slide.</p>
          </div>
      </div>
      <div class="carousel-item">
        <img src="partials/images/3.jpeg" class="carousel_img d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
        <h5 class="carousel_h5">Code,Discuss and Learn</h5>
        <p class="carousel_p">Some representative placeholder content for the third slide.</p>
      </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
    </div>';
?>
</body>

</html>