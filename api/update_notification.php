<?php
require_once('../config/Dbhelper.php');
$user_id = $_GET['user_id'];
$notification_id = $_GET['notification_id'];
$is_seen = $_GET['is_seen'];

$is_seen = ($is_seen == 1) ? 1 : 0;
$sql = "UPDATE notifications SET is_seen = $is_seen WHERE user_id = '$user_id' AND notification_id = '$notification_id'";
if ($conn->query($sql) === TRUE) {
    echo json_encode(array('status' => true, 'message' => 'Xem thông báo thành công'));
} else {
    echo json_encode(array('status' => false, 'message' => 'Xem thông báo thất bại'));
}
$conn->close();
?>
