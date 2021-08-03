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
          <?php
          for ($i = 0; $i < 7; $i++) {
          ?>
            <div class="item">
              <figure class="snip1208">
                <!-- <div id="news_image"></div> -->
                <img id="news_image<?= $i ?>" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sample66.jpg" />
                <div class="date"><span class="day">28</span><span class="month">Oct</span></div>
                <figcaption>
                  <h3 id="news_title<?= $i ?>">Title</h3>
                  <p id="news_description<?= $i ?>">
                    Description
                  </p>
                  <button>Read More</button>
                </figcaption><a href="#"></a>
              </figure>
            </div>
          <?php
          }
          ?>
        </div>
      </section>
      <button onclick="getnews()">Get News!!</button>
      <div id="output"></div>

    </section>

  </div>

  <script src="http://code.jquery.com/jquery.js"></script>
  <script src="owlcarousel/owl.carousel.js"></script>
  <script>
    $(document).ready(function() {
      $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        autoplay: false,
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