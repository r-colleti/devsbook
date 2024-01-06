<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\UserHandler;
//use \src\handlers\AstrofotografiaHandler;
use \src\handlers\AstroBibliotecaHandler;
use Imagick;

class AstroBibliotecaController extends Controller {

	private $loggedUser;

	public function __construct() {
		$this->loggedUser = UserHandler::checkLogin();
		if($this->loggedUser === false) {
			$this->loggedUser = (object) ['id' => 'null'];
		}
	}

	public function astroBibliotecaAction() {

		$id_user = $this->loggedUser->id;

		$titulo = filter_input(INPUT_POST, 'titulo');
		$categoria = filter_input(INPUT_POST, 'categoria');
		$arq = filter_input(INPUT_POST, 'arquivo');
		$descricao = filter_input(INPUT_POST, 'descricao');
		$arquivoName = md5(time().rand(0,9999)).'.pdf';
		$arquivoTumbName = md5(time().rand(0,9999));

		if (isset($_FILES['arquivo']) && $_FILES['arquivo']['error'] === UPLOAD_ERR_OK) {

			/*$pdfFile = $_FILES['arquivo'];

		    // Verifique se é um arquivo PDF válido
		    if ($pdfFile['type'] === 'application/pdf') {
		        move_uploaded_file($_FILES['arquivo']['tmp_name'], 'media/uploads/'.$arquivoName);

		        // Crie uma instância do objeto Imagick com o arquivo PDF
		        $pdf = new Imagick($_FILES['arquivo']['tmp_name']);

		        // Se o PDF tiver várias páginas e você desejar a primeira página, você pode usar o comando a seguir:
		        $pdf->setIteratorIndex(0);

		        // Defina o formato de saída como JPEG
		        $pdf->setImageFormat('jpeg');

		        // Defina a qualidade da imagem JPEG (opcional)
		        $pdf->setImageCompressionQuality(90); // Valor de 0 a 100

		        // Salve a imagem como JPEG
		        $outputPath = 'media/uploads/'.$arquivoTumbName;
		        $pdf->writeImage($outputPath);

		        // Libere a memória
		        $pdf->clear();

		        echo 'A primeira página do PDF foi convertida em uma imagem JPEG e salva com sucesso.';
		    } else {
		        echo 'Por favor, faça o upload de um arquivo PDF válido.';
		    }*/

			move_uploaded_file($_FILES['arquivo']['tmp_name'], 'media/uploads/'.$arquivoName);
		}

		AstroBibliotecaHandler::addArquivo($id_user, $titulo, $categoria, $descricao, $arquivoName);

		header('Location: biblioteca');
		exit;
	}

	public function astroArquivo() {

		$idArquivo = intval(filter_input(INPUT_GET, 'id'));

		$infoArquivo = AstroBibliotecaHandler::getArquivo(
			$this->loggedUser->id,
			$idArquivo
		);

		$this->render('/arquivo', [
			'loggedUser' => $this->loggedUser,
			'infoArquivo' => $infoArquivo
		]);
	}

	public function delete($atts = []) {
		if (!empty($atts['id'])) {
			$idArquivo = $atts['id'];

			AstroBibliotecaHandler::delete(
				$idArquivo,
				$this->loggedUser->id
			);
		}

		$this->redirect('/biblioteca');
	}
}