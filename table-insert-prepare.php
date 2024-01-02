<?php

$conn = mysqli_connect('localhost', 'root', '', 'goods');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_query($conn, "START TRANSACTION");

$sql1 = "INSERT INTO `товарообіг` (`Найменування товару`, `Ціна`, `Продажі`) VALUES ('Книга Різдвяна історія', 270, 142);";
$sql2 = "INSERT INTO `товарообіг` (`Найменування товару`, `Ціна`, `Продажі`) VALUES ('Футболка Polo', 450, 110);";

if (mysqli_query($conn, $sql1) && mysqli_query($conn, $sql2)) {
    mysqli_query($conn, "COMMIT");
    echo "COMMIT";
} else {
    mysqli_query($conn, "ROLLBACK");
    echo "ROLLBACK";
}
mysqli_close($conn);
