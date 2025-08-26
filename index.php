<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าหลัก</title>

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css">

    <style>
        body {
            background: linear-gradient(135deg, #1092a3ff, #63d363ff);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .main-box {
            background-color: #1da1aaff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            text-align: center;
            max-width: 500px;
            width: 100%;
        }

        h1 {
            color: #0d6efd;
            margin-bottom: 20px;
        }

        p {
            font-size: 1.2rem;
            color: #333;
        }

        a {
            text-decoration: none;
            color: white;
            background-color: #dc3545;
            padding: 10px 20px;
            border-radius: 6px;
            display: inline-block;
            margin-top: 20px;
        }

        a:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>

    <div class="main-box">
        <h1>ยินดีต้อนรับสู่หน้าหลัก</h1>
        <p>ผู้ใช้: <?= htmlspecialchars($_SESSION['username']) ?> (<?= $_SESSION['role'] ?>)</p>
        <a href="logout.php">ออกจากระบบ</a>
    </div>

</body>
</html>