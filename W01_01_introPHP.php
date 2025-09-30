<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css">
</head>

<body>

    <h1>Welcome to PHP Basic</h1>
    <p>This is a simeple PHP application</p>

    <hr>

    <h1 style="color:red;">Basic php Syntax</h1>
    <pre>
        &lt;?php
            echo "Hello world!";
        ?&gt;
    </pre>
    <h3>Result</h3>
    <Div style="color:blue;">
        <?php
        echo "Hello World <br>";
        print "<span style='color:red;'>Rachata Panyad</span>";
        ?>
    </Div>

    <hr>
    <h1 style="color:red;">Basic php Variables</h1>
    <pre>
        &lt;?php
            $greeting = "Hello world!";
            echo greeting;
        ?&gt;
    </pre>
    <h3>Result</h3>
    <?php
    $greeting = "Hello world!";
    echo "<span style='color:Blue;'>.$greeting.</span>";
    ?>
    <hr>

    <h1 style="color:red;">Integer Variable Example</h1>
    <pre>
        <?php
        $age = 20;
        echo "<span style='color:Blue;'>I am $age year old</span>";
        ?>
    </pre>
    <hr>

    <h1 style="color:red;">Calculate with Variables</h1>
    <pre>
        <?php
        $q = 10;
        $a = 5;
        $s = $q - $a;
        echo "<span style='color:Blue;'>The sum of $q and $a is $s</span>";
        ?>
        </pre>
    <hr>

    <h1 style="color:red;">คำนวณพื้นที่สามเหลี่ยม</h1>
    <pre>
        <?php
        $higt = 5;
        $base = 10;
        $long = 0.5 * $higt * $base;
        echo "<span style='color:Blue;'>พื้นที่ของสามเหลี่ยมคือ $long ตารางหน่วย</span>";
        ?>
    </pre>
    <hr>

    <h1 style="color:red;">คำนวณอายุจากวันเกิด</h1>
    <pre>
        <?php
        $x = 2004;
        $y = 2025;
        $z = $y - $x;
        echo "<span style='color:Blue;'>อายุของคุณคือ $z ปี</span>";
        ?>
    </pre>

    <hr>

    <h1 style="color:blue;">IF-Else</h1>
    <!-- เกณฑ์ผ่านการสอบ ต้องได้คะแนนมากกว่า 60 คะแนน -->
    <?php
    $score = 75; //เปลี่ยนค่า score เพื่อทดสอบ
    if ($score >= 60) {
        echo "คะแนนของคุณคือ $score <br>";
        echo "ยินดีด้วย คุณสอบผ่าน";
    } else {
        echo "เสียใจด้วย คุณสอบไม่ผ่าน";
    }
    ?>

    <hr>

    <h1 style="color:blue;">Boolean Variable </h1>
    <!-- ตรวจสอบว่าเป็น นักศึกษาหรือไม่ -->
    <?php
    echo "<h3>คุณเป็นนักศึกษาใช่หรือไม่</h3>";
    $is_student = true; // เปลี่ยนค่าเป็น false เพื่อทดสอบ
    //หากเติมเครื่องหมาย !!!!!!!! ข่างหน้า $ จะเป็นค่าเป็น else
    if ($is_student) {
        echo "ใช่";
    } else {
        echo "ไม่ใช่";
    }
    ?>

    <hr>

    <h1 style="color:blue;">Loop</h1>
    <h2>====Loop fot====</h2>
    <h3>แสดงตัวเลข 1 ถึง 10</h3>
    <?php
    $sum = 0;
    for ($i = 5; $i <= 9; $i++) {
        $sum += $i;

        if ($i < 9) {
            echo "$i + ";
        } else {
            echo "$i = $sum";
        }
    }

    echo "<br>ผลบวกของตัวเลข 5 ถึง 9 คือ $sum <br>";
    ?>

    <hr>

    <h1 style="color:blue;">While loop</h1>
    <h2>====สูตรคูณแม่ 2 ====</h2>
    <?php
    $j = 1;
    while ($j <= 12) {//เงือนไข
        echo "2 X $j =" . (2 * $j) . "<br>"; //แสดงผลลัพ
        $j++; //เพื่อค่าลดค่า
    }
    ?>

    <hr>


    <h2>====สูตรคูณแม่ 2 ใส่ตาราง====</h2>
    <table class="table table-bordered table-striped w-auto mx-auto text-center">
        <thead class="table-success">
            <tr>
                <th>ลำดับ</th>
                <th>สูตรคูณ</th>
                <th>ผลลัพธ์</th>
            </tr>
        </thead>

        <tbody>
            <?php
            for ($i = 1; $i <= 12; $i++) {
                echo "<tr>";
                echo "<td> $i </td>";
                echo "<td>2 X $i</td>";
                echo "<td>" . (2 * $i) . "</td>";
                echo "</tr>";
            }

            ?>
        </tbody>
    </table>
    <hr>
    <h2>สร้างตัวแปรอาเรย์ แบบที่ 1: Indexed Array</h2>
    <h5>PHP จะกำหนด index เป็นตัวเลขอัตโนมัติ โดยเริ่มจาก 0</h5>
    <hr>
    <?php

    $fruits = ["Apple", "Banana", "Cherry"];

    ?>
    <h3>แสดงรายการผลไม้ โดยใช้ index</h3>
    <div style="color:blue; background-color: lightgray; padding: 10px;">
        <?php
        echo $fruits[0] . "<br>";           //Apple
        echo $fruits[1] . "<br>";           //Banana
        echo $fruits[2] . "<br>";           //Cherry
        
        ?>
    </div>

    <div style="color:red; background-color: lightgray; padding: 10px;">
        <?php
        echo "รายการผลไม้ <br>";           //Apple
        echo "ผลไม้ที่ 1:" . $fruits[0] . "<br>";           //Banana
        echo "ผลไม้ที่ 3:" . $fruits[2] . "<br>";           //Cherry
        
        ?>
    </div>
    <br>

    <!-- ======================================================== -->
    <br>
    <h4>แสดงรายการผลไม้ โดยใช้ print readable</h4>
    <div style="color:blue; background-color: lightgray; padding: 10px;">
        <?php
        "รายการผลไม้: <br>";
        print_r($fruits); // แสดงผลอาเรย์ทั้งหมด  print readable
        "<br>";

        ?>
    </div>

    <!-- ======================================================== -->
    <br>
    <h4>แสดงจำนวนสมาชิกใน array</h4>
    <div style="color:blue; background-color: lightgray; padding: 10px;">
        <?php
        echo "ผลไม้จำนวน:" . count($fruits) . " ชนิด <br>";
        echo "<br>";

        ?>
    </div>


    <!-- ======================================================== -->
    <br>
    <h4>แสดงรายการผลไม้ โดยใช้ implode เพื่อแปลงอาเรย์เป็นสตริง</h4>
    <div style="color:blue; background-color: lightgray; padding: 10px;">
        <?php
        // แสดงรายการผลไม้และจำนวนสมาชิกในอาเรย์
        // ใช้ implode เพื่อแปลงอาเรย์เป็นสตริง และแสดงผลลัพธ์
        echo "รายการผลไม้: " . implode(", ", $fruits) . "<br>"; // ผลลัพธ์: Apple, Banana, Cherry
        echo "<br>";
        ?>
    </div>

    <!-- ======================================================== -->
    <br>
    <h4>แสดงรายการผลไม้ ใช้คำสั่ง foreach เพื่อวนลูป</h4>
    <div style="color:blue; background-color: lightgray; padding: 10px;">
        <?php
        // ใช้คำสั่ง foreach เพื่อวนลูปค่าใน array ทีละตัว โดยในแต่ละรอบ ตัวแปร $fruit จะเก็บค่าผลไม้ 1 ชนิด
        foreach ($fruits as $fruit) {
            echo "ผลไม้: $fruit <br>";
        }
        echo "<br>";
        ?>
    </div>
    <div style="color:red; background-color: lightgray; padding: 10px;">
        <?php
        // แสดงรายการผลไม้และจำนวนสมาชิกในอาเรย์
        // ใช้ implode เพื่อแปลงอาเรย์เป็นสตริง และแสดงผลลัพธ์
        echo "รายการผลไม้: " . implode(", ", $fruits) . "<br>"; // ผลลัพธ์: Apple, Banana, Cherry
        if ($fruit === end(array: $fruits)) {
            echo "$fruit.";
        } else {
            echo "$fruit,";

        }

        ?>
        <br>
    </div>

    <?php
    // สร้างอาเรย์ของผลไม้ที่มีชื่อและราคา
    $products = [
        ["name" => "Apple", "price" => 30],
        ["name" => "Banana", "price" => 20],
        ["name" => "Cherry", "price" => 15]
    ];
    ?>

    <!-- ======================================================== -->
    <br>
    <h4>แสดงรายการผลไม้ ใช้คำสั่ง key value</h4>
    <div style="color:blue; background-color: lightgray; padding: 10px;">
        <?php
        // แสดงผลลัพธ์ของการเข้าถึงข้อมูลในอาเรย์
        echo $products[0]["name"] . "<br>";  // Apple
        echo $products[2]["price"] . "<br>"; // 15
        

        ?>
    </div>

    <h4>แสดงรายการสินค้า ใช้คำสั่ง foreach เพื่อวนลูป</h4>
    <div style="color:blue; background-color: lightgray; padding: 10px;">
        <?php
        $total_price = 0;
        foreach ($products as $product) {
            echo "สินค้า:" . $product["name"] . ", ราคา: " . $product["price"] . "บาท<br>";
            $total_price += $product["price"];
        }
        echo "<br>";
        echo "<br>ราคารวมของผลไม้ทั้งหมด:" . $total_price . "บาท";
        ?>
    </div>

    <hr>
    <a href="index.php">Home</a>
</body>

</html>
cdn.jsdelivr.net