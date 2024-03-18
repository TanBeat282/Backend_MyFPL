<?php 
require_once('../config/Dbhelper.php');
$email = $_GET['email'];
$basis = $_GET['basis'];
$sql = "SELECT * FROM uses WHERE email = '$email' AND basis = '$basis'";
$result = $conn->query($sql);

if ($result) {
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $response = array(
            'status' => true, 
            'data' => $row
        );
        echo json_encode($response);
    } else {
        $response = array(
            'status' => false, 
            'message' => 'Vui lòng chọn lại cơ sở'
        );
        echo json_encode($response);
    }
} else {
    $response = array(
        'status' => false, 
        'message' => 'Lỗi truy vấn cơ sở dữ liệu'
    );
    echo json_encode($response);
}

$conn->close();
