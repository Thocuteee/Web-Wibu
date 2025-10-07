<?php 
    include '../other/connect.php';
    session_start();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $FirstName = $_POST['firstname'];
      $LastName = $_POST['lastname'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $confirm_password = $_POST['confirm_password']; 
      // Kiểm tra xem email đã tồn tại trong cơ sở dữ liệu chưa
      $stmt = $conn->prepare("SELECT * FROM user WHERE email = :email");
      $stmt->execute(['email' => $email]);
      $existingUser = $stmt->fetch(PDO::FETCH_ASSOC);

      if ($existingUser) {
        $message = "Email này đã được đăng ký!";
      } else {
        if ($password !== $confirm_password) {
          $message = "Mật khẩu xác nhận không khớp.";
        } else {
          $hashed_password = password_hash($password, PASSWORD_BCRYPT);

          // Thực hiện đăng ký người dùng mới
          $stmt = $conn->prepare("INSERT INTO user (firstname, lastname, email, password) VALUES (:firstname, :lastname, :email, :password)");
          try {
            $stmt->execute([
              'firstname' => $FirstName,
              'lastname' => $LastName,
              'email' => $email,
              'password' => $hashed_password
            ]);
            $message = "Đăng ký thành công.";
          } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
          }
        }
      }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký-Otaku-Shop</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/login&signin/sign-in.css">
</head>
<body>
<?php
    include "../other/header.php";
    
  ?>


    <div class="sign-in-container">
        <h2>Đăng ký</h2>
        <?php
            if(!empty($message)): ?>
                <p class="message"> <?php echo $message ?></p>
            <?php endif ?>
        <form action="" method="POST">
            <input type="text" name="firstname" placeholder="Họ" required>
            <input type="text" name="lastname" placeholder="Tên" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Mật khẩu" required>
            <input type="password" name="confirm_password" placeholder="Nhập lại mật khẩu" required>
            <button type="submit" name="submit">Đăng ký</button>
        </form>

        <div class="return">
            <i class="fa fa-reply"></i>
            <a href="/login&signin/login.php">Quay lại đăng nhâp</a>
        </div>
    </div>
</body>

<script src="/Home/index.js"></script>
</html>