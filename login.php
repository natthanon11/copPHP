<?php 
    session_start();
    require_once 'config.php';

    $error = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $usernameOrEmail = trim($_POST['username_or_email']);
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE (username = ? OR email = ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$usernameOrEmail, $usernameOrEmail]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            if($user['role'] === 'admin'){
                header("Location: admin/index.php");
            } else {
                header("Location: index.php");
            }
            exit();
        } else {
            $error = "ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css">

    <style>
        body {
            background: linear-gradient(to right, #16a39cff, #0eb625ff);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-box {
            background-color: #0cbb29ff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 600px;
        }

        .form-label {
            font-weight: bold;
            color: #333;
        }

        .btn-success {
            width: 100%;
        }

        .btn-link {
            display: block;
            text-align: center;
            margin-top: 10px;
            color: #0d6efd;
        }

        .alert {
            max-width: 600px;
            margin: 10px auto;
        }
    </style>
</head>
<body>

    <?php if (isset($_GET['register']) && $_GET['register'] === 'success'): ?>
        <div class="alert alert-success">สมัครสมาชิกสำเร็จ กรุณาเข้าสู่ระบบ</div>
    <?php endif; ?>

    <?php if (!empty($error)): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <div class="container">
        <div class="login-box">
            <form method="post" class="row g-3">
                <div class="col-md-6">
                    <label for="username_or_email" class="form-label">ชื่อผู้ใช้หรืออีเมล</label>
                    <input type="text" name="username_or_email" id="username_or_email" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="password" class="form-label">รหัสผ่าน</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-success">เข้าสู่นะระบบ</button>
                    <a href="register.php" class="btn btn-link">สมัครสมาชิก</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
