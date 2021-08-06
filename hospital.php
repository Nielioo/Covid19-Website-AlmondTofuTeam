<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="navigation_bar.css">
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
    $bloodtype = $_GET['bloodtype'];

    if (is_numeric($bloodtype)) {
        $bloodtype_id = $_GET['bloodtype'] + 1;
        $bloodtype = readGolDarahByID($bloodtype_id);
        if ($bloodtype_id % 2 !== 0) {
            $bloodtype_plus = $bloodtype;
            $bloodtype_negative = readGolDarahByID($bloodtype_id + 1);
        } else {
            $bloodtype_plus = readGolDarahByID($bloodtype_id - 1);
            $bloodtype_negative = $bloodtype;
        }
    } else {
        $bloodtype .= '+';
        $bloodtype_id = getGolDarahID($bloodtype);
        $bloodtype_plus = readGolDarahByID($bloodtype_id);
        $bloodtype_negative = readGolDarahByID($bloodtype_id + 1);
    }

    if (isset($_GET['submit'])) {
        $search = $_GET['name'];
    }
    ?>

    <div class="container">
        <section class="hero">
            <h1><?= $bloodtype ?></h1>
            <div class="hero_btn">
                <a href="hospital.php?bloodtype=<?= getGolDarahID($bloodtype_plus) - 1 ?>" class="btn"><?= $bloodtype_plus ?></a>
                <a href="hospital.php?bloodtype=<?= getGolDarahID($bloodtype_negative) - 1 ?>" class="btn"><?= $bloodtype_negative ?></a>
            </div>

            <div class="search-box">
                <form class="search-form" method="GET">
                    <input type="search" name="name" value="" placeholder="Search" class="search-input" />
                    <input type="hidden" name="bloodtype" value="<?= $bloodtype_id ?>" />
                    <button type="submit" name="submit" class="search-button">
                        <svg class="submit-button">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#search"></use>
                        </svg>
                    </button>
                </form>

                <svg xmlns="http://www.w3.org/2000/svg" width="0" height="0" display="none">
                    <symbol id="search" viewBox="0 0 32 32">
                        <path d="M 19.5 3 C 14.26514 3 10 7.2651394 10 12.5 C 10 14.749977 10.810825 16.807458 12.125 18.4375 L 3.28125 27.28125 L 4.71875 28.71875 L 13.5625 19.875 C 15.192542 21.189175 17.250023 22 19.5 22 C 24.73486 22 29 17.73486 29 12.5 C 29 7.2651394 24.73486 3 19.5 3 z M 19.5 5 C 23.65398 5 27 8.3460198 27 12.5 C 27 16.65398 23.65398 20 19.5 20 C 15.34602 20 12 16.65398 12 12.5 C 12 8.3460198 15.34602 5 19.5 5 z" />
                    </symbol>
                </svg>
            </div>
            <div class="hero_btn">
                <a href="formdonor.php" class="btn">Donor Form</a>
            </div>
        </section>



        <section class="hospital">
            <div class="main-content">
                <!-- <div class="card">
                    <h3 id="output">test</h3>
                    <div class="line"></div>
                    <p>
                        Contrary to popular belief, Lorem Ipsum is not simply random text.
                        It has roots in a piece of classical Latin
                    </p>
                </div> -->
                <?php
                if (empty($_GET['name'])) {
                    for ($i = 0; $i < sizeof($rumah_sakit_data); $i++) {
                        $jumlah_donor = getJumlahDonorByRumahSakitID($i + 1, $bloodtype_id);
                ?>
                        <div class="card">
                            <h3><?= $rumah_sakit_data[$i]['nama'] ?>, <?= $rumah_sakit_data[$i]['domisili'] ?></h3>
                            <div class="line"></div>
                            <p><?= $rumah_sakit_data[$i]['alamat'] ?></p>
                            <h3>Jumlah Donor : <?= $jumlah_donor ?></h3>
                        </div>
                        <?php
                    }
                } else {
                    for ($i = 0; $i < sizeof($rumah_sakit_data); $i++) {
                        if (
                            stripos($rumah_sakit_data[$i]['nama'], $search) !== false
                            || stripos($rumah_sakit_data[$i]['alamat'], $search) !== false
                            || stripos($rumah_sakit_data[$i]['domisili'], $search) !== false
                        ) {
                            $jumlah_donor = getJumlahDonorByRumahSakitID($i + 1, $bloodtype_id);
                        ?>
                            <div class="card">
                                <h3><?= $rumah_sakit_data[$i]['nama'] ?>, <?= $rumah_sakit_data[$i]['domisili'] ?></h3>
                                <div class="line"></div>
                                <p><?= $rumah_sakit_data[$i]['alamat'] ?></p>
                                <h3>Jumlah Donor : <?= $jumlah_donor ?></h3>
                            </div>
                <?php
                        }
                    }
                }
                ?>
            </div>
        </section>
    </div>

    <?php
    require_once("footer.html");
    ?>
    
    <script src="hospital_api/hospital_api.js"></script>
</body>

</html>