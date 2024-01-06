<?php
namespace src\handlers;

use \src\models\Astrofotografia;
//use \src\models\PostLike;
use \src\models\AstrofotografiaLike;
//use \src\models\PostComment;
use \src\models\AstrofotografiaComment;
use \src\models\User;
//use \src\models\UserRelation;

class AstrofotografiaHandler {

    public static function getAstrofotografia($idUser, $idAstrofotografia) {
        $astrofotografia = Astrofotografia::select()
            ->where('id', $idAstrofotografia)
        ->get();

        //return $astrofotografia;

        $astrofotografiaData = self::_astrofotografiaToObject($astrofotografia, $idUser);

        return $astrofotografiaData;
    }

    public static function _astrofotografiaToObject($astrofotografia, $idUser) {

        $newFotografia = new Astrofotografia();
        $newFotografia->id = $astrofotografia[0]['id'];
        $newFotografia->id_user = $astrofotografia[0]['id_user'];
        $newFotografia->created_at = $astrofotografia[0]['created_at'];
        $newFotografia->barlows = $astrofotografia[0]['barlows'];
        $newFotografia->categoria = $astrofotografia[0]['categoria'];
        $newFotografia->pais = $astrofotografia[0]['pais'];
        $newFotografia->estado = $astrofotografia[0]['estado'];
        $newFotografia->cidade = $astrofotografia[0]['cidade'];
        $newFotografia->camera = $astrofotografia[0]['camera'];
        $newFotografia->camera_guia = $astrofotografia[0]['camera_guia'];
        $newFotografia->data = $astrofotografia[0]['data'];
        $newFotografia->descricao = $astrofotografia[0]['descricao'];
        $newFotografia->filtros = $astrofotografia[0]['filtros'];
        $newFotografia->fonte_de_dados = $astrofotografia[0]['fonte_de_dados'];
        $newFotografia->imagem = $astrofotografia[0]['imagem'];
        $newFotografia->montagem = $astrofotografia[0]['montagem'];
        $newFotografia->objeto = $astrofotografia[0]['objeto'];
        $newFotografia->oculares = $astrofotografia[0]['oculares'];
        $newFotografia->quantidade_de_frames = $astrofotografia[0]['quantidade_de_frames'];
        $newFotografia->visualizacao = $astrofotografia[0]['visualizacao'];
        $newFotografia->redutor_focal = $astrofotografia[0]['redutor_focal'];
        $newFotografia->software = $astrofotografia[0]['software'];
        $newFotografia->telescopio = $astrofotografia[0]['telescopio'];
        $newFotografia->telescopio_guia = $astrofotografia[0]['telescopio_guia'];
        $newFotografia->tempo_de_exposicao = $astrofotografia[0]['tempo_de_exposicao'];
        $newFotografia->titulo = $astrofotografia[0]['titulo'];
        $newFotografia->mine = false;

        //preenche likes
        $likes = AstrofotografiaLike::select()->where('id_post', $astrofotografia[0]['id'])->get();
        
        $newFotografia->likeCount = count($likes);
        $newFotografia->liked = self::isLiked($astrofotografia[0]['id'], $idUser);

        if($astrofotografia[0]['id_user'] == $idUser) {
            $newFotografia->mine = true;
        }

        //preenche infos do autor da astrofotografia
        $newUser = User::select()->where('id', $astrofotografia[0]['id_user'])->one();
        $newFotografia->user = new User();
        $newFotografia->user->id = $newUser['id'];
        $newFotografia->user->name = $newUser['name'];
        $newFotografia->user->avatar = $newUser['avatar'];

        //preenche coments
        $newFotografia->comments = AstrofotografiaComment::select()->where('id_post', $astrofotografia[0]['id'])->get();
        foreach ($newFotografia->comments as $key => $comment) {
            $newFotografia->comments[$key]['user'] = User::select()->where('id', $comment['id_user'])->one();
        }

        return $newFotografia;
    }

    public static function getAstrogaleriaFeed($idUser, $categoria, $conteudo) {

        if (!$categoria && !$conteudo) {
            $astrofotografiaList = Astrofotografia::select()
                ->orderBy('created_at', 'desc')
            ->get();

            $total = Astrofotografia::select()
            ->count();

        } elseif ($categoria) {
            $astrofotografiaList = Astrofotografia::select()
                ->where('categoria', $categoria)
                ->orderBy('created_at', 'desc')
            ->get();

            $total = Astrofotografia::select()
            ->where('categoria', $categoria)
            ->count();

        } elseif ($conteudo) {
            $astrofotografiaList = Astrofotografia::select()
                ->where('titulo', 'like', '%'.$conteudo.'%')
                ->orWhere('descricao', 'like', '%'.$conteudo.'%')
                ->orderBy('created_at', 'desc')
            ->get();

            $total = Astrofotografia::select()
            ->where('categoria', $categoria)
            ->count();

        } elseif ($conteudo && $categoria) {
            $astrofotografiaList = Astrofotografia::select()
                ->where('categoria', $categoria)
                ->orWhere('titulo', 'like', '%'.$conteudo.'%')
                ->orWhere('descricao', 'like', '%'.$conteudo.'%')
                ->orderBy('created_at', 'desc')
            ->get();

            $total = Astrofotografia::select()
            ->where('categoria', $categoria)
            ->count();
        }

        //$pageCount = ceil($total / $perPage);

        // 3. transformar o resultado em objetos dos models
        $astrofotografias = self::_astrofotografiaListToObject($astrofotografiaList, $idUser);

        // 5. retornar o resultado.
        return [
            'astrofotografias' => $astrofotografias
        ];
    }

