<?php
session_start();
//Vai importar o UsuarioController

require_once 'Controller/UsuarioController.php';
require_once 'Controller/ImovelController.php';
require_once 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php?page=usuario">Cadastrar usuario</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php?page=imovel">Cadastrar Imovel</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
</body>
</html>

<?php
  if (isset($_SESSION['logado']) && $_SESSION['logado'] == true)
  {
    require_once 'view/menu.php';
    if (isset($_GET['action'])){
      if ($_GET['action'] =='editar') {
        //Chama uma função PHP que permite informar a classe e o método que será adicionado
        $usuario = call_user_func(array('UsuarioController','editar'),$_GET['id']);
        require_once 'view/cadUsuario.php';
      }
      if ($_GET['action'] == 'listar') {
        require_once 'view/lisUsuario.php';
      }
      if ($_GET['action'] == 'excluir') {
        //Chama uma função PHP que permite informar a classe e o Método que sera adicionado 
        $usuario = call_user_func(array('UsuarioController','excluir'),$_GET['id']);
        require_once 'view/listUsuario.php';
      }
      else
      {
        require_once 'view/cadUsuario.php';  
      }
    }  
    else {
      if (isset($_GET['logar'])) {
        require_once 'view/login.php';
      }
      else {
        require_once 'principal';
      }
    }
    require_once 'foot.php';
  }
// if (isset($_GET['page']))
// {
 
//   if(($_GET['page'] == 'imovel')) {

//     if(isset($_GET['action'])){
//       if($_GET['action'] == 'editar'){
//           $imovel = call_user_func(array('ImovelController','editar'),$_GET['id']);
//           require_once 'view/cadImovel.php';
//       }
//       if($_GET['action'] == 'listar'){
//           require_once 'view/listImovel.php';
//       }
//       if($_GET['action'] == 'excluir'){
//           $imovel = call_user_func(array('ImovelController','excluir'),$_GET['id']);
//           require_once 'view/listImovel.php';
//       }
//     }
//     else {
//       require_once 'view/cadImovel.php';
//     }
//   }
//     elseif (isset($_GET['page']) == 'usuario') {

//       if(isset($_GET['action'])){
//         if($_GET['action'] == 'editar'){
//             $usuario = call_user_func(array('UsuarioController','editar'),$_GET['id']);
//             require_once 'view/cadUsuario.php';
//         }
      
//         if($_GET['action'] == 'listar'){
//             require_once 'view/listUsuario.php';
//         }
      
//         if($_GET['action'] == 'excluir'){
//             $usuario = call_user_func(array('UsuarioController','excluir'),$_GET['id']);
//             require_once 'view/listUsuario.php';
      
//         }
//       }
//       else {
//         require_once 'view/cadUsuario.php';
//       }
//     }
  

?>