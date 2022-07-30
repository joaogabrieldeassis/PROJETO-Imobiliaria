<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container">
        <form name="cadUsuario" id="cadUsuario" action="" method="post">
            <div class="card" style="top:40px; width: 50%;">
                <div class="card-header">
                    <span class="card-title">Usuários</span>
                </div>
                <div class="card-body">
                </div>
                <div class="form-group form-row">
                    <label class="col-sm-2 col-form-label text-right">Login:</label>
                    <input type="text" class="form-control col-sm-8" name="login" id="login" 
                    value="<?php echo isset($usuario)?$usuario->getLogin():''; ?>" />
                    <input type="hidden" name="id" id="id" 
                    value="<?php echo isset($usuario)?$usuario->getId():''; ?>" />
                </div>
                <div class="form-group form-row">
                    <label class="col-sm-2 col-form-label text-right">Senha:</label>
                    <input type="password" class="form-control col-sm-8" name="senha1" id="senha1" 
                    value="<?php echo isset($usuario)?$usuario->getSenha():''; ?>" />
                </div>
                <div class="form-group form-row">
                    <label class="col-sm-2 col-form-label text-right">Confirmação:</label>
                    <input type="password" class="form-control col-sm-8" name="senha2" id="senha2"
                    value="" />
                </div>
                <div class="form-group form-row">
                    <label class="col-sm-2 col-form-label text-right">Permissão:</label>
                    <select name="permissao" id="permissao" class="form-control col-sm-8">
                        <option value="0"></option>
                        <option value="A" <?php echo isset($usuario) && $usuario->getPermissao() == 'A'?'selected':''; ?>>Administrador</option>
                        <option value="C" <?php echo isset($usuario) && $usuario->getPermissao() == 'C'?'selected':''; ?>>Comum</option>
                    </select>
                </div>
                <div class="card-footer">
                    <input type="submit" class="btn btn-success" name="btnSalvar" id="btnSalvar">
                </div>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
<?php

if(isset($_POST['btnSalvar'])){
    require_once 'controller/UsuarioController.php';
    call_user_func(array('UsuarioController','salvar'));
    header('Location: index.php?page=usuario&action=listar');
}
?>