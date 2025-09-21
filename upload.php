<?php
// เชื่อมต่อฐานข้อมูล
$conn = new mysqli("localhost", "root", "", "art_gallery");
if ($conn->connect_error) {
    die("เชื่อมต่อฐานข้อมูลล้มเหลว: " . $conn->connect_error);
}

$uploadSuccess = false; // ใช้สำหรับแสดงข้อความหลังอัปโหลด

// เมื่อผู้ใช้กด submit
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));

    $sql = "INSERT INTO imagedb (title, description, image) VALUES ('$title', '$description', '$image')";
    if ($conn->query($sql) === TRUE) {
        $uploadSuccess = true;
    } else {
        echo "<p style='color:red;text-align:center;'>❌ Error: " . $conn->error . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>ผลงานศิลปกรรม</title>
    <style>
        body {
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background: #f4f6f9;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .form-box {
            background: #fff;
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        label {
            float: left;
            font-weight: bold;
            margin-bottom: 6px;
            display: block;
            color: #555;
        }

        input[type="text"],
        input[type="file"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        textarea {
            resize: none;
            height: 80px;
        }

        input[type="submit"] {
            background: #4CAF50;
            color: white;
            border: none;
            padding: 12px;
            width: 100%;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background: #45a049;
        }

        .success-message {
            margin-top: 20px;
            text-align: center;
            color: green;
            font-size: 18px;
        }

        .success-button {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-weight: bold;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease;
        }

        .success-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="form-box">
        <h2>รูปภาพงานศิลปกรรม</h2>

        <?php if ($uploadSuccess): ?>
            <div class="success-message">
                อัปโหลดสำเร็จ
                <br>
                <a class="success-button" href="gallery.php">ไปที่แกลเลอรี่</a>
            </div>
        <?php else: ?>
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <label>ชื่อรูปภาพ:</label>
                <input type="text" name="title" required>

                <label>เลือกรูป:</label>
                <input type="file" name="image" required>

                <label>คำบรรยาย:</label>
                <textarea name="description" required></textarea>

                <input type="submit" name="submit" value="อัปโหลด">
            </form>
        <?php endif; ?>
    </div>
</div>
</body>
</html>
