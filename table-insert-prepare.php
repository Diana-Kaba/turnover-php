<?php

$conn = new mysqli('localhost', 'root', '', 'goods');
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("INSERT INTO `товарообіг` (`Найменування товару`, `Ціна`, `Продажі`) VALUES (?, ?, ?)");
$stmt->bind_param("sii", $name, $price, $sales);

$name = "Смартфон Xiaomi 12T";
$price = 19000;
$sales = 77;
$stmt->execute();

$name = "Навушники Airpods Max";
$price = 50000;
$sales = 9;
$stmt->execute();