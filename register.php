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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
          integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <title>ثبت نام</title>
</head>
<body>

<?php
$registerError = "";
$registerSuccess = "";
require "./assets/connect_to_db.php";

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password_hashed = password_hash($password, PASSWORD_DEFAULT);
    $email = $_POST['email'];
    $passwordConfirm = $_POST['passwordConfirm'];

    if (!empty($username) && $username != ""
        && !empty($password) && $password != ""
        && !empty($passwordConfirm) && $passwordConfirm != ""
        && !empty($email) && $email != "") {

        if ($password === $passwordConfirm) {

            if (strlen($password) >= 4) {

                $stmt = $conn->prepare(" SELECT * FROM users WHERE email = ? ");
                $stmt->bindValue(1, $email);
                $stmt->execute();

                if ($stmt->rowCount() == 0) {

                    $sql = "INSERT INTO users (username, password, email) VALUES ( ? , ? , ?)";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute([$username, $password_hashed, $email]);
                    $registerSuccess = 'ثبت نام شما با موفقیت انجام پذیرفت';
                    $last_id = $conn->lastInsertId();

                    $sql2 = "insert into role_user (user_id, role_id) values (?, ?)";
                    $stmt2 = $conn->prepare($sql2);
                    $stmt2->execute([$last_id, 1]);


                    setcookie('name', $username, time() + (86400 * 5));
                    setcookie('email', $email, time() + (86400 * 5));

                    $conn = null;
                } else {
                    $registerError = 'ایمیل وارد شده تکراری می باشد';
                }


            } else {
                $registerError = 'رمز عبور باید حداقل از 4 کاراکتر ساخته شده باشد';
            }

        } else {
            $registerError = "رمز عبور و تکرار آن مغایرت دارند";
        }

    } else {
        $registerError = 'پر کردن تمامی فیلدها ضروری است';
    }

}

?>


<section class="d-flex justify-content-center align-items-center min-h-screen bg">
    <div id="overlay"></div>
    <div class="form-container">
        <form action="#" method="post">
            <h1 class="title">ثبت نام در وبلاگ</h1>
            <?php
            if ($registerError != "") {
                echo "<h4 class='alert alert-danger'>{$registerError}</h4>";
            }
            if ($registerSuccess != "") {
                echo "<h4 class='alert alert-success'>{$registerSuccess}</h4>";
            }
            ?>
            <div class="mt-3 position-relative">
                <input type="text" class="field" placeholder="نام ..." name="username">
                <i class="fa fa-user-plus field_icon"></i>
            </div>
            <div class="mt-3 position-relative">
                <input type="email" class="field" placeholder="ایمیل ..." name="email">
                <i class="fa fa-envelope field_icon" aria-hidden="true"></i>
            </div>
            <div class="mt-3 position-relative">
                <input type="password" class="field" id="fieldPass" placeholder="رمز عبور ..." name="password">
                <i class="fa fa-lock field_icon"></i>
                <button type="button" id="showPass"></button>
            </div>
            <div class="mt-3 position-relative">
                <input type="password" class="field" id="fieldPass" placeholder="تکرار رمز عبور ..."
                       name="passwordConfirm">
                <i class="fa fa-check field_icon"></i>
                <button type="button" id="showPass"></button>
            </div>
            <div class="mt-3">
                <button type="submit" class="btn-submit bg-primary" name="submit">
                    <i class="fa fa-user-plus ms-1"></i>
                    <span>ثبت نام</span>
                </button>
            </div>

            <p class="text">
                قبلا ثبت نام کرده اید ؟ <a href="login.php" class="text-primary">ورود</a>
            </p>
        </form>
    </div>
</section>

<script src="js/showPassword.js"></script>
<script src="js/darkMode.js"></script>
<script src="js/scroll.js"></script>
</body>
</html>



