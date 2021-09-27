<?php
include_once '../Conect/connect.php';
session_start();

class getPrivateMessages {
    public static function Messages($conn) {
        if(isset($_POST['user'])) {
            $sql = "SELECT * FROM private WHERE send = ? AND received = ? OR send = ? AND received = ?";
            $query = $conn->prepare($sql);
            $query->bindValue(1, $_SESSION['nome']);
            $query->bindValue(2, $_POST['user']);
            $query->bindValue(3, $_POST['user']);
            $query->bindValue(4, $_SESSION['nome']);
            $query->execute();
            if($query->rowCount() > 0) {
                foreach($query->fetchAll(\PDO::FETCH_ASSOC) as $row) {
                    if($_SESSION['nome'] == $row['received']) {
                        echo "<div>";
                            echo "<p>$row[send]</p>";
                            echo "<h1>$row[message]</h1>";
                        echo "</div>";
                    }else {
                        echo "<div>";      
                            echo "<h1>$row[message]</h1>";
                        echo "</div>";
                    }
                }
            }
        }
    }
}
getPrivateMessages::Messages($conn);