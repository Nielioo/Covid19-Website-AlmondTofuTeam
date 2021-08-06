<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="formdonor.css">
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


    $golongan_darah_list = getGolDarahList();
    ?>
    <div id="bloodtype_container">
        <section class="hero">
            <h1><b>Donor Form</b></h1>
            <label><i>Our website always update the latest health news</i></label>
        </section>

        <section class="donor_form">
            <form class="form" action="formdonor.php" method="post">
                <span class="custom-dropdown">
                    <select name="rumah_sakit" id="rumah_sakit" required>
                        <option value="" disabled selected>Pilih Rumah Sakit</option>

                        <?php
                        $rumah_sakit_list = getRumahSakitList();

                        foreach ($rumah_sakit_list as $rumah_sakit) {
                        ?>
                            <option value="<?= $rumah_sakit ?>"><?= $rumah_sakit ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </span>

                <span class="custom-dropdown">
                    <select name="golongan_darah" id="golongan_darah" required>
                        <option value="" disabled selected>Pilih Golongan Darah</option>

                        <?php
                        $golongan_darah_list = getGolDarahList();

                        foreach ($golongan_darah_list as $golongan_darah) {
                        ?>
                            <option value="<?= $golongan_darah ?>"><?= $golongan_darah ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </span>

                <input type="submit" name="submit" value="SUBMIT" class="submit">
            </form>
        </section>
    </div>

        <?php
        require_once("footer.html");
        ?>

        <?php
        if (isset($_POST['submit'])) {
            $rs = $_POST['rumah_sakit'];
            $gol_darah = $_POST['golongan_darah'];

            createDonor($rs, $gol_darah);
            // header("location: index.php");
        }
        ?>
</body>

</html>