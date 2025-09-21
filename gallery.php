<?php
$conn = new mysqli("localhost", "root", "", "art_gallery");
if ($conn->connect_error) {
    die("เชื่อมต่อฐานข้อมูลล้มเหลว: " . $conn->connect_error);
}

$sql = "SELECT * FROM imagedb ORDER BY id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>แกลเลอรี่</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        h2 {
            font-size: 2em;
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        }

        .upload-button {
            display: inline-block;
            background-color: #28a745;
            color: white;
            padding: 10px 18px;
            border-radius: 6px;
            font-weight: bold;
            text-decoration: none;
            margin-bottom: 25px;
            transition: background-color 0.3s ease;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.1);
        }

        .upload-button:hover {
            background-color: #218838;
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 25px;
        }

        .image-card {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 15px;
            background-color: #fafafa;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .image-card img {
            max-width: 100%;
            height: auto;
            border-radius: 6px;
            margin-bottom: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .image-card h3 {
            font-size: 1.2em;
            color: #444;
            text-align: center;
            margin-bottom: 10px;
        }

        .image-card p {
            font-size: 0.95em;
            color: #555;
            line-height: 1.5;
            text-align: justify;
        }

        @media (max-width: 768px) {
            .gallery-grid {
                grid-template-columns: repeat(auto-fill, minmax(100%, 1fr));
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>แกลเลอรี่รูปภาพ</h2>
        <a href="upload.php" class="upload-button">+ อัปโหลดใหม่</a>

        <div class="gallery-grid">
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="image-card">
                    <h3><?= htmlspecialchars($row['title']) ?></h3>
                    <img src="data:image/jpeg;base64,<?= base64_encode($row['image']) ?>" alt="<?= htmlspecialchars($row['title']) ?>">
                    <p><?= nl2br(htmlspecialchars($row['description'])) ?></p>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</body>
</html>
