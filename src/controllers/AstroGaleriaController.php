<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\UserHandler;
use \src\handlers\AstrofotografiaHandler;

class AstroGaleriaController extends Controller {

    private $loggedUser;

    public function __construct() {
        $this->loggedUser = UserHandler::checkLogin();
        if($this->loggedUser === false) {
            $this->loggedUser = (object) ['id' => 'null'];
        }
    }

    public function astroGaleria() {

        $page = intval(filter_input(INPUT_GET, 'page'));
        $filterCategoria = filter_input(INPUT_GET, 'categoria');
        $filterConteudo = filter_input(INPUT_GET, 'conteudo');

        $feedAstrogaleria = AstrofotografiaHandler::getAstrogaleriaFeed(
            $this->loggedUser->id,
            $page,
            $filterCategoria,
            $filterConteudo
        );

        $this->render('/astrogaleria', [
            'loggedUser' => $this->loggedUser,
            'feedAstrogaleria' => $feedAstrogaleria,
            'categoria' => $filterCategoria,
            'conteudo' => $filterConteudo
        ]);
    }

    public function astroGaleriaAction() {

        $id_user = $this->loggedUser->id;

        $titulo = filter_input(INPUT_POST, 'titulo');
        $imagem = filter_input(INPUT_POST, 'imagem');
        $imagemName = md5(time().rand(0,9999)).'.jpg';
        $descricao = filter_input(INPUT_POST, 'descricao');
        $categoria = filter_input(INPUT_POST, 'categoria');
        $objeto = filter_input(INPUT_POST, 'objeto');
        $fonte_dados = filter_input(INPUT_POST, 'fonte_dados');
        $data_captura = filter_input(INPUT_POST, 'data_captura');
        $pais = filter_input(INPUT_POST, 'pais');
        $estado = filter_input(INPUT_POST, 'estado');
        $cidade = filter_input(INPUT_POST, 'cidade');
        $quantidade_frames = filter_input(INPUT_POST, 'quantidade_frames');
        $exposicao_frames = filter_input(INPUT_POST, 'exposicao_frames');
        $telescopio = filter_input(INPUT_POST, 'telescopio');
        $camera = filter_input(INPUT_POST, 'camera');
        $montagem = filter_input(INPUT_POST, 'montagem');
        $telescopio_guia = filter_input(INPUT_POST, 'telescopio_guia');
        $camera_guia = filter_input(INPUT_POST, 'camera_guia');
        $redutor_focal = filter_input(INPUT_POST, 'redutor_focal');
        $software = filter_input(INPUT_POST, 'software');
        $filtros = filter_input(INPUT_POST, 'filtros');
        $oculares = filter_input(INPUT_POST, 'oculares');
        $barlows = filter_input(INPUT_POST, 'barlows');

        //formatar categoria
        $categoriaFormatada = str_replace("%2B", "+", $categoria);

        if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
        
            if (move_uploaded_file($_FILES['imagem']['tmp_name'], 'media/uploads/'.$imagemName)) {
                // O arquivo foi movido com sucesso para o diretório de destino
                // ...
            } else {
                // Ocorreu um erro ao mover o arquivo
                // ...
            }
        }

        AstrofotografiaHandler::addAstrofotografia($id_user, $titulo, $imagemName, $descricao, $categoriaFormatada, $objeto, $fonte_dados, $data_captura, $pais, $estado, $cidade, $quantidade_frames, $exposicao_frames, $telescopio, $camera, $montagem, $telescopio_guia, $camera_guia, $redutor_focal, $software, $filtros, $oculares, $barlows);

        header('Location: astrogaleria');
        exit;
    }

    public function astroFotografia() {

        $idAstrofotografia = intval(filter_input(INPUT_GET, 'id'));

        $infoAstrofotografia = AstrofotografiaHandler::getAstrofotografia(
            $this->loggedUser->id,
            $idAstrofotografia
        );

        $this->render('/astrofotografia', [
            'loggedUser' => $this->loggedUser,
            'infoAstrofotografia' => $infoAstrofotografia
        ]);
    }

    public function delete($atts = []) {
        if(!empty($atts['id'])) {
            $idFotografia = $atts['id'];

            AstrofotografiaHandler::delete(
                $idFotografia,
                $this->loggedUser->id
            );
        }

        $this->redirect('/astrogaleria');
    }
}