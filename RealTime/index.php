<?php
include_once 'Conect/connect.php';
include_once 'App/login.php';

if(isset($_POST['entrar'])) {
    try {
        $login = new Enter();
        $login->login($conn, $_POST['nome']);
    } catch (\Exception $e) {
        $erros = $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/index.css">
    <script src="public/js/app.js"></script>
    <title>Game</title>
</head>
<body>
<?php
    echo isset($erros)? $erros : '';
    if(isset($_SESSION['nome'])) { ?>
        <div class="container">
            <div class="chat">
                <input type="text" id="msg" placeholder="Insira sua mensagem...">
                <button id="btn" onclick="insertMessage()">Enviar</button>
                <div class="mensagens"></div>
            </div>
        </div>
<?php 
    }else { ?>
        <div class="container">
            <div class="chat">
                <form action="" method="POST">
                    <h1>Insira seu nome e entre no Chat</h1>
                    <input type="text" name="nome" placeholder="Insira seu nome">
                    <button name="entrar">Entrar</button>
                </form>
            </div>
        </div>
<?php 
    }
?>
</body>
</html>