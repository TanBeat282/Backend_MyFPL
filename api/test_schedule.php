<?php 
require_once('../config/Dbhelper.php');
$user_id = $_GET['user_id'];
$sql = "SELECT * FROM test_schedule WHERE user_id = '$user_id'";
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
            'message' => 'Không có lịch thi'
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
