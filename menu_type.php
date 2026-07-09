<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Types</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <style>
        /* ธีมสว่างแบบเดียวกับหน้าเมนู */
        body {
            font-family: 'Kanit', sans-serif;
            background-color: #f4f7f6; /* สีพื้นหลังสว่าง */
            margin: 0;
            padding: 40px 20px;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .header-title {
            text-align: center;
            color: #e4002b;
            margin-bottom: 30px;
            font-size: 32px;
            font-weight: 600;
        }

        /* ตกแต่งกล่องครอบตารางให้โค้งมนและมีเงา (สไตล์เดียวกับการ์ด) */
        .table-container {
            background-color: #ffffff;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            width: 100%;
            max-width: 800px;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        /* หัวตารางสีแดง KFC */
        thead {
            background-color: #e4002b;
            color: #ffffff;
        }

        th {
            padding: 18px 15px;
            font-size: 18px;
            font-weight: 500;
            text-align: center;
        }

        td {
            padding: 15px;
            text-align: center;
            font-size: 16px;
            border-bottom: 1px solid #eeeeee;
        }

        /* เอาเส้นใต้แถวสุดท้ายออก */
        tr:last-child td {
            border-bottom: none;
        }

        /* เอฟเฟกต์ตอนชี้เมาส์ที่แถว สีแดงอ่อนๆ */
        tr:hover {
            background-color: #fef0f2;
        }

        /* ตกแต่งปุ่มกลับหน้าแรก ให้เหมือนปุ่มสั่งเลย */
        .btn-back {
            background-color: #e4002b;
            color: white;
            text-decoration: none;
            padding: 12px 30px;
            border-radius: 25px;
            font-size: 16px;
            font-weight: 500;
            transition: background-color 0.3s, transform 0.2s;
            box-shadow: 0 4px 10px rgba(228, 0, 43, 0.2);
        }

        .btn-back:hover {
            background-color: #bf0024;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>

    <h1 class="header-title">ประเภทเมนู</h1>

    <?php
        // แสดง error
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);

        include "action/connect.php";

        // ดึงข้อมูลประเภทเมนู
        $sql = "SELECT * FROM menu_types";
        $result = mysqli_query($con, $sql);
    ?>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>รหัสประเภท</th>
                    <th>ชื่อประเภท</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($result as $menu){
                ?>
                <tr>
                    <td><?= $menu["type_id"] ?></td>
                    <td><strong><?= $menu["type_name"] ?></strong></td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>

    <a href="index.php" class="btn-back">กลับหน้าแรก</a>

</body>
</html>