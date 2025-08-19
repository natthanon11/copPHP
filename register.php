<?php
require_once 'config.php';

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $fullname = trim($_POST['fullname']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmpassword'];

    // ตรวจสอบข้อมูล
    if (empty($username) || empty($fullname) || empty($email) || empty($password) || empty($confirmPassword)) {
        $errors[] = "กรุณากรอกข้อมูลให้ครบทุกช่อง";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "รูปแบบอีเมลไม่ถูกต้อง";
    } elseif ($password !== $confirmPassword) {
        $errors[] = "รหัสผ่านและการยืนยันไม่ตรงกัน";
    } else {
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
        $stmt->execute([$username, $email]);

        if ($stmt->rowCount() > 0) {
            $errors[] = "ชื่อผู้ใช้หรืออีเมลถูกใช้ไปแล้ว";
        }
    }

    // ถ้าไม่มีข้อผิดพลาด
    if (empty($errors)) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO users(username, full_name, email, password, role) VALUES (?, ?, ?, ?, 'member')");
        $stmt->execute([$username, $fullname, $email, $hashedPassword]);

        header("Location: login.php?register=success");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สมัครสมาชิก</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f4f6f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .register-box {
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 0 25px rgba(0, 0, 0, 0.08);
            width: 100%;
            max-width: 500px;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        .form-control {
            border-radius: 8px;
        }

        .btn-custom {
            background-color: #28a745;
            border: none;
            border-radius: 8px;
            width: 100%;
        }

        .btn-custom:hover {
            background-color: #218838;
        }

        .login-link {
            display: block;
            text-align: center;
            margin-top: 15px;
        }
    </style>
</head>

<body>
    <div class="register-box">
        <h2>สมัครสมาชิก</h2>

        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger">
                <ul class="mb-0">
                    <?php foreach ($errors as $e): ?>
                        <li><?= htmlspecialchars($e) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form method="post">
            <div class="mb-3">
                <label for="username" class="form-label">ชื่อผู้ใช้</label>
                <input type="text" class="form-control" id="username" name="username" required
                    value="<?= isset($_POST['username']) ? htmlspecialchars($_POST['username']) : '' ?>">
            </div>

            <div class="mb-3">
                <label for="fullname" class="form-label">ชื่อ-นามสกุล</label>
                <input type="text" class="form-control" id="fullname" name="fullname" required
                    value="<?= isset($_POST['fullname']) ? htmlspecialchars($_POST['fullname']) : '' ?>">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">อีเมล</label>
                <input type="email" class="form-control" id="email" name="email" required
                    value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">รหัสผ่าน</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <div class="mb-3">
                <label for="confirmpassword" class="form-label">ยืนยันรหัสผ่าน</label>
                <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" required>
            </div>

            <button type="submit" class="btn btn-custom">สมัครสมาชิก</button>

            <a href="login.php" class="login-link">มีบัญชีอยู่แล้ว? เข้าสู่ระบบ</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
