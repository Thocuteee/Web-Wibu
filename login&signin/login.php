<?php
    include "../other/connect.php";
    session_start();
    $message = "";
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Kiểm tra email trong cơ sở dữ liệu
        $stmt = $conn->prepare("SELECT * FROM user WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            // Lưu thông tin người dùng vào session
            $_SESSION['user_id'] = $user['IdUser'];
            $_SESSION['role'] = $user['role']; // Lưu role
            $_SESSION['fullname'] = $user['firstname'] . ' ' . $user['lastname']; // Lưu họ tên
            // Kiểm tra role để chuyển hướng
            if ($user['role'] == 1) {
                // Nếu role là admin, chuyển hướng đến trang admin
                header("Location: ../admin/admin.php");
            } else {
                // Nếu role là user, chuyển hướng đến trang home
                header("Location: ../Home/home.php");
            }
            exit;
        } else {
            $message = "* Tên đăng nhập hoặc mật khẩu không đúng.";
        } 
    } //else {
        //$message = "Tài khoản không tồn tại!";
    //}
?>






<!DOCTYPE html>
<html lang="en">
<head>  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập-Otaku-Shop</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/login&signin/login.css">
</head>
<body>
    <?php include '../other/header.php';
    ?>


    <div class="login-container">
        <h2>Đăng nhập</h2>
        <?php
            if(!empty($message)): ?>
                <p class="message"> <?php echo $message ?></p>
            <?php endif ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
          <input type="email" name="email" placeholder="Email" required>
          <input type="password" id="password" name="password" placeholder="Mật khẩu" required>
          <span id="eye-pass" class="fa fa-eye"></span>
          <button type="submit" name="submit">Đăng nhập</button>
            
           
        </form>
        <p class="forget">
            <a href="#">Quên mật khẩu</a> hoặc <a href="/login&signin/sign-in.php">Đăng ký</a>
        </p>
    </div>
</body>

<script src="/Home/index.js"></script>
<script src="/login&signin/login.js"></script>
</html>