<?php
session_start();
require_once("functions/functions.php");
require_once("classes/dbConnection.php");

$username = getValue("username", "POST", "str", "");
$password = getValue("password", "POST", "str", "");
$action = getValue("submit", "POST", "str", "");


// var_dump($_POST);
// echo "<br/>";
// var_dump($username);
// var_dump($password);
// var_dump($action);

$errorMsg = "";
if ($action == "login") {
    if ($username == "") {
        $errorMsg .= "&bull; Vui lòng nhập User Name.<br />";
    }
    if ($password == "") {
        $errorMsg .= "&bull; Vui lòng nhập Password.<br />";
    }

    // Nếu có đủ dữ liệu POST thì xác thực
    if ($errorMsg == "") {
        $dbConnection = new dbConnection();
        $conn = $dbConnection->getConnection();
        $sql = "SELECT COUNT(*) as number FROM users WHERE name = '$username' AND  password = '$password' AND is_admin = 1";
        $result = $conn->query($sql);
        $data = mysqli_fetch_assoc($result);
        if ($data['number'] == 1) {


            // Success
            // echo "Success";
            // if ($_SESSION["logged"] == 0) {
            // }


            $_SESSION["logged"] = 1;
            header("Location: table-datatable.php");
        } else {
            $errorMsg .= "&bull; Thông tin đăng nhập không đúng. Vui lòng thử lại.<br />";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/pages/auth.css">
</head>

<body>
    <div id="auth">
        <?php if ($errorMsg != "") { ?>
        <div class="alert alert-danger" id="login-err-msg">
            Error: <?= $errorMsg ?>
        </div>
        <?php } ?>
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <a href="index.html"><img src="assets/images/logo/logo.png" alt="Logo"></a>
                    </div>
                    <h1 class="auth-title">Log in.</h1>
                    <p class="auth-subtitle mb-5">Log in with your data that you entered during registration.</p>

                    <form action="" method="POST">
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl" name="username" id="username"
                                value="<?= $username ?>" placeholder="Username">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl" name="password"
                                value="<?= $password ?>" placeholder="Password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <div class="form-check form-check-lg d-flex align-items-end">
                            <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label text-gray-600" for="flexCheckDefault">
                                Keep me logged in
                            </label>
                        </div>
                        <button type="submit" name="submit" value="login"
                            class="btn btn-primary btn-block btn-lg shadow-lg mt-5">
                            Log in
                        </button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class="text-gray-600">Don't have an account? <a href="auth-register.html"
                                class="font-bold">Sign
                                up</a>.</p>
                        <p><a class="font-bold" href="auth-forgot-password.html">Forgot password?</a>.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
        </div>

    </div>
</body>

</html>