<?php

require_once '../config.php';
require_once 'auth_admin.php';
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <title>แผงควบคุมผู้ดูแลระบบ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #00bcd4, #4caf50);
            /* เปลี่ยนจากแดงส้มเป็นฟ้าเขียว */
            background-size: 400% 400%;
            animation: gradient-animation 15s ease infinite;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
        }

        @keyframes gradient-animation {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        .card {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.95);
            border: none;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-header {
            background: linear-gradient(135deg, #00bcd4, #4caf50) !important;
            border-top-left-radius: 20px !important;
            border-top-right-radius: 20px !important;
            color: white;
        }

        /* ปรับปุ่มให้เข้ากับธีมฟ้าเขียว */
        .btn-warning {
            background-color: #00bcd4;
            border-color: #00bcd4;
            transition: background-color 0.3s ease;
        }

        .btn-warning:hover {
            background-color: #00acc1;
            border-color: #0097a7;
        }

        .btn-dark {
            background-color: #00796b;
            border-color: #00796b;
            transition: background-color 0.3s ease;
        }

        .btn-dark:hover {
            background-color: #00695c;
            border-color: #004d40;
        }

        .btn-primary {
            background-color: #2196f3;
            border-color: #2196f3;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #1e88e5;
            border-color: #1976d2;
        }

        .btn-success {
            background-color: #4caf50;
            border-color: #4caf50;
            transition: background-color 0.3s ease;
        }

        .btn-success:hover {
            background-color: #43a047;
            border-color: #388e3c;
        }

        .btn-secondary {
            background-color: #607d8b;
            border-color: #607d8b;
            transition: background-color 0.3s ease;
        }

        .btn-secondary:hover {
            background-color: #546e7a;
            border-color: #455a64;
        }
    </style>
</head>

<body class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg p-4">
                <h2 class="text-center mb-4"><i class="fas fa-tools me-2"></i>ระบบผู้ดูแลระบบ</h2>
                <p class="text-center mb-4">ยินดีต้อนรับ, <?= htmlspecialchars($_SESSION['username']) ?></p>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="card h-100">
                            <div class="card-body text-center">
                                <a href="users.php" class="btn btn-warning w-100"><i
                                        class="fas fa-users-cog me-2"></i>จัดการสมาชิก</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="card h-100">
                            <div class="card-body text-center">
                                <a href="categories.php" class="btn btn-dark w-100"><i
                                        class="fas fa-sitemap me-2"></i>จัดการหมวดหมู่</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="card h-100">
                            <div class="card-body text-center">
                                <a href="products.php" class="btn btn-primary w-100"><i
                                        class="fas fa-box me-2"></i>จัดการสินค้า</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="card h-100">
                            <div class="card-body text-center">
                                <a href="orders.php" class="btn btn-success w-100"><i
                                        class="fas fa-receipt me-2"></i>จัดการคำสั่งซื้อ</a>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="../logout.php" class="btn btn-secondary mt-3 w-100"><i
                        class="fas fa-sign-out-alt me-2"></i>ออกจากระบบ</a>
            </div>
        </div>
    </div>


</body>

</html>