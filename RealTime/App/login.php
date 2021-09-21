<?php
session_start();

class Enter {
    public function Login($conn, $nome) {
        $sql = "INSERT INTO usuarios(nome) VALUES(?)";
        $query = $conn->prepare($sql);
        $query->bindValue(1, $nome);
        $query->execute();
        if($query->rowCount() > 0) {
            $_SESSION['nome'] = $nome;
            header("location: RealTime");
        }else {
            throw new Exception("Erro ao criar usuário");
        }
    }
}