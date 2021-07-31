<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Almond Tofu</title>
  <link rel="stylesheet" href="index.css" />
  <link rel="stylesheet" href="owlcarousel/owl.carousel.css" />
  <link rel="stylesheet" href="owlcarousel/owl.theme.default.css" />
</head>

<body>
  <?php
  require_once("navigation_bar.html");
  ?>

  <div class="container">
    <section class="hero">
      <h1>Headline apapun yang panjang</h1>
      <label>Tagline</label>
      <div class="hero_btn">
        <a href="#" class="btn">See More</a>
      </div>
      <div class="hero_image">
        <img src="assets/family.png" />
      </div>
    </section>

    <section class="first whitebg">
      <h1>News & Tips</h1>
      <section class="news_carousel">
        <div class="owl-carousel owl-theme">
          <div class="item">
            <h4>1</h4>
          </div>
          <div class="item">
            <h4>2</h4>
          </div>
          <div class="item">
            <h4>3</h4>
          </div>
          <div class="item">
            <h4>4</h4>
          </div>
          <div class="item">
            <h4>5</h4>
          </div>
          <div class="item">
            <h4>6</h4>
          </div>
          <div class="item">
            <h4>7</h4>
          </div>
          <div class="item">
            <h4>8</h4>
          </div>
          <div class="item">
            <h4>9</h4>
          </div>
          <div class="item">
            <h4>10</h4>
          </div>
          <div class="item">
            <h4>11</h4>
          </div>
          <div class="item">
            <h4>12</h4>
          </div>
      </section>
    </section>

    <!-- <section class="card-goldar">
      <div class="message">
        &check; Made by <a href="https://codepen.io/pieter-biesemans/" target="_blank" title="&check; check out my other work">Pieter Biesemans</a> with &#9749;, &#128420; &amp; &#8986;</i>
      </div>

      <div class="card" data-tilt data-tilt-scale="0.95" data-tilt-startY="40">
        <div class="welcome">
          Welcome to
        </div>
        <div class="year">
          <span>Twenty</span>
          <span>Twenty</span>
          <span>One</span>
        </div>
      </div>
    </section> -->

  </div>

  <script src="http://code.jquery.com/jquery.js"></script>
  <script src="owlcarousel/owl.carousel.js"></script>
  <script>
    $(document).ready(function() {
      $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 3
          },
          1000: {
            items: 5
          }
        }
      })
    });
  </script>
</body>

</html>