<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="bloodtype.css">
</head>

<body>
    <?php
    session_start();
    if (empty($_SESSION['username'])) {
        require_once("navigation_bar.html");
    } else {
        require_once("navigation_bar_after.html");
    }

    require_once("donor_controller.php");

    $bloodtype_list = getGolDarahList();
    ?>

    <div class="container">
        <section class="hero">
            <h1>Blood Type</h1>
            <!-- <label>Choose one</label> -->
        </section>

        <section class="bloodtype">
            <div class="card_container">
                <?php
                for ($i = 0; $i < sizeof($bloodtype_list); $i += 2) {
                    $bloodtype = explode("+", $bloodtype_list[$i])[0];
                ?>
                    <div class="card">
                        <a href="hospital.php?bloodtype=<?= $bloodtype ?>" class="card_title"><?= $bloodtype ?></a>
                        <div class="card_choice">
                            <a href="hospital.php?bloodtype=<?= $i ?>" class="half"><?= $bloodtype_list[$i] ?></a>
                            <a href="hospital.php?bloodtype=<?= $i + 1 ?>" class="half no-border"><?= $bloodtype_list[$i + 1] ?></a>
                        </div>
                    </div>
                <?php
                }
                ?>

                <!-- <div class="card">
                    <a href="#" class="card_title">A</a>
                    <div class="card_choice">
                        <a href="hospital.php?bloodtype=A+" class="half">A+</a>
                        <a href="#" class="half no-border">A-</a>
                    </div>
                </div>

                <div class="card">
                    <a href="#" class="card_title">B</a>
                    <div class="card_choice">
                        <a href="#" class="half">B+</a>
                        <a href="#" class="half no-border">B-</a>
                    </div>
                </div>

                <div class="card">
                    <a href="#" class="card_title">O</a>
                    <div class="card_choice">
                        <a href="#" class="half">O+</a>
                        <a href="#" class="half no-border">O-</a>
                    </div>
                </div>

                <div class="card">
                    <a href="#" class="card_title">AB</a>
                    <div class="card_choice">
                        <a href="#" class="half">AB+</a>
                        <a href="#" class="half no-border">AB-</a>
                    </div>
                </div> -->
            </div>
        </section>
    </div>
</body>

</html>