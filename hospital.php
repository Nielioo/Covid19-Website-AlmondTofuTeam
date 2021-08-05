<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="hospital.css">
    <link rel="stylesheet" href="card/card_hospital.css">
</head>

<body onload="getHospital()">
    <?php
    
    session_start();
    if (empty($_SESSION['username'])) {
      require_once("navigation_bar.html");
    } else {
      require_once("navigation_bar_after.html");
    }

    require_once("donor_controller.php");

    $rumah_sakit_data = readAllRumahSakit();
    ?>

    <div class="container">
        <section class="hero">
            <h1>A</h1>
            <label>Tagline</label>
            <div class="hero_btn">
                <a href="#" class="btn">A+</a>
                <a href="#" class="btn">A-</a>
            </div>

            <div class="search">
                <form onsubmit="event.preventDefault();" role="search">
                    <label for="search">Search for stuff</label>
                    <input id="search" type="search" placeholder="Search..." autofocus required />
                    <button type="submit">Go</button>
                </form>
            </div>
        </section>

        <section class="hospital">
            <div class="main-content">
                <div class="card">
                    <h3 id="output">test</h3>
                    <div class="line"></div>
                    <p>
                        Contrary to popular belief, Lorem Ipsum is not simply random text.
                        It has roots in a piece of classical Latin
                    </p>
                </div>
                <?php
                for ($i = 0; $i < sizeof($rumah_sakit_data); $i++) {
                ?>
                    <div class="card">
                        <h3><?= $rumah_sakit_data[$i]['nama'] ?></h3>
                        <div class="line"></div>
                        <p>
                            Contrary to popular belief, Lorem Ipsum is not simply random text.
                            It has roots in a piece of classical Latin
                        </p>
                    </div>
                <?php
                }
                ?>
            </div>
        </section>
    </div>
    <script src="hospital_api/hospital_api.js"></script>
</body>

</html>