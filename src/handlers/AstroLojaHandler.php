<?php
namespace src\handlers;

use \src\models\Astroloja;
//use \src\models\PostLike;
//use \src\models\AstrofotografiaLike;
//use \src\models\PostComment;
//use \src\models\AstrofotografiaComment;
use \src\models\User;
//use \src\models\UserRelation;

class AstroLojaHandler {

	public static function getProduto($idUser, $idAstrofotografia) {
		$produto = Astroloja::select()
			->where('id', $idAstrofotografia)
		->get();

		$produtoData = self::_produtoToObject($produto, $idUser);

		return $produtoData;
	}

	public static function _produtoToObject($produto, $idUser) {

		$newProduto = new Astroloja();
		$newProduto->id = $produto[0]['id'];
		$newProduto->id_user = $produto[0]['id_user'];
		$newProduto->created_at = $produto[0]['created_at'];
		$newProduto->titulo = $produto[0]['titulo'];
		$newProduto->valor = $produto[0]['valor'];
		$newProduto->img1 = $produto[0]['imagem1'];
		$newProduto->img2 = $produto[0]['imagem2'];
		$newProduto->img3 = $produto[0]['imagem3'];
		$newProduto->img4 = $produto[0]['imagem4'];
		$newProduto->categoria = $produto[0]['categoria'];
		$newProduto->pais = $produto[0]['pais'];
		$newProduto->estado = $produto[0]['estado'];
		$newProduto->cidade = $produto[0]['cidade'];
		$newProduto->descricao = $produto[0]['descricao'];
		$newProduto->contatos = $produto[0]['contatos'];
		$newProduto->mine = false;

		if ($produto[0]['id_user'] == $idUser) {
			$newProduto->mine = true;
		}

		//infos autor
		$newUser = User::select()->where('id', $produto[0]['id_user'])->one();
		$newProduto->user = new User();
		$newProduto->user->id = $newUser['id'];
		$newProduto->user->name = $newUser['name'];
		$newProduto->user->avatar = $newUser['avatar'];

		return $newProduto;
	}

	public static function getAstrolojaFeed($idUser, $categoria, $conteudo) {

		if (!$categoria && !$conteudo) {
            $astrolojaList = Astroloja::select()
                ->orderBy('created_at', 'desc')
                //->page($page, $perPage)
            ->get();

            $total = Astroloja::select()
            ->count();

        } elseif ($categoria) {
            $astrolojaList = Astroloja::select()
                ->where('categoria', $categoria)
                ->orderBy('created_at', 'desc')
                //->page($page, $perPage)
            ->get();

            /*$total = Astroloja::select()
            ->where('categoria', $categoria)
            ->count();*/

        } elseif ($conteudo) {
            $astrolojaList = Astroloja::select()
                ->where('titulo', 'like', '%'.$conteudo.'%')
                ->orWhere('descricao', 'like', '%'.$conteudo.'%')
                ->orderBy('created_at', 'desc')
                //->page($page, $perPage)
            ->get();

            /*$total = Astroloja::select()
            ->where('categoria', $categoria)
            ->count();*/

        } elseif ($conteudo && $categoria) {
            $astrolojaList = Astroloja::select()
                ->where('categoria', $categoria)
                ->orWhere('titulo', 'like', '%'.$conteudo.'%')
                ->orWhere('descricao', 'like', '%'.$conteudo.'%')
                ->orderBy('created_at', 'desc')
                //->page($page, $perPage)
            ->get();

            /*$total = Astroloja::select()
            ->where('categoria', $categoria)
            ->count();*/
        }

		//$pageCount = ceil($total / $perPage);

		$produtos = self::_astroprodutosListToObject($astrolojaList, $idUser);

		return [
			'produtos' => $produtos
		];
	}

	public static function _astroprodutosListToObject($astrolojaList, $loggedUserId) {
		$produtos = [];
		foreach($astrolojaList as $astrolojaItem) {
			$newProduto = new Astroloja();
			$newProduto->id = $astrolojaItem['id'];
			$newProduto->categoria = $astrolojaItem['categoria'];
			$newProduto->imagem = $astrolojaItem['imagem1'];
			$newProduto->titulo = $astrolojaItem['titulo'];
			$newProduto->pais = $astrolojaItem['pais'];
			$newProduto->estado = $astrolojaItem['estado'];
			$newProduto->cidade = $astrolojaItem['cidade'];
			$newProduto->valor = $astrolojaItem['valor'];
			$newProduto->mine = false;

			if ($astrolojaItem['id_user'] == $loggedUserId) {
				$newProduto->mine = true;
			}

			$produtos[] = $newProduto;
		}

		return $produtos;
	}

	public static function addProduto($id_user, $titulo, $valor, $imagemName1, $imagemName2, $imagemName3, $imagemName4, $categoria, $pais, $estado, $cidade, $descricao, $contatos) {

		Astroloja::insert([
			'id_user' => $id_user,
			'created_at' => date('Y-m-d H:i:s'),
			'titulo' => $titulo,
			'valor' => $valor,
			'imagem1' => $imagemName1,
			'imagem2' => $imagemName2,
			'imagem3' => $imagemName3,
			'imagem4' => $imagemName4,
			'categoria' => $categoria,
			'pais' => $pais,
			'estado' => $estado,
			'cidade' => $cidade,
			'descricao' => $descricao,
			'contatos' => $contatos
		])->execute();
	}

	public static function delete($id, $loggedUserId) {
		$produto = Astroloja::select()
			->where('id', $id)
			->where('id_user', $loggedUserId)
		->get();

		if (count($produto) > 0) {
			$produto = $produto[0];

			$img1 = __DIR__.'/../../public/media/uploads/'.$produto['imagem1'];

			if(file_exists($img1)) {
                    unlink($img1);
            }

			$img2 = __DIR__.'/../../public/media/uploads/'.$produto['imagem2'];

			if(file_exists($img2)) {
                    unlink($img2);
            }

			$img3 = __DIR__.'/../../public/media/uploads/'.$produto['imagem3'];

			if(file_exists($img3)) {
                    unlink($img3);
            }

			$img4 = __DIR__.'/../../public/media/uploads/'.$produto['imagem4'];

			if(file_exists($img4)) {
                    unlink($img4);
            }
		}

		Astroloja::delete()->where('id', $id)->execute();
	}

	public static function getProdutosHome($idUser) {
		$produtosHomeList = AstroLoja::select()
		->orderBy('created_at', 'desc')
		->limit(9)
		->get();

		$produtos = self::_astroprodutosListToObject($produtosHomeList, $idUser);

		return [
			'produtos' => $produtos
		];
	}

	public static function numeroProdutos() {
    	$numProdutos = Astroloja::select()->count();

    	return $numProdutos;
    }
}