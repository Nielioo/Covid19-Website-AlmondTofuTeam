<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <?php
    require_once("navigation_bar.html");
    require_once("user_controller.php");
    ?>

    <div class="container">
        <!-- <div class="left"></div> -->

        <!-- <div class="right">
            <div class="header">
                <h2 class="animation a1">Login</h2>
                <h4 class="animation a2">Log in to your account using email and password</h4>
            </div> -->

            <form class="form" action="login.php" method="post">
                <input type="email" class="form-field animation a3" name="email" placeholder="Email Address">
                <input type="password" class="form-field animation a4" name="password" placeholder="Password">
                <p class="forgotPass animation a5"><a href="#">Forgot Password</a></p>

                <input class="form-button animation a6" type="submit" name="login" value="LOGIN">

                <p class="reglog animation a7">Don't have an account? <a href="registerPage.php">Join Now</a></p>
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
                    // header("location: profilePage.php");
                } else {
                    echo "<br><br>warning: user not found";
                }
            }
            ?>

        <!-- </div> -->
    </div>

    <script>
        function loginSuccessAlert() {
            alert("Login Successful!");
        }

        function loginFailedAlert() {
            alert("Login Failed! Wrong email or password");
        }
    </script>

</body>

</html>