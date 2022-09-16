<?php
ob_start();
?>
<div class="container">
        <form name="cadImovel" id="cadImovel" action="" method="post" enctype="multipart/form-data">
            <div class="card" style="top:40px">
                <div class="card-header">
                    <span class="card-title">Imovéis</span>
                </div>
                <div class="card-body">
                </div>
                <div class="form-group form-row">
                    <label class="col-sm-2 col-form-label text-right">Foto:</label>
                    <input type="file" class="form-control col-sm-8" name="foto" id="foto"/>
                    <br>
                </div>
                <?php
                    if(isset($imovel) && !empty($imovel->getPath())){
                ?>
                <div class="form-group form-row">
                    <div class="text-center">
                        <img class="img-thumbnail" style="width: 25%;" src="<?php echo $imovel->getPath();?>">
                    </div>
                </div>
                <?php
                    }
                ?>
                
                <div class="card-footer">
                    <input type="hidden" name="id" id="id" value="<?php echo $_GET['id'] ?>" />
                    <input type="submit" class="btn btn-success" name="btnSalvar" id="btnSalvar">
                </div>
            </div>
        </form>
    </div>


<?php

//Verifica se o botão submit foi acionado
if(isset($_POST['btnSalvar'])){

    //Chama uma função PHP que permite informar a classe e o Método que será acionado
    if(isset($imovel)){
        call_user_func(array('GaleriaController','salvar'),$imovel->getFoto(),$imovel->getFotoTipo());
    }else{
        call_user_func(array('GaleriaController','salvar'));
    }

    header('Location: index.php?page=imovel&action=listGaleria');
}

ob_end_flush();

?>

