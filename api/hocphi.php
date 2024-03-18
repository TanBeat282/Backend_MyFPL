<?php 
require_once('../config/Dbhelper.php');

$sql = "SELECT * FROM hocphis";
$result = $conn->query($sql);

if ($result) {
    if ($result->num_rows > 0) {
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        $response = array(
            'status' => true, 
            'data' => $data
        );
        echo json_encode($response);
    } else {
        $response = array(
            'status' => false, 
            'message' => 'Không có học phí'
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
?>
