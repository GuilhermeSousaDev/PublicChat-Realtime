<?php
session_start();
include_once '../Conect/connect.php';

if(isset($_POST['mensagem'])) {
    $sql = "INSERT INTO messages(mensagem,nome) VALUES(?,?)";
    $query = $conn->prepare($sql);
    $query->bindValue(1, $_POST['mensagem']);
    $query->bindValue(2, $_SESSION['nome']);
    $query->execute();
}