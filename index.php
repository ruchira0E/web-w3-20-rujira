<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Catalog</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Kanit', sans-serif;
            background-color: #f4f7f6;
            margin: 0;
            padding: 40px 20px;
            color: #333;
        }

        .header-title {
            text-align: center;
            color: #e4002b;
            margin-bottom: 40px;
            font-size: 32px;
            font-weight: 600;
        }

        /* กล่องคอนเทนเนอร์สำหรับจัด Layout แบบ Grid */
        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr)); /* ปรับขนาดการ์ดอัตโนมัติตามหน้าจอ */
            gap: 25px;
            max-width: 1200px;
            margin: 0 auto;
        }

        /* ตกแต่งการ์ดแต่ละใบ */
        .menu-card {
            background-color: #ffffff;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            display: flex;
            flex-direction: column;
        }

        /* เอฟเฟกต์ตอนเอาเมาส์ชี้การ์ด */
        .menu-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 25px rgba(228, 0, 43, 0.15);
        }

        /* กรอบรูปภาพ */
        .img-wrapper {
            width: 100%;
            height: 200px;
            background-color: #fef0f2;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        .img-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* ทำให้รูปเต็มกรอบโดยไม่เบี้ยว */
        }

        /* รายละเอียดในการ์ด */
        .card-content {
            padding: 20px;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        .menu-type {
            font-size: 12px;
            color: #888;
            background: #eee;
            padding: 4px 10px;
            border-radius: 20px;
            align-self: flex-start;
            margin-bottom: 10px;
        }

        .menu-name {
            font-size: 18px;
            font-weight: 500;
            margin: 0 0 10px 0;
            line-height: 1.4;
        }

        .menu-price {
            font-size: 22px;
            font-weight: 600;
            color: #e4002b;
            margin-top: auto; /* ดันราคาลงไปด้านล่างเสมอ */
            margin-bottom: 15px;
        }

        /* ปุ่มกดสั่งซื้อหลอกๆ ให้ดูสมจริง */
        .btn-order {
            background-color: #e4002b;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 25px;
            font-size: 16px;
            font-family: 'Kanit', sans-serif;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-order:hover {
            background-color: #bf0024;
        }
    </style>
</head>
<body>

    <h1 class="header-title">เมนูความอร่อย</h1>
    
    <?php
        // แสดง error
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        
        include "action/connect.php";

        // ดึงข้อมูลทั้งหมดจากตาราง menus
        $sql = "SELECT * FROM menus"; 
        $result = mysqli_query($con, $sql);
    ?>

    <div class="menu-grid">

        <?php
            // วนลูปสร้างการ์ดตามจำนวนข้อมูลที่มีในฐานข้อมูล
            foreach($result as $menu){
        ?>
            <div class="menu-card">
                <div class="img-wrapper">
                    <img src="<?= $menu["menu_image"] ?>" alt="<?= $menu["menu_name"] ?>">
                </div>
                <div class="card-content">
                    <span class="menu-type">ประเภทที่: <?= $menu["type_id"] ?></span>
                    <h3 class="menu-name"><?= $menu["menu_name"] ?></h3>
                    <div class="menu-price">฿<?= number_format($menu["menu_price"]) ?></div>
                    <button class="btn-order">สั่งเลย</button>
                </div>
            </div>
        <?php
            }
        ?>

    </div>

</body>
</html>