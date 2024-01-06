<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\UserHandler;
use \src\handlers\PostHandler;
use \src\handlers\AstrofotografiaHandler;
use \src\handlers\AstroLojaHandler;
use \src\handlers\AstroBibliotecaHandler;

class AjaxController extends Controller {

    private $loggedUser;

    public function __construct() {
        $this->loggedUser = UserHandler::checkLogin();
        if($this->loggedUser === false) {
            /*header("Content-Type: application/json");
            echo json_encode(['error' => 'Usuário não logado']);
            exit;*/

            $this->loggedUser = (object) ['id' => 'null'];
        }
    }

    public function astroLoja() {

        $this->render('/astroloja', [
            'loggedUser' => $this->loggedUser
        ]);
    }

    public function fetchAstroLoja() {
        $categoria = filter_input(INPUT_GET, 'categoria');
        $conteudo = filter_input(INPUT_GET, 'conteudo');

        $feedLoja = AstroLojaHandler::getAstrolojaFeed(
            $this->loggedUser->id,
            $categoria,
            $conteudo
        );

        header('Content-Type: application/json');

        echo json_encode($feedLoja);
    }

    public function astroGaleria() {

        $this->render('/astrogaleria', [
            'loggedUser' => $this->loggedUser
        ]);
    }

    public function fetchAstrofotografias() {
        $categoria = filter_input(INPUT_GET, 'categoria');
        $conteudo = filter_input(INPUT_GET, 'conteudo');

        $feedAstrogaleria = AstrofotografiaHandler::getAstrogaleriaFeed(
            $this->loggedUser->id,
            $categoria,
            $conteudo
        );

        header('Content-Type: application/json');

        echo json_encode($feedAstrogaleria);
    }

    public function astroBiblioteca() {

        $this->render('/biblioteca', [
            'loggedUser' => $this->loggedUser
        ]);
    }

    public function fetchArquivos() {
        $categoria = filter_input(INPUT_GET, 'categoria');
        $conteudo = filter_input(INPUT_GET, 'conteudo');

        $feedbiblioteca = AstroBibliotecaHandler::getAstrobibliotecaFeed(
            $this->loggedUser->id,
            $categoria,
            $conteudo
        );

        header('Content-Type: application/json');

        echo json_encode($feedbiblioteca);
    }

    public function like($atts) {
        $id = $atts['id'];

        if(PostHandler::isLiked($id, $this->loggedUser->id)) {
            PostHandler::deleteLike($id, $this->loggedUser->id);
        } else {
            PostHandler::addLike($id, $this->loggedUser->id);
        }
    }

    public function likeAstrofotografia($atts) {
        $id = $atts['id'];

        if(AstrofotografiaHandler::isLiked($id, $this->loggedUser->id)) {
            AstrofotografiaHandler::deleteLike($id, $this->loggedUser->id);
        } else {
            AstrofotografiaHandler::addLike($id, $this->loggedUser->id);
        }
    }

    public function visuAstrofotografia($atts) {
        $id = $atts['id'];
        $visualizacaoAtual = $atts['visualizacao'];

        AstrofotografiaHandler::addVisu($id, $this->loggedUser->id, $visualizacaoAtual);

    }

    public function visuArquivo($atts) {
        $id = $atts['id'];
        $visualizacaoAtual = $atts['visualizacao'];

        AstroBibliotecaHandler::addVisu($id, $this->loggedUser->id, $visualizacaoAtual);

    }

    public function addDownload($atts) {
        $id = $atts['id'];
        $downloadCount = $atts['count'];

        AstroBibliotecaHandler::addDownload($id, $this->loggedUser->id, $downloadCount);

    }

    public function comment() {
        $array = ['error'=>''];

        $id = filter_input(INPUT_POST, 'id');
        $txt = filter_input(INPUT_POST, 'txt');

        if($id && $txt) {
            PostHandler::addComment($id, $txt, $this->loggedUser->id);

            $array['link'] = '/perfil/'.$this->loggedUser->id;
            $array['avatar'] = '/media/avatars/'.$this->loggedUser->avatar;
            $array['name'] = $this->loggedUser->name;
            $array['body'] = $txt;
        }

        header("Content-Type: application/json");
        echo json_encode($array);
        exit;
    }

    public function commentAstrofotografia() {
        $array = ['error'=>''];

        $id = filter_input(INPUT_POST, 'id');
        $comentarioConteudo = filter_input(INPUT_POST, 'comentarioConteudo');

        if($id && $comentarioConteudo) {
            AstrofotografiaHandler::addComment($id, $comentarioConteudo, $this->loggedUser->id);

            $array['link'] = '/perfil/'.$this->loggedUser->id;
            $array['avatar'] = '/media/avatars/'.$this->loggedUser->avatar;
            $array['name'] = $this->loggedUser->name;
            $array['body'] = $comentarioConteudo;
        }

        header("Content-Type: application/json");
        echo json_encode($array);
        exit;
    }

    public function upload() {
        $array = ['error'=>''];

        if(isset($_FILES['photo']) && !empty($_FILES['photo']['tmp_name'])) {
            $photo = $_FILES['photo'];

            $maxWidth = 800;
            $maxHeight = 800;

            if(in_array($photo['type'], ['image/png', 'image/jpg', 'image/jpeg'])) {

                list($widthOrig, $heightOrig) = getimagesize($photo['tmp_name']);
                $ratio = $widthOrig / $heightOrig;

                $newWidth = $maxWidth;
                $newHeight = $maxHeight;
                $ratioMax = $maxWidth / $maxHeight;

                if($ratioMax > $ratio) {
                    $newWidth = $newHeight * $ratio;
                } else {
                    $newHeight = $newWidth / $ratio;
                }

                $finalImage = imagecreatetruecolor($newWidth, $newHeight);
                switch($photo['type']) {
                    case 'image/png':
                        $image = imagecreatefrompng($photo['tmp_name']);
                    break;
                    case 'image/jpg':
                    case 'image/jpeg':
                        $image = imagecreatefromjpeg($photo['tmp_name']);
                    break;
                }

                imagecopyresampled(
                    $finalImage, $image,
                    0, 0, 0, 0,
                    $newWidth, $newHeight, $widthOrig, $heightOrig
                );

                $photoName = md5(time().rand(0,9999)).'.jpg';
                imagejpeg($finalImage, 'media/uploads/'.$photoName);

                PostHandler::addPost(
                    $this->loggedUser->id,
                    'photo',
                    $photoName
                );

            }


        } else {
            $array['error'] = 'Nenhuma imagem enviada';
        }

        header("Content-Type: application/json");
        echo json_encode($array);
        exit;
    }

    public function lojaFeedFiltrar() {

    }

}