<?php
namespace src\handlers;

use \src\models\AstroBiblioteca;
//use \src\models\PostLike;
//use \src\models\AstrofotografiaLike;
//use \src\models\PostComment;
//use \src\models\AstrofotografiaComment;
use \src\models\User;
//use \src\models\UserRelation;

class AstroBibliotecaHandler {

	public static function addArquivo($id_user, $titulo, $categoria, $descricao, $arquivoName) {

		AstroBiblioteca::insert([
			'id_user' => $id_user,
			'created_at' => date('Y-m-d H:i:s'),
			'titulo' => $titulo,
			'categoria' => $categoria,
			'descricao' => $descricao,
			'arquivo' => $arquivoName
		])->execute();
	}

	public static function getArquivo($idUser, $idArquivo) {
		$arquivo = AstroBiblioteca::select()
			->where('id', $idArquivo)
		->get();

		$arquivoData = self::_arquivoToObject($arquivo, $idUser);

		return $arquivoData;
	}

	public static function _arquivoToObject($arquivo, $idUser) {

		$newArquivo = new AstroBiblioteca();
		$newArquivo->id = $arquivo[0]['id'];
		$newArquivo->id_user = $arquivo[0]['id_user'];
		$newArquivo->created_at = $arquivo[0]['created_at'];
		$newArquivo->titulo = $arquivo[0]['titulo'];
		$newArquivo->arquivo = $arquivo[0]['arquivo'];
		//$newArquivo->valor = $arquivo[0]['valor'];
		//$newArquivo->img1 = $arquivo[0]['imagem1'];
		//$newArquivo->img2 = $arquivo[0]['imagem2'];
		//$newArquivo->img3 = $arquivo[0]['imagem3'];
		//$newArquivo->img4 = $arquivo[0]['imagem4'];
		$newArquivo->categoria = $arquivo[0]['categoria'];
		//$newArquivo->cidade = $arquivo[0]['cidade'];
		$newArquivo->descricao = $arquivo[0]['descricao'];
		//$newArquivo->contatos = $arquivo[0]['contatos'];
		$newArquivo->visualizacao = $arquivo[0]['visualizacao'];
		$newArquivo->download = $arquivo[0]['download'];
		$newArquivo->mine = false;

		if ($arquivo[0]['id_user'] == $idUser) {
			$newArquivo->mine = true;
		}

		//infos autor
		$newUser = User::select()->where('id', $arquivo[0]['id_user'])->one();
		$newArquivo->user = new User();
		$newArquivo->user->id = $newUser['id'];
		$newArquivo->user->name = $newUser['name'];
		$newArquivo->user->avatar = $newUser['avatar'];

		return $newArquivo;
	}

	public static function getAstrobibliotecaFeed($idUser, $categoria, $conteudo) {

		if (!$categoria && !$conteudo) {
            $astrobibliotecaList = AstroBiblioteca::select()
                ->orderBy('created_at', 'desc')
                //->page($page, $perPage)
            ->get();

            $total = AstroBiblioteca::select()
            ->count();

        } elseif ($categoria) {
            $astrobibliotecaList = AstroBiblioteca::select()
                ->where('categoria', $categoria)
                ->orderBy('created_at', 'desc')
                //->page($page, $perPage)
            ->get();

            /*$total = AstroBiblioteca::select()
            ->where('categoria', $categoria)
            ->count();*/

        } elseif ($conteudo) {
            $astrobibliotecaList = AstroBiblioteca::select()
                ->where('titulo', 'like', '%'.$conteudo.'%')
                ->orWhere('descricao', 'like', '%'.$conteudo.'%')
                ->orderBy('created_at', 'desc')
                //->page($page, $perPage)
            ->get();

            /*$total = AstroBiblioteca::select()
            ->where('categoria', $categoria)
            ->count();*/

        } elseif ($conteudo && $categoria) {
            $astrobibliotecaList = AstroBiblioteca::select()
                ->where('categoria', $categoria)
                ->orWhere('titulo', 'like', '%'.$conteudo.'%')
                ->orWhere('descricao', 'like', '%'.$conteudo.'%')
                ->orderBy('created_at', 'desc')
                //->page($page, $perPage)
            ->get();

            /*$total = AstroBiblioteca::select()
            ->where('categoria', $categoria)
            ->count();*/
        }

		//$pageCount = ceil($total / $perPage);

		$arquivos = self::_astrobibliotecaListToObject($astrobibliotecaList, $idUser);

		return [
			'arquivos' => $arquivos
		];
	}

	public static function _astrobibliotecaListToObject($astrobibliotecaList, $loggedUserId) {
		$arquivos = [];
		foreach($astrobibliotecaList as $astrobibliotecaItem) {
			$newArquivo = new AstroBiblioteca();
			$newArquivo->id = $astrobibliotecaItem['id'];
			$newArquivo->id_user = $astrobibliotecaItem['id_user'];
			$newArquivo->created_at = $astrobibliotecaItem['created_at'];
			$newArquivo->titulo = $astrobibliotecaItem['titulo'];
			$newArquivo->categoria = $astrobibliotecaItem['categoria'];
			$newArquivo->arquivo = $astrobibliotecaItem['arquivo'];
			$newArquivo->mine = false;

			if ($astrobibliotecaItem['id_user'] == $loggedUserId) {
				$newArquivo->mine = true;
			}

			$arquivos[] = $newArquivo;
		}

		return $arquivos;
	}

	public static function addVisu($id, $loggedUserId, $visualizacaoAtual) {
        $novaVisualizacao = $visualizacaoAtual + 1;

        AstroBiblioteca::update([
            'visualizacao' => $novaVisualizacao
        ])->where('id', $id)->execute();
    }

    public static function addDownload($id, $loggedUserId, $downloadCount) {
        $novoDownload = $downloadCount + 1;

        AstroBiblioteca::update([
            'download' => $novoDownload
        ])->where('id', $id)->execute();
    }

    public static function delete($id, $loggedUserId) {
        // 1. verificar se o post existe (e se é seu)
        $arquivo = AstroBiblioteca::select()
            ->where('id', $id)
            ->where('id_user', $loggedUserId)
        ->get();

        if(count($arquivo) > 0) {
            $arquivo = $arquivo[0];

            // 2. deletar os likes e comments
            /*PostLike::delete()->where('id_post', $id)->execute();
            PostComment::delete()->where('id_post', $id)->execute();*/

            // 3. se a foto for type == photo, deletar o arquivo
            $arq = __DIR__.'/../../public/media/uploads/'.$arquivo['arquivo'];
            if(file_exists($arq)) {
                    unlink($arq);
            }

            // 4. deletar o post
            AstroBiblioteca::delete()->where('id', $id)->execute();
        }
    }

    public static function getArquivosHome($idUser) {
    	$arquivosHomeList = AstroBiblioteca::select()
    	->orderBy('created_at', 'desc')
    	->limit(4)
    	->get();

    	$arquivos = self::_astrobibliotecaListToObject($arquivosHomeList, $idUser);

    	return [
    		'arquivos' => $arquivos
    	];
    }

    public static function numeroArquivos() {
    	$numArquivos = AstroBiblioteca::select()->count();

    	return $numArquivos;
    }
}