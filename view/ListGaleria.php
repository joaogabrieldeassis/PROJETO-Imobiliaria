<?php
//Chama uma função PHP que permite informar a classe e o Método que será acionado
  $galeria = call_user_func(array('GaleriaController','listGaleria'));


?>
<div class="container">

<h1>Imóveis</h1>
<hr>
<table class="table" style="top:40px;">
        <tbody>
        <?php 
        $cont=0;
        //Verifica se houve algum retorno
        if (isset($galeria) && !empty($galeria)) {
          foreach ($galeria as $foto) {
            
            if($cont==0){
              echo '<tr>';
            }
            
            echo '<td>';
            echo '<p align="center"><img class="img-thumbnail" style="width: 250px; height: 200px;" src="'.$galeria->getPath().'"></p><br>';
            $cont++;
            if($cont==4)
              $cont=0;

          }
        }else{
            ?>
                <tr>
                    <td colspan="3">Nenhum registro encontrado</td>
                </tr>
                <?php
        }
?>
        </tbody>
</table>
</div>


