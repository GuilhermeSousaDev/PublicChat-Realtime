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
                echo "<a href='private.php?user=$row[nome]'><p>$row[nome]</p></a>";
                echo "<p>$row[mensagem]</p>";
            echo '</div>';
        }else {
            echo '<div class="other_msg">';
                echo "<a href='private.php?user=$row[nome]'><p>$row[nome]</p></a>";
                echo "<p>$row[mensagem]</p>";
            echo '</div>';
        }
    }
}else {
    $row = [];
}
