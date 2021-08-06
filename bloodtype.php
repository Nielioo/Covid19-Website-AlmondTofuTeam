<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="navigation_bar.css">
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
            </div>
        </section>
    </div>
</body>

</html>