    public static function _astrofotografiaListToObject($astrofotografiaList, $loggedUserId) {
        $astrofotografias = [];
        foreach($astrofotografiaList as $astrofotografiaItem) {
            $newAstrofotografia = new Astrofotografia();
            $newAstrofotografia->id = $astrofotografiaItem['id'];
            $newAstrofotografia->imagem = $astrofotografiaItem['imagem'];
            $newAstrofotografia->titulo = $astrofotografiaItem['titulo'];
            $newAstrofotografia->mine = false;

            if($astrofotografiaItem['id_user'] == $loggedUserId) {
                $newAstrofotografia->mine = true;
            }

            $astrofotografias[] = $newAstrofotografia;
        }
        
        return $astrofotografias;
    }

    public static function addAstrofotografia($id_user, $titulo, $imagemName, $descricao, $categoriaFormatada, $objeto, $fonte_dados, $data_captura, $pais, $estado, $cidade, $quantidade_frames, $exposicao_frames, $telescopio, $camera, $montagem, $telescopio_guia, $camera_guia, $redutor_focal, $software, $filtros, $oculares, $barlows) {

        Astrofotografia::insert([
            'id_user' => $id_user,
            'created_at' => date('Y-m-d H:i:s'),
            'barlows' => $barlows,
            'categoria' => $categoriaFormatada,
            'pais' => $pais,
            'estado' => $estado,
            'cidade' => $cidade,
            'camera' => $camera,
            'camera_guia' => $camera_guia,
            'data' => $data_captura,
            'descricao' => $descricao,
            'filtros' => $filtros,
            'fonte_de_dados' => $fonte_dados,
            'imagem' => $imagemName,
            'montagem' => $montagem,
            'objeto' => $objeto,
            'oculares' => $oculares,
            'quantidade_de_frames' => $quantidade_frames,
            'redutor_focal' => $redutor_focal,
            'software' => $software,
            'telescopio' => $telescopio,
            'telescopio_guia' => $telescopio_guia,
            'tempo_de_exposicao' => $exposicao_frames,
            'titulo' => $titulo
        ])->execute();

    }

    public static function delete($id, $loggedUserId) {
        // 1. verificar se o post existe (e se é seu)
        $fotografia = Astrofotografia::select()
            ->where('id', $id)
            ->where('id_user', $loggedUserId)
        ->get();

        if(count($fotografia) > 0) {
            $fotografia = $fotografia[0];

            // 2. deletar os likes e comments
            /*PostLike::delete()->where('id_post', $id)->execute();
            PostComment::delete()->where('id_post', $id)->execute();*/

            // 3. se a foto for type == photo, deletar o arquivo
            $img = __DIR__.'/../../public/media/uploads/'.$fotografia['imagem'];
            if(file_exists($img)) {
                    unlink($img);
            }

            // 4. deletar o post
            Astrofotografia::delete()->where('id', $id)->execute();
        }
    }

    public static function isLiked($id, $loggedUserId) {
        $myLike = AstrofotografiaLike::select()
            ->where('id_post', $id)
            ->where('id_user', $loggedUserId)
        ->get();

        if(count($myLike) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public static function deleteLike($id, $loggedUserId) {
        AstrofotografiaLike::delete()
            ->where('id_post', $id)
            ->where('id_user', $loggedUserId)
        ->execute();
    }

    public static function addLike($id, $loggedUserId) {
        AstrofotografiaLike::insert([
            'id_post' => $id,
            'id_user' => $loggedUserId,
            'created_at' => date('Y-m-d H:i:s')
        ])->execute();
    }

    public static function addVisu($id, $loggedUserId, $visualizacaoAtual) {
        $novaVisualizacao = $visualizacaoAtual + 1;

        Astrofotografia::update([
            'visualizacao' => $novaVisualizacao
        ])->where('id', $id)->execute();
    }

    public static function addComment($id, $comentarioConteudo, $loggedUserId) {
        AstrofotografiaComment::insert([
            'id_post' => $id,
            'id_user' => $loggedUserId,
            'created_at' => date('Y-m-d H:i:s'),
            'body' => $comentarioConteudo
        ])->execute();
    }

    public static function getAstrofotografiasHome($idUser) {
        $astrofotografiasHomeList = Astrofotografia::select()
        ->orderBy('created_at', 'desc')
        ->limit(6)
        ->get();

        $astrofotografias = self::_astrofotografiaListToObject($astrofotografiasHomeList, $idUser);

        return [
            'astrofotografias' => $astrofotografias
        ];
    }

    public static function numeroAstrofotografias() {
        $numAstrofotografias = Astrofotografia::select()->count();

        return $numAstrofotografias;
    }

    public static function getAstrofotografiasFrom($idUser) {
        $astrofotosData = Astrofotografia::select()
            ->where('id_user', $idUser)
        ->get();

        $astrofotos = [];

        foreach($astrofotosData as $astrofoto) {
            $newFotografia = new Astrofotografia();
            $newFotografia->id = $astrofoto['id'];
            $newFotografia->imagem = $astrofoto['imagem'];

            $astrofotos[] = $newFotografia;
        }

        return $astrofotos;
    }
}