<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
    <body>
        <div class= "container">
            <form name = "cadLogin" id = "cadLogin" action="" method = "post">
                <div class = "card" style = "top:40px; width: 50%;">
                <div>
                    <span class = "card-title">Login</span>
                </div>
                <div class="card-body">
                </div>
                <div class="form-group form-row">
                    <label class="col-sm-2 col-form-label text-right">Usuario: </label>
                    <input type="text" class = "form-control col-sm-8 " name = "login" id = "login" value = ""/>
                </div>
                <div class="form-group form-row">
                    <label class="col-sm-2 col-form-label text-right">Senha: </label>
                    <input type="password" class="form-control col-sm-8" name = "senha" id = "senha" value = ""/>
                </div>
                <div class = "card-footer">
                  <input type="submit" class = "btn btn-succes" name = "btnLogar" id = "btnLogar" value = "Logar">
                </div>
                </div>
            </form>
        </div>
    </body>
</html>
<?php
    //Verifica se o botão php foi adicionado
    if (isset($_POST['btnLogar'])){
    //Chama uma função php que permite informar a classe e o método que sera adicionado
    $_SESSION['logado'] = call_user_func(array('UsuarioController','logar'));
    //Armazena o usuario na SESSION
    $_SESSION['login'] = $_POST['login']
    //Rediriciona para a index
    header('Location: index.php');
}
?>