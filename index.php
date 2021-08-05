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
  <link rel="stylesheet" href="card/card_news.css">
</head>

<body onload="getnews(12)">
  <?php
  session_start();
  if (empty($_SESSION['username'])) {
    require_once("navigation_bar.html");
  } else {
    require_once("navigation_bar_after.html");
  }
  ?>

  <div class="container">
    <section class="hero">
      <h1><b>Almond Tofu Website</b></h1>
      <label><i>Our website always update the latest health news</i></label>
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
          <?php
          for ($i = 0; $i < 12; $i++) {
          ?>
            <div class="item">
              <figure class="snip1208">
                <img id="news_image<?= $i ?>" />
                <div class="date"><span id="news_day<?= $i ?>" class="day">01</span><span id="news_month<?= $i ?>" class="month">JAN</span></div>
                <figcaption>
                  <h3 id="news_title<?= $i ?>">Title <?= $i ?></h3>
                  <p id="news_description<?= $i ?>">Description</p>
                  <button>Read More</button>
                </figcaption><a id="news_url<?= $i ?>" href="#" target="_blank"></a>
              </figure>
            </div>
          <?php
          }
          ?>
        </div>
      </section>
      <div id="output"></div>
    </section>

  </div>

  <script src="http://code.jquery.com/jquery.js"></script>
  <script src="owlcarousel/owl.carousel.js"></script>
  <script>
    $(document).ready(function() {
      $('.owl-carousel').owlCarousel({
        loop: false,
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
            items: 2
          },
          1000: {
            items: 3
          }
        }
      })
    });
  </script>
  <script src="news_api/api.js"></script>
</body>

</html>