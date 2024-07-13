<?php
include 'koneksi.php';

$value = $_GET['value'];
$kata = $_GET['kata'];

// Pastikan nilai 'value' dan 'kata' tidak kosong
if (!empty($value) && !empty($kata)) {
    // Periksa apakah data sudah ada dalam database
    $checkSql = "SELECT COUNT(*) AS count FROM data";
    $checkResult = $conn->query($checkSql);
    $row = $checkResult->fetch_assoc();
    $rowCount = $row['count'];

    if ($rowCount > 0) {
        // Jika data sudah ada, lakukan update
        $sql = "UPDATE data SET value = '$value', kata = '$kata'";
    } else {
        // Jika data belum ada, lakukan insert
        $sql = "INSERT INTO data (value, kata) VALUES ('$value', '$kata')";
    }

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil diupdate";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Parameter 'value' dan 'kata' tidak boleh kosong";
}

$conn->close();
?>
