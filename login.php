<?php

$loginError = "";
$loginSuccess = "";
require './assets/connect_to_db.php';

if (isset($_POST['login'])) {

    $email = $_POST["email"];
    $password = $_POST["password"];

    if (!empty($email) && !empty($password)) {
        $sql = "SELECT `password` , `username` , `id` FROM users WHERE email = ? ";
        $stmt = $conn -> prepare($sql);
        $stmt -> execute([$email]);
        $result = $stmt -> fetch();

        if ( $stmt -> rowCount() !== 0 && password_verify($password, $result['password'])    ) {
            $loginSuccess = "به سایت خودتان خوش آمدید";
            session_start();
            $_SESSION['userID'] = $result['id'];
            $_SESSION['username'] = $result['username'];
            $_SESSION['logged'] = true;

            header("location:panel/index.php");

        }else{
            $loginError = 'نام کاربری یا رمز عبور اشتباه می باشد';
        }

    }else{
        $loginError = 'پر کردن تمامی فیلدها ضروری است';
    }
}

?>

<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="styles/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles/css/style.css">
    <link rel="stylesheet" href="styles/css/auth.css">
    <!-- Css Reset -->
    <link rel="stylesheet" href="styles/css/reset.css">
    <!-- Vazir Font -->
    <link rel="stylesheet" href="fonts/vazir.css">
    <!-- Fontawsome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>ورود به حساب کاربری</title>
</head>
<body>
    <section class="d-flex justify-content-center align-items-center min-h-screen bg">
        <div id="overlay"></div>
        <div class="form-container">
            <form action="#" method="post">
                <h1 class="title">ورود به حساب کاربری</h1>
                <?php if($loginError != ''){echo "<h4 class='alert alert-danger'>{$loginError}</h4>"; } ?>
                <?php if($loginSuccess != ''){echo "<h4 class='alert alert-success'>{$loginSuccess}</h4>"; } ?>
                <div class="mt-3 position-relative">
                    <input type="text" class="field" placeholder="ایمیل ..." name="email">
                    <i class="fa fa-user field_icon"></i>
                </div>
                <div class="mt-3 position-relative">
                    <input type="password" class="field" id="fieldPass" placeholder="رمز عبور ..." name="password">
                    <i class="fa fa-lock field_icon"></i>
                    <button type="button" id="showPass"></button>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn-submit bg-primary" name="login">
                        <i class="fa fa-sign-in ms-1"></i>
                        <span>ورود به حساب کاربری</span>
                    </button>
                </div>

                <p class="text">
                    حساب کاربری ندارید ؟ <a href="./register.php" class="text-primary">یکی بسازید</a>
                </p>
            </form>
        </div>
    </section>

    <script src="js/showPassword.js"></script>
    <script src="js/darkMode.js"></script>
</body>
</html>