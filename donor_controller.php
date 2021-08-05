<?php

require_once("db_controller.php");

function createDonor($rs, $gol_darah)
{
    $connection = connect();

    if ($connection != null) {
        if (!is_null($rs) && !is_null($gol_darah)) {
            if (validateRumahSakit($rs)) {
                $rumah_sakit_id = getRumahSakitID($rs);

                if (validateGolDarah($gol_darah)) {
                    $gol_darah_id = getGolDarahID($gol_darah);

                    $query = $connection->prepare("INSERT INTO `donor`(`rs_id`, `gol_darah_id`) VALUES (?, ?)");
                    $query->bind_param("ii", $rumah_sakit_id, $gol_darah_id);
                    $result = $query->execute() or die(mysqli_error($connection));
                } else {
                    echo "golongan darah not found";
                }
            } else {
                echo "rumah sakit not found";
            }
        } else {
            echo "connection failed";
        }

        close($connection);
    }
}

function validateRumahSakit($rumah_sakit)
{
    $available_rumah_sakit = getRumahSakitList();

    if (!in_array($rumah_sakit, $available_rumah_sakit)) {
        return false;
    }

    return true;
}

function getRumahSakitList()
{
    $rumah_sakit_list = array();

    $connection = connect();

    if (!is_null($connection)) {
        // $query = $connection->prepare("SELECT `nama_rs` FROM `rs`");
        $query = $connection->prepare("SELECT `nama_rs` FROM `rs` ORDER BY `nama_rs`");
        $query->execute();

        $result = $query->get_result();

        if (!empty($result)) {
            while ($row = $result->fetch_assoc()) {
                $data = $row['nama_rs'];
                array_push($rumah_sakit_list, $data);
            }
        } else {
            echo "no data";
        }
    } else {
        echo "connection failed";
    }

    close($connection);

    return $rumah_sakit_list;
}

function getRumahSakitID($rumah_sakit)
{
    $connection = connect();

    if (!is_null($connection)) {
        $query = $connection->prepare("SELECT `id` FROM `rs` WHERE `nama_rs`=?");
        $query->bind_param("s", $rumah_sakit);
        $query->execute();

        $result = $query->get_result();
        $data = $result->fetch_assoc();

        if (!empty($data)) {
            $rumah_sakit_id = $data['id'];
        } else {
            echo "golongan darah id not found";
        }
    } else {
        echo "connection failed";
    }

    close($connection);

    return $rumah_sakit_id;
}

function validateGolDarah($gol_darah)
{
    $available_gol_darah = getGolDarahList();

    if (!in_array($gol_darah, $available_gol_darah)) {
        return false;
    }

    return true;
}

function getGolDarahList()
{
    $gol_darah_list = array();

    $connection = connect();

    if (!is_null($connection)) {
        $query = $connection->prepare("SELECT `golongan_darah` FROM `golongan_darah`");
        $query->execute();

        $result = $query->get_result();

        if (!empty($result)) {
            while ($row = $result->fetch_assoc()) {
                $data = $row['golongan_darah'];
                array_push($gol_darah_list, $data);
            }
        } else {
            echo "no data";
        }
    } else {
        echo "connection failed";
    }

    close($connection);

    return $gol_darah_list;
}

function getGolDarahID($gol_darah)
{
    $connection = connect();

    if (!is_null($connection)) {
        $query = $connection->prepare("SELECT `id` FROM `golongan_darah` WHERE `golongan_darah`=?");
        $query->bind_param("s", $gol_darah);
        $query->execute();

        $result = $query->get_result();
        $data = $result->fetch_assoc();

        if (!empty($data)) {
            $gol_darah_id = $data['id'];
        } else {
            echo "golongan darah id not found";
        }
    } else {
        echo "connection failed";
    }

    close($connection);

    return $gol_darah_id;
}

function readGolDarahByID($gol_darah_id)
{
    $connection = connect();

    if (!is_null($connection)) {
        $query = $connection->prepare("SELECT `golongan_darah` FROM `golongan_darah` WHERE `id`=?");
        $query->bind_param("i", $gol_darah_id);
        $query->execute();

        $result = $query->get_result();
        $data = $result->fetch_assoc();

        if (!empty($data)) {
            $gol_darah = $data['golongan_darah'];
        } else {
            echo "golongan darah not found";
        }
    } else {
        echo "connection failed";
    }

    close($connection);

    return $gol_darah;
}

function readAllRumahSakit()
{
    $rumah_sakit_data = array();

    $connection = connect();

    if ($connection != null) {
        $query = $connection->prepare(
            "SELECT `nama_rs`, `alamat_rs`, `domisili_rs` FROM `rs` ORDER BY `nama_rs`"
        );
        $query->execute() or die(mysqli_error($connection));

        $result = $query->get_result();
        if (!empty($result)) {
            $row_count = 0;
            while ($row = $result->fetch_assoc()) {
                $data = array(
                    'nama' => $row['nama_rs'],
                    'alamat' => $row['alamat_rs'],
                    'domisili' => $row['domisili_rs']
                );

                array_push($rumah_sakit_data, $data);
            }
        } else {
            echo "rumah sakit not found";
        }
    } else {
        echo "connection failed";
    }

    close($connection);

    return $rumah_sakit_data;
}

function getJumlahDonorByRumahSakitID($rumah_sakit_id, $gol_darah_id)
{
    $connection = connect();

    if ($connection != null) {
        $query = $connection->prepare(
            "SELECT COUNT(*) AS `jumlah_donor` FROM `donor` WHERE `rs_id`=? AND `gol_darah_id`=?"
        );
        $query->bind_param("ii", $rumah_sakit_id, $gol_darah_id);
        $query->execute();

        $result = $query->get_result();
        $data = $result->fetch_assoc();

        if (!empty($data)) {
            $jumlah_donor = $data['jumlah_donor'];
        } else {
            echo "jumlah donor not found";
        }
    } else {
        echo "connection failed";
    }

    close($connection);

    return $jumlah_donor;
}
?>