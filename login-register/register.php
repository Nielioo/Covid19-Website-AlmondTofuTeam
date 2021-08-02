<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <?php
    require_once("navigation_bar.html");
    require_once("user_controller.php");
    ?>

    <div>
        <form class="form" method="post" enctype="multipart/form-data">
            <input type="text" name="nama" placeholder="Nama" required>
            <input type="text" name="username" placeholder="Username" required>
            <input type="text" name="domisili" placeholder="Domisili" required>
            <input type="email" name="email" placeholder="Email Address" required>
            <input type="password" name="password" placeholder="Password" required>

            <!-- <div class="setProfilePicture animation a7">
                <p>Set Profile Picture:&nbsp;&nbsp;</p>
                <input type="file" name="profile_picture" placeholder="Profile Picture" accept="image/jpg, image/jpeg, image/png" required>
            </div> -->

            <!-- <div class="radioButton animation a8">
                <p>Choose your role:&nbsp;&nbsp;</p>
                <input type="radio" id="buyer" name="tipe_user" value="visitor">
                <p>Visitor&nbsp;&nbsp;</p>
                <input type="radio" id="seller" name="tipe_user" value="creator">
                <p>Creator</p>
            </div> -->

            <input onclick="registeredAlert()" type="submit" name="register" value="REGISTER">

            <!-- <p class="reglog animation a10">Already have an account? <a href="loginPage.php">Login Here</a></p> -->
        </form>

        <?php
        if (isset($_POST['register'])) {
            // $profile_picture_name = $_FILES['profile_picture']['name'];
            // $profile_picture_tmp_name = $_FILES['profile_picture']['tmp_name'];
            // $mime = mime_content_type($_FILES['profile_picture']['tmp_name']);
            $nama = $_POST['nama'];
            $username = $_POST['username'];
            $domisili = $_POST['domisili'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            createProfile($nama, $username, $domisili, $email, $password);

            // createProfile($username, $profile_picture_name, $profile_picture_tmp_name, $mime, $nama, $email, $password, $tipe_user);
            // header("location: loginPage.php");
        }
        ?>
    </div>
</body>

</html>