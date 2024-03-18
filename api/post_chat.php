<?php
    try{
        require_once('../config/Dbhelper.php');
            $data = json_decode(file_get_contents('php://input'), true);
            $sender_id = $data['sender_id'];
            $receiver_id = $data['receiver_id'];
            $content= $data['content'];
            $time = $data['time'];
            $type_mess = $data['type_mess'];
        
            $sql = "INSERT INTO messages VALUES (null, '$sender_id', '$receiver_id', '$content', '$time', '$type_mess')";
            $result = $conn->query($sql);
            if ($result == true) {
                echo json_encode(array('status' => true, 'message' => 'Gửi tin nhắn thành công'));
            } else {
                echo json_encode(array('status' => false, 'message' => 'Gửi tin nhắn thất bại'));
            }
            $conn->close();
    } catch(Exception $e) {
        echo("Lỗi");
    }
?>
