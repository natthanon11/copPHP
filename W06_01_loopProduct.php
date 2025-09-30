<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loop for Show Product</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css">
    <!-- DataTable CSS -->
    <link href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <style>
        .container {
            max-width: 800px;
        }
    </style>
</head>

<body>
    <?php
    $products = [
        ['id' => 1001, 'name' => 'Apple',      'price' => 60,  'quantity' => 50],
        ['id' => 1002, 'name' => 'Banana',     'price' => 15,  'quantity' => 120],
        ['id' => 1003, 'name' => 'Durian',     'price' => 120, 'quantity' => 15],
        ['id' => 1004, 'name' => 'Mango',      'price' => 45,  'quantity' => 70],
        ['id' => 1005, 'name' => 'Mangosteen', 'price' => 30,  'quantity' => 90],
        ['id' => 1006, 'name' => 'Watermelon', 'price' => 25,  'quantity' => 40],
        ['id' => 1007, 'name' => 'Pineapple',  'price' => 35,  'quantity' => 60],
        ['id' => 1008, 'name' => 'Orange',     'price' => 20,  'quantity' => 150],
        ['id' => 1009, 'name' => 'Grape',      'price' => 80,  'quantity' => 25],
        ['id' => 1010, 'name' => 'Papaya',     'price' => 28,  'quantity' => 55],
        ['id' => 1011, 'name' => 'Lychee',     'price' => 70,  'quantity' => 30],
        ['id' => 1012, 'name' => 'Rambutan',   'price' => 40,  'quantity' => 80],
        ['id' => 1013, 'name' => 'Longan',     'price' => 55,  'quantity' => 45],
        ['id' => 1014, 'name' => 'Guava',      'price' => 22,  'quantity' => 100],
        ['id' => 1015, 'name' => 'Coconut',    'price' => 40,  'quantity' => 35],
    ];
    ?>
    <div class="container mt-5">
        <h1>Product List</h1>
        <form action="" method="POST" class="mb-3">
            <div>
                <input type="number" name="price" placeholder="Enter Price" class="form-control mb2">
                <button type="submit" class="btn btn-success mt-2">Filter</button>
            </div>

        </form>
        <table id="productTable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_POST['price']) && !empty($_POST['price'])) {
                    $filterPrice = $_POST['price'];
                    $filterProducts = array_filter($products, function ($product) use ($filterPrice) {
                        return $product['price'] == $filterPrice;
                    });
                    $filterProducts = array_values($filterProducts);
                } else {
                    $filterProducts = $products;
                }









                foreach ($filterProducts as $index => $product) {
                    echo "<tr><td>" . ($index + 1) . "</td><td>" . $product["id"] . "</td><td>" . $product["name"] . "</td><td>" . $product["price"] . "</td><td>" . $product["quantity"] . "</td></tr>";
                }
                ?>

            </tbody>
        </table>
    </div>
    <script scr="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>

    <script>
        let table = new DataTable('#productTable');
    </script>
</body>

</html>