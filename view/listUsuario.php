<h1>Usuários</h1>
<hr />
<div>
<table class="table table-bordered table-striped" style="top:40px;">
        <thead>
            <tr>
                <th>Login</th>
                <th>Permissão</th>
                <th><a href="">Novo</a></th>
            </tr>
        </thead>
        <tbody>
            <?php
                $usuarios = call_user_func(array('UsuarioController','listar'));
                if(isset($usuarios) && !empty($usuarios)){
                    foreach($usuarios as $usuario){
            ?>
                        <tr>
                            <td><?php echo $usuario->getLogin();?></td>
                            <td><?php echo $usuario->getPermissao();?></td>
                            <td>
                                <a href="index.php?page=usuario&action=editar&id=<?php echo $usuario->getId(); ?>">Editar</a>
                                <a href="index.php?page=usuario&action=excluir&id=<?php echo $usuario->getId(); ?>" class="btn btn-primary btn-sm">Excluir</a>

                            </td>
                        </tr>
                        <?php
                    }
                }else{
            ?>
            <tr>
                <td colspan="3">Nenhum registro cadastrado</td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>