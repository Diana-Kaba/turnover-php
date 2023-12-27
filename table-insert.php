<?php

$conn = mysqli_connect('localhost', 'root', '', 'goods');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO `товарообіг` (`Найменування товару`, `Ціна`, `Продажі`) VALUES ('Книга Пригоди в Лісі', 150, 120);";
$sql .= "INSERT INTO `товарообіг` (`Найменування товару`, `Ціна`, `Продажі`) VALUES ('Футболка Геометрія', 250, 90);";
$sql .= "INSERT INTO `товарообіг` (`Найменування товару`, `Ціна`, `Продажі`) VALUES ('Смартфон XYZ-2000', 12000, 10);";
$sql .= "INSERT INTO `товарообіг` (`Найменування товару`, `Ціна`, `Продажі`) VALUES ('Навушники Bluetooth', 800, 75);";
$sql .= "INSERT INTO `товарообіг` (`Найменування товару`, `Ціна`, `Продажі`) VALUES ('Стілець Комфорт', 700, 40);";

if (mysqli_multi_query($conn, $sql)) {
    echo "New records created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
