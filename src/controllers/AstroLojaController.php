<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\UserHandler;
//use \src\handlers\AstrofotografiaHandler;
use \src\handlers\AstroLojaHandler;

class AstroLojaController extends Controller {

	private $loggedUser;

	public function __construct() {
		$this->loggedUser = UserHandler::checkLogin();
		if($this->loggedUser === false) {
			$this->loggedUser = (object) ['id' => 'null'];
		}
	}

	/*public function astroLoja() {

		$page = intval(filter_input(INPUT_GET, 'page'));
        $filterCategoria = filter_input(INPUT_GET, 'categoria');
        $filterConteudo = filter_input(INPUT_GET, 'conteudo');

        $feedLoja = AstroLojaHandler::getAstrolojaFeed(
            $this->loggedUser->id,
            $page,
            $filterCategoria,
            $filterConteudo
        );

		$this->render('/astroloja', [
			'loggedUser' => $this->loggedUser,
			'feedAstroloja' => $feedLoja,
			'categoria' => $filterCategoria,
			'conteudo' => $filterConteudo
		]);
	}*/

	public function astroProduto() {

		$idProduto = intval(filter_input(INPUT_GET, 'id'));

		$infoProduto = AstroLojaHandler::getProduto(
			$this->loggedUser->id,
			$idProduto
		);

		$this->render('/produto', [
			'loggedUser' => $this->loggedUser,
			'infoProduto' => $infoProduto
		]);
	}

	public function astroLojaAction() {

		echo '<script>console.log("Produto add")</script>';

		$id_user = $this->loggedUser->id;

		$titulo = filter_input(INPUT_POST, 'titulo');
		$valor = filter_input(INPUT_POST, 'valor');
		$img1 = filter_input(INPUT_POST, 'imagem1');
		$img2 = filter_input(INPUT_POST, 'imagem2');
		$img3 = filter_input(INPUT_POST, 'imagem3');
		$img4 = filter_input(INPUT_POST, 'imagem4');
		$imagemName1 = '';
		$imagemName2 = '';
		$imagemName3 = '';
		$imagemName4 = '';
		$categoria = filter_input(INPUT_POST, 'categoria');
		$pais = filter_input(INPUT_POST, 'pais');
		$estado = filter_input(INPUT_POST, 'estado');
		$cidade = filter_input(INPUT_POST, 'cidade');
		$descricao = filter_input(INPUT_POST, 'descricao');
		$contatos = filter_input(INPUT_POST, 'contatos');

		if (isset($_FILES['imagem1']) && $_FILES['imagem1']['error'] === UPLOAD_ERR_OK) {
			$imagemName1 = md5(time().rand(0,9999)).'.jpg';
			move_uploaded_file($_FILES['imagem1']['tmp_name'], 'media/uploads/'.$imagemName1);
		}

		if (isset($_FILES['imagem2']) && $_FILES['imagem2']['error'] === UPLOAD_ERR_OK) {
			$imagemName2 = md5(time().rand(0,9999)).'.jpg';
			move_uploaded_file($_FILES['imagem2']['tmp_name'], 'media/uploads/'.$imagemName2);
		}

		if (isset($_FILES['imagem3']) && $_FILES['imagem3']['error'] === UPLOAD_ERR_OK) {
			$imagemName3 = md5(time().rand(0,9999)).'.jpg';
			move_uploaded_file($_FILES['imagem3']['tmp_name'], 'media/uploads/'.$imagemName3);
		}

		if (isset($_FILES['imagem4']) && $_FILES['imagem4']['error'] === UPLOAD_ERR_OK) {
			$imagemName4 = md5(time().rand(0,9999)).'.jpg';
			move_uploaded_file($_FILES['imagem4']['tmp_name'], 'media/uploads/'.$imagemName4);
		}

		/*if (isset($_FILES['imagem1']) && $_FILES['imagem1']['error'] === UPLOAD_ERR_OK) {
			if (move_uploaded_file($_FILES['imagem1']['tmp_name'], 'media/uploads/'.$imagemName1)) {
			 	$imagemName1 = md5(time().rand(0,9999)).'.jpg';
			 }
		}

		if (isset($_FILES['imagem2']) && $_FILES['imagem2']['error'] === UPLOAD_ERR_OK) {
			if (move_uploaded_file($_FILES['imagem2']['tmp_name'], 'media/uploads/'.$imagemName2)) {
			 	$imagemName2 = md5(time().rand(0,9999)).'.jpg';
			 }
		}

		if (isset($_FILES['imagem3']) && $_FILES['imagem3']['error'] === UPLOAD_ERR_OK) {
			if (move_uploaded_file($_FILES['imagem3']['tmp_name'], 'media/uploads/'.$imagemName3)) {
			 	$imagemName3 = md5(time().rand(0,9999)).'.jpg';
			 }
		}

		if (isset($_FILES['imagem4']) && $_FILES['imagem4']['error'] === UPLOAD_ERR_OK) {
			if (move_uploaded_file($_FILES['imagem4']['tmp_name'], 'media/uploads/'.$imagemName4)) {
			 	$imagemName4 = md5(time().rand(0,9999)).'.jpg';
			 }
		}*/

		AstroLojaHandler::addProduto($id_user, $titulo, $valor, $imagemName1, $imagemName2, $imagemName3, $imagemName4, $categoria, $pais, $estado, $cidade, $descricao, $contatos);

		header('Location: astroloja');
		exit;
	}

	public function delete($atts = []) {
		if (!empty($atts['id'])) {
			$idProduto = $atts['id'];

			AstroLojaHandler::delete(
				$idProduto,
				$this->loggedUser->id
			);
		}

		$this->redirect('/astroloja');
	}
}