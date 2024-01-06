<?php
use core\Router;

$router = new Router();

$router->get('/', 'HomeController@indexAtual');

//Router para home antiga feed
//$router->get('/', 'HomeController@index');

$router->get('/login', 'LoginController@signin');
$router->post('/login', 'LoginController@signinAction');

$router->get('/cadastro', 'LoginController@signup');
$router->post('/cadastro', 'LoginController@signupAction');

$router->post('/post/new', 'PostController@new');
$router->get('/post/{id}/delete', 'PostController@delete');

$router->get('/perfil/{id}/fotos', 'ProfileController@photos');
$router->get('/perfil/{id}/astrofotos', 'ProfileController@astrofotos');
$router->get('/perfil/{id}/amigos', 'ProfileController@friends');
$router->get('/perfil/{id}/follow', 'ProfileController@follow');
$router->get('/perfil/{id}', 'ProfileController@index');
$router->get('/perfil', 'ProfileController@index');

$router->get('/amigos', 'ProfileController@friends');
$router->get('/fotos', 'ProfileController@photos');
$router->get('/astrofotos', 'ProfileController@astrofotos');

//$router->get('/astrogaleria', 'AstroGaleriaController@astroGaleria');
//$router->get('/astrogaleria/', 'AstroGaleriaController@astroGaleria');
$router->post('/astrogaleria', 'AstroGaleriaController@astroGaleriaAction');
$router->get('/astrofotografia/', 'AstroGaleriaController@astroFotografia');
$router->get('/astrofotografia/{id}/delete', 'AstroGaleriaController@delete');

/*$router->get('/astroloja', 'AstroLojaController@astroLoja');
$router->get('/astroloja/', 'AstroLojaController@astroLoja');*/
$router->post('/astroloja', 'AstroLojaController@astroLojaAction');
$router->get('/produto/', 'AstroLojaController@astroProduto');
$router->get('/produto/{id}/delete', 'AstroLojaController@delete');

$router->get('/pesquisa', 'SearchController@index');

$router->get('/config', 'ConfigController@index');
$router->post('/config', 'ConfigController@save');

$router->get('/sair', 'LoginController@logout');

$router->get('/ajax/like/{id}', 'AjaxController@like');
$router->get('/ajax/likeAstrofotografia/{id}', 'AjaxController@likeAstrofotografia');
$router->get('/ajax/addVisuAstrofotografia/{id}/{visualizacao}', 'AjaxController@visuAstrofotografia');
$router->get('/ajax/addVisuArquivo/{id}/{visualizacao}', 'AjaxController@visuArquivo');

$router->get('/ajax/addqtDownload/{id}/{count}', 'AjaxController@addDownload');

$router->post('/ajax/comment', 'AjaxController@comment');
$router->post('/ajax/commentAstrofotografia', 'AjaxController@commentAstrofotografia');
$router->post('/ajax/upload', 'AjaxController@upload');
//$router->post('/ajax/uploadAstrofotografia', 'AjaxController@uploadAstrofotografia');




$router->get('/astroloja', 'AjaxController@astroLoja');
$router->get('/astroloja/', 'AjaxController@astroLoja');

$router->get('/astroloja/produtos', 'AjaxController@fetchAstroLoja');
$router->get('/astroloja/produtos/', 'AjaxController@fetchAstroLoja');




$router->get('/astrogaleria', 'AjaxController@astroGaleria');
$router->get('/astrogaleria/', 'AjaxController@astroGaleria');

$router->get('/astrogaleria/astrofotografias', 'AjaxController@fetchAstrofotografias');
$router->get('/astrogaleria/astrofotografias/', 'AjaxController@fetchAstrofotografias');




$router->get('/biblioteca', 'AjaxController@astroBiblioteca');
$router->get('/biblioteca/', 'AjaxController@astroBiblioteca');
$router->post('/astrobiblioteca', 'AstroBibliotecaController@astroBibliotecaAction');

$router->get('/biblioteca/arquivos', 'AjaxController@fetchArquivos');
$router->get('/biblioteca/arquivos/', 'AjaxController@fetchArquivos');

$router->get('/arquivo/', 'AstroBibliotecaController@astroArquivo');
$router->get('/arquivo/{id}/delete', 'AstroBibliotecaController@delete');