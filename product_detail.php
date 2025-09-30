<?php
    session_start();
    require_once 'config.php';
    $isLoggedIn = isset($_SESSION['user_id']);
    if(!isset($_GET['id'])){
        header('Location: index.php');
        exit();
    }
    $product_id = $_GET['id'];
    $stmt = $conn->prepare("SELECT p.*, c.category_name
    FROM products p
    LEFT JOIN categories c ON p.category_id = c.category_id
    WHERE p.product_id = ?");
    $stmt->execute([$product_id]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    
    $img = !empty($product['image'])
    ? 'product_images/' . rawurlencode($product['image'])
    : 'product_images/no-image.jpg';
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายละเอียดสินค้า</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #5eead4, #38bdf8);
            background-size: 400% 400%;
            animation: gradient-animation 15s ease infinite;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
        }
        @keyframes gradient-animation {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
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
            background: linear-gradient(135deg, #14b8a6, #0ea5e9) !important;
            border-top-left-radius: 20px !important;
            border-top-right-radius: 20px !important;
            color: white;
        }
        .btn-outline-danger {
            border-color: #14b8a6;
            color: #14b8a6;
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        .btn-outline-danger:hover {
            background-color: #14b8a6;
            color: white;
        }
        .btn-success {
            background-color: #10b981;
            border-color: #10b981;
            transition: background-color 0.3s ease;
        }
        .btn-success:hover {
            background-color: #0f766e;
            border-color: #0f766e;
        }
        .btn-primary {
            background-color: #0ea5e9;
            border-color: #0ea5e9;
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #0284c7;
            border-color: #0284c7;
        }
        .badge.bg-secondary {
            background-color: #2dd4bf !important;
        }
        .text-info {
            color: #0ea5e9 !important;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <a href="index.php" class="btn btn-outline-danger mb-3">
                    <i class="fas fa-arrow-left me-1"></i>กลับ
                </a>

                
                <div class="card shadow-lg">
                    <img src="<?= $img?>"
                    <div class="card-header text-center text-white py-4">
                        <i class="fas fa-box fa-2x mb-2"></i>
                        <h2 class="mb-0"><?= htmlspecialchars($product['product_name'])?></h2>
                    </div>
                    <div class="card-body p-4">
                        <span class="badge bg-secondary mb-3">
                            <i class="fas fa-tag me-1"></i><?= htmlspecialchars($product['category_name'])?>
                        </span>
                        
                        <p class="mb-4"><?= nl2br(htmlspecialchars($product['description'])) ?></p>
                        
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <h4 class="text-success">
                                    <i class="fas fa-money-bill me-2"></i><?= number_format($product['price'], 2)?> บาท
                                </h4>
                            </div>
                            <div class="col-md-6">
                                <h5 class="text-info">
                                    <i class="fas fa-boxes me-2"></i>คงเหลือ <?= $product['stock']?> ชิ้น
                                </h5>
                            </div>
                        </div>

                        <?php if ($isLoggedIn): ?>
                            <form action="cart.php" method="post" class="mb-3">
                                <input type="hidden" name="product_id" value="<?= $product['product_id'] ?>">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="quantity" class="form-label">จำนวน</label>
                                        <input type="number" name="quantity" id="quantity" class="form-control" 
                                               value="1" min="1" max="<?= $product['stock'] ?>" required>
                                    </div>
                                    <div class="col-md-9 d-flex align-items-end">
                                        <button type="submit" class="btn btn-success btn-lg">
                                            <i class="fas fa-cart-plus me-1"></i>เพิ่มในตะกร้า
                                        </button>
                                    </div>
                                </div>
                            </form>
                        <?php else: ?>
                            <div class="alert alert-info">
                                <i class="fas fa-info-circle me-2"></i>กรุณาเข้าสู่ระบบเพื่อสั่งซื้อ
                                <a href="login.php" class="btn btn-primary btn-sm ms-2">เข้าสู่ระบบ</a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
