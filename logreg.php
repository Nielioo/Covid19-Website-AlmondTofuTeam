<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="logreg.css">
</head>

<body>
    <?php
    require_once('navigation_bar.html');
    require_once("user_controller.php");
    ?>

    <div class="container">
        <div class="overlay" id="overlay">
            <div class="sign-in" id="sign-in">
                <h1>Welcome Back!</h1>
                <p>To keep connected with us please login with your personal info</p>
                <button class="switch-button" id="slide-right-button">Sign In</button>
            </div>
            <div class="sign-up" id="sign-up">
                <h1>Hello, Friend!</h1>
                <p>Enter your personal details and start a journey with us</p>
                <button class="switch-button" id="slide-left-button">Sign Up</button>
            </div>
        </div>

        <div class="form">
            <div class="sign-in" id="sign-in-info">
                <h1>Sign In</h1>
                <form id="sign-in-form" method="post">
                    <input class="content" type="email" name="email" placeholder="Email" required />
                    <input class="content" type="password" name="password" placeholder="Password" required />
                    <p class="forgot-password">Forgot your password?</p>
                    <input class="control-button in" type="submit" name="login" value="SIGN IN">
                </form>

                <?php
                if (isset($_POST['login'])) {
                    $conn = connect();

                    $email = $_POST["email"];
                    $password = $_POST["password"];

                    $query = $conn->prepare("SELECT `username`, `email`, `password` FROM `user` WHERE `email` =? AND `password`=?;");
                    $query->bind_param('ss', $email, $password);
                    $query->execute() or die(mysqli_error($conn));

                    $result = $query->get_result();
                    $data = $result->fetch_assoc();

                    if (!empty($data)) {
                        session_start();
                        $_SESSION['username'] = $data['username'];
                        header("location: index.php");
                    } else {
                        echo "<br><br>warning: user not found";
                    }
                }
                ?>

            </div>
            <div class="sign-up" id="sign-up-info">
                <h1>Create Account</h1>
                <form id="sign-up-form" method="post" enctype="multipart/form-data">
                    <input class="content" type="text" name="nama" placeholder="Name" required>
                    <input class="content" type="text" name="username" placeholder="Username" required>
                    <input class="content" type="text" name="domisili" placeholder="Domisili" required>
                    <input class="content" type="email" name="email" placeholder="Email" required>
                    <input class="content" type="password" name="password" placeholder="Password" required>

                    <input class="control-button up" type="submit" name="register" value="SIGN UP">
                </form>

                <?php
        if (isset($_POST['register'])) {
            $nama = $_POST['nama'];
            $username = $_POST['username'];
            $domisili = $_POST['domisili'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            createProfile($nama, $username, $domisili, $email, $password);

            header("location: logreg.php");
        }
        ?>

            </div>
        </div>
    </div>

    <script src="logreg.js"></script>

</body>

</html>