<?php
require_once 'model/Imovel.php';
require_once 'model/Galeria.php';

class GaleriaController{

    public static function salvar($fotoAtual = '', $fotoTipo=''){

        $imovel = new Galeria();

        $imagem = array();
        if(is_uploaded_file($_FILES['foto']['tmp_name'])){
            $imagem['data'] = file_get_contents($_FILES['foto']['tmp_name']);
            $imagem['path'] = 'imagens/'.$_FILES['foto']['name'];
            move_uploaded_file($_FILES['foto']['tmp_name'],$imagem['path']);
        }

        if(!empty($imagem)){
            $imovel->setPath($imagem['path']);

            if(!empty($_POST['path'])){
                unlink($_POST['path']);
            }
        }else{
            
            $imovel->setPath($imagem['path']);
        }

        $imovel->setIdImovel($_POST['id']);

        $imovel->save();
    }

    public static function listGaleria(){
         $idImovel = $_GET['id'];
        $imoveis = new Galeria();
        return $imoveis->listarGaleriaOne($idImovel);
    }

    public static function editar($id){
        $imovel = new Galeria();

        $imovel = $imovel->find($id);

        return $imovel;
    }

    public static function excluir($id){
        $imovel = new Galeria();
        $imovel = $imovel->remove($id);
    }
}

?>