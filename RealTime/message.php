<?php
include_once 'Conect/connect.php';
session_start();

$sql = "SELECT * FROM messages";
$query = $conn->prepare($sql);
$query->execute();
if($query->rowCount() > 0) {
    foreach($query->fetchAll(PDO::FETCH_ASSOC) as $row) {
        if($_SESSION['nome'] == $row['nome']) {
            echo '<div class="my_msg">';
                echo "<p>$row[nome]</p>";
                echo "<p>$row[mensagem]</p>";
            echo '</div>';
        }else {
            echo '<div class="other_msg">';
                echo "<p>$row[nome]</p>";
                echo "<p>$row[mensagem]</p>";
            echo '</div>';
        }
    }
}else {
    $row = [];
}
