<?php
require_once('../config/Dbhelper.php');

$sender_id = $_GET['sender_id'];
$receiver_id = $_GET['receiver_id'];

$sql = "SELECT * FROM messages WHERE (sender_id = '$sender_id' AND receiver_id = '$receiver_id') OR (sender_id = '$receiver_id' AND receiver_id = '$sender_id')";
$result = $conn->query($sql);

if ($result) {
    if ($result->num_rows > 0) {
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        $response = array(
            'status' => true, // Thành công
            'data' => $data
        );
        echo json_encode($response);
    } else {
        $response = array(
            'status' => false, // Thất bại
            'message' => 'Không có tin nhắn'
        );
        echo json_encode($response);
    }
} else {
    $response = array(
        'status' => false, // Thất bại
        'message' => 'Lỗi truy vấn cơ sở dữ liệu'
    );
    echo json_encode($response);
}

$conn->close();
?>
