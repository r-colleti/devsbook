<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\UserHandler;
use \src\handlers\PostHandler;
use \src\handlers\AstroLojaHandler;
use \src\handlers\AstrofotografiaHandler;
use \src\handlers\AstroBibliotecaHandler;

class HomeController extends Controller {

    private $loggedUser;

    public function __construct() {
        $this->loggedUser = UserHandler::checkLogin();
        if($this->loggedUser === false) {
            $this->loggedUser = (object) ['id' => 'null'];
        }
    }

    /*public function index() {
        $page = intval(filter_input(INPUT_GET, 'page'));

        $feed = PostHandler::getHomeFeed(
            $this->loggedUser->id,
            $page
        );

        $this->render('home', [
            'loggedUser' => $this->loggedUser,
            'feed' => $feed
        ]);
    }*/

    public function indexAtual() {
        /*$page = intval(filter_input(INPUT_GET, 'page'));

        $feed = PostHandler::getHomeFeed(
            $this->loggedUser->id,
            $page
        );*/

        $produtos = AstroLojaHandler::getProdutosHome($this->loggedUser->id);

        $astrofotografias = AstrofotografiaHandler::getAstrofotografiasHome($this->loggedUser->id);

        $arquivos = AstroBibliotecaHandler::getArquivosHome($this->loggedUser->id);

        $numeroUsers = UserHandler::numeroUsers();

        $numeroAstrofotografias = AstrofotografiaHandler::numeroAstrofotografias();

        $numeroArquivos = AstroBibliotecaHandler::numeroArquivos();

        $numeroProdutos = AstroLojaHandler::numeroProdutos();

        $this->render('index', [
            'loggedUser' => $this->loggedUser,
            'produtos' => $produtos,
            'astrofotografias' => $astrofotografias,
            'arquivos' => $arquivos,
            'numeroUsers' => $numeroUsers,
            'numeroAstrofotografias' => $numeroAstrofotografias,
            'numeroArquivos' => $numeroArquivos,
            'numeroProdutos' => $numeroProdutos
        ]);
    }

}