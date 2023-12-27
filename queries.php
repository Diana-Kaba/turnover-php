<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Товарообіг</title>
    <style>
        table,th,tr,td {
            border: 1px solid black;
            padding: 10px;
        }

        table {
            border-collapse: collapse;
        }
    </style>
</head>
<body>
<?php

$conn = new mysqli('localhost', 'root', '', 'goods');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql1 = "SELECT MAX(`Продажі`) AS `Максимальний продаж` FROM `товарообіг`";
$sql2 = "SELECT SUM(`Ціна`) AS `Сума цін товарів` FROM `товарообіг`";
$sql3 = "SELECT * FROM `товарообіг` ORDER BY `Найменування товару` ASC;";
$sql4 = "SELECT * FROM `товарообіг` WHERE `Продажі` > 70 AND `Ціна` BETWEEN 200 AND 800";
$result1 = $conn->query($sql1);
$result2 = $conn->query($sql2);
$result3 = $conn->query($sql3);
$result4 = $conn->query($sql4);

if ($result1->num_rows > 0) {
    while ($row = $result1->fetch_assoc()) {
        echo "<table><tr><th>Максимальний продаж</th></tr><tr><td>{$row['Максимальний продаж']}</td></tr></table><br>";
    }
}
if ($result2->num_rows > 0) {
    while ($row = $result2->fetch_assoc()) {
        echo "<table><tr><th>Сума цін товарів</th></tr><tr><td>{$row['Сума цін товарів']}</td></tr></table><br>";
    }
}
if ($result3->num_rows > 0) {
    echo '<table><tr><th>Найменування товару</th><th>Ціна</th><th>Продажі</th></tr>';
    while ($row = $result3->fetch_assoc()) {
        echo "<tr><td>{$row['Найменування товару']}</td><td>{$row['Ціна']}</td><td>{$row['Продажі']}</td></tr>";
    }
    echo '</table><br>';
}
if ($result4->num_rows > 0) {
    echo '<table><tr><th>Найменування товару</th><th>Ціна</th><th>Продажі</th></tr>';
    while ($row = $result4->fetch_assoc()) {
        echo "<tr><td>{$row['Найменування товару']}</td><td>{$row['Ціна']}</td><td>{$row['Продажі']}</td></tr>";
    }
    echo '</table><br>';
} else {
    echo "<p>Немає результатів</p>";
}

$conn->close();
?>
</body>
</html>