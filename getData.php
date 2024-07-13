<?php
include 'koneksi.php';
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}  

// $result = $conn->query("SELECT * FROM datatest ORDER BY id DESC LIMIT 1");
$result = $conn->query("SELECT * FROM data");
$data = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

echo json_encode($data);

$conn->close();
?>