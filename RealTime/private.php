<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="public/js/private.js"></script>
    <link rel="stylesheet" href="public/css/index.css">
    <title>Private messages</title>
</head>
<body>
<?php
    echo isset($erros)? $erros : '';
    if(isset($_SESSION['nome'])) { ?>
        <div class="container">
            <div class="chat">    
                <div class="mensagens"></div>
                <input type="text" id="msg" placeholder="Insira sua mensagem...">
                <input class="user" type="hidden" value="<?php echo $_GET['user']?>">
                <button id="btn" onclick="insertMessage()">Enviar</button>
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