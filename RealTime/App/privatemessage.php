<?php
include_once '../Conect/connect.php';
session_start();

class PrivateMsg {
    public static function SendMessage($conn) {
        if(isset($_POST['mensagem']) || $_POST['received']) {
            $sql = "INSERT INTO private(send,received,message) VALUES(?,?,?)";
            $query = $conn->prepare($sql);
            $query->bindValue(1, $_SESSION['nome']);
            $query->bindValue(2, $_POST['received']);
            $query->bindValue(3, $_POST['mensagem']);
            $query->execute();
        }
    }
}
PrivateMsg::SendMessage($conn);