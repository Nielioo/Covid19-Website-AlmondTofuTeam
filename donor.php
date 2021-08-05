<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="donor.css">
</head>

<body>
    <?php
    require_once("navigation_bar.html");
    ?>

    <div class="container">
        <section class="hero">
            <h1>Headline apapun yang panjang</h1>
            <label>Tagline</label>
        </section>

        <section class="bloodtype">
            <div class="card_container">
                <div class="card">
                    <div class="card_title">A</div>
                    <div class="card_choice">
                        <div class="half">A+</div>
                        <div class="half no-border">A-</div>
                    </div>
                </div>

                <div class="card">
                    <div class="card_title">B</div>
                    <div class="card_choice">
                        <div class="half">B+</div>
                        <div class="half no-border">B-</div>
                    </div>
                </div>

                <div class="card">
                    <div class="card_title">O</div>
                    <div class="card_choice">
                        <div class="half">O+</div>
                        <div class="half no-border">O-</div>
                    </div>
                </div>

                <div class="card">
                    <div class="card_title">AB</div>
                    <div class="card_choice">
                        <div class="half">AB+</div>
                        <div class="half no-border">AB-</div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